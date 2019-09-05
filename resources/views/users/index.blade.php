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

        {!! Form::open(['method' => 'delete', 'id' => 'delete-form']) !!}
        {!! Form::close() !!}

        @component('components.modal')
            @slot('id')
            @endslot

            @slot('title')
                <h4 class="modal-title">Delete Record</h4>
            @endslot

            @slot('body')
                <p>Are you sure you want to delete <strong id="user-name"></strong> record?</p>
            @endslot

            @slot('footer')
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="delete-item">Delete Anyway</button>
            @endslot
        @endcomponent

       

        <div class="modal fade" id="showDetails">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title">User Details</h4>
                        </div>
                        <div class="modal-body form-horizontal">
                                <div class="form-group has-feedback">
                                        <label for="name" class="col-sm-2 control-label">Full Name</label>
                                        <div class="col-sm-10">
                                            <div class="form-control">
                                                
                                            </div>
                                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                        </div>
                                    </div>
            
                                    <div class="form-group has-feedback">
                                        <label for="username" class="col-sm-2 control-label">Username</label>
                                        <div class="col-sm-10">
                                            <div class="form-control">
                                                
                                            </div>
                                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                        </div>
                                    </div>
                
                                    <div class="form-group has-feedback">
                                        <label for="email" class="col-sm-2 control-label">Email Address</label>
                                        <div class="col-sm-10">
                                            <div class="form-control">
                                                
                                            </div>
                                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                        </div>
                                    </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-defaultt" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
    </section>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('js/plugins/users-table.js') }}" defer></script>
@endpush