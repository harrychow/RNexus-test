@extends('layouts.app')

@section('title')
    Create Todo
@endsection

@section('content')

    <form method="POST" action="{{route("todo.saveNew")}}" class="mt-4 p-4">
        @csrf

        <div class="form-group m-3">
            <label for="description">Description</label>
            <label>
                <input type="text" class="form-control" name="description">
            </label>
        </div>
        <div class="form-group m-3">
            <input type="submit" class="btn btn-primary float-end" value="Submit">
        </div>
    </form>

@endsection
