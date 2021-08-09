'use strict';

let buttons = [
    [button_id, 'id'],
    [button_first_name, 'firstName'],
    [button_last_name, 'lastName'],
    [button_email, 'email'],
    [button_create_date, 'createDate'],
    [button_last_modifed, 'updateDate'],
    
];

for (let i = 0; i < buttons.length; i++) {
    buttons[i][0].onclick = sort(buttons[i][1]);
}

function sort(colName) {
    let dirSort = true;

    return function () {
        if (dirSort) {
            dirSort = false;
        } else {
            dirSort = true;
        }

        sortTable(colName, dirSort);
    }
}

function sortTable(column, reverse = false) {
    let obj = document.getElementsByClassName('th_row');
    let arr = Object.values(obj);

    if (column == 'id') {
        arr.sort(function (a, b) {
            let aN = Number(a.children[0].innerText);
            let bN = Number(b.children[0].innerText);

            if (aN > bN) return 1;
            if (aN == bN) return 0;
            if (aN < bN) return -1;
        });
    } else if (column == 'firstName') {
        arr.sort(function (a, b) {
            let aS = a.children[1].innerText;
            let bS = b.children[1].innerText;

            if (aS > bS) return 1;
            if (aS == bS) return 0;
            if (aS < bS) return -1;
        });
    } else if (column == 'lastName') {
        arr.sort(function (a, b) {
            let aS = a.children[2].innerText;
            let bS = b.children[2].innerText;

            if (aS > bS) return 1;
            if (aS == bS) return 0;
            if (aS < bS) return -1;
        });
    } else if (column == 'email') {
        arr.sort(function (a, b) {
            let aS = a.children[3].innerText;
            let bS = b.children[3].innerText;

            if (aS > bS) return 1;
            if (aS == bS) return 0;
            if (aS < bS) return -1;
        })
    } else if (column == 'createDate') {
        arr.sort(function (a, b) {
            let dateA = new Date(a.children[4].innerText);
            let dateB = new Date(b.children[4].innerText);

            if (dateA > dateB) return 1;
            if (dateA == dateB) return 0;
            if (dateA < dateB) return -1;
        });
    } else if (column == 'updateDate') {
        arr.sort(function (a, b) {
            let dateA = new Date(a.children[5].innerText);
            let dateB = new Date(b.children[5].innerText);

            if (dateA > dateB) return 1;
            if (dateA == dateB) return 0;
            if (dateA < dateB) return -1;
        });
    }

    if (reverse) {
        arr.reverse();
    }

    for (let i = 0; i < arr.length; i++) {
        obj[0].remove();
    }

    let table = document.getElementById('table');

    for (let i = 0; i < arr.length; i++) {
        table.appendChild(arr[i]);
    }
};