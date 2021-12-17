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
                        <a href="{{ route('home.create') }}" type="button" class="badge badge-primary mr-3">
                                + Add New Match
                            </a>

                            <a href="{{ route('home.report') }}" type="button" class="badge badge-success">
                                Download Report
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
                                        <p class="font-weight-medium m-0"><?= $match->score_a_1 != null ? $match->score_a_1 : "-";?></p>
                                    </div>
                                    <div class="col-2 text-center">-</div>
                                    <div class="col-5 text-center">
                                        <p class="font-weight-medium m-0"><?= $match->score_b_1 != null ? $match->score_b_1 : "-";?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5 text-center">
                                        <p class="font-weight-medium m-0"><?= $match->score_a_2 != null ? $match->score_a_2 : "-";?></p>
                                    </div>
                                    <div class="col-2 text-center">-</div>
                                    <div class="col-5 text-center">
                                        <p class="font-weight-medium m-0"><?= $match->score_b_2 != null ? $match->score_b_2 : "-";?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5 text-center">
                                        <p class="font-weight-medium m-0"><?= $match->score_a_3 != null ? $match->score_a_3 : "-";?></p>
                                    </div>
                                    <div class="col-2 text-center">-</div>
                                    <div class="col-5 text-center">
                                        <p class="font-weight-medium m-0"><?=$match->score_b_3 != null ? $match->score_b_3 : "-";?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5 text-center">
                                        <p class="font-weight-medium m-0"><?= $match->score_a_4 != null ? $match->score_a_4 : "-";?></p>
                                    </div>
                                    <div class="col-2 text-center">-</div>
                                    <div class="col-5 text-center">
                                        <p class="font-weight-medium m-0"><?= $match->score_b_4 != null ? $match->score_b_4 : "-";?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5 text-center">
                                        <p class="font-weight-medium m-0"><?= $match->score_a_5 != null ? $match->score_a_5 : "-"; ?></p>
                                    </div>
                                    <div class="col-2 text-center">-</div>
                                    <div class="col-5 text-center">
                                        <p class="font-weight-medium m-0"><?= $match->score_b_5 != null ? $match->score_b_5 : "-";?></p>
                                    </div>
                                </div>

                                <hr/>
                                <div class="row">
                                    <div class="col-6">
                                        <a type="button" class="badge badge-warning badge-sm badge-rounded text-dark" id="edit" data-id="{{$match->id}}">Update</a>
                                        <a type="button" class="badge badge-danger badge-sm badge-rounded text-light" id="delete" data-id="{{$match->id}}">Delete</a>
                                    </div>

                                    <div class="col-6 text-right">
                                        <small class="m-0 mt-4"><?= $match->location;?>, <?= $match->table;?></small>
                                        <br/>
                                        <small class="m-0"><?= $match->date;?>, <?= $match->time;?></small> 
                                    </div> 
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
<script type="text/javascript">
  $(function () {
   
        let alert = $('#alert').length;
        if (alert > 0) {
            setTimeout(() => {
                $('#alert').remove();
            }, 3000);
        }    

        $('body').on('click', '#edit', function () {
            let data_id = $(this).data('id');
            let url = "home/" + data_id + "/edit";
            $(location).attr('href', url);
        });

        $('body').on('click', '#delete',async function () {
            let data_id = $(this).data("id");
            let confirmation = await showDialog("Are you sure?","You want to delete this data!","warning");
            if (confirmation) {
                let url = window.location.origin + "/home/" + data_id;
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: data_id
                    },
                })
                .done(function(data){
                    $(location).attr('href', window.location.origin + "/home");
                });
            }
        });

  });

</script>
@endsection