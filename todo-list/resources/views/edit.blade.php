@extends('layouts.app')
@section('title')
    Edit
@endsection
@section('content')

    <form action="{{route("todo.saveExisting")}}" method="POST">
        @csrf
        <div class="form-group m-3">
            <label for="description">Description
                <input type="text" class="form-control" name="description" value="{{$todo->description}}">
            </label>
            <div class="text-danger">
                @error('description')
                {{$message}}
                @enderror
            </div>

            <label for="completed">Completed
                <input type="checkbox" class="form-check-input" value="1" name="completed" @if($todo->completed === 1) checked @endif>
            </label>
        </div>
        <input type="hidden" name="id" value="{{$todo->id}}">
        <div class="form-group m-3">
            <input type="submit" class="btn btn-primary" value="Save">
            <span>
                <a onclick="return confirm('Are you sure?')" href="{{route("todo.delete",$todo->id)}}" class="btn btn-danger btn-sm">Delete</a>
            </span>
        </div>
    </form>

@endsection
