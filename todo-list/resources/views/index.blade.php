@extends('layouts.app')
@section('title')
    Todo List
@endsection
@section('content')

    <form method="POST" action="{{route("todo.saveNew")}}" class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
        @csrf
        <div class="col-12">
            <div data-mdb-input-init class="form-outline">
                <input placeholder="Add new todo" type="text" id="description" name="description" class="form-control" />
            </div>

            <div class="text-danger">
                @error('description')
                {{$message}}
                @enderror
            </div>
        </div>

        <div class="col-12">
            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary">Add</button>
        </div>
    </form>

    <table class="table mb-4">
        <thead>
        <tr>
            <th scope="col">Description</th>
            <th scope="col" style="width:20%">Date Added</th>
            <th scope="col" style="width:35%">Edit</th>
        </tr>
        </thead>
        <tbody>
        @foreach($todos as $todo)
            <tr>
                <td>
                    @if ($todo->completed !== 0)
                        <s>{{$todo->description}}</s>
                    @else
                        {{$todo->description}}
                    @endif</td>
                <td>{{$todo->created_at}}</td>
                <td>
                    <div class="d-flex justify-content-start">
                        <form action="{{route("todo.complete", $todo->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-success btn-sm pl-1" type="submit">
                                <i class="bi bi-check-circle"></i> Mark Complete
                            </button>
                        </form>
                        &nbsp;

                        <a class="btn btn-primary btn-sm pl-1" href="{{route("todo.edit", $todo->id)}}">
                            <i class="bi bi-pencil fa-4x"></i>
                            Edit
                        </a>
                        &nbsp;

                        <form action="{{route("todo.delete",$todo->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm pl-1">
                                <i class="bi bi-trash"></i> Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

