<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Question;
use App\Models\Test;
use App\Models\Option;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [

            [
                'title' => 'Questions',
                'counter' => Question::count()
            ],
            [
                'title' => 'Topics',
                'counter' => Topic::count()
            ],
            [
                'title' => 'Tests',
                'counter' => Test::count()
            ],
            [
                'title' => 'Options',
                'counter' => Option::count()
            ]

        ];

        $topics = Topic::all();

        return view('home')->with(['data' => $data, 'topics' => $topics]);
    }

    public function tests()
    {
        return view('tests.index')->with(['tests' => Auth::user()->load("tests")->tests]);
    }

    public function test(Test $test)
    {
        return view('tests.show')->with(['test' => $test->load(["topic.questions.options", "topic.questions.optionCorrect", 'answers'])]);
    }
}
