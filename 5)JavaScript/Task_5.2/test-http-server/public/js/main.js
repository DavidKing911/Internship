// Обработчик события ввода данных в поля формы для создания нового комментария
$('form').on('submit', function(event) {
	event.preventDefault();
    
	let promise = fetch('/form/', {
		method: 'POST',
		body: new FormData(this) // передаем ссылку на форму
	});

    if ($('.tbody').is(':empty')) {
        promise.then(response => {
            return response.text();
        }).then(data => {
            addTable(data);
        })
    }

	$('#name').val('');
    $('#comment').val('');
});

// Обработчик события показа всех данных пользователей
$('.comments').on('click', event => {
    event.preventDefault();

    fetch('/users/').then(response => {
        return response.text();
    }).then(data => {
        addTable(data);
    }); 
});

// Функция для создания таблицы и внесения данных из базы данных
function addTable(data) {
    let tableBody = $('.tbody');
    let tableHead = $('.thead');
    let tableHide = $('.hide');
    tableBody.html('');
    tableHead.html('');
    tableHide.remove();

    tableBody.append(
        '<th>Имя</th>' + 
        '<th>Комментарий</th>' +
        '<th>Изменить</th>' + 
        '<th>Удалить</th>'
    );

    for (let element of JSON.parse(data)) {
        tableBody.append(
            '<tr><td>' + element[0] + '</td>' + 
            '<td>' + element[1] + '</td>' +
            '<td><a class="change" href="/">Изменить</a></td>' + 
            '<td><a class="delete" href="/">Удалить</a></td></tr>'
        );
    }

    $('.users').append(
        '<a class="hide" href="/">Скрыть комментарии</a>'
    );

    $('.change').on('click', event => changeBtn(event));
    $('.delete').on('click', event => deleteBtn(event));
    $('.hide').on('click', event => hideBtn(event));

    $('table').css({'border-collapse': 'collapse'});
    $('td, th').css({'text-align': 'center', 'border': '2px solid black'});
}

// Функция для обработчика события изменения данных пользователя
function changeBtn(event) {
    event.preventDefault();

    let row = event.target.parentNode.parentNode;
    let name = row.children[0].textContent;
    let comment = row.children[1].textContent;
    
    $('#name').val(name);
    $('#comment').val(comment);

    let btn = $('<input class="changeBtn" value="Изменить данные" type="submit">');
    $('form').append(btn);
    $('.send').prop('disabled', true);

    $('.changeBtn').click(event => {
        event.preventDefault();

        let newName =  ($('#name').val()).split(' ').join("+");
        let newComment = $('#comment').val();
        name = encodeURIComponent(name);
        comment = encodeURIComponent(comment);
        newName = encodeURIComponent(newName);
        newComment = encodeURIComponent(newComment);
        fetch('/changeUser/', {
            method: 'POST',
            body: 'name=' + name + '&' + 'comment=' + comment + '&' + 'newName=' + newName + '&' + 'newComment=' + newComment,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8',
            },
        }).then(response => {
            return response.text();
        }).then(data => {
            addTable(data);
        });

        $('#name').val('');
        $('#comment').val('');
        $('.changeBtn').remove();
        $('.send').prop('disabled', false);
    });
}

// Функция для обработчика события удаления пользователя
function deleteBtn(event) {
    event.preventDefault();

    let row = event.target.parentNode.parentNode;
    let name = row.children[0].textContent;
    let comment = row.children[1].textContent;
    name = encodeURIComponent(name);
    comment = encodeURIComponent(comment);
    fetch('/deleteUser/', {
        method: 'POST',
        body: 'name=' + name + '&' + 'comment=' + comment,
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8',
        },
    }).then(response => {
        return response.text();
    }).then(data => {
        addTable(data);
    });
}

// Функция для обработчика события скрытия всех данных пользователей
function hideBtn(event) {
    event.preventDefault();
    $('.tbody').html('');
    $('.thead').html('');
    $('.hide').remove();
}