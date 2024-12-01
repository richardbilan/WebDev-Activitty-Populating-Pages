<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class populatingpagesController extends Controller
{

    public function index()
    {
        $posts = []; // Array to hold posts
        for ($i = 1; $i <= 10; $i++) {
            $posts[] = [
                'Username' => 'Username' . $i,
                'date' => now()->subDays($i)->toDateString(),
                'content' => 'This is post number ' . $i . '. hotdooooooooog',
            ];
        }
    
        return view('dashboard', compact('posts')); // Passing 'posts' to the dashboard view
    }
    
}
