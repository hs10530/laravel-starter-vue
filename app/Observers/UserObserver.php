<?php

namespace App\Observers;

use App\Models\Auth\User;
use Keygen;
use Hash;

class UserObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  User  $user
     * @return void
     */
    public function creating(User $user)
    {
        // If We Didnt Passed Any Facebook Id On user Creation then We Generate One
        if(is_null($user->id) && !is_numeric($user->id)){
            $user->id = User::generateUniqueID();
        }
        $user->code = User::generateUniqueCode();

        
    }

    /**
     * Listen to the User deleting event.
     *
     * @param  User  $user
     * @return void
     */
    public function deleting(User $user)
    {
        //
    }

}