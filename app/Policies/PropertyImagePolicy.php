<?php

namespace App\Policies;

use App\Models\PropertyImage;
use App\Models\User;

class PropertyImagePolicy {
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PropertyImage $propertyImage): bool {
        return $user->id === $propertyImage->first()->property()->first()->user_id || $user->isAdmin();
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
    public function update(User $user, PropertyImage $propertyImage): bool {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PropertyImage $propertyImage): bool {
        return $user->id === $propertyImage->property()->first()->user_id || $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PropertyImage $propertyImage): bool {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PropertyImage $propertyImage): bool {
        return $user->isAdmin();
    }
}
