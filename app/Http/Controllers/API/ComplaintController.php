<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Complaint;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ComplaintRequest;
use App\Http\Resources\ComplaintResource;
use App\Http\Resources\ComplaintSingleResource;
use App\Http\Resources\ComplaintUser;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ComplaintResource::collection(Complaint::latest()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $complaint = Complaint::create(
            [
                'user_id' => $request->user_id,
                'mitra_type' => $request->mitra_type,
                'slug' => Str::slug($request->mitra_type . '-' . Str::random(10)),
                'problem' => $request->problem,
                'description' => $request->description,
            ]
        );

        return response()->json([
            'messsage' => 'Complaint Was Created',
            'data' => new ComplaintSingleResource($complaint),
        ]);
    }

    public function uploadImage(Request $request,  Complaint $complaint)
    {
        if($request->hasFile('support_image')){
            $file= $request->file('support_image');
            $fileName = $file->getClientOriginalName();
            $finalName = date('His') . $fileName ;

            $data = $request->file('support_image')->storeAs('images/complaints', $finalName);
            
            $complaint->update([
                'support_image' => $data
            ]);
            return response()->json([
                'message' => 'Successfully Upload Image Cokkk',
                'data' => $complaint
                
            ]);
        } else{
            return response()->json(['message' => 'gagagal']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $complaint)
    {
        return new ComplaintSingleResource($complaint);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ComplaintRequest $request, Complaint $complaint )
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
