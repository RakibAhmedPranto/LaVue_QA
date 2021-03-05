<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with('user')->paginate(2);

        return view('questions.index', compact('questions'));
    }
}
