@extends('layouts.template.app')
@section('title', 'Matches')

@section('contents')
<div class="page-wrapper">
  <div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
          <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">{{isset($match) ? 'Edit Existing' : 'Add New'}} Match</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-muted">Home</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">{{isset($match) ? 'Edit' : 'Add'}} Match</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data"
            action="{{ isset($match) ? route('home.update', $match['id']) : route('home.store') }}">
            @csrf
            @if(isset($match))
            @method('PUT')
            @endif
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <small>* is required</small>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                        <label for="date">Date *</label>
                        <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                            name="date" value="{{ isset($match) ? $match['date'] : old('date') }}"
                            autocomplete="off">
                        @error('date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                        <label for="time">Time *</label>
                        <input type="time" class="form-control @error('time') is-invalid @enderror" id="time"
                            name="time" value="{{ isset($match) ? $match['time'] : old('time') }}"
                            autocomplete="off">
                        @error('time')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                        <label for="location">Location *</label>
                        <input type="text" class="form-control @error('location') is-invalid @enderror" id="location"
                            name="location" value="{{ isset($match) ? $match['location'] : old('location') }}"
                            autocomplete="off">
                        @error('location')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                        <label for="table">Table *</label>
                        <input type="text" class="form-control @error('table') is-invalid @enderror" id="table"
                            name="table" value="{{ isset($match) ? $match['table'] : old('table') }}"
                            autocomplete="off">
                        @error('table')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="player_a_1">Player A 1 *</label>
                            <select id="player_a_1" name="player_a_1" class="form-control select2"></select>
                            @error('player_a_1')
                            <div class="invalid-feedback d-inline-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="player_a_2">Player A 2 </label>
                            <select id="player_a_2" name="player_a_2" class="form-control select2"></select>
                            @error('player_a_2')
                            <div class="invalid-feedback d-inline-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-6">
                            <div class="form-group">
                                <label for="player_b_1">Player B 1 *</label>
                                <select id="player_b_1" name="player_b_1" class="form-control select2"></select>
                                @error('player_b_1')
                                <div class="invalid-feedback d-inline-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                    </div>
                    
                    <div class="col-6">
                            <div class="form-group">
                                <label for="player_b_2">Player B 2</label>
                                <select id="player_b_2" name="player_b_2" class="form-control select2"></select>
                                @error('player_b_2')
                                <div class="invalid-feedback d-inline-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                        <label for="score_a_1">Score Team A Set 1</label>
                        <input type="number" class="form-control @error('score_a_1') is-invalid @enderror" id="score_a_1"
                            name="score_a_1" value="{{ isset($match) ? $match['score_a_1'] : old('score_a_1') }}"
                            autocomplete="off">
                        @error('score_a_1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        </div>
                    </div>

                    <div class="col-6">
                    <div class="form-group">
                        <label for="score_b_1">Score Team B Set 1</label>
                        <input type="number" class="form-control @error('score_b_1') is-invalid @enderror" id="score_b_1"
                            name="score_b_1" value="{{ isset($match) ? $match['score_b_1'] : old('score_b_1') }}"
                            autocomplete="off">
                        @error('score_b_1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                        <label for="score_a_2">Score Team A Set 2</label>
                        <input type="number" class="form-control @error('score_a_2') is-invalid @enderror" id="score_a_2"
                            name="score_a_2" value="{{ isset($match) ? $match['score_a_2'] : old('score_a_2') }}"
                            autocomplete="off">
                        @error('score_a_2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        </div>
                    </div>

                    <div class="col-6">
                    <div class="form-group">
                        <label for="score_b_2">Score Team B Set 2</label>
                        <input type="number" class="form-control @error('score_b_2') is-invalid @enderror" id="score_b_2"
                            name="score_b_2" value="{{ isset($match) ? $match['score_b_2'] : old('score_b_2') }}"
                            autocomplete="off">
                        @error('score_b_2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                        <label for="score_a_3">Score Team A Set 3</label>
                        <input type="number" class="form-control @error('score_a_3') is-invalid @enderror" id="score_a_3"
                            name="score_a_3" value="{{ isset($match) ? $match['score_a_3'] : old('score_a_3') }}"
                            autocomplete="off">
                        @error('score_a_3')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        </div>
                    </div>

                    <div class="col-6">
                    <div class="form-group">
                        <label for="score_b_3">Score Team B Set 3</label>
                        <input type="number" class="form-control @error('score_b_3') is-invalid @enderror" id="score_b_3"
                            name="score_b_3" value="{{ isset($match) ? $match['score_b_3'] : old('score_b_3') }}"
                            autocomplete="off">
                        @error('score_b_3')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                        <label for="score_a_4">Score Team A Set 4</label>
                        <input type="number" class="form-control @error('score_a_4') is-invalid @enderror" id="score_a_4"
                            name="score_a_4" value="{{ isset($match) ? $match['score_a_4'] : old('score_a_4') }}"
                            autocomplete="off">
                        @error('score_a_4')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        </div>
                    </div>

                    <div class="col-6">
                    <div class="form-group">
                        <label for="score_b_4">Score Team B Set 4</label>
                        <input type="number" class="form-control @error('score_b_4') is-invalid @enderror" id="score_b_4"
                            name="score_b_4" value="{{ isset($match) ? $match['score_b_4'] : old('score_b_4') }}"
                            autocomplete="off">
                        @error('score_b_4')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                        <label for="score_a_5">Score Team A Set 5</label>
                        <input type="number" class="form-control @error('score_a_5') is-invalid @enderror" id="score_a_5"
                            name="score_a_5" value="{{ isset($match) ? $match['score_a_5'] : old('score_a_5') }}"
                            autocomplete="off">
                        @error('score_a_5')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        </div>
                    </div>

                    <div class="col-6">
                    <div class="form-group">
                        <label for="score_b_5">Score Team B Set 5</label>
                        <input type="number" class="form-control @error('score_b_5') is-invalid @enderror" id="score_b_5"
                            name="score_b_5" value="{{ isset($match) ? $match['score_b_5'] : old('score_b_5') }}"
                            autocomplete="off">
                        @error('score_b_5')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        </div>
                    </div>
                </div>

              </div>
              <hr>
              <div>
                <a href="{{ route('home') }}"  class="btn btn-secondary btn-rounded mr-2">Back</a>
                <button type="submit" class="btn btn-primary btn-rounded">Submit</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
  <script type="text/javascript">
    $(function(){
      $('#player_a_1').select2({
        placeholder: "Search club...",
        minimumInputLength: 2,
        ajax: {
          url: "{{route('player-select')}}",
          dataType: 'json',
          delay: 250,
          data: function(params){
            return {
              q: $.trim(params.term)
            }
          },
          processResults: function (data) {
              return {
                  results: data
              };
          },
          cache: true
        }
      });

      $('#player_a_2').select2({
        placeholder: "Search club...",
        minimumInputLength: 2,
        ajax: {
          url: "{{route('player-select')}}",
          dataType: 'json',
          delay: 250,
          data: function(params){
            return {
              q: $.trim(params.term)
            }
          },
          processResults: function (data) {
              return {
                  results: data
              };
          },
          cache: true
        }
      });

      $('#player_b_1').select2({
        placeholder: "Search club...",
        minimumInputLength: 2,
        ajax: {
          url: "{{route('player-select')}}",
          dataType: 'json',
          delay: 250,
          data: function(params){
            return {
              q: $.trim(params.term)
            }
          },
          processResults: function (data) {
              return {
                  results: data
              };
          },
          cache: true
        }
      });

      $('#player_b_2').select2({
        placeholder: "Search club...",
        minimumInputLength: 2,
        ajax: {
          url: "{{route('player-select')}}",
          dataType: 'json',
          delay: 250,
          data: function(params){
            return {
              q: $.trim(params.term)
            }
          },
          processResults: function (data) {
              return {
                  results: data
              };
          },
          cache: true
        }
      });

      @if(isset($match))
        @php
          $match = \App\Models\Matches::find($match->id);
          $playerA1 = \App\Models\Player::find($match->player_a_1);
          $playerA2 = \App\Models\Player::find($match->player_a_2);
          $playerB1 = \App\Models\Player::find($match->player_b_1);
          $playerB2 = \App\Models\Player::find($match->player_b_2);
        @endphp

        @if($playerA1 != null)
            let playerA1 = {
                id: '{{ $playerA1->id }}',
                name: '{{$playerA1->first_name . " " . $playerA1->last_name}}'
            };
            let playerA1Option = new Option(playerA1.name, playerA1.id, false, false);
            $('#player_a_1').append(playerA1Option).trigger('change');
        @endif

        @if($playerA2 != null)
            let playerA2 = {
                id: '{{ $playerA2->id }}',
                name: '{{$playerA2->first_name . " " . $playerA1->last_name}}'
            };
            let playerA2Option = new Option(playerA2.name, playerA2.id, false, false);
            $('#player_a_2').append(playerA2Option).trigger('change');
        @endif
        
        @if($playerB1 != null)
            let playerB1 = {
                id: '{{ $playerB1->id }}',
                name: '{{$playerB1->first_name . " " . $playerB1->last_name}}'
            };
            let playerB1Option = new Option(playerB1.name, playerB1.id, false, false);
            $('#player_b_1').append(playerB1Option).trigger('change');
        @endif

        @if($playerB2 != null)
            let playerB2 = {
                id: '{{ $playerB2->id }}',
                name: '{{$playerB2->first_name . " " . $playerB2->last_name}}'
            };
            let playerB2Option = new Option(playerB2.name, playerB2.id, false, false);
            $('#player_b_2').append(playerB2Option).trigger('change');
       @endif
    @endif
    });
  </script>
@endsection