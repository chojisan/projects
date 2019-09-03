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
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Description</th>
                                <th style="width: 40px"></th>
                                <th style="width: 40px"></th>
                                <th style="width: 40px"></th>
                            </tr>

                            @forelse($projects as $project)
                                <tr>
                                    <td>{{ $project->id }}</td>
                                    <td>{{ $project->title }}</td>
                                    <td>{{ $project->user->name }}</td>
                                    <td>{{ $project->description }}</td>
                                    <td><a href="{{ route('projects.show', $project->id) }}" class="label label-info"><i class="fa fa-eye"></i></a></td>
                                    <td><a href="{{ route('projects.edit', $project->id) }}" class="label label-warning"><i class="fa fa-edit"></i></a></td>
                                    <td>
                                        <a href="#" class="label label-danger" onclick="event.preventDefault();
                                        document.getElementById('delete-project-form-{{ $project->id }}').submit();">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <form id="delete-project-form-{{ $project->id }}" action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display: none;">
                                            @csrf
                                             @method('DELETE')
                                        </form>
                                    </td>
                                </tr>

                                @empty
                                    <tr>
                                        <td colspan="7">No current projects</td>
                                    </tr>
                            @endforelse
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        {{ $projects->links() }}
                        <!--
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <li><a href="#">&laquo;</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">&raquo;</a></li>
                        </ul>-->
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection
