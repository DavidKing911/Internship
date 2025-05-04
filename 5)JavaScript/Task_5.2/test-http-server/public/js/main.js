$('form').submit(function(event) {
	event.preventDefault();
    
	fetch('/form/', {
		method: 'POST',
		body: new FormData(this) // передаем ссылку на форму
	}).then(response => {
        return response.text();
    }).then(data => {
        addTable(data);
    });

	$('#name').val('');
    $('#comment').val('');
});

$('.comments').click(event => {
    event.preventDefault();

    fetch('/users/').then(response => {
        return response.text();
    }).then(data => {
        addTable(data);
    });
});

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

    $('.change').click(event => {
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
    });

    $('.delete').click(event => {
        console.log(event.target.parentNode.parentNode.firstChild.textContent);
        event.preventDefault();
    })

    $('.users').append(
        '<a class="hide" href="/">Скрыть комментарии</a>'
    );

    $('.hide').click(event => {
        $('.tbody').html('');
        $('.thead').html('');
        $('.hide').remove();
        event.preventDefault();
    });

    $('table').css({'border-collapse': 'collapse'});
    $('td, th').css({'text-align': 'center', 'border': '2px solid black'});
}