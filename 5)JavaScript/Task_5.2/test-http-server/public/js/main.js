let id;

// Функция для создания таблицы и внесения данных из базы данных
function addTable(users) {
    const tableBody = $('.tbody');
    const tableHead = $('.thead');
    const tableHide = $('.hide');
    tableBody.html('');
    tableHead.html('');
    tableHide.remove();

    tableBody.append(
        '<th>Идентификатор</th>' +
        '<th>Имя</th>' + 
        '<th>Комментарий</th>' +
        '<th>Изменить</th>' + 
        '<th>Удалить</th>'
    );

    for (const user of JSON.parse(users)) {
        tableBody.append(
            '<tr><td>' + user.id + '</td>' +
            '<td>' + user.name + '</td>' + 
            '<td>' + user.comment + '</td>' +
            '<td><a class="change" href="/">Изменить</a></td>' + 
            '<td><a class="delete" href="/">Удалить</a></td></tr>'
        );
    }

    $('.users').append(
        '<a class="hide" href="/">Скрыть комментарии</a>'
    );

    $('table').css({'border-collapse': 'collapse'});
    $('td, th').css({'text-align': 'center', 'border': '2px solid black'});
}

// Функция для обработчика события отправки формы
function sendForm(event) {
    const name = $('#name').val();
    const comment = $('#comment').val();

	const promise = fetch('/form/', {
		method: 'POST',
		body: JSON.stringify({name: name, comment: comment}),
        headers: {
            'Content-Type': 'application/json',
        },
	});

    if ($('.tbody').is(':empty')) {
        promise.then(response => {
            return response.text();
        }).then(users => {
            addTable(users);
        })
    }

	$('#name').val('');
    $('#comment').val('');

    event.preventDefault();
}

// Функция для обработчика события показа всех комментарий
function showComments(event) {
    fetch('/users/comments/').then(response => {
        return response.text();
    }).then(users => {
        addTable(users);
    });

    event.preventDefault();
}

// Функция для обработчика события изменения данных пользователя
function changeComment(event) {
    const row = event.target.parentNode.parentNode;
    const id = row.children[0].textContent;
    const name = row.children[1].textContent;
    const comment = row.children[2].textContent;
    
    $('#name').val(name);
    $('#comment').val(comment);

    const btn = $('<input class="changeBtn" value="Изменить данные" type="submit">');
    $('form').append(btn);
    $('.send').prop('disabled', true);

    event.preventDefault();
    return id;
}

// Функция для обработчика события сохранения изменённых данных пользователя
function saveChangingComment(event, id) {
    const name = $('#name').val();
    const comment = $('#comment').val();
    
    fetch(`/users/user/?userId=${id}`, {
        method: 'PUT',
        body: JSON.stringify({name: name, comment: comment}),
        headers: {
            'Content-Type': 'application/json',
        },
    }).then(response => {
        return response.text();
    }).then(users => {
        addTable(users);
    });

    $('#name').val('');
    $('#comment').val('');
    $('.changeBtn').remove();
    $('.send').prop('disabled', false);

    event.preventDefault();
}

// Функция для обработчика события удаления пользователя
function deleteComment(event) {
    const row = event.target.parentNode.parentNode;
    const id = row.children[0].textContent;

    fetch(`/users/?userId=${id}`, {
        method: 'DELETE',
    }).then(response => {
        return response.text();
    }).then(users => {
        addTable(users);
    });

    event.preventDefault();
}

// Функция для обработчика события скрытия всех данных пользователей
function hideComments(event) {
    $('.tbody').html('');
    $('.thead').html('');
    $('.hide').remove();

    event.preventDefault();
}

// Функция проверки полей формы
function checkInputs() {
    const name = $('#name');
    const comment = $('#comment');
    let isError = false;

    if ($('.error')) {
        $('.error').remove();
    }

    if (name.val() === '') {
        name.after("<p class='error'>Поле для имени не может быть пустым</p>");
        isError = true;
    }
    if (comment.val() === '') {
        comment.after("<p class='error'>Поле для комментария не может быть пустым</p>");
        isError = true;
    }

    $('.error').css({'color': 'red', 'margin': 0});

    return isError;
}

// Обработчик события нажатия на страницу
$(document).on('click', event => {
    if (event.target.value === "Отправить") {
        if (!checkInputs()) {
            sendForm(event);
        }
    } else if (event.target.textContent.trim() === "Посмотреть комментарии") {
        showComments(event);
    } else if (event.target.textContent.trim() === "Изменить") {
        id = changeComment(event);
    } else if (event.target.value === "Изменить данные") {
        saveChangingComment(event, id);
    } else if (event.target.textContent.trim() === "Удалить") {
        deleteComments(event)
    } else if (event.target.textContent.trim() === "Скрыть комментарии") {
        hideComments(event);
    }

    event.preventDefault();
});