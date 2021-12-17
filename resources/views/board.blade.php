<?php

use App\Models\Matches;
use App\Models\Player;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Score</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="d-flex flex-row justify-content-around align-items-center mt-2">
            <div class="d-flex flex-column align-items-center">
                <h1><?= Player::getClubName($match->player_a_1);?></h1>
                <p><?= Player::getName($match->player_a_1);?></p>
                <p><?= Player::getName($match->player_a_2);?></p>
                <h2 id="total-score-A"><?= Matches::calculateTotal($match)['teamA'];?></h2>
            </div>
            <div>
                <h3>
                    VS
                </h3>
            </div>
            <div class="d-flex flex-column align-items-center">
            <h1><?= Player::getClubName($match->player_b_1);?></h1>
                <p><?= Player::getName($match->player_b_1);?></p>
                <p><?= Player::getName($match->player_b_2);?></p>
                <h2 id="total-score-B"><?= Matches::calculateTotal($match)['teamB'];?></h2>
            </div>
        </div>
        <hr/>
        <div class="d-flex flex-row justify-content-around align-items-center">
            <div class="w-50" style="position:relative;">
            <div class="bg-dark w-100 text-center text-light " style="font-size: 30vh; border-radius: 10px;">
                    <p id="pointA">0</p>
                </div>
                <div style="position:absolute; top:5px; right: 10px; cursor:pointer;">
                    <span id="btn-point-A-Revert" class="badge badge-danger">Revert</span>
                </div>
                <div class="mt-2 d-flex flex-row justify-content-around">
                    <div id="btn-point-A" class="btn btn-success w-50">Point</div>
                </div>
            </div>

            <div class="mx-4"><h4></h4></div>

            <div class="w-50 " style="position:relative;">
                <div class="bg-dark w-100 text-center text-light " style="font-size: 30vh; border-radius: 10px;">
                    <p id="pointB">0</p>
                </div>
                <div style="position:absolute; top:5px; right: 10px; cursor:pointer;">
                    <span id="btn-point-B-Revert" class="badge badge-danger">Revert</span>
                </div>
                <div class="mt-2 d-flex flex-row justify-content-around">
                    <div id="btn-point-B" class="btn btn-success w-50">Point</div>
                </div>
            </div>
        </div>
        <hr/>
        <div>
            <a href="{{ route('home') }}"  class="btn btn-secondary btn-rounded mr-2">Back</a>
            <button id="btn-save" type="button" class="btn btn-primary btn-rounded">Save</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script>
        
        $(function() {
            let matchId = <?= $match->id; ?>;
            let scoreA = 0;
            let scoreB = 0;

            $("#pointA").html(scoreA);
            $("#pointB").html(scoreB);

            $("#btn-point-A").click(function(){
                scoreA += 1;
                $("#pointA").text(scoreA);
            });

            $("#btn-point-A-Revert").click(function(){
                if(scoreA < 1) return;
                scoreA -= 1;
                $("#pointA").text(scoreA);
            });

            $("#btn-point-B").click(function(){
                scoreB += 1;
                $("#pointB").text(scoreB);
            });

            $("#btn-point-B-Revert").click(function(){
                if(scoreB < 1) return;
                scoreB -= 1;
                $("#pointB").text(scoreB);
            });

            $("#btn-save").click(function(){
                $("#btn-save").text("Saving...");
                if(scoreA + scoreB == 0) return;

                let data = {
                    matchId: matchId,
                    scoreA: scoreA,
                    scoreB: scoreB
                }
                let url = window.location.origin + "/home/score";
                $.ajax({
                    url: url,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        data: data
                    },
                })
                .done(function(data){
                    $("#pointA").text(0);
                    $("#pointB").text(0);
                    $("#total-score-A").text(data.teamA);
                    $("#total-score-B").text(data.teamB);
                    $("#btn-save").text("Save");
                    scoreA = 0;
                    scoreB = 0;
                });
            });
        });

        

    </script>
</body>

</html>