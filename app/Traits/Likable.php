<?php

namespace App\Traits;

use App\Models\Like;

use Illuminate\Database\Eloquent\Builder;

trait Likable
{

    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select tweet_id, COUNT(id) likes from likes group by tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );
    }


    public function like()
    {
        $this->likes()->create([
            'user_id' => auth()->id()
        ]);
    }


    public function unlike()
    {
        $this->likes()->delete();
    }


    public function isLikedByUser()
    {
        return (bool) current_user()->likes->where('tweet_id', $this->id)->count();
    }


    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}