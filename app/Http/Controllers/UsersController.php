<?php

namespace App\Http\Controllers;

use App\User;
use App\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Providers\Events\UserWasCreated;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\User\UpdateRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::allowed()->paginate();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User;

        $this->authorize('create', $user);

        $departments = Department::get();
        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name', 'id');
        return view('admin.users.create', compact('user', 'roles', 'permissions','departments'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', new User);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $data['password'] = Str::random(8);

        $user = User::create($data);

        if ($request->filled('roles')) {
            $user->assignRole($request->roles);
        }

        if ($request->filled('permissions')) {
            $user->givePermissionTo($request->permissions);
        }

        if ($request->filled('departments')) {
            $user->departments()->attach($request->departments);
        }

        UserWasCreated::dispatch($user,$data['password']);

        return redirect()
            ->route('admin.users.index')
            ->with('info', 'El Usuario ha sido creado con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update',$user);

        $departments = Department::get();
        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name', 'id');
        return view('admin.users.edit', compact('user', 'roles', 'permissions','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\User\UpdateRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, User $user)
    {
        $this->authorize('update',$user);

        $request->updateUser($user);

        return redirect()->route('admin.users.edit',$user)
        ->with('info', 'Usuario actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $this->authorize('delete',$user);

        $user->departments()->detach();

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('info', 'Usuario Eliminado con exito');
    }
}
