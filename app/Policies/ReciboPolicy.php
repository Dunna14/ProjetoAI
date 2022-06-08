<?php

namespace App\Policies;

use App\Models\Recibo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReciboPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->tipo == 'A' || $user->tipo == 'C';
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recibo  $recibo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Recibo $recibo)
    {
        return $user->tipo == 'A' || ($user->tipo == 'C' && $recibo->cliente->id = $user->id);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->tipo == 'C';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recibo  $recibo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Recibo $recibo)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recibo  $recibo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Recibo $recibo)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recibo  $recibo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Recibo $recibo)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recibo  $recibo
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Recibo $recibo)
    {
        //
    }
}
