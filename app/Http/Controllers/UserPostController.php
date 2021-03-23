<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function index(User $user) {
        $posts = $user->posts()->with(['user', 'likes'])->paginate(20);
        return view('posts.userposts' , [
            'posts' => $posts,
            'user' => $user,
        ]);
    }
}
