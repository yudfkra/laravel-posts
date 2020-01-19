<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'title', 'body'];

    /**
     * Get intro of the post
     *
     * @return string
     */
    public function getIntroAttribute()
    {
        return Str::limit($this->body, 140);
    }

    /**
     * Determine if the post is owned by given user.
     *
     * @param \App\User|int|null $user
     * @return bool
     */
    public function isOwnUser($user = null)
    {
        if ($user instanceof User) {
            $user = $user->getKey();
        }

        return $user === $this->user_id;
    }

    /**
     * The user model relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
