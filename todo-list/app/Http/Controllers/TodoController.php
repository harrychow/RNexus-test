<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    /**
     * List all todo items
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index() {
        $todos = Todo::all();
        $formatted_todos = compact('todos');

        return view('index')->with($formatted_todos);
    }

    /**
     * Form to create new todo item
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create(){
        return view('todos.create');
    }

    /**
     * Save a new todo item
     *
     * @param Request $request
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveNew(Request $request){
        $request->validate(
            [
                'description'=>'required',
            ]
        );
        $todo = new Todo();
        $todo->description = $request['description'];
        $todo->save();
        return redirect(route("todo.home"));
    }

    /**
     * Edit todo item view
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit($id){
        $todo = Todo::find($id);
        $formatted_todo = compact('todo');

        return view("edit")->with($formatted_todo);
    }

    /**
     * Save todo item from edit view
     *
     * @param Request $request
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveExisting(Request $request){
        $request->validate(
            [
                'description'=>'required'
            ]
        );
        $id = $request['id'];

        $todo = Todo::find($id);
        $todo->description = $request['description'];
        $todo->save();

        return redirect(route("todo.home"));
    }

}
