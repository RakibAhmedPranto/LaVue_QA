<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use Validator;
use Session;
use Redirect;
use Auth;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with('user')->paginate(10);

        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        // echo"<pre>";
        // print_r($request->toArray());
        // exit;
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('questions/create')
                            ->withInput()
                            ->withErrors($validator);
        }
        $target = new Question;
        $rand = mt_rand(0,40);
        $target->title = $request->title;
        $target->slug = preg_replace('/\s+/u', '-', trim($request->title)) ."-". $rand ;
        $target->body = $request->body;
        $target->views = 0;
        $target->answers = 0;
        $target->votes = 0;
        $target->user_id = Auth::user()->id;

        if ($target->save()) {
            return redirect('questions')->with('success','Question Saved Successfully');
        } else {
            return redirect('questions/create')->with('error','Question Could Not Be Saved Successfully');
        }
    }


    public function show($slug)
    {
      $target = Question::where('slug',$slug)->first();

        // echo"<pre>";
        // print_r($target->toArray());
        // exit;
        // $parsedown = new \Parsedown();
        // $body = $parsedown->text($target->body);
        $target->increment('views');

      if(!is_null($target))
      {
        return view('questions.show',compact('target'));
      }
      else
      {
        session()->flash('errors','sorry!! there is no blog by this url...');
        return redirect('questions');
      }
    }
}
