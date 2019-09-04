@extends('layouts.admin')

@section('content-header')
    <section class="content-header">
        <h1>
            User Accounts
            <small>list of users</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="{{ route('users.index') }}" class="active"><i class="fa fa-users"></i> User Accounts</a></li>
        </ol>
    </section>
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">User Accounts Table</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <a href="{{ route('users.create') }}" class="btn btn-primary" style="margin-bottom: 10px;">Add New User</a>
                        <table id="users-table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Email Verified At</th>
                                    <th style="width: 40px"></th>
                                    <th style="width: 40px"></th>
                                    <th style="width: 40px"></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">

                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>

        {!! Form::open(['url' => route('users.destroy'), ]) !!}

        {!! Form::close() !!}
    </section>
@endsection

@push('plugin-scripts')
    <!--<script src="{{-- asset('js/plugins/users-table.js') --}}"></script>-->
    <script>
        $(function() {
            'use strict'
        
            $(function() {
                $('#users-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('datatables.users') }}",
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
            });
        
        });
    </script>
@endpush