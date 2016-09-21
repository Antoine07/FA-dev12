<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function show(User $user, Post $post)
    {
        return $user->owns($post);
    }

    public function create(User $user)
    {
        return  $user->isEditor()  ;
    }

    public function update(User $user, Post $post)
    {
        return  $user->owns($post)  ;
    }

    public function delete(User $user, Post $post)
    {
        return $user->owns($post);
    }

}
