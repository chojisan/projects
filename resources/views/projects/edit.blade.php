@extends('layouts.admin')

@section('content-header')
    <section class="content-header">
        <h1>
            Projects
            <small>update project</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="{{ route('projects.index') }}" class="active"><i class="fa fa-cubes"></i> Projects</a></li>
            <li><a href="{{ route('projects.create') }}" class="active"><i class="fa fa-edit"></i> Update Project</a></li>
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
                        <h3 class="box-title">Update Project Form</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{ route('projects.update', $project->id) }}" method="post" role="form"  class="form-horizontal">
                        <div class="box-body">
                            @csrf
                            @method('PATCH')
        
                            <div class="form-group has-feedback @error('title') has-error @enderror">
                                <label for="title" class="col-sm-2 control-label">Project Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?: $project->title }}" required autocomplete="name" autofocus placeholder="Project Title">
                                    <span class="glyphicon glyphicon-file form-control-feedback"></span>
                                    @error('title')
                                        <span class="help-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group has-feedback @error('description') has-error @enderror">
                                <label for="description" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="description" id="description" rows="10" autofocus placeholder="Description">{{ old('title') ?: $project->description }}</textarea>
                                    <span class="glyphicon glyphicon-font form-control-feedback"></span>
                                    @error('description')
                                        <span class="help-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
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