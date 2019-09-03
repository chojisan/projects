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
                        <table class="table table-bordered">
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

                            @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->email_verified_at ? $user->email_verified_at->diffForHumans(): '-' }}</td>
                                    <td><a href="{{ route('users.show', $user->id) }}" class="label label-info"><i class="fa fa-eye"></i></a></td>
                                    <td><a href="{{ route('users.edit', $user->id) }}" class="label label-warning"><i class="fa fa-edit"></i></a></td>
                                    <td>
                                        <a href="#" class="label label-danger" onclick="event.preventDefault();
                                        document.getElementById('delete-user-form-{{ $user->id }}').submit();">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <form id="delete-user-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none;">
                                            @csrf
                                             @method('DELETE')
                                        </form>
                                    </td>
                                </tr>

                                @empty
                                    <tr>
                                        <td colspan="8">No current users</td>
                                    </tr>
                            @endforelse
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        {{ $users->links() }}
                        <!--
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <li><a href="#">&laquo;</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">&raquo;</a></li>
                        </ul>
                    -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection