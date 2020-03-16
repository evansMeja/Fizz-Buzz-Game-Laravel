@extends('layouts.app')
@section('content')
	<div id="selectlevel">
		<h4 class="well" id="gameover">Select Category</h4>
		<input id="easy" type="radio" id="male" name="levels" value="easy">
		<label for="male">Easy</label><br>
		<input id="medium" type="radio" id="female" name="levels" value="medium">
		<label for="female">Medium</label><br>
		<input id="hard" type="radio" id="other" name="levels" value="hard">
		<label for="other">Hard</label>
	</div>

	<h4 class="alert alert-info" id="gameover">Simple Game For Children Though</h4>
	
	<div class="centerContent">
		<a id="restart" href="#" type="button" class="btn btn-info">Start Game</a>
		<a id="view_top_scores" type="button" class="view_top_scores btn btn-info" >Top Players</a>
		<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Game Level</a>
	</div>
	
	<hr/>

	<div class="gamefield">
		<div class="row">
			<div class="col-md-12"><span><h3>Easy Level | Scores</span></h3></span></div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-3"><h3>Highest: <span id="high_score">{{$user->user_high_score}}</span></h3></div>
			<div class="col-md-3"><h3>Missed: <span id="missed_score">0</span></h3></div>
			<div class="col-md-3"><h3>Total: <span id="total_score">0</span></h3></div>
		</div>
		
		<hr/>
		<div class="row">
			<div class="col-md-3"><span id="mynumber">00.00</span></div>
		</div>		
	</div>
<hr/>
	<div class="centerContent">
		<button id="fizz" type="button" class="btn btn-info">Fizz</button>
		<button id="buzz" type="button" class="btn btn-info">Buzz</button>
		<button id="fizzbuzz" type="button" class="btn btn-info">FizzBuzz</button>
		<button id="number" type="button" class="btn btn-info">None</button>
		<a id="reset_scores" href="#" type="button" class="btn btn-info centerContent">Reset Scores</a>
	</div>
	
	<hr/>
	
	<div class="centerContent">
		<a id="view_top_scores" type="button" class="view_top_scores btn btn-link" >Whatsapp</a>
	</div>
	
	<form action="#" id="myform">
		<input type="hidden" value="{{$user->id}}" id="my_id" name="score">
		<input type="hidden" value="" id="total_score" name="score">
		<input type="submit" style="display:none;">
	</form>


	<script>
	$("#selectlevel").hide();
		function resetDBScores(){
			window.location.href="/resetscores/";
		}

		function sendScores(){
			var score= document.getElementById("total_score").innerHTML;
			var id= document.getElementById("my_id").value;
			var url = "/updatescores/"+id+"/"+score;
			window.location.href=url;
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
			document.getElementById("total_score").innerHTML=gameLogic.score;
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
			logic.greenLight= 0;
			logic.redLight= 0;
			logic.isFresh=0;
		}

		function startGame(){
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
		}



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
			startGame();
		});


		document.getElementById("view_top_scores").addEventListener("click",function(){	
			window.location.href="/bestplayers";
		});

		document.getElementById("reset_scores").addEventListener("click",function(){
			resetDBScores();
		});


		 $('input:radio[name="levels"]').change(function() {			 
				if ($(this).val() == 'easy') {
					alert("easy");
					setNewLevel(gameLogic,counter,5000,5);
					//document.getElementById("mylevelheader").innerHTML = "EASY";
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
