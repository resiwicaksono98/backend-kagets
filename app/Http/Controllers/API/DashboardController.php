<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Faker\Provider\ar_JO\Company;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ComplaintResource;
use App\Http\Resources\DashboardResource;
use App\Http\Resources\ComplaintSingleResource;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Complaint $complaint)
    {
        return  ComplaintResource::collection(Complaint::where('user_id',$complaint->user_id)->latest()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $complaint)
    {
        return new ComplaintResource($complaint);
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
