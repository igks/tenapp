<?php

use App\Models\Matches;
use App\Models\Player;
?>
@extends('layouts.template.app')
@section('title', 'PingPong Apps')

@section('contents')
<!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Match Score</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-muted">Home</a></li>
                                </ol>
                            </nav>
                        </div>
                        <a href="{{ route('home.create') }}" type="button" class="badge badge-primary">
                                + Add New Match
                            </a>
                    </div>

                    
                </div>
              </div>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">

                @foreach($matches as $match)
                    <div class="col-4">
                            <div class="card p-3">
                                <div class="row">
                                    <div class="col-5 text-center">
                                        <h5 class="font-weight-medium"><?= Player::getClubName($match->player_a_1);?></h5>
                                        <p class="font-weight-medium m-0"><?= Matches::calculateTotal($match)['teamA'];?></p>
                                        <small class=" m-0"><?= Player::getName($match->player_a_1);?></small>
                                        <br/>
                                        <small class=" m-0"><?= Player::getName($match->player_a_2);?></small>
                                    </div>
                                    <div class="col-2 text-center">VS</div>
                                    <div class="col-5 text-center">
                                    <h5 class="font-weight-medium"><?= Player::getClubName($match->player_b_1);?></h5>
                                    <p class="font-weight-medium m-0"><?= Matches::calculateTotal($match)['teamB'];?></p>
                                    <small class=" m-0"><?= Player::getName($match->player_b_1);?></small>
                                    <br/>
                                    <small class=" m-0"><?= Player::getName($match->player_b_2);?></small>

                                    </div>
                                </div>
                                <hr/>

                                <div class="row">
                                    <div class="col-5 text-center">
                                        <p class="font-weight-medium m-0"><?= $match->score_a_1;?></p>
                                    </div>
                                    <div class="col-2 text-center">-</div>
                                    <div class="col-5 text-center">
                                        <p class="font-weight-medium m-0"><?= $match->score_b_1;?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5 text-center">
                                        <p class="font-weight-medium m-0"><?= $match->score_a_2;?></p>
                                    </div>
                                    <div class="col-2 text-center">-</div>
                                    <div class="col-5 text-center">
                                        <p class="font-weight-medium m-0"><?= $match->score_b_2;?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5 text-center">
                                        <p class="font-weight-medium m-0"><?= $match->score_a_3;?></p>
                                    </div>
                                    <div class="col-2 text-center">-</div>
                                    <div class="col-5 text-center">
                                        <p class="font-weight-medium m-0"><?= $match->score_b_3;?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5 text-center">
                                        <p class="font-weight-medium m-0"><?= $match->score_a_4;?></p>
                                    </div>
                                    <div class="col-2 text-center">-</div>
                                    <div class="col-5 text-center">
                                        <p class="font-weight-medium m-0"><?= $match->score_b_4;?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5 text-center">
                                        <p class="font-weight-medium m-0"><?= $match->score_a_5;?></p>
                                    </div>
                                    <div class="col-2 text-center">-</div>
                                    <div class="col-5 text-center">
                                        <p class="font-weight-medium m-0"><?= $match->score_b_5;?></p>
                                    </div>
                                </div>

                                <hr/>
                                <div class="text-right">
                                    <small class="m-0 mt-4"><?= $match->location;?>, <?= $match->table;?></small>
                                    <br/>
                                    <small class="m-0"><?= $match->date;?>, <?= $match->time;?></small> 
                                </div>                     
                            </div>
                    </div> 
                @endforeach
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
@endsection

@section('scripts')
@endsection