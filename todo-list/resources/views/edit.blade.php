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
        </div>
        <input type="hidden" name="id" value="{{$todo->id}}">
        <div class="form-group m-3">
            <input type="submit" class="btn btn-primary float-end" value="Submit">
        </div>
    </form>

@endsection
