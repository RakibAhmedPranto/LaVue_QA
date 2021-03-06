<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use Validator;
use Session;
use Redirect;
use Auth;

class AnswerController extends Controller
{
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('questions/'.$request->slug)
                            ->withInput()
                            ->withErrors($validator);
        }
        $target = new Answer;
        $target->question_id = $request->question_id;
        $target->body = $request->body;
        $target->votes_count = 0;
        $target->user_id = Auth::user()->id;

        if ($target->save()) {
            $target2 = Question::where('slug',$request->slug)->first();
            $target2->increment('answer_count');
            return redirect('questions/'.$request->slug)->with('success','Question Saved Successfully');
        } else {
            return redirect('questions/'.$request->slug)->with('error','Question Could Not Be Saved Successfully');
        }
    }
}
