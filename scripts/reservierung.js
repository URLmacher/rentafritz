document.addEventListener('DOMContentLoaded', function() {
    const dropdownSelectsDom = document.querySelectorAll('select');
    const dropdownSelects = M.FormSelect.init(dropdownSelectsDom, {});

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
    });
});
