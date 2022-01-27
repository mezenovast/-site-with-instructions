<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Instruction;
use Illuminate\Http\Request;



class InstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructions = Instruction::orderBy('created_at', 'DESC')->where('status', 1)->get();
        return view('admin.instruction.index', compact('instructions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();
        
        return view('admin.instruction.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $instruction = new Instruction();
        $instruction->title = $request->title;
        $instruction->model = $request->model;
        
        $file = $request->file('file');
        $filename = time().'.'.$file->getClientOriginalName();
        $request->file->move('file/', $filename);
        $instruction->file = $filename;
        
        $instruction->cat_id = $request->cat_id;
        $instruction->status = 1;
        $instruction->save();

        return redirect()->back()->withSuccess('Инструкция была успешно добавлена');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instruction  $instruction
     * @return \Illuminate\Http\Response
     */
    public function show()

    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instruction  $instruction
     * @return \Illuminate\Http\Response
     */
    public function edit(Instruction $instruction)
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();

        return view('admin.instruction.edit',  compact(['categories', 'instruction']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instruction  $instruction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instruction $instruction)
    {

        $instruction->title = $request->title;
        $instruction->model = $request->model;
        $instruction->cat_id = $request->cat_id;

        if($request->hasFile('file')){

            $file = $request->file('file');
            $filename = time().'.'.$file->getClientOriginalName();
            $request->file->move('file/', $filename);
            $instruction->file = $filename;
            
        };

        $instruction->save();

        return redirect()->back()->withSuccess('Инструкция была успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instruction  $instruction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instruction $instruction)
    {
        $instruction->delete();
        return redirect()->back()->withSuccess('Инструкция была успешно удалена');
    }

}

