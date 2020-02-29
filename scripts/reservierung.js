const baseUrl = `http://rentafritz.loc`;

document.addEventListener('DOMContentLoaded', function() {
    const allInputs = document.querySelectorAll('input');
    const dropdownSelectDom = document.getElementById('rent-select');
    const rentForm = document.getElementById('rent-form');
    const datePickerStartDom = document.getElementById('rent-date-start');
    const timePickerStartDom = document.getElementById('rent-time-start');
    const datePickerEndDom = document.getElementById('rent-date-end');
    const timePickerEndDom = document.getElementById('rent-time-end');
    const customerName = document.getElementById('rent-name');
    const customerStreet = document.getElementById('rent-street');
    const customerHnr = document.getElementById('rent-hnr');
    const customerPlz = document.getElementById('rent-plz');
    const customerCity = document.getElementById('rent-city');
    const customerFile = document.getElementById('rent-file').files[0];

    M.FormSelect.init(dropdownSelectDom, {});

    const datePickersDom = document.querySelectorAll('.datepicker');
    M.Datepicker.init(datePickersDom, {
        i18n: translations,
        format: 'dd.mm.yyyy',
        firstDay: 1
    });

    const timePickersDom = document.querySelectorAll('.timepicker');
    M.Timepicker.init(timePickersDom, {
        i18n: translations,
        twelveHour: false
    });

    const datePickerStart = M.Datepicker.getInstance(datePickerStartDom);
    const datePickerEnd = M.Datepicker.getInstance(datePickerEndDom);
    const timePickerStart = M.Timepicker.getInstance(timePickerStartDom);
    const timePickerEnd = M.Timepicker.getInstance(timePickerEndDom);

    rentForm.addEventListener('submit', event => {
        event.preventDefault();
        console.log(dropdownSelectDom.value);
        // console.log(datePickerStart.date);
        // console.log(datePickerEnd.date);
        // console.log(timePickerStart.time);
        // console.log(timePickerEnd.time);
        // console.log(customerName.value);
        // console.log(customerStreet.value);
        // console.log(customerHnr.value);
        // console.log(customerPlz.value);
        // console.log(customerCity.value);
        //check for errors, send formdata

        if (
            preCalcCheck(
                datePickerStart.date,
                datePickerEnd.date,
                timePickerStart.time,
                timePickerEnd.time,
                dropdownSelectDom.value
            )
        ) {
            const hours = getDiffInHours(
                setTimeOfDate(datePickerStart.date, timePickerStart.time),
                setTimeOfDate(datePickerEnd.date, timePickerEnd.time)
            );
            const productId = parseInt(dropdownSelectDom.value, 10);
            console.log(hours, dropdownSelectDom.value);
            getPrice(hours, productId);
        } else {
            console.log('error!');
        }
    });
    allInputs.forEach(input => input.addEventListener('focus', clearErrors));
    dropdownSelectDom.addEventListener('change', clearErrors);
});

/**
 * difference between start and end in hours
 * @param {Date} dateStart
 * @param {Date} dateEnd
 * @return {number}
 */
function getDiffInHours(dateStart, dateEnd) {
    const milliseconds = Math.abs(dateEnd - dateStart);
    const hours = milliseconds / 36e5;
    return Math.round(hours);
}

/**
 * set time of date
 * @param {date} date
 * @param {string} time
 * @returns {date}
 */
function setTimeOfDate(date, time) {
    const timeArr = time.split(':');
    date.setHours(parseInt(timeArr[0], 10));
    date.setMinutes(parseInt(timeArr[1], 10));
    return date;
}

/**
 * renders error under input elements
 * @param {string} errorText
 * @param {string} elementId
 */
function printError(errorText, elementId) {
    const errorElement = document.getElementById(elementId);
    errorElement.innerHTML = `<p class="rent__error-text">${errorText}</p>`;
}

/**
 * checks if dates and times are set and valid
 * and product is selected
 * prints errors
 * @param {date} dateStart
 * @param {date} dateEnd
 * @param {string} timeStart
 * @param {string} timeEnd
 * @returns {boolean}
 */
function preCalcCheck(dateStart, dateEnd, timeStart, timeEnd, itemId) {
    const now = new Date();
    now.setHours(0, 0, 0, 0);
    const timeRegex = /^([01]?[0-9]|2[0-3]):[0-5][0-9]$/;
    let noError = true;

    if (!dateStart) {
        noError = false;
        printError('Bitte Datum auswählen', 'error-date-start');
    } else if (dateStart < now) {
        noError = false;
        printError('Datum ungültig', 'error-date-start');
    }

    if (!dateEnd) {
        noError = false;
        printError('Bitte Datum auswählen', 'error-date-end');
    } else if (dateEnd < now) {
        noError = false;
        printError('Datum ungültig', 'error-date-end');
    }

    if (!timeStart) {
        noError = false;
        printError('Bitte Uhrzeit auswählen', 'error-time-start');
    } else if (!timeRegex.test(timeStart)) {
        noError = false;
        printError('Uhrzeit ungültig', 'error-time-start');
    }

    if (!timeEnd) {
        noError = false;
        printError('Bitte Uhrzeit auswählen', 'error-time-end');
    } else if (!timeRegex.test(timeEnd)) {
        noError = false;
        printError('Uhrzeit ungültig', 'error-time-end');
    }

    if (dateStart && dateStart > now && dateEnd && dateStart > dateEnd) {
        noError = false;
        printError('Datum ungültig', 'error-date-end');
    }

    if (!itemId) {
        noError = false;
        printError('Bitte Produkt auswählen', 'error-product');
    }

    return noError;
}

/**
 * clears errors from a inputs error-field
 * @param {FocusEvent} event
 */
function clearErrors(event) {
    if (
        event.target.nextElementSibling &&
        event.target.nextElementSibling.classList.contains('rent__errors')
    ) {
        event.target.nextElementSibling.innerHTML = '';
    } else if (
        event.target.parentElement &&
        event.target.parentElement.nextElementSibling.classList.contains('rent__errors')
    ) {
        event.target.parentElement.nextElementSibling.innerHTML = '';
    }
}

/**
 * send form data to backend
 */
async function getPrice(hours, productId) {
    let postData = {
        hours: hours,
        productId: productId
    };

    try {
        const answer = await fetch(`${baseUrl}/backend/getprice.php`, {
            headers: {
                'Content-Type': 'application/json'
            },
            mode: 'cors',
            method: 'post',
            body: JSON.stringify(postData)
        });

        const data = await answer.json();
        if (data.success) {
            console.log(data.sentData);
        } else {
            console.log('gay');
        }
    } catch (error) {
        console.log(error);
    }
}
