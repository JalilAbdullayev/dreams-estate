<?php

namespace App\Policies;

use App\Models\About;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AboutPolicy {
    use HandlesAuthorization;

    public function viewAny(User $user): bool {}

    public function view(User $user, About $about): bool {}

    public function create(User $user): bool {
        return false;
    }

    public function update(User $user, About $about): bool {
        return $user->id === auth()->user()->id;
    }

    public function delete(User $user, About $about): bool {
        return false;
    }

    public function restore(User $user, About $about): bool {
        return false;
    }

    public function forceDelete(User $user, About $about): bool {
        return false;
    }
}
