<?php

namespace App\Policies;

use App\Models\FAQ;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FAQPolicy {
    use HandlesAuthorization;

    public function viewAny(User $user): bool {}

    public function view(User $user, FAQ $fAQ): bool {}

    public function create(User $user): bool {
        return $user->id === auth()->user()->id;
    }

    public function update(User $user, FAQ $fAQ): bool {
        return $user->id === auth()->user()->id;
    }

    public function delete(User $user, FAQ $fAQ): bool {
        return $user->id === auth()->user()->id;
    }

    public function restore(User $user, FAQ $fAQ): bool {
        return $user->id === auth()->user()->id;
    }

    public function forceDelete(User $user, FAQ $fAQ): bool {
        return $user->id === auth()->user()->id;
    }
}
