<?php

namespace App\Policies;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function editar(User $usuario)
    {
        if($usuario->grupos()->where('cliente-editar')->exists()){
            return true;
        }
        return false;
    }

    public function cadastrar(User $usuario, Cliente $cliente)
    {
        if($usuario->grupos()->where('cliente-criar')->exists()){
            return true;
        }
        return false;
    }

    public function before(User $user, string $ability): bool|null
    {
        if($user->habilidades()->contains($ability)){
            return true;
        }
        return false;
    }

    public function visualizar(User $usuario, Cliente $cliente)
    {
        if($usuario->habilidades()->contains('cliente-visualizar')){
            return true;
        }
        return false;
    }
}
