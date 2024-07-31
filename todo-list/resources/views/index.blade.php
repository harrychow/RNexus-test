@extends('layouts.app')
@section('title')
    Todo List
@endsection
@section('content')

    <div>
        <a href="{{route("todo.create")}}" class="btn btn-primary btn-lg">New</a>
    </div>
    <div class="row mt-3">
        <div class="col-12 align-self-center">
            <ul class="list-group">
                @foreach($todos as $todo)
                    <li class="list-group-item">
                        <a href="/edit/{{$todo->id}}">
                            @if ($todo->completed !== 0)
                                <s>{{$todo->description}}</s>
                            @else
                                {{$todo->description}}
                            @endif
                        </a>
                    </li>
                @endforeach
                <li class="list-group-item"><a href="/">Buy Groceries</a></li>
            </ul>
        </div>
    </div>

@endsection
