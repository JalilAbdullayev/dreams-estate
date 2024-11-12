<?php

namespace App\Policies;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContactPolicy {
    use HandlesAuthorization;

    public function viewAny(User $user): bool {}

    public function view(User $user, Contact $contact): bool {}

    public function create(User $user): bool {
        return false;
    }

    public function update(User $user, Contact $contact): bool {
        return $user->id === auth()->user()->id;
    }

    public function delete(User $user, Contact $contact): bool {
        return false;
    }

    public function restore(User $user, Contact $contact): bool {
        return $user->id === auth()->user()->id;
    }

    public function forceDelete(User $user, Contact $contact): bool {
        return false;
    }
}
