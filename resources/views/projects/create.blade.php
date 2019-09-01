@extends('layout')

@section('contents')
<h1>Create New Project Project</h1>

<form method="POST" action="/projects">
    @csrf

    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" name="title" id="title" class="form-control" placeholder="" aria-describedby="helpId">
    </div>

    <div class="form-group">
      <label for="">Description</label>
      <textarea class="form-control" name="description" id="description" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Create Project</button>
</form>
@endsection


