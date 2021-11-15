<?php

namespace App\Http\Controllers\Kagets;

use App\Models\User;
use App\Models\Problem;
use App\Models\Category;
use App\Models\Complaint;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ComplaintRequest;
use Illuminate\Support\Facades\Storage;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function table()
    {
        $complaint = Complaint::latest()->paginate(10);
        return view('complaint.table', compact('complaint'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('complaint.create', [
            'categories' =>  Category::get(),
            'problems' =>  Problem::get(),
            'user' => User::whereDoesntHave('roles')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComplaintRequest $request, Complaint $complaint)
    {

        Complaint::create([
            'user_id' => $request->user_id,
            'mitra_type' => $request->mitra_type,
            'slug' => Str::slug($request->mitra_type . '-' . Str::random(10)),
            'problem' => $request->problem,
            'description' => $request->description,
            'support_image' => $request->file('support_image')->store('images/complaints'),
        ]);

        // $complaint->problems()->sync(request('problem'));

        return back()->with('success', 'Complaint Was Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $complaint)
    {
        return view('complaint.show', [
            'complaint' => $complaint
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Complaint $complaint)
    {
        return view('complaint.edit', [
            'complaint' => $complaint,
            'category' =>  Category::get(),
            'problems' =>  Problem::get(),
            'user' => User::whereDoesntHave('roles')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ComplaintRequest $request, Complaint $complaint)
    {

        if ($request->support_image) {
            Storage::delete($complaint->support_image);
            $support_image = $request->file('support_image')->store('images/complaints');
        } else {
            $support_image = $complaint->support_image;
        }


        $complaint->update([
            'mitra_type' => $request->mitra_type,
            'slug' => Str::slug($request->mitra_type . '-' . Str::random(10)),
            'problem' => $request->problem,
            'description' => $request->description,
            'support_image' => $support_image,
            'status_complaint' => $request->status_complaint,
            'message' => $request->message,
        ]);

        return redirect(route('complaint.table'))->with('success', 'Data berhasil di Update');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complaint $complaint)
    {
        Storage::delete($complaint->support_image);
        $complaint->delete();

        return redirect(route('complaint.table'))->with('success', 'Complaint Berhasil Di Hapus');
    }
}
