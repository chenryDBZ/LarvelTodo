<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Http\Resources\TodoListResource;
use Illuminate\Http\Request;
use App\Models\TodoItem;
use Illuminate\Support\Facades\DB;
use Validator;

class TodoListController extends Controller
{
    public function index()
    {
        return view('welcome', ['todoItems' => TodoItem::all()]);
    }

    public function editView($id)
    {
        return view('editview', ['todoItem' => TodoItem::where('id', $id)->first()]);
    }

    public function todoCompleted()
    {
        return view('welcome', ['todoItems' => TodoItem::where('is_complete', 1)->get()]);
    }

    public function todoPending()
    {
        return view('welcome', ['todoItems' => TodoItem::where('is_complete', 0)->get()]);
    }

    public function saveItem(StoreTodoRequest $request)
    {

        TodoItem::create($request->validated());

        return redirect('/');
    }

    public function deleteItem($id)
    {
        try {
            TodoItem::where('id', $id)->delete();
            return redirect('/');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function editItem(UpdateTodoRequest $request)
    {
        $request->is_complete = $request->has('is_complete');

        $item = TodoItem::find($request->id);
        $item->update($request->validated());

        return redirect('/');
    }

    public function setComplete($id)
    {
        $todoItem = TodoItem::find($id);
        $todoItem->is_complete = 1;
        $todoItem->save();
        return redirect('/');
    }

    public function getAll() {
        $todo_all = TodoItem::all();

        return TodoListResource::collection($todo_all);
    }
}
