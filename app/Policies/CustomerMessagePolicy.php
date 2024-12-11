<?php

namespace App\Policies;

use App\Models\CustomerMessage;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CustomerMessagePolicy {
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CustomerMessage $customerMessage): bool {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CustomerMessage $customerMessage): bool {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CustomerMessage $customerMessage): bool {
        return $customerMessage->receiver_id === $user->id || $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CustomerMessage $customerMessage): bool {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CustomerMessage $customerMessage): bool {
        return $user->isAdmin();
    }
}