<?php

namespace App\Policies;

use App\Models\Settings;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingsPolicy {
    use HandlesAuthorization;

    public function viewAny(User $user): bool {}

    public function view(User $user, Settings $settings): bool {}

    public function create(User $user): bool {
        return false;
    }

    public function update(User $user, Settings $settings): bool {}

    public function delete(User $user, Settings $settings): bool {
        return false;
    }

    public function restore(User $user, Settings $settings): bool {}

    public function forceDelete(User $user, Settings $settings): bool {
        return false;
    }
}
