<?php

namespace App\Policies;

use App\Loan;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LoanPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any Loan.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function before(User $user)
    {
        if($user->hasRole('Admin'))
        {
            return true;
        }
    }

    /**
     * Determine whether the user can view the Loan.
     *
     * @param  \App\User  $user
     * @param  \App\Loan  $loan
     * @return mixed
     */
    public function view(User $user, Loan $loan)
    {
        return $user->id === $loan->user_id
        || $user->hasPermissionTo('View loans');
    }

    /**
     * Determine whether the user can create loans.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Create loans');
    }

    /**
     * Determine whether the user can update the Loan.
     *
     * @param  \App\User  $user
     * @param  \App\Loan  $loan
     * @return mixed
     */
    public function update(User $user, Loan $loan)
    {
        return $user->id === $loan->user_id
        || $user->hasPermissionTo('Update loans');
    }

    /**
     * Determine whether the user can delete the Loan.
     *
     * @param  \App\User  $user
     * @param  \App\Loan  $loan
     * @return mixed
     */
    public function delete(User $user, Loan $loan)
    {
        return $user->id === $loan->user_id
        || $user->hasPermissionTo('Delete loans');
    }

    /**
     * Determine whether the user can restore the Loan.
     *
     * @param  \App\User  $user
     * @param  \App\Loan  $loan
     * @return mixed
     */
    public function restore(User $user, Loan $loan)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the Loan.
     *
     * @param  \App\User  $user
     * @param  \App\Loan  $loan
     * @return mixed
     */
    public function forceDelete(User $user, Loan $loan)
    {
        //
    }
}
