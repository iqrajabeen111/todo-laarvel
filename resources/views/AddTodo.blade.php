@extends('layout.master')

@section('content')

<div class="container mt-4">

    <div class="row col-lg-12">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add Task</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('todo.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if (session('message'))
    <h5 class="alert alert-success">{{ session('message') }}</h5>
    @endif
  

    <form action="{{ route('todo.store') }}" method="POST">

        @csrf
        <div class="row col-lg-12">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Title">
                    @if ($errors->has('title'))
                        <strong style="color:red;">{{ $errors->first('title') }}.</strong>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <input type="text" name="description" class="form-control" placeholder="Description">
                    @if ($errors->has('description'))
                        <strong style="color:red;">{{ $errors->first('description') }}.</strong>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Completed:</strong>
                    <input type="text" name="completed" class="form-control" placeholder="Completed">
                    @if ($errors->has('completed'))
                        <strong style="color:red;">{{ $errors->first('completed') }}.</strong>
                    @endif
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>

    </form>
</div>
@endsection