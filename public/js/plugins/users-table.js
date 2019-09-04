$(function() {
    'use strict'

    var userUrl = '/datatables/users';

    var usersTable = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: userUrl,
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'username', name: 'username' },
            { data: 'email', name: 'email' },
            { data: 'email_verified_at', name: 'email_verified_at' },
            { data: 'show', name: 'show', orderable: false, searchable: false, sType: 'html' },
            { data: 'edit', name: 'edit', orderable: false, searchable: false },
            { data: 'delete', name: 'delete', orderable: false, searchable: false },
        ]
    });

    var id = '';
    var name = '';
    var href = '';
    // delete user
    $('#users-table').on('click', ' a.delete-user-btn', function(e) {
        e.preventDefault();

        id = $(this).data('id');
        name = $(this).data('name');
        href = $(this).data('href');

    });

    $('#modal-default')
        .on('show.bs.modal', function(e) {
            $(this).find('p strong#user-name').text(name);
        })
        .on('click', 'button#delete-user', function(e) {
            e.preventDefault();
            deleteUser(href);
            //deleteUserForm(href)
        });

    function deleteUser(href) {
        var form = $('#delete-user-form');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: href,
            data: form.serialize()
        }).done(function() {
            usersTable.ajax.reload();
            $('#modal-default').modal('hide');
        });
    }

    function deleteUserForm(href) {
        var form = $('#delete-user-form');

        form.attr('action', href);
        form.submit();
        usersTable.ajax.reload();
        $('#modal-default').modal('hide');
    }
});