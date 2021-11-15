<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Storage;

class MeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return new UserResource($request->user());
    }

    public function update(Request $request, User $user)
    {

        $user->update([
            'mitra_type' => $request->mitra_type,
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        return response()->json([
            'messsage' => 'Complaint Was Created',
            'data' => new UserResource($user),
        ]);

    }

    public function uploadImage(Request $request,  User $user)
    {
        if($request->hasFile('picture_path')){
            Storage::delete($user->picture_path);
            $file= $request->file('picture_path');
            $fileName = $file->getClientOriginalName();
            $finalName = date('His') . $fileName ;

            $data = $request->file('picture_path')->storeAs('images/profile_picture', $finalName);
            
            $user->update([
                'picture_path' => $data
            ]);
            return response()->json([
                'message' => 'Successfully Upload Image Cokkk',
                'data' => $user
                
            ]);
        } else{
            return response()->json(['message' => 'gagagal']);
        }
    }
}
