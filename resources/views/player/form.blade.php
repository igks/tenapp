@extends('layouts.template.app')
@section('title', 'Player')

@section('contents')
<div class="page-wrapper">
  <div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
          <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">{{isset($player) ? 'Edit Existing' : 'Add New'}} Player</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-muted">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('players.index')}}" class="text-muted">Player</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">{{isset($player) ? 'Edit' : 'Add'}} Player</li>
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
            action="{{ isset($player) ? route('players.update', $player['id']) : route('players.store') }}">
            @csrf
            @if(isset($player))
            @method('PUT')
            @endif
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <small>* is required</small>
                </div>

                <div class="form-group">
                  <label for="club_id">Club *</label>
                  <select id="club_id" name="club_id" class="form-control select2"></select>
                  @error('club_id')
                  <div class="invalid-feedback d-inline-block">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                
                <div class="form-group">
                  <label for="first_name">First Name *</label>
                  <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name"
                   name="first_name" value="{{ isset($player) ? $player['first_name'] : old('first_name') }}"
                    autocomplete="off">
                  @error('first_name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="last_name">Last Name *</label>
                  <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                    name="last_name" value="{{ isset($player) ? $player['last_name'] : old('last_name') }}"
                    autocomplete="off">
                  @error('last_name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="nik">NIK *</label>
                  <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik"
                    name="nik" value="{{ isset($player) ? $player['nik'] : old('nik') }}"
                    autocomplete="off">
                  @error('nik')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="date_of_birth">Date of Birth *</label>
                  <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth"
                    name="date_of_birth" value="{{ isset($player) ? $player['date_of_birth'] : old('date_of_birth') }}"
                    autocomplete="off">
                  @error('phone')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="address">Address *</label>
                  <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3">{{ isset($player) ? $player['address'] : old('address') }}</textarea>
                  @error('address')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="city">City *</label>
                  <input type="text" class="form-control @error('city') is-invalid @enderror" id="city"
                     name="city" value="{{ isset($player) ? $player['city'] : old('city') }}"
                    autocomplete="off">
                  @error('city')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="state">State *</label>
                  <input type="text" class="form-control @error('state') is-invalid @enderror" id="state"
                     name="state" value="{{ isset($player) ? $player['state'] : old('state') }}"
                    autocomplete="off">
                  @error('state')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="handed">Handed *</label>
                  <input type="text" class="form-control @error('handed') is-invalid @enderror" id="handed"
                   name="handed" value="{{ isset($player) ? $player['handed'] : old('handed') }}"
                    autocomplete="off">
                  @error('handed')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="bet_wood">Bet Wood *</label>
                  <input type="text" class="form-control @error('bet_wood') is-invalid @enderror" id="bet_wood"
                     name="bet_wood" value="{{ isset($player) ? $player['bet_wood'] : old('bet_wood') }}"
                    autocomplete="off">
                  @error('bet_wood')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="fh_rubber">Front Hand Rubber *</label>
                  <input type="text" class="form-control @error('fh_rubber') is-invalid @enderror" id="fh_rubber"
                    name="fh_rubber" value="{{ isset($player) ? $player['fh_rubber'] : old('fh_rubber') }}"
                    autocomplete="off">
                  @error('fh_rubber')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="bh_rubber">Back Hand Rubber *</label>
                  <input type="text" class="form-control @error('bh_rubber') is-invalid @enderror" id="bh_rubber"
                     name="bh_rubber" value="{{ isset($player) ? $player['bh_rubber'] : old('bh_rubber') }}"
                    autocomplete="off">
                  @error('bh_rubber')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

              </div>
              <hr>
              <div>
                <a href="{{ route('players.index') }}" type="button" class="btn btn-secondary btn-rounded mr-2">Back</a>
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
      $('#club_id').select2({
        placeholder: "Search club...",
        minimumInputLength: 2,
        ajax: {
          url: "{{route('club-select')}}",
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

      @if(isset($player))
        @php
          $club = \App\Models\Club::find($player->club_id);
        @endphp
        let club = {
            id: '{{ $club->id }}',
            text: '{{$club->name }}'
        };
        let clubOption = new Option(club.text, club.id, false, false);
        $('#club_id').append(clubOption).trigger('change');
      @endif

      @if(old('club_id'))
        @php
        $club = \App\Models\Club::find(old('club_id'));
        @endphp
        let club = {
            id: '{{ $club->id }}',
            text: '{{$club->name }}'
        };
        let clubOption = new Option(club.text, club.id, false, false);
        $('#club_id').append(clubOption).trigger('change');
      @endif
  })
  </script>
@endsection

