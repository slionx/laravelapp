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

    public function own(User $user, Post $post)
    {
        return $user->id === $post->post_author;
    }

    public function create(User $user, Post $post)
    {
        return $user->can('post.create',$post);
    }
}
