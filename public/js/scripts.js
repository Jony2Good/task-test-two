$(document).ready(function () {
    $(".js-btn").click(function () {
        $.ajax({
            url: 'http://localhost/task_two/public/read',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                const table = $('<table class="table"></table>');
                const thead = $('<thead></thead>');
                const headerRow = $('<tr></tr>');
                headerRow.append('<th scope="col">Номер</th>');
                headerRow.append('<th scope="col">Заголовок статьи</th>');
                headerRow.append('<th scope="col">Ссылка на статью</th>');
                headerRow.append('<th scope="col">Дата</th>');
                thead.append(headerRow);
                table.append(thead);
                const tbody = $('<tbody class="js-table"></tbody>');
                table.append(tbody);
                $('.js-table-wrapper').append(table);
                $.each(data, function (item, value) {
                    tbody.append(`<tr><th scope="row">${value.id}</th><td class="text-start">${value.title}</td><td>${value.url}</td><td>${value.date}</td></tr>`);
                    console.log(value.id)
                })
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('.error').append('Ошибка в отображении данных');
                console.log(textStatus, errorThrown);
            }
        });
    });
});
