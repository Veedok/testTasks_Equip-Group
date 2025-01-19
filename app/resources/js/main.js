let list = document.getElementsByTagName('button');

function showThis(target) {
    let id = target.getAttribute('id')
    let atr = document.getElementById('data')
    fetch('/get', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            groupID: id,
            newGroup: true,
            perPage: atr.getAttribute('data-prtPage')
        })
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Сеть ответила с ошибкой ' + response.status);
            }
            return response.json();
        })
        .then(data => {
            let items = JSON.parse(data)
            changeTable(items);
            let container = document.getElementById('data')
            container.removeAttribute("sort")
            container.removeAttribute("sort-row")
            container.setAttribute('data-id', id)
        })
        .catch(error => {
            console.error('Ошибка:', error);
        });
}

function changeTable(items) {
    let myBody = document.getElementById('tBody')
    myBody.replaceChildren();
    // let paginator = document.getElementById('paginator')
    // paginator.replaceChildren();
    // paginator.appendChild(items['paginator'])
    let rows = items['row']
    for (let i = 0; i < rows.length; i++) {
        let tr = document.createElement('tr');
        let th = document.createElement('th');
        th.classList.add('num');
        let text = document.createTextNode(i + 1)
        th.appendChild(text);
        tr.appendChild(th)
        let td = document.createElement('td');
        td.classList.add('text')
        text = document.createTextNode(rows[i]['name'])
        td.appendChild(text)
        tr.appendChild(td)
        let td2 = document.createElement('td');
        td2.classList.add('price')
        text = document.createTextNode(rows[i]['price'])
        td2.appendChild(text)
        tr.appendChild(td2)
        myBody.appendChild(tr)
    }
}

function sort(item) {
    let atr = document.getElementById('data')
    let content = {
        groupID: atr.getAttribute('data-id'),
        sortRow: item.getAttribute('data-sort-row'),
        sort: atr.getAttribute('data-sort'),
        page: atr.getAttribute('data-page'),
        perPage: atr.getAttribute('data-prtPage')
    }
    fetch('/get', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(
            content
        )
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Сеть ответила с ошибкой ' + response.status);
            }
            return response.json();
        })
        .then(data => {
            let cont = document.getElementById('data')
            let sort = cont.getAttribute('data-sort')
            let items = JSON.parse(data)
            changeTable(items);
            atr.setAttribute('data-sort-row', item.getAttribute('data-sort-row'))
            if (sort == null || sort == 'asc') {
                cont.setAttribute('data-sort', 'desc')
            } else {
                cont.setAttribute('data-sort', 'asc')
            }
        })
        .catch(error => {
            console.error('Ошибка:', error);
        });
}

window.onload = function () {
    var button = document.getElementsByTagName('a');


    for (let i = 0; i < button.length; i++) {
        button[i].addEventListener('click', function () {
            event.preventDefault()
            let href = this.getAttribute('href').match(/\d*$/g)[0]
            let c = 1;
        })
    }
}
