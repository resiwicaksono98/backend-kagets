<?php

namespace App\Http\Controllers\Kagets;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
// use Spatie\Permission\Contracts\Role;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function table()
    {
        $user = User::latest()->paginate(10);
        $roles = role::get();

        return view('user.table', compact('user','roles'));
    }

    public function edit(User $user, Role $role)
    {
        $categories = Category::all();
 

        return view('user.edit', [
            'user' => $user,
            'category' => $categories
        ]);
    }

    public function update(User $user , Request $request)
    {
        if ($request->picture_path) {
            Storage::delete($user->picture_path);
            $picture_path = $request->file('picture_path')->store('images/profile_picture');
        } else {
            $picture_path = $user->picture_path;
        }

        $user->update([
            'mitra_type' => $request->category,
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'picture_path' => $picture_path,
        ]);

        return redirect(route('user.table'))->with('success', 'Data berhasil di Update');
    }

    public function destroy(User $user)
    {
        Storage::delete($user->picture_path);
        $user->delete();

        return redirect(route('user.table'))->with('succces', 'Data User Berhasil Di Hapus');
    }
}
