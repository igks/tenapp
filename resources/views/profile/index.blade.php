@extends('layouts.template.app')
@section('title', 'Profile - Purchasing App')

@section('contents')
  <div class="page-wrapper">
    @if(session('status'))
    <div id="alert" class="alert alert-success">
      {{ session('status') }}
    </div>
    @endif
    <div class="page-breadcrumb">
      <div class="row">
          <div class="col-7 align-self-center">
              <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Profile</h4>
              <div class="d-flex align-items-center">
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb m-0 p-0">
                          <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-muted">Home</a></li>
                          <li class="breadcrumb-item text-muted active" aria-current="page">Profile</li>
                      </ol>
                  </nav>
              </div>
          </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-body">
                  <div class="text-center">
                    <img src="{{$user->photo ? Storage::disk('public')->url($user->photo) : asset('images/users/profile-pic.jpg')}}" alt="user" class="rounded-circle"
                    width="150">
                  <h4 class="page-title text-truncate text-dark font-weight-medium mt-3">{{$user->name}}</h4>
                    <p>{{$user->email}}</p>
                    <p>{{$user->phone}}</p>
                    <p>{{$user->address}}</p>
                  </div>
                  <hr>
                  <h6 class="font-weight-bold">Bio:</h6>
                <p>{{$user->bio}}</p>
                </div>
              </div>
              <div class="col-4">
                <button class="btn btn-primary btn-rounded" type="button" data-toggle="collapse" data-target="#form-profile" aria-expanded="false" aria-controls="form-profile">
                  Update Profile
                </button>
              </div>
          </div>
          <div class="col-lg-6 col-md-12">
            <div class="card">
              <div class="card-body collapse" id="form-profile">
                <form method="POST" enctype="multipart/form-data"
                action="{{route('profile.update', $user['id'])}}">
                @method('PUT')
                @csrf
                <div class="row">
                  <div class="col-md-12">
                    <div class="mb-3">
                      <small>* is required</small>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <label for="name">Name *</label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ isset($user) ? $user['name'] : old('name') }}"
                            autocomplete="off">
                          @error('name')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ isset($user) ? $user['email'] : old('email') }}"
                            autocomplete="off" readonly>
                          @error('email')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="phone">Phone</label>
                      <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone"
                        name="phone" value="{{ isset($user) ? $user['phone'] : old('phone') }}"
                        autocomplete="off">
                      @error('phone')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="address">Address</label>
                      <textarea class="form-control" id="address" name="address">{{ isset($user) ? $user['address'] : old('address') }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="bio">Bio</label>
                      <textarea class="form-control" id="bio" name="bio" rows="3">{{ isset($user) ? $user['bio'] : old('bio') }}</textarea>
                    </div>
                    <div class="form-group d-flex flex-column">
                      <label>Photo</label>
                      <input type="file" name="photo" accept=".png, .jpg, .jpeg"/>
                      </div>
                      @error('photo')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                      name="password" value="{{ old('password') }}"
                      autocomplete="off">
                    @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="password_confirmation">Confirm password_confirmation</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation"
                      name="password_confirmation" value="{{old('password_confirmation') }}"
                      autocomplete="off">
                    @error('password_confirmation')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <hr>
                  <div>
                    <button type="submit" class="btn btn-primary btn-rounded">Save</button>
                  </div>
              </form>
              </div>
          </div>
      </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script type="text/javascript">
  $(function() {
    let alert = $('#alert').length;
        if (alert > 0) {
            setTimeout(() => {
                $('#alert').remove();
            }, 3000);
        }
  });
</script>
    
@endsection