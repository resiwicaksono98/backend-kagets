<?php

namespace App\Policies\Kagets;

use App\Models\News;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsPolicy
{
    use HandlesAuthorization;

    public function update(User $user, News $news)
    {
        return $user->id === $news->user_id;
    }
}
