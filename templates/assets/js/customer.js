$(document).ready(function () {

    getCustomers(); // customer/index page show all customer list

    // Add Button click event showing modal and create action trigger
    $('#add_customer').click(function () {
        $('#customerModal').modal('show');
        $('#customerModal').find('.modal-title').text('Add New Customer');
        $('#customerAddForm').attr('action', base_url + 'customer/createJson');
    });

    // create event start respons json with ajax

    $('#customer_save').click(function () {
        var url = $('#customerAddForm').attr('action');
        var data = $('#customerAddForm').serialize();

        // validate form

        var name = $('input[name=name]');
        var lastname = $('input[name=lastname]');
        var email = $('input[name=email]');

        var result = '';

        if (name.val() == '' && name.length > 1 && name.length < 256) {
            (name.parent().parent().addClass('has-error'));
        } else {
            name.parent().parent().removeClass('has-error');
            result += '1';
        }

        if (lastname.val() == '' && lastname.length > 3 && lastname.length < 256) {
            (password.parent().parent().addClass('has-error'));
        } else {
            lastname.parent().parent().removeClass('has-error');
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
                        $('#customerModal').modal('hide');
                        $('#customerAddForm')[0].reset();
                        if (response.type == 'create') {
                            var type = 'created';
                        } else {
                            var type = 'updated';
                        }
                        $('.alert-success').html('Customer ' + type + ' successfully').fadeIn().delay(4000).fadeOut('slow');
                        getCustomers();
                    } else {
                        alert('Error!');
                    }
                },
                error: function () {
                    alert('Could not add customer!');
                }
            });
        }

    });

    // create user event end

    // update user event start

    $('#show_customers').on('click', '#edit_customer', function () {

        var id = $(this).data('id');

        $('#customerModal').modal('show');
        $('#customerModal').find('.modal-title').text('Update Customer');
        $('#customerAddForm').attr('action', base_url + 'customer/updateJson/' + id);

        $.ajax({
            type: 'ajax',
            method: 'post',
            url: base_url + 'customer/viewJson/' + id,
            data: {id: id},
            async: false,
            dataType: 'json',

            success: function (data) {

                $('input[name=name]').val(data.name);
                $('input[name=lastname]').val(data.lastname);
                $('input[name=email]').val(data.email);

            },

            error: function () {
                alert('Could not update customer');
            }
        });

    });

    // update user event end



    function getCustomers() {
        $.ajax({
            type: 'ajax',
            url: base_url + 'customer/indexJson',
            async: false,
            dataType: 'json',
            success: function (data) {
                var html = '';
                for (var i = 0; i < data.length; i++) {
                    html += '<tr>' +
                                '<td>' + data[i].id + '</td>' +
                                '<td>' + data[i].name + '</td>' +
                                '<td>' + data[i].lastname + '</td>' +
                                '<td>' + data[i].email + '</td>' +
                                '<td>'
                                + '<a id="edit_customer" href="javascript:;" class="btn btn-info" data-id="' + data[i].id + '">Edit</a> '
                                + '<a id="delete_customer" href="javascript:;" class="btn btn-danger">Del</a>' +
                                '</td>' +
                            '</tr>';
                }
                $('#show_customers').html(html);
            },
            error: function () {
                alert('Could not get any user');
            }
        });
    }

});