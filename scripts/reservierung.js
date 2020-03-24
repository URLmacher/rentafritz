const baseUrl = `http://rentafritz.loc`;

document.addEventListener('DOMContentLoaded', () => {
  // get all DOMelements
  const allInputs = document.querySelectorAll('input');
  const infoBox = document.getElementById('rent-info');
  const successMsg = document.getElementById('rent-succes');
  const infoLoading = document.getElementById('rent-info-loading');
  const fullLoading = document.getElementById('rent-full-loading');
  const infoProduct = document.getElementById('rent-info-selected-product');
  const infoTime = document.getElementById('rent-info-time');
  const infoPrice = document.getElementById('rent-info-price');
  const agbLink = document.getElementById('rent-agb-link');
  const rentPaginationPage = document.getElementById('rent-pagination-page');
  const rentBackButton = document.getElementById('rent-back-button');
  const rentBackHomeButton = document.getElementById('rent-back-home-btn');
  const dropdownSelectDom = document.getElementById('rent-select');
  const rentFormPageOne = document.getElementById('rent-form-1');
  const rentFormPageTwo = document.getElementById('rent-form-2');
  const datePickerStartDom = document.getElementById('rent-date-start');
  const timePickerStartDom = document.getElementById('rent-time-start');
  const datePickerEndDom = document.getElementById('rent-date-end');
  const timePickerEndDom = document.getElementById('rent-time-end');
  const customerFirstName = document.getElementById('rent-first-name');
  const customerLastName = document.getElementById('rent-last-name');
  const customerPhone = document.getElementById('rent-phone');
  const customerEmail = document.getElementById('rent-email');
  const customerStreet = document.getElementById('rent-street');
  const customerHnr = document.getElementById('rent-hnr');
  const customerPlz = document.getElementById('rent-plz');
  const customerCity = document.getElementById('rent-city');
  const customerFile = document.getElementById('rent-file');
  const customerAgb = document.getElementById('rent-agb');
  let productName = '';
  let rentDuration = '';
  let totalPrice = '';
  let rentStart = '';
  let rentEnd = '';

  if (!rentFormPageOne) return;

  // initialize materialize selects/inputs
  M.FormSelect.init(dropdownSelectDom, {});
  const datePickersDom = document.querySelectorAll('.datepicker');
  M.Datepicker.init(datePickersDom, {
    i18n: translations,
    format: 'dd.mm.yyyy',
    firstDay: 1,
  });
  const timePickersDom = document.querySelectorAll('.timepicker');
  M.Timepicker.init(timePickersDom, {
    i18n: translations,
    twelveHour: false,
  });
  // get materialize instances
  const datePickerStart = M.Datepicker.getInstance(datePickerStartDom);
  const datePickerEnd = M.Datepicker.getInstance(datePickerEndDom);
  const timePickerStart = M.Timepicker.getInstance(timePickerStartDom);
  const timePickerEnd = M.Timepicker.getInstance(timePickerEndDom);

  // handle form page 1
  rentFormPageOne.addEventListener('submit', async event => {
    event.preventDefault();

    if (preCalcCheck(datePickerStart.date, datePickerEnd.date, timePickerStart.time, timePickerEnd.time, dropdownSelectDom.value)) {
      rentFormPageOne.classList.add('rent__hidden');
      rentFormPageTwo.classList.remove('rent__hidden');
      infoBox.classList.remove('rent__hidden');
      rentPaginationPage.innerHTML = 2;

      rentStart = setTimeOfDate(datePickerStart.date, timePickerStart.time);
      rentEnd = setTimeOfDate(datePickerEnd.date, timePickerEnd.time);

      const hours = getDiffInHours(rentStart, rentEnd);
      const productId = parseInt(dropdownSelectDom.value, 10);
      const data = await getPrice(hours, productId);
      if (data.success) {
        productName = data.product;
        rentDuration = formatTime(data.time);
        totalPrice = `${data.price} Euro`;

        infoLoading.classList.add('hide');
        infoProduct.innerHTML = productName;
        infoTime.innerHTML = rentDuration;
        infoPrice.innerHTML = totalPrice;
      } else {
        console.error(data.error);
        console.log(data);
      }
    } else {
      console.log('error!');
    }
  });

  // handle form page 2
  rentFormPageTwo.addEventListener('submit', async event => {
    event.preventDefault();
    fullLoading.classList.remove('rent__hidden');

    if (preSendCheck(customerFirstName.value, customerLastName.value, customerPhone.value, customerEmail.value, customerStreet.value, customerHnr.value, customerPlz.value, customerCity.value, customerFile.files[0], customerAgb.checked)) {
      const data = await handleForm(customerFirstName.value, customerLastName.value, customerPhone.value, customerEmail.value, customerStreet.value, customerHnr.value, customerPlz.value, customerCity.value, customerFile.files[0], productName, totalPrice, rentDuration, rentStart, rentEnd);
      if (data.success) {
        console.log(data);
        fullLoading.classList.add('rent__hidden');
        rentFormPageTwo.classList.add('rent__hidden');
        successMsg.classList.remove('rent__hidden');
      } else {
        fullLoading.classList.add('rent__hidden');
        console.error(data.error);
        console.log(data);
      }
    } else {
      fullLoading.classList.add('rent__hidden');
      console.log('error!');
    }
  });

  //handle back button
  rentBackButton.addEventListener('click', () => {
    rentFormPageOne.classList.remove('rent__hidden');
    rentFormPageTwo.classList.add('rent__hidden');
    infoBox.classList.add('rent__hidden');
    rentPaginationPage.innerHTML = 1;
  });

  rentBackHomeButton.addEventListener('click', () => {
    window.location.href = `${baseUrl}`;
  });

  agbLink.addEventListener('click', event => {
    event.preventDefault();
    window.open(`${baseUrl}/agb`);
  });

  // handle error clearing
  allInputs.forEach(input => input.addEventListener('focus', clearErrors));
  dropdownSelectDom.addEventListener('change', clearErrors);
});

/**
 * formats time into readable string
 * @param {number} time
 */
function formatTime(time) {
  let formattedTime = time === 1 ? `${time} Stunde` : `${time} Stunden`;

  if (time > 24) {
    const days = Math.floor(time / 24);
    const hours = time - 24 * days;
    const dayString = days === 1 ? `${days} Tag` : `${days} Tage`;
    const hourString = hours === 1 ? `${hours} Stunde` : `${hours} Stunden`;
    formattedTime = `${dayString} ${hourString}`;
  }

  return formattedTime;
}

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
 * clears errors from a inputs error-field
 * @param {FocusEvent} event
 */
function clearErrors(event) {
  const errorId = event.target.id.replace('rent', 'error');
  const errorField = document.getElementById(errorId);

  if (errorField && errorField.classList.contains('rent__errors')) {
    errorField.innerHTML = '';
  }
}

/**
 * send form data to backend to send mail
 * @param {string} customerFirstName
 * @param {string} customerLastName
 * @param {string} customerPhone
 * @param {string} customerEmail
 * @param {string} customerStreet
 * @param {string} customerHnr
 * @param {string} customerPlz
 * @param {string} customerCity
 * @param {File} customerFile
 * @param {string} product
 * @param {string} price
 * @param {string} rentDuration
 * @param {Date} rentStart
 * @param {Date} rentEnd
 * @returns {Promise}
 */
async function handleForm(customerFirstName, customerLastName, customerPhone, customerEmail, customerStreet, customerHnr, customerPlz, customerCity, customerFile, product, price, rentDuration, rentStart, rentEnd) {
  const dateFormatOptions = {
    weekday: 'long',
    year: 'numeric',
    month: 'long',
    day: 'numeric',
    hour: '2-digit',
    minute: '2-digit',
  };

  const formData = new FormData();
  formData.append('firstName', customerFirstName);
  formData.append('lastName', customerLastName);
  formData.append('phone', customerPhone);
  formData.append('email', customerEmail);
  formData.append('street', customerStreet);
  formData.append('hnr', customerHnr);
  formData.append('plz', customerPlz);
  formData.append('city', customerCity);
  formData.append('file', customerFile);
  formData.append('product', product);
  formData.append('price', price);
  formData.append('duration', rentDuration);
  formData.append('rentStart', rentStart.toLocaleDateString('de-DE', dateFormatOptions));
  formData.append('rentEnd', rentEnd.toLocaleDateString('de-DE', dateFormatOptions));

  const answer = await fetch(`${baseUrl}/backend/handleform.php`, {
    method: 'post',
    body: formData,
  });

  return await answer.json();
}

/**
 * send form data to backend to calculate price
 */
async function getPrice(hours, productId) {
  let postData = {
    hours: hours,
    productId: productId,
  };

  const answer = await fetch(`${baseUrl}/backend/getprice.php`, {
    headers: {
      'Content-Type': 'application/json',
    },
    mode: 'cors',
    method: 'post',
    body: JSON.stringify(postData),
  });

  return await answer.json();
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
    printError('Bitte Produkt auswählen', 'error-select');
  }

  return noError;
}

/**
 * check customer data, return errors
 * @param {string} firstName
 * @param {string} lastName
 * @param {string} phone
 * @param {string} email
 * @param {string} street
 * @param {string} hnr
 * @param {string} plz
 * @param {string} city
 * @param {File} file
 * @param {boolean} agb
 * @return {boolean}
 */
function preSendCheck(firstName, lastName, phone, email, street, hnr, plz, city, file, agb) {
  let noError = true;

  if (firstName === '') {
    noError = false;
    printError('Bitte Vorname eingeben', 'error-first-name');
  }
  if (lastName === '') {
    noError = false;
    printError('Bitte Nachname eingeben', 'error-last-name');
  }
  if (phone === '') {
    noError = false;
    printError('Bitte Telefonnummer eingeben', 'error-phone');
  }
  if (email === '') {
    noError = false;
    printError('Bitte Telefonnummer eingeben', 'error-email');
  }
  if (street === '') {
    noError = false;
    printError('Bitte Straße eingeben', 'error-street');
  }
  if (hnr === '') {
    noError = false;
    printError('Bitte Hausnummer eingeben', 'error-hnr');
  }
  if (plz === '') {
    noError = false;
    printError('Bitte Postleitzahl eingeben', 'error-plz');
  }
  if (city === '') {
    noError = false;
    printError('Bitte Wohnort eingeben', 'error-city');
  }
  if (!file) {
    noError = false;
    printError('Bitte Ausweiskopie hochladen', 'error-file');
  }
  if (file && file.size > 4e6) {
    noError = false;
    printError('Die Datei ist zu groß. Max. 4MB erlaubt.', 'error-file');
  }
  if (!agb) {
    noError = false;
    printError('Bitte akzeptieren Sie unsere Geschäftsbedingungen.', 'error-agb');
  }
  return noError;
}
