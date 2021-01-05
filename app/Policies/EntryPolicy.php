<?php

namespace App\Policies;

use App\Models\Entry;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EntryPolicy {
    use HandlesAuthorization;

    public function view(User $user, Entry $entry): bool {
        return $user->id === $entry->user_id;
    }

    public function edit(User $user, Entry $entry): bool {
        return $user->id === $entry->user_id;
    }

    public function update(User $user, Entry $entry): bool {
        return $user->id === $entry->user_id;
    }

    public function delete(User $user, Entry $entry): bool {
        return $user->id === $entry->user_id;
    }

    public function restore(User $user, Entry $entry): bool {
        return $user->id === $entry->user_id;
    }

    public function foreDelete(User $user, Entry $entry): bool {
        return $user->id === $entry->user_id;
    }
}
