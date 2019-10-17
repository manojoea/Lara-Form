<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Reply;
//use App\Model\Like;

class LikeController extends Controller
{
    public function likeIt(Reply $reply){

        $reply->like()->create([
//            'user_id' => auth()->id(),
            'user_id' => 1
        ]);
    }

    public function unLikeIt(Reply $reply){

//        $reply->like()->where(['user_id', auth()->id()])->first()->delet();
        $reply->like()->where('user_id', 1)->first()->delete();
    }
}
