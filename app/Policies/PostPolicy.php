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

    public function own(User $user, Post $posts)
    {
        return $user->id === $posts->post_author;
    }
}
