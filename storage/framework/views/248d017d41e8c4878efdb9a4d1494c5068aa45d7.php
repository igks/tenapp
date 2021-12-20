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
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Score</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
        crossorigin="anonymous">

    <style>
        .custom-container{
            position: relative;
            height: 400px;
            border-radius: 20px;
        }
        .score{
            position: absolute;
            top: 10px;
            right: 10px;
            bottom: 10px;
            left: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 40vh;
            font-weight: bold;
            color: white;
            border-radius: 20px;
        }
    </style>
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
            <div class="bg-dark w-50 custom-container">
                <div class="bg-dark score" id="layerA1">0</div>
                <div class="bg-dark score" id="layerA2">0</div>
                <div style="position:absolute; top:5px; right: 10px; cursor:pointer;">
                    <span id="btn-point-A-Revert" class="badge badge-danger">Revert</span>
                </div>
                <div style="position:absolute; bottom:-50px; width: 100%;cursor:pointer; display:flex; justify-content:center; align-items:center;">
                    <span id="btn-point-A" class="btn btn-success w-50">Point</span>
                </div>
            </div>
            
            <div class="mx-4"><h4></h4></div>

            <div class="bg-dark w-50 custom-container">
                <div class="bg-dark score" id="layerB1">0</div>
                <div class="bg-dark score" id="layerB2">0</div>
                <div style="position:absolute; top:5px; right: 10px; cursor:pointer;">
                    <span id="btn-point-B-Revert" class="badge badge-danger">Revert</span>
                </div>
                <div style="position:absolute; bottom:-50px; width: 100%;cursor:pointer; display:flex; justify-content:center; align-items:center;">
                    <span id="btn-point-B" class="btn btn-success w-50">Point</span>
                </div>
            </div>

        </div>
        <hr style="margin-top: 100px;"/>
        <div >
            <a href="<?php echo e(route('home')); ?>"  class="btn btn-secondary btn-rounded mr-2">Back</a>
            <button id="btn-save" type="button" class="btn btn-primary btn-rounded">Save</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        
        $(function() {
            let matchId = <?= $match->id; ?>;
            let scoreA = 0;
            let scoreB = 0;

            $("#btn-point-A").click(function(){
                scoreA += 1;
                $("#layerA1").text(scoreA);
                $("#layerA2").slideUp('slow', function(){
                $("#layerA2").text(scoreA);
                $("#layerA2").show();
                });
            });

            $("#btn-point-A-Revert").click(function(){
                if(scoreA < 1) return;
                scoreA -= 1;
                $("#layerA2").hide();
                $("#layerA2").text(scoreA);
                $("#layerA2").slideDown('slow', function(){
                    $("#layerA1").text(scoreA);
                });
            });

            $("#btn-point-B").click(function(){
                scoreB += 1;
                $("#layerB1").text(scoreB);
                $("#layerB2").slideUp('slow', function(){
                $("#layerB2").text(scoreB);
                $("#layerB2").show();
                });
            });

            $("#btn-point-B-Revert").click(function(){
                if(scoreB < 1) return;
                scoreB -= 1;
                $("#layerB2").hide();
                $("#layerB2").text(scoreB);
                $("#layerB2").slideDown('slow', function(){
                    $("#layerB1").text(scoreB);
                });
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
                    $("#layerA1").text(0);
                    $("#layerA2").text(0);
                    $("#layerB1").text(0);
                    $("#layerB2").text(0);
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

</html><?php /**PATH C:\application\TenApp\resources\views/board.blade.php ENDPATH**/ ?>