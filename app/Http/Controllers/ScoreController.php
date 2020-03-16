<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Score;

class ScoreController extends Controller
{	
    public function index(){
		$score = Score::find($id->auth()->user()->id);
		return view('scores.index')->with('score', $score);
	}
	
	public function show($id){
		$score = Score::find();
		return view('scores.show')->with('scores', $scores);
	}
	
	public function create(){
		$scores = Score::all();
		return view('scores.create')->with('scores', $scores);
	}
	
	
	public function update(Request $request,$id){
		$id = auth()->user()->id;
		$score = Score::find($id);
		$score->title = $request->input('title');
        $score->save();
        return redirect('/scores')->with('success', 'Scores Updated');
	}
}
