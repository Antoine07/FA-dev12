<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
    }

    public function create(User $user)
    {
        return $user->isAdmin() ;
    }

    public function update(User $user, Post $post)
    {
        return ($user->isAdmin() || $user->id === $post->user_id);
    }

    public function delete(User $user, Post $post)
    {
        return ($user->isAdmin() || $user->id === $post->user_id);
    }

}
