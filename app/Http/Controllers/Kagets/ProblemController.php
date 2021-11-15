<?php

namespace App\Http\Controllers\Kagets;

use App\Models\Problem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProblemRequest;
use App\Models\Category;

class ProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function table()
    {
        $problems = Problem::latest()->paginate(10);
        return view('problem.table',compact('problems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('problem.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProblemRequest $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name'
        ]);

        Problem::create([
            'name' =>  $request->name,
            'slug' => Str::slug($request->name . '-' . Str::random(6)),
        ]);

        return back()->with('success','Problem Berhasil Dibuat');
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
    public function edit(Problem $problem)
    {
        return view('problem.edit', compact('problem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Problem $problem)
    {
        $problem->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name . '-' . Str::random(6)),
        ]);

        return redirect(route('problem.table'))->with('success', 'Problem Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Problem $problem )
    {
        $problem->delete();
        return redirect(route('category.table'))->with('success', 'Category Berhasil Di Hapus');
    }
}
