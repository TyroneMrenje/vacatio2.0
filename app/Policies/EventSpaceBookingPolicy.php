<?php

namespace App\Policies;

use App\Models\EventSpaceBooking;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EventSpaceBookingPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->role === 'manager';
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, EventSpaceBooking $eventSpaceBooking): bool
    {
        return $user->role === 'manager' || $user->id === $eventSpaceBooking->user_id;   
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {       
        return $user->role === 'guest' || $user->role === 'manager';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, EventSpaceBooking $eventSpaceBooking): bool
    {
        return $user->role === 'manager' || $user->id === $eventSpaceBooking->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, EventSpaceBooking $eventSpaceBooking): bool
    {
        return $user->role === 'manager' || $user->id === $eventSpaceBooking->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, EventSpaceBooking $eventSpaceBooking): bool
    {
        return $user->role === 'manager';
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, EventSpaceBooking $eventSpaceBooking): bool
    {
        return  $user->role === 'manager';
    }
}
