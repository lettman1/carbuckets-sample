<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Loan;
use App\Models\Role;
use App\Models\User;

class LoanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return auth()->check();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Loan $loan): bool
    {
        return auth()->check();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return auth()->check();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Loan $loan): bool
    {
        return auth()->check();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Loan $loan): bool
    {
        return in_array($user->role_id, [Role::IS_ADMIN, Role::IS_MANAGER]);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Loan $loan): bool
    {
        return in_array($user->role_id, [Role::IS_ADMIN, Role::IS_MANAGER]);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Loan $loan): bool
    {
        return in_array($user->role_id, [Role::IS_ADMIN, Role::IS_MANAGER]);
    }
}
