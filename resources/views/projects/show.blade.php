@extends('layouts.admin')

@section('content-header')
    <section class="content-header">
        <h1>
            Projects
            <small>projects</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="{{ route('projects.index') }}" class="active"><i class="fa fa-cubes"></i> Projects</a></li>
            <li><a href="{{ route('projects.show', $project->id) }}" class="active"><i class="fa fa-eye"></i> Create New Project</a></li>
        </ol>
    </section>
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Project Details</h3>
                    </div>
                     <!-- /.box-header -->

                    <div class="box-body form-horizontal">
                        <div class="form-group has-feedback">
                            <label for="title" class="col-sm-2 control-label">Project Title</label>
                            <div class="col-sm-10">
                                <div class="form-control">
                                    {{ $project->title }}
                                </div>
                                <span class="glyphicon glyphicon-file form-control-feedback"></span>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label for="description" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10">
                                <div class="form-control" style="height: auto;">
                                    {{ $project->description }}
                                </div>
                                <span class="glyphicon glyphicon-font form-control-feedback"></span>
                            </div>
                        </div>
    
                        <div class="box-footer">
                                <a href="{{ route('projects.index') }}" class="btn btn-danger">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection