<?php

namespace App\Policies;

use App\Models\Genero;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GeneroPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function before($user, $ability) {
        if ($user->tipo == 'A') {
            return true;
        }
        return false;
    }

     public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Genero $genero)
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return false;//
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Genero $genero)
    {
        return false;//
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Genero $genero)
    {
        return false;//
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Genero $genero)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Genero $genero)
    {
        //
    }
}
