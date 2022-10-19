<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;

class TodoController extends Controller
{

    public function index()
    {
        // $branch = new Branches;
        $TodoItem = Todo::all();
        return view('ListTodo', ['TodoItem' => $TodoItem]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $TodoItem = Todo::all();
        // print_r($TodoItem);
        return view('AddTodo');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        // print_r($request);
        
        $data = $request->validated();
        Todo::create($data);
        return redirect()->back()->with('message', 'Task Added Successfully');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Todo::find($id);
        return view('EditTodo', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // print_r($id);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'completed' => 'required',

        ]);
        $data = Todo::find($id);
        $data->title =  $request->get('title');
        $data->description =  $request->get('description');
        $data->completed =  $request->get('completed');

        $data->save();
        // dump($data);
        // return response()->json($data);
        return redirect()->route('todo.index')->with('success', 'Task updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Todo::find($id);
        $id->delete(); // Easy right?
        return redirect()->route('todo.index')->with('success', 'Task removed.');
        
    }
}
