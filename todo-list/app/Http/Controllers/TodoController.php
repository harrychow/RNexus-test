<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
    public function edit($id) {
        $todo = Todo::find($id);
        if ($todo) {
            $formatted_todo = compact('todo');
            return view("edit")->with($formatted_todo);
        }

        return redirect(route("todo.home"));
    }

    /**
     * Save todo item from edit view
     *
     * @param Request $request
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveExisting(Request $request) {
        $request->validate(
            [
                'id' => ['required', 'integer'],
                'description'=>['required', 'max:255'],
                'completed' => Rule::in([1,0]),
            ]
        );

        $todo = Todo::find($request['id']);
        if ($todo) {
            $todo->description = $request['description'];
            $todo->completed = $request['completed'] ?? 0;
            $todo->save();
        }

        return redirect(route("todo.home"));
    }

    /**
     * Mark todo item as completed
     *
     * @param Request $request
     * @return mixed
     */
    public function complete(Request $request) {
        $request->validate([
            'id' => ['required', 'integer'],
        ]);

        $todo = Todo::find($request['id']);
        if ($todo) {
            $todo->completed = 1;
            $todo->save();
        }

        return redirect(route("todo.home"));
    }

    /**
     * Delete todo item
     *
     * @param $id
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id){
        Todo::find($id)->delete();

        return redirect(route("todo.home"));
    }

}
