<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Instruction;
use App\Models\Category;

class PageController extends Controller
{

    public function index(Request $request)
    {
        $search_str = $request->search_field;

        $instructions = Instruction::orderBy('created_at', 'DESC')
        ->where('status', 1)
        ->where([['title', 'LIKE', '%'.$search_str.'%'], ['model', 'LIKE', '%'.$search_str.'%']])
        ->paginate(9);

        $categories = Category::all();

        return view('page.index', compact(['instructions','categories']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function download(Request $request, $file)
    {
        return response()->download(public_path('file/'.$file));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $instruction=Instruction::find($id);

        return view('page.view', compact('instruction'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
