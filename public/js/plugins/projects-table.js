$(function() {
    'use strict'

    var baseUrl = '/projects';

    var usersTable = $('#projects-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: baseUrl,
        columns: [
            { data: 'id', name: 'id' },
            { data: 'title', name: 'title' },
            //{ data: 'author', name: 'author' },
            { data: 'description', name: 'description' },
            { data: 'show', name: 'show', orderable: false, searchable: false, sType: 'html' },
            { data: 'edit', name: 'edit', orderable: false, searchable: false },
            { data: 'delete', name: 'delete', orderable: false, searchable: false },
        ]
    });

    var id = '';
    var title = '';
    var href = '';

    // delete user
    $('#projects-table').on('click', ' a.delete-btn', function(e) {
        e.preventDefault();

        id = $(this).data('id');
        title = $(this).data('title');
        href = $(this).data('href');

    });

    $('#modalDefault')
        .on('show.bs.modal', function(e) {
            $(this).find('p strong#title').text(title);
        })
        .on('click', 'button#delete-item', function(e) {
            e.preventDefault();
            deleteUser(href);
            //deleteUserForm(href)
        });

    function deleteUser(href) {
        var form = $('#delete-form');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: href,
            data: form.serialize()
        }).done(function(data) {

            flashMessage(data);
            //usersTable.ajax.reload();
            usersTable.draw();
            $('#modalDefault').modal('hide');
        });
    }

    function deleteUserForm(href) {
        var form = $('#delete-form');

        form.attr('action', href);
        form.submit();
        //usersTable.ajax.reload();
        usersTable.draw();
        $('#modalDefault').modal('hide');
    }
});