const searchInput = document.querySelector('.search-input');
const usersBtn = document.querySelector('.users__btn');
const table = document.querySelector('.users__table');
const tbody = table.querySelector('tbody');
let checkList;
if (tbody.children.length !== 0) {
    checkList = tbody.querySelectorAll('.check__input');
}

// Сортировка 

const selectionSort = (colNum, type) => {
    let rows = Array.from(tbody.rows);
    let compare;

    switch (type) {
        case 'number':
            compare = (rowA, rowB) => {
                return rowA.cells[colNum].innerHTML - rowB.cells[colNum].innerHTML;            
            };
            break;
        case 'string':
            compare = (rowA, rowB) => {
                return rowA.cells[colNum].innerHTML > rowB.cells[colNum].innerHTML ? 1 : -1;
            };
            break;
    }
    rows.sort(compare);


    tbody.append(...rows);
}

const sortTable = (event) => {
    let target = event.target;
    if (target.tagName != 'TH') return;
    selectionSort(target.cellIndex, target.dataset.type);
}

// Переключатель всех чекбоксов и кнопки "Удалить"

const toggleButton = () => {
    for (const checkEl of checkList) {
        if (checkEl.checked) {
            usersBtn.disabled = false;
            break;
        }else {
            usersBtn.disabled = true;
        }
    }
};

const chooseAll = (event) => {
    let target = event.target;
    if (!target.classList.contains('check__input')) return;

    if (target.closest('th')) {
        if (target.checked) {
            checkList.forEach( (el) => {
                el.checked = true;
            });
        }else {
            checkList.forEach( (el) => {
                el.checked = false;
            });
        }
    }
    toggleButton();
}

// Поиск

const search = () => {
    let value = searchInput.value.trim();
    let tbody = table.querySelector('tbody');
    let trList = tbody.querySelectorAll('tr');
    let count = 0;
    if (value != '') {
        trList.forEach( (tr) => {
            td = tr.querySelectorAll('td');
            td.forEach( (td) => {
                if (!td.textContent.includes(value)) {
                    count++;
                }
            });

            if (count === td.length) {
                tr.hidden = true;
                count = 0;
            }else {
                count = 0;
                tr.hidden = false;
            }
        });
    }else {
        trList.forEach( (tr) => {
            tr.hidden = false;
        });
    }
};

// Слушатели событий

table.addEventListener('click', sortTable);
table.addEventListener('click', chooseAll);
searchInput.addEventListener('input', search);
