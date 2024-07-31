<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TodoController extends Controller
{

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function list(): \Illuminate\Database\Eloquent\Collection
    {
        return Todo::all();
    }

    /**
     * @param Request $request
     * @return Todo
     */
    public function create(Request $request){
        $request->validate(
            [
                'description'=>'required',
            ]
        );

        $todo = new Todo();
        $todo->description = $request['description'];
        $todo->save();
        return $todo;
    }

    /**
     * Save todo item from edit view
     *
     * @param Request $request
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function edit(Request $request){
        $request->validate(
            [
                'id' => ['required', 'integer'],
                'description'=>['required', 'max:255'],
                'completed' => Rule::in([1,0]),
            ]
        );

        $id = $request['id'];
        $todo = Todo::find($id);
        $todo->description = $request['description'];
        $todo->completed = $request['completed'] ?? 0;
        $todo->save();
        return $todo;

    }

    /**
     * Mark todo item as completed
     *
     * @param Request $request
     * @return mixed
     */
    public function complete(Request $request) {
        $id = $request['id'];

        $todo = Todo::find($id);
        $todo->completed = 1;
        $todo->save();
        return $todo;
    }

    /**
     * Delete todo item
     *
     * @param $id
     * @return true
     */
    public function delete($id){
        return Todo::find($id)->delete();
    }

}
