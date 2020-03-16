@extends('layouts.app')
@section('content')
<h4 class="jumbotron" id="level">Level | <span id="mylevelheader">Please Select Level</span></h4>
<input id="easy" type="radio" id="male" name="levels" value="easy">
<label for="male">Easy</label><br>
<input id="medium" type="radio" id="female" name="levels" value="medium">
<label for="female">Medium</label><br>
<input id="hard" type="radio" id="other" name="levels" value="hard">
<label for="other">Hard</label>

<h4 class="jumbotron" id="gameover">Fizz Buzz Game</h4>

<div style="width:100%;height:400px;margin-bottom:2%;border:2px solid green;">
<h3>High Score: <span id="high_score">0</span></h3>
<h3>Missed Score: <span id="missed_score">0</span></h3>
<h3>Total Score: <span id="total_score">0</span></h3>
<span id="mynumber" style="text-align:center;font-size:100px;">56</span>
</div>

<div class="btn-group" role="group" aria-label="Basic example">
  <button id="fizz" type="button" class="btn btn-secondary">Fizz</button>
  <button id="buzz" type="button" class="btn btn-secondary">Buzz</button>
  <button id="fizzbuzz" type="button" class="btn btn-secondary">FizzBuzz</button>
  <button id="number" type="button" class="btn btn-secondary">None</button>
</div>

<div class="btn-group" role="group" aria-label="Basic example">
  <a id="restart" href="#" type="button" class="btn btn-secondary">Restart</a>
  <a id="view_scores" href="/scores" type="button" class="btn btn-secondary">Top Players</a>
  <a id="reset_scores" href="#" type="button" class="btn btn-secondary">Reset Career</a>
</div>

<form action="/scores/update/" id="myform">
<input type="hidden" value="" id="my_total_score" name="score">
<input type="submit" style="display:none;">
</form>

<hr/>
<h4 class="jumbotron">Leave a Comment</h4>
<form>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Select Rating</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Enter Comment</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Comment</button>
</form>

<script>
function sendScores(){
	var score= document.getElementById("total_score").innerHTML;
	document.getElementById("my_total_score").value=score;
	document.getElementById("myform").submit();
}

function setNewLevel(gameLogic,mycountersObj,delay,missedMax){
	resetScores(gameLogic);
	UpdateScores(gameLogic);
    mycountersObj.delay=delay
    mycountersObj.mixedMax=missedMax
}

class mycounters{
	constructor(){
		this.delay=4000;
		this.mixedMax=1;
	}
}

function updateId(score){
$("#myscore").val(score);
$("#myform").submit();
}

function generateRandomNumber(){
	return Math.floor(Math.random() * 100) + 1;
}

function UpdateScores(gameLogic){
	document.getElementById("missed_score").innerHTML=gameLogic.missed;
	document.getElementById("high_score").innerHTML=gameLogic.highscore;
	document.getElementById("total_score").innerHTML=gameLogic.score;
	
	if(gameLogic.redLight == 1){
		
	}else{
		
	}
}

class GameLogicClass {
  constructor() {
	this.score= 0;
	this.missed= 0;
	this.highscore= 0;
	this.greenLight= 0;
	this.redLight= 0;
	this.isFresh=0;
  }
}

class UserInputValidator {
  is_buzz(n) {
    return n % 5 == 0;
  }
  is_fizz(n) {
    return n % 3 == 0;
  }
  is_fizzbuzz(n) {
    return n % 3 == 0 && n % 5 == 0;
  }
  is_number(n) {
    return n % 3 != 0 || n % 5 != 0;
  }
}

myinputValidator = new UserInputValidator();
gameLogic = new GameLogicClass()
counter = new mycounters()

function resetScores(logic){	
	logic.score= 0;
	logic.missed= 0;
	logic.highscore= 0;
	logic.greenLight= 0;
	logic.redLight= 0;
	logic.isFresh=0;
}

var myvar = setInterval(function(){
	if(gameLogic.isFresh==1){
		gameLogic.missed= gameLogic.missed + 1;
		UpdateScores(gameLogic);
	}
	if(gameLogic.missed > counter.mixedMax){	
		document.getElementById("gameover").innerHTML="The gave is over";
		clearInterval(myvar);
		sendScores();
	}
	gameLogic.isFresh=1;
	document.getElementById("mynumber").innerHTML=generateRandomNumber();
},counter.delay);

if(gameLogic.missed > counter.mixedMax ){	
	document.getElementById("gameover").innerHTML="The gave is over";
	clearInterval(myvar);
	sendScores();	
}


document.getElementById("fizz").addEventListener("click",function(){
	if(gameLogic.missed <= counter.mixedMax){
		if(gameLogic.isFresh==1){
			gameLogic.isFresh=0;
			if(myinputValidator.is_fizz(document.getElementById("mynumber").innerHTML)){			
				gameLogic.score= gameLogic.score + 1;
			}else{
				gameLogic.missed= gameLogic.missed + 1;
			}
			UpdateScores(gameLogic);
		}
	}else{
		document.getElementById("gameover").innerHTML="The gave is over";
		clearInterval(myvar);
		sendScores();
	}
});

document.getElementById("buzz").addEventListener("click",function(){
	if(gameLogic.missed <= counter.mixedMax){
	if(gameLogic.isFresh==1){
		gameLogic.isFresh=0;	
		if(myinputValidator.is_buzz(document.getElementById("mynumber").innerHTML)){
			gameLogic.score= gameLogic.score + 1;		
		}else{
			gameLogic.missed= gameLogic.missed + 1;		
		}
		UpdateScores(gameLogic);
	}
	}else{
		document.getElementById("gameover").innerHTML="The gave is over";
		clearInterval(myvar);
		sendScores();		
	}
});

document.getElementById("fizzbuzz").addEventListener("click",function(){
	if(gameLogic.missed <= counter.mixedMax){
	if(gameLogic.isFresh==1){
		gameLogic.isFresh=0;	
		if(myinputValidator.is_fizzbuzz(document.getElementById("mynumber").innerHTML)){
			gameLogic.score= gameLogic.score + 1;	
		}else{
			gameLogic.missed= gameLogic.missed + 1;
		}
		UpdateScores(gameLogic);
	}
	}else{
		document.getElementById("gameover").innerHTML="The gave is over";
		clearInterval(myvar);
		sendScores();
	}
});

document.getElementById("number").addEventListener("click",function(){	
    if(gameLogic.missed <= counter.mixedMax){
	if(gameLogic.isFresh==1){
		gameLogic.isFresh=0;
		if(myinputValidator.is_number(document.getElementById("mynumber").innerHTML)){
			gameLogic.score= gameLogic.score + 1;		
		}else{
			gameLogic.missed= gameLogic.missed + 1;	
		}
		UpdateScores(gameLogic);
	}
	}else{
		document.getElementById("gameover").innerHTML="The gave is over";
		clearInterval(myvar);
		sendScores();
	}
});


document.getElementById("restart").addEventListener("click",function(){	
	resetScores(gameLogic);
	UpdateScores(gameLogic);
	window.location.href="/play";
});


document.getElementById("view_scores").addEventListener("click",function(){	
	alert("viewing...");
});

document.getElementById("reset_scores").addEventListener("click",function(){
	resetScores(gameLogic);
	// function to reset database
});


 $('input:radio[name="levels"]').change(function() {
		document.getElementById("easy").disabled = true;
		document.getElementById("hard").disabled = true;
		document.getElementById("medium").disabled = true;
        if ($(this).val() == 'easy') {
            setNewLevel(gameLogic,counter,5000,5);
			document.getElementById("mylevelheader").innerHTML = "EASY";
        }else if ($(this).val() == 'medium'){
            setNewLevel(gameLogic,counter,3000,3);
			document.getElementById("mylevelheader").innerHTML = "MEDIUM";
        }else if ($(this).val() == 'hard'){
            setNewLevel(gameLogic,counter,2000,2);
			document.getElementById("mylevelheader").innerHTML = "HARD";
        } 
    });
</script>

@endsection
