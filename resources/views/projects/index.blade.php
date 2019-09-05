@extends('layouts.admin')

@section('content-header')
    <section class="content-header">
        <h1>
            Projects
            <small>list of projects</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="{{ route('projects.index') }}" class="active"><i class="fa fa-cubes"></i> Projects</a></li>
        </ol>
    </section>
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Projects Table</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <a href="{{ route('projects.create') }}" class="btn btn-primary" style="margin-bottom: 10px;">Add Project</a>
                        <table id="projects-table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Title</th>
                                    <!--<th>Author</th>-->
                                    <th>Description</th>
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

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Delete Record</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete <strong id="title"></strong> article?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-defaultt" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="delete-item">Delete Anyway</button>
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
    <script src="{{ asset('js/plugins/projects-table.js') }}" defer></script>
@endpush