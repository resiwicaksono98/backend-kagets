<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function show(Request $request, Complaint $complaint)
    {
        return (
            new UserResource($request->user())
        )->additional([
            'meta' => [
                'is_admin' => $request->user()->hasRole('admin'),
                'is_moderator' => $request->user()->hasRole('moderator'),
            ]
        ]);
    }
}
