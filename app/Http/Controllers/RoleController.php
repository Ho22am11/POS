<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function index()
    {

        $data['users'] = User::all();
        $data['roles'] = Role::all();
        return view('pages.users.index' , $data );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name ,
            'email' => $request->email ,
            'email_verified_at' => now() ,
            'password' => Hash::make($request->password),
        ])->assignRole($request->role);

        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['user'] = User::find($id);
        $data['permissions'] = $data['user']->getAllPermissions();
        $data['AllPermissions']  = Permission::all();
        return view('pages.users.edit' , $data );

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , $id)
    {
        $user = User::find($id);
        $user->update([
            'name' => $request->name ,
            'email' => $request->email ,
            'email_verified_at' => now() ,
            'password' => Hash::make($request->password),
        ]);

        $user->syncRoles($request->roles);

        return back() ;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
