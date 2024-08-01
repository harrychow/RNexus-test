@extends('layouts.app')
@section('title')
    Edit
@endsection
@section('content')

    <h4>Edit</h4>
    <form action="{{route("todo.saveExisting")}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label for="description">Description
                <input type="text" class="form-control" name="description" value="{{$todo->description}}">
            </label>
            <div class="text-danger">
                @error('description')
                {{$message}}
                @enderror
            </div>

        </div>
        <div class="form-group m-4">
            <label for="completed">Completed
                <input type="checkbox" class="form-check-input" value="1" name="completed" @if($todo->completed === 1) checked @endif>
            </label>
        </div>
        <input type="hidden" name="id" value="{{$todo->id}}">
        <div class="form-group m-4">
            <input type="submit" class="btn btn-primary" value="Save">
        </div>
    </form>

@endsection
