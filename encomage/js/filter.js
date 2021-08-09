'use strict';

button_filter.onclick = function () {
    let filterButtons = ['filter_id', 'filter_first_name', 'filter_last_name', 'filter_email']

    for (let i = 0; i < filterButtons.length; i++) {
        filterCol(filterButtons[i], i);
    }

    filterFromTo('filter_create_date_from', 'filter_create_date_to', 4);
    filterFromTo('filter_modifed_date_from', 'filter_modifed_date_to', 5);
}

//Фильтрует талицу по заданому текстовому фильтру
//filterColName - id текстового поля по которому произведеться фильтрация
//num - номер(по порядку) столбца в таблице(с нуля)

function filterCol(filterColName, num) {
    let table = document.getElementById('table');
    let tableItemArr = Object.values(table.children);
    let filterStr = document.getElementById(filterColName);
    let res = tableItemArr.filter(item => item.children[num].innerText.includes(filterStr.value));

    for (let i = 0; i < tableItemArr.length; i++) {
        tableItemArr[i].remove();
    }

    for (let i = 0; i < res.length; i++) {
        table.appendChild(res[i]);
    }
}

//Фильтрует таблицу по дате от ДАТА1 до ДАТА2
//inputFrom, inputTo - id форм с датами
//num - номер(по порядку) столбца в таблице(с нуля)

function filterFromTo(inputFrom, inputTo, num) {
    let table = document.getElementById('table');
    let tableItemArr = Object.values(table.children);
    let filterFrom = document.getElementById(inputFrom);
    let filterTo = document.getElementById(inputTo);

    if (new Date(filterFrom.value) == 'Invalid Date') {
        return;
    }

    let res = tableItemArr.filter(item =>
        new Date(item.children[num].innerText) >= new Date(filterFrom.value)
    );

    if (new Date(filterTo.value) != 'Invalid Date') {
        res = res.filter(item =>
            new Date(item.children[num].innerText) <= new Date(filterTo.value)
        );
    }

    for (let i = 0; i < tableItemArr.length; i++) {
        tableItemArr[i].remove();
    }

    for (let i = 0; i < res.length; i++) {
        table.appendChild(res[i]);
    }
}