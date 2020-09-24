<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('homepage', [
            'tweets' => current_user()->timeline()
        ]);
    }


    public function store(Request $request)
    {

        $attributes = $request->validate(['body' => 'required|min:1|max:250']);

        Tweet::create([
            'user_id' => Auth::id(),
            'body' => $attributes['body']
        ]);
    
        return back();
    }
}
