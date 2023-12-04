<?php

namespace App\Observers;

use App\Models\User;

class NewUserRoleObserver
{
    public function created(User $user)
    {
        $user->assignRole('user-testing');
    }
}
