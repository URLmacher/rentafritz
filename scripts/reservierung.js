const baseUrl = `http://rentafritz.loc`;

document.addEventListener('DOMContentLoaded', function() {
    const dropdownSelectsDom = document.querySelectorAll('select');
    const dropdownSelects = M.FormSelect.init(dropdownSelectsDom, {});
    const allInputs = document.querySelectorAll('input');

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
    const datePickerStart = M.Datepicker.getInstance(datePickerStartDom);
    const datePickerEnd = M.Datepicker.getInstance(datePickerEndDom);
    const timePickerStart = M.Timepicker.getInstance(timePickerStartDom);
    const timePickerEnd = M.Timepicker.getInstance(timePickerEndDom);
    rentForm.addEventListener('submit', event => {
        event.preventDefault();
        console.log(datePickerStart.date);
        console.log(datePickerEnd.date);
        console.log(timePickerStart.time);
        console.log(timePickerEnd.time);
        console.log(customerName.value);
        console.log(customerStreet.value);
        console.log(customerHnr.value);
        console.log(customerPlz.value);
        console.log(customerCity.value);
        //check for errors, send formdata
        if (
            checkDateAndTime(
                datePickerStart.date,
                datePickerEnd.date,
                timePickerStart.time,
                timePickerEnd.time
            )
        ) {
            const hours = getDiffInHours(
                setTimeOfDate(datePickerStart.date, timePickerStart.time),
                setTimeOfDate(datePickerEnd.date, timePickerEnd.time)
            );
            console.log(hours);
            sendForm();
        } else {
            console.log('error!');
        }
        // setTimeOfDate(datePickerStart.date, timePickerStart.time);
    });

    allInputs.forEach(input => input.addEventListener('focus', clearErrors));
});

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
 * prints errors
 * @param {date} dateStart
 * @param {date} dateEnd
 * @param {string} timeStart
 * @param {string} timeEnd
 * @returns {boolean}
 */
function checkDateAndTime(dateStart, dateEnd, timeStart, timeEnd) {
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

    return noError;
}

/**
 * clears errors from a inputs error-field
 * @param {FocusEvent} event
 */
function clearErrors(event) {
    if (event.target.nextElementSibling.classList.contains('rent__errors'))
        event.target.nextElementSibling.innerHTML = '';
}

/**
 * send form data to backend
 */
async function sendForm() {
    let postData = {
        test: 'tesr'
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
