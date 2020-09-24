<?php

namespace App\Traits;

use App\Models\Like;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

trait Likable
{

    public function scopeWithLikes(Builder $query)
    {
        $subquery = DB::table('likes')
            ->select('tweet_id', DB::raw('COUNT(id) as likes'))
            ->groupBy('tweet_id');

        $query->leftJoinSub(
            $subquery,
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