<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoItem;
use Illuminate\Support\Facades\DB;

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

    public function saveItem(Request $request)
    {
        $newTodo = new TodoItem();
        $newTodo->name = $request->todoItem;
        $newTodo->is_complete = 0;
        $newTodo->save();
        return redirect('/');
    }

    public function deleteItem($id)
    {
        try {
            TodoItem::where('id', $id)->delete();
            return redirect('/');
        } catch (\Exception $e) {
            return $e;
        }

    }

    public function editItem(Request $request)
    {
        DB::table('todo_items')
            ->where('id', $request->id)
            ->update(['name' => $request->name]);
        return redirect('/');
    }

    public function setComplete($id)
    {
        $todoItem = TodoItem::find($id);
        $todoItem->is_complete = 1;
        $todoItem->save();
        return redirect('/');
    }
}
