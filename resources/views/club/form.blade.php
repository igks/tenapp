@extends('layouts.template.app')
@section('title', 'Club')

@section('contents')
<div class="page-wrapper">
  <div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
          <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">{{isset($club) ? 'Edit Existing' : 'Add New'}} Club</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-muted">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('clubs.index')}}" class="text-muted">Club</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">{{isset($club) ? 'Edit' : 'Add'}} Club</li>
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
            action="{{ isset($club) ? route('clubs.update', $club['id']) : route('clubs.store') }}">
            @csrf
            @if(isset($club))
            @method('PUT')
            @endif
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <small>* is required</small>
                </div>
                <div class="form-group">
                  <label for="code">Nama Club *</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" value="{{ isset($club) ? $club['name'] : old('name') }}"
                    autocomplete="off">
                  @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="name">Nama Ketua Club *</label>
                  <input type="text" class="form-control @error('leader') is-invalid @enderror" id="leader"
                    name="leader" value="{{ isset($club) ? $club['name'] : old('name') }}"
                    autocomplete="off">
                  @error('leader')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="phone">Telepon/HP *</label>
                  <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone"
                   name="phone" value="{{ isset($club) ? $club['phone'] : old('phone') }}"
                    autocomplete="off">
                  @error('phone')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="address">Alamat *</label>
                  <textarea class="form-control @error('phone') is-invalid @enderror" id="address" name="address" rows="3">{{ isset($club) ? $club['address'] : old('address') }}</textarea>
                  @error('address')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="city">Kota *</label>
                  <input type="text" class="form-control @error('city') is-invalid @enderror" id="city"
                     name="city" value="{{ isset($club) ? $club['city'] : old('city') }}"
                    autocomplete="off">
                  @error('city')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="state">Provinsi *</label>
                  <input type="text" class="form-control @error('state') is-invalid @enderror" id="state"
                     name="state" value="{{ isset($club) ? $club['state'] : old('state') }}"
                    autocomplete="off">
                  @error('state')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                
              </div>
              <hr>
              <div>
                <a href="{{ route('clubs.index') }}"  class="btn btn-secondary btn-rounded mr-2">Back</a>
                <button type="submit" class="btn btn-primary btn-rounded">Submit</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
