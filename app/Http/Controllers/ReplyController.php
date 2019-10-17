<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReplyResource;
use App\Model\Question;
use App\Model\Reply;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReplyController extends Controller
{
    public function index(Question $question){

        return ReplyResource::collection($question->reply);
//        return Reply::latest()->get();

    }

    public function show(Question $question, Reply $reply){
        return new ReplyResource($reply);
    }

    public function store(Question $question, Request $request){

        $reply = $question->reply()->create($request->all());
        return response(['Reply' => new ReplyResource($reply)], Response::HTTP_CREATED);
    }

    public function update(Question $question, Request $request, Reply $reply){

        $reply->update($request->all());
        return response('Updated', Response::HTTP_OK);
    }

    public function destroy(Question $question, Reply $reply){

        $reply->delete();
        return response(null, Response::HTTP_NO_CONTENT);

    }
}
