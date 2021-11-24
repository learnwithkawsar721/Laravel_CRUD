<?php

namespace App\Http\Controllers;

use App\Models\Todo_List;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home',[
            'todolists'=>Todo_List::latest()->get()
        ]);
    }

    /**
     * todolist create
     */
    public function create(){
        return view('Admin.TodoList.create');
    }

    /**
     * Todo-List Add
     */
    public function add(Request $request){
        $request->validate([
            'name'=>'required',
            'discription'=>'required',
        ]);
        $data = new Todo_List();
        $data['user_id']= Auth::id();
        $data['name']= $request->name;
        $data['discription'] = $request->discription;
        $data['created_at'] =Carbon::now();
        $data->save();;
        return redirect(route('home'));

    }

    /**
     * Todo-List Edit $id 
     */
    public function edit($id){
        $todo = Todo_List::where('id',$id)->first();
        return view('Admin.TodoList.edit',['todo'=>$todo]);
    }
    /**
     * Todo-List Update $id
     */
    public function update(Request $request,$id){
        $request->validate([
            'name'=>'required',
            'discription'=>'required',
        ]);
        $todo = Todo_List::where('id',$id)->first();
        $todo->update($request->except('_token','_method'));
        return redirect()->route('home');
    }
    /**
     * 
     * Todo-List Delete 
     */
    public function delete($id){
       Todo_List::where('id',$id)->delete();
       return redirect(route('home'));
    }
}
