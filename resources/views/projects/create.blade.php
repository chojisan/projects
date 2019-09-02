@extends('layouts.admin')

@section('content-header')
    <section class="content-header">
        <h1>
            Projects
            <small>create new project</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ route('projects.index') }}" class="active"><i class="fa fa-cubes"></i> Projects</a></li>
            <li><a href="{{ route('projects.create') }}" class="active"><i class="fa fa-cube"></i> Create New Project</a></li>
        </ol>
    </section>
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Create New Project Form</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{ route('projects.store') }}" method="post" role="form">
                        <div class="box-body">
                            @csrf
        
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required autocomplete="name" autofocus placeholder="Full name">
                                <span class="glyphicon glyphicon-file form-control-feedback"></span>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group has-feedback">
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="10" autofocus placeholder="Description">{{ old('title') }}</textarea>
                                <span class="glyphicon glyphicon-font form-control-feedback"></span>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="box-footer">
                            <a href="{{ route('projects.index') }}" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        <!-- /.col -->
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection