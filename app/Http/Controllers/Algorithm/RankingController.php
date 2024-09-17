<?php

namespace App\Http\Controllers\Algorithm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RakingPost;
use App\Models\Post;

class RankingController extends Controller
{

    public function __construct(int $id)
    {
        $userIDTest = 1;
        $post = Post::where('id', $userIDTest)->first();
    }

    public function rakingFollower()
    {
        $listFollower = RakingPost::where('type', 'follower')->where('');
    }

    public function rakingLike()
    {

    }

    public function rakingComments()
    {

    }
}
