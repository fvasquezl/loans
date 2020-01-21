<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersDepartmentsController extends Controller
{

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->departments()->sync($request->departments);

        return back()->with('info', 'los Permisos han sido actualizados');
    }

}
