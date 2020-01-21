var express = require ('express');
var MathRandom = require ('math-random');
var app = express();
var app = MathRandom ();

var result = function (choicePlayer){
var computerChoice = Math.random();

if (computerChoice < 0.34) {
    computerChoice = "ROCK";
}
else if (computerChoice <= 0.67){
    computerChoice = "PAPER";
}
else{
    computerChoice = "SCISSORS";
}

    if (choicePlayer === computerChoice){
    return "THE RESULT IS A DRAW!"; 
    }

    else if (choicePlayer === "ROCK"){
        if (computerChoice === "SCISSORS")
        return "ENEMY WIN";
    else
        return "PLAYER WIN";
    }

    else if (choicePlayer === "PAPER"){
        if (computerChoice === "SCISSORS")
        return "ENEMY WINS";
    else
        return "PLAYER WINS";
    }

    else if (choicePlayer === "SCISSORS"){
        if (computerChoice === "PAPER")
        return "ENEMY WINS";
    else
        return "PLAYER WINS";
    }
}

app.get('/:choice', function (req, res){
    res.json(result(req.params.choice));
})
app.listen (3001);
