<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

class TodoController extends Controller
{
    public function index()
    {
        $userId = Session::get('user')['id'];
        $item = Todo::where('user_id',$userId)
        ->where('status','Pending')
        ->get();
        return view('todo.index',['item'=>$item]);
    }

    public function createtodo()
    {
        return view('todo.create');
    }

    public function savetodo(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'status'=>'required',
        ]);

        $todo = new Todo;
        $todo->user_id=$request->session()->get('user')['id'];
        $todo->title=$request->title;
        $todo->status=$request->status;
        $todo->save();
        return redirect('/createtodo');
    }

    public function edittodo($id)
    {
        $item = Todo::find($id);
        return view('todo.edit',['item'=>$item]);
    }

    public function updatetodo(Request $request , $id)
    {
        $request->validate([
            'title'=>'required',
            'status'=>'required',
        ]);

        $todo = Todo::find($id);
        $todo->update(['title'=>$request->title,'status'=>$request->status]);

        return redirect('/');
    }

    public function deletetodo($id)
    {
        $user = Todo::where('id', $id)->first()->delete();
        return redirect('/');
    }
}
