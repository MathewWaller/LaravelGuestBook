<?php

namespace App\Policies;

use App\Models\GuestMessage;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class GuestMessagePolicy
{
    public function update(User $user, GuestMessage $guestMessage): bool
    {   
        return true;
    }
}
