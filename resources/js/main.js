$(document).ready(function () {
    //add user function
    $('#addUser').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: 'addUser/add',
            method: 'post',
            data: $(this).serialize(),
            success: function (data) {
                alert('пользователь ' + data.userName + ' успешно создан');
            },
            error: function (data) {
                var errors = data.responseJSON.errors;
                var error;
                for (error in errors) {
                    alert(errors[error]);
                }
            }
        })
    });

    //filling out the ban form
    $('.banBtn').on('click', function () {
        var id = $(this).parent().parent().find('.user-id').html();
        $('#banForm').find('input[name=id]').attr('value', id);
    });

    //ban user function
    $('#banForm form').on('submit', function (e) {
        e.preventDefault();
        console.log($(this).serialize());
        $.ajax({
            url: 'ban/user',
            method: 'post',
            data: $(this).serialize(),
            success: function (data) {
                var button = $('td[class=user-id][data-id=' + data.userId +']').parent().find('td a.banBtn');
                button.removeClass(['banBtn','btn-danger']);
                button.addClass(['unbanBtn','btn-success']);
                $.fancybox.close('#banForm');
            },
            error: function (data) {
                var errors = data.responseJSON.errors;
                var error;
                for (error in errors) {
                    alert(errors[error]);
                }
            }
        })
    });

    $.fancybox.defaults.hash = false;

    $('#date').datepicker();
});
