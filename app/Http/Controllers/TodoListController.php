<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoItem;

class TodoListController extends Controller
{
    public function index(){
        return view('welcome', ['todoItems' => TodoItem::all()]);
    }

    public function editView($id){
        return view('editview', ['todoItem' => TodoItem::where('id', $id)->get()]);
    }

    public function todoCompleted(){
        return view('welcome', ['todoItems' => TodoItem::where('is_complete', 1)->get()]);
    }

    public function todoPending(){
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
        } catch (\Exception $e){
            return $e;
        }

    }

    public function editItem(Request $request)
    {
        $todoItem = TodoItem::find($request->id);
        $todoItem->name = $request->todoItem;
        $todoItem->is_complete = $request->is_complete;
        $todoItem->save();
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
