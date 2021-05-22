<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(10);

        return view('pages/users/index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_roles = Role::all()->pluck('name');

        $user_types = UserType::all();

        return view('pages/users/form', [
            'user_roles' => $user_roles,
            'user_types' => $user_types
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'photo' => 'nullable|image|max:2048',
        ]);

        $photo_path = null;

        if (isset($request->photo)) {
            $photo_path = Storage::put('/media', $request['photo']);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'user_type_id' => $request->user_type_id,
            'password' => Hash::make($request->password),
            'photo' => $photo_path
        ]);

        $user->assignRole($request->user_role);

        return redirect('/users')->with('status', 'User successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('pages/users/show-user', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_roles = Role::all()->pluck('name');

        $user_types = UserType::all();

        $user = User::find($id);

        $user['user_role'] = count($user->getRoleNames()) ? $user->getRoleNames()[0] : "";
        // dd($user);
        return view('pages/users/form', [
            'user' => $user,
            'user_roles' => $user_roles,
            'user_types' => $user_types
        ]);
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
        Validator::make($request->all(), [
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'email' => [
                'required',
                Rule::unique('users')->ignore($request->id)
            ],
            'photo' => [
                'nullable',
                'image',
                'max:2048'
            ]
        ])->validate();

        $user = User::find($id);

        $photo_path = $user->photo;

        if (isset($request->photo)) {
            if (isset($user->photo)) {
                Storage::delete($user->photo);
            }

            $photo_path = Storage::put('/media', $request['photo']);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'user_type_id' => $request->user_type_id,
            'photo' => $photo_path
        ]);

        $user->syncRoles($request->user_role);

        return redirect('/users')->with('status', 'User successfully update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        Storage::delete($user->photo);

        $user->delete();

        return redirect('/users')->with('status', 'User successfully deleted');
    }

    public function delete_photo($id)
    {
        $user = User::find($id);

        Storage::delete($user->photo);

        $user->forceFill([
            'photo' => null
        ])->save();

        return back();
    }

    public function reset_password(User $user)
    {
        return view('pages/users/reset-password', [
            'user' => $user
        ]);
    }

    public function save_new_password(Request $request, User $user)
    {
        $rules = [
            'password' => 'required|password',
            'new_password' => 'required|string|min:8|confirmed',
        ];

        $messages = [
            'password' => 'Admin :attribute is incorrect.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect(route('password.update', $user->id))
                ->withErrors($validator)
                ->withInput();
        }

        $user->forceFill([
            'password' => Hash::make($request['new_password']),
        ])->save();

        return redirect('/users')->with('status', 'User password successfuly changed');
    }
}
