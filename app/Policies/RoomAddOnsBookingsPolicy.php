<?php

namespace App\Policies;

use App\Models\RoomAddOnsBookings;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RoomAddOnsBookingsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, RoomAddOnsBookings $roomAddOnsBookings): bool
    {
         $roomBooking = $roomAddOnsBookings->roomBooking;
         return $user->role === 'manager' || $user->id === $roomBooking->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role === 'manager' || $user->role=== 'guest';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, RoomAddOnsBookings $roomAddOnsBookings): bool
    {
        $roomBooking = $roomAddOnsBookings->roomBooking;
        return $user->role === 'manager' || $user->id === $roomBooking->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, RoomAddOnsBookings $roomAddOnsBookings): bool
    {
        $roomBooking = $roomAddOnsBookings->roomBooking;
        return $user->role === 'manager' || $user->id === $roomBooking->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, RoomAddOnsBookings $roomAddOnsBookings): bool
    {
        return $user->role === 'manager';
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, RoomAddOnsBookings $roomAddOnsBookings): bool
    {
        return $user->role === 'manager';
    }
}
