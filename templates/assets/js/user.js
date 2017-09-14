$(document).ready(function () {

    getUsers(); // show all user function called

    // user form save button click event show modal

    $('#add_user').click(function () {
        $('#myModal').modal('show');
        $('#myModal').find('.modal-title').text('Add New User');
        $('#userAddForm').attr('action', base_url + 'user/create_json');
    });


    // create user event start

    $('#user_save').click(function () {
        var url = $('#userAddForm').attr('action');
        var data = $('#userAddForm').serialize();

        // validate form

        var username = $('input[name=username]');
        var password = $('input[name=password]');
        var email = $('input[name=email]');

        var result = '';

        if (username.val() == '' && username.length > 3 && username.length < 256) {
            (username.parent().parent().addClass('has-error'));
        } else {
            username.parent().parent().removeClass('has-error');
            result += '1';
        }

        if (password.val() == '' && password.length > 3 && username.length < 256) {
            (password.parent().parent().addClass('has-error'));
        } else {
            password.parent().parent().removeClass('has-error');
            result += '2';
        }

        if (email.val() == '' && email.length < 256) {
            (email.parent().parent().addClass('has-error'));
        } else {
            email.parent().parent().removeClass('has-error');
            result += '3';
        }

        if (result == '123') {
            $.ajax({
                type: 'ajax',
                method: 'post',
                url: url,
                data: data,
                async: false,
                datatype: 'json',
                success: function (response) {
                    response = JSON.parse(response);
                    if (response.success) {
                        $('#myModal').modal('hide');
                        $('#userAddForm')[0].reset();
                        if (response.type == 'create') {
                            var type = 'created';
                        } else {
                            var type = 'updated';
                        }
                        $('.alert-success').html('User ' + type + ' successfully').fadeIn().delay(4000).fadeOut('slow');
                        getUsers();
                    } else {
                        alert('Error!');
                    }
                },
                error: function () {
                    alert('Could not add user!');
                }
            });
        }

    });

    //create user event end

    // update user event start

    $('#show_users').on('click', '.user_edit', function () {

        var id = $(this).data('id');

        $('#myModal').modal('show');
        $('#myModal').find('.modal-title').text('Update User');
        $('#userAddForm').attr('action', base_url + 'user/update_json/' + id);

        $.ajax({
            type: 'ajax',
            method: 'post',
            url: base_url + 'user/view_json/' + id,
            data: {id: id},
            async: false,
            dataType: 'json',

            success: function (data) {

                $('input[name=username]').val(data.username);
                $('input[name=password]').val(data.password);
                $('input[name=email]').val(data.email);

            },

            error: function () {
                alert('Could not update user');
            }
        });
    });

    function getUsers() {
        $.ajax({
            type: 'ajax',
            url: base_url + 'user/index_json',
            async: false,
            dataType: 'json',
            success: function (data) {
                var html = '';
                for (var i = 0; i < data.length; i++) {
                    html += '<tr>' +
                        '<td>' + data[i].id + '</td>' +
                        '<td>' + data[i].username + '</td>' +
                        '<td>' + data[i].password + '</td>' +
                        '<td>' + data[i].email + '</td>' +
                        '<td>'
                        + '<a id="edit_user" href="javascript:;" class="btn btn-info user_edit" data-id="' + data[i].id + '">Edit</a> '
                        + '<a id="delete_user" href="javascript:;" class="btn btn-danger user_delete">Del</a>' +
                        '</td>' +
                        '</tr>';
                }
                $('#show_users').html(html);
            },

            error: function () {
                alert('Could not get any user');
            }
        });
    }

});