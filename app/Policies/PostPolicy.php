<?php

namespace App\Policies;

use App\Http\Model\Post;
use App\Http\Model\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Post $post)
    {
        return $user->id === $post->post_author;
        //return $user->can('update');
    }
    public function before($user, $ability)
    {
        if ($user->isSuperAdmin()) {
            //return true;
        }
    }

}
