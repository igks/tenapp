@extends('layouts.template.app')
@section('title', 'Player')

@section('contents')
<div class="page-wrapper">
  <div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
          <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">{{isset($atlet) ? 'Edit Existing' : 'Add New'}} Player</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-muted">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('atlets.index')}}" class="text-muted">Player</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">{{isset($atlet) ? 'Edit' : 'Add'}} Player</li>
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
            action="{{ isset($atlet) ? route('atlets.update', $atlet['id']) : route('atlets.store') }}">
            @csrf
            @if(isset($atlet))
            @method('PUT')
            @endif
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <small>* is required</small>
                </div>

                <div class="form-group">
                  <label for="nama">Nama *</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                   name="nama" value="{{ isset($atlet) ? $atlet['nama'] : old('nama') }}"
                    autocomplete="off">
                  @error('nama')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="tanggal_lahir">Tanggal Lahir *</label>
                  <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir"
                    name="tanggal_lahir" value="{{ isset($atlet) ? $atlet['tanggal_lahir'] : old('tanggal_lahir') }}"
                    autocomplete="off">
                  @error('tanggal_lahir')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="tempat_lahir">Tempat Lahir *</label>
                  <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir"
                   name="tempat_lahir" value="{{ isset($atlet) ? $atlet['tempat_lahir'] : old('tempat_lahir') }}"
                    autocomplete="off">
                  @error('tempat_lahir')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="kelamin">Jenis Kelamin *</label>
                  <select id="kelamin" name="jenis_kelamin" class="form-control select2"></select>
                  @error('jenis_kelamin')
                  <div class="invalid-feedback d-inline-block">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="agama">Agama *</label>
                  <select id="agama" name="agama" class="form-control select2"></select>
                  @error('agama')
                  <div class="invalid-feedback d-inline-block">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="status">Status *</label>
                  <select id="status" name="status" class="form-control select2"></select>
                  @error('status')
                  <div class="invalid-feedback d-inline-block">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="nik">NIK *</label>
                  <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik"
                    name="nik" value="{{ isset($atlet) ? $atlet['nik'] : old('nik') }}"
                    autocomplete="off">
                  @error('nik')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="alamat">Alamat Lengkap *</label>
                  <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3">{{ isset($atlet) ? $atlet['alamat'] : old('alamat') }}</textarea>
                  @error('alamat')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="kode_pos">Kode Pos *</label>
                  <input type="number" class="form-control @error('kode_pos') is-invalid @enderror" id="kode_pos"
                    name="kode_pos" value="{{ isset($atlet) ? $atlet['kode_pos'] : old('kode_pos') }}"
                    autocomplete="off">
                  @error('kode_pos')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="nama_sekolah">Nama Sekolah *</label>
                  <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror" id="nama_sekolah"
                   name="nama_sekolah" value="{{ isset($atlet) ? $atlet['nama_sekolah'] : old('nama_sekolah') }}"
                    autocomplete="off">
                  @error('nama_sekolah')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
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
                  <label for="tinggi">Tinggi Badan (Cm)*</label>
                  <input type="number" class="form-control @error('tinggi') is-invalid @enderror" id="tinggi"
                    name="tinggi" value="{{ isset($atlet) ? $atlet['tinggi'] : old('tinggi') }}"
                    autocomplete="off">
                  @error('tinggi')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="berat">Berat Badan (Kg)*</label>
                  <input type="number" class="form-control @error('berat') is-invalid @enderror" id="berat"
                    name="berat" value="{{ isset($atlet) ? $atlet['berat'] : old('berat') }}"
                    autocomplete="off">
                  @error('berat')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="telepon">Telepon/HP *</label>
                  <input type="number" class="form-control @error('telepon') is-invalid @enderror" id="telepon"
                    name="telepon" value="{{ isset($atlet) ? $atlet['telepon'] : old('telepon') }}"
                    autocomplete="off">
                  @error('telepon')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="nama_ayah">Nama Ayah</label>
                  <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" id="nama_ayah"
                   name="nama_ayah" value="{{ isset($atlet) ? $atlet['nama_ayah'] : old('nama_ayah') }}"
                    autocomplete="off">
                  @error('nama_ayah')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="nama_ibu">Nama Ibu</label>
                  <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu"
                   name="nama_ibu" value="{{ isset($atlet) ? $atlet['nama_ibu'] : old('nama_ibu') }}"
                    autocomplete="off">
                  @error('nama_ibu')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="telepon_wali">Telepon/HP Wali</label>
                  <input type="number" class="form-control @error('telepon_wali') is-invalid @enderror" id="telepon_wali"
                    name="telepon_wali" value="{{ isset($atlet) ? $atlet['telepon_wali'] : old('telepon_wali') }}"
                    autocomplete="off">
                  @error('telepon_wali')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="nama_kejuaraan">Nama Kejuaraan *</label>
                  <input type="text" class="form-control @error('nama_kejuaraan') is-invalid @enderror" id="nama_kejuaraan"
                   name="nama_kejuaraan" value="{{ isset($atlet) ? $atlet['nama_kejuaraan'] : old('nama_kejuaraan') }}"
                    autocomplete="off">
                  @error('nama_kejuaraan')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="tahun_kejuaraan">Tahun Kejuaraan *</label>
                  <input type="number" class="form-control @error('tahun_kejuaraan') is-invalid @enderror" id="tahun_kejuaraan"
                    name="tahun_kejuaraan" value="{{ isset($atlet) ? $atlet['tahun_kejuaraan'] : old('tahun_kejuaraan') }}"
                    autocomplete="off">
                  @error('tahun_kejuaraan')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="tingkat_kejuaraan">Tingkat Kejuaraan *</label>
                  <select id="tingkat_kejuaraan" name="tingkat_kejuaraan" class="form-control select2"></select>
                  @error('tingkat_kejuaraan')
                  <div class="invalid-feedback d-inline-block">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="tempat_kejuaraan">Tempat Kejuaraan *</label>
                  <input type="text" class="form-control @error('tempat_kejuaraan') is-invalid @enderror" id="tempat_kejuaraan"
                   name="tempat_kejuaraan" value="{{ isset($atlet) ? $atlet['tempat_kejuaraan'] : old('tempat_kejuaraan') }}"
                    autocomplete="off">
                  @error('tempat_kejuaraan')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="sertifikat">Sertifikat</label>
                  <input type="text" class="form-control @error('sertifikat') is-invalid @enderror" id="sertifikat"
                   name="sertifikat" value="{{ isset($atlet) ? $atlet['sertifikat'] : old('sertifikat') }}"
                    autocomplete="off">
                  @error('sertifikat')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

              </div>
              <hr>
              <div>
                <a href="{{ route('atlets.index') }}" type="button" class="btn btn-secondary btn-rounded mr-2">Back</a>
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
      const jenisKelamin = [{'id':'Laki - laki', 'text':'Laki - Laki'},{'id':'Perempuan', 'text':'Perempuan'}];
      $('#kelamin').select2({
        data:jenisKelamin
      });

      const agama = [{'id':'Islam', 'text':'Islam'},{'id':'Katolik', 'text':'Katolik'},{'id':'Protestan', 'text':'Protestan'},{'id':'Hindu', 'text':'Hindu'},{'id':'Buddha', 'text':'Buddha'},{'id':'Khonghucu', 'text':'Khonghucu'}];
      $('#agama').select2({
        data:agama
      });

      const status = [{'id':'Pelajar', 'text':'Pelajar'},{'id':'Mahasiswa', 'text':'Mahasiswa'}];
      $('#status').select2({
        data:status
      });

      const tingkat_kejuaraan = [{'id':'Daerah', 'text':'Daerah'},{'id':'Nasional', 'text':'Nasional'}];
      $('#tingkat_kejuaraan').select2({
        data:tingkat_kejuaraan
      });

      @if(isset($atlet))
        @php
          $club = \App\Models\Club::find($atlet->club_id);
        @endphp
        let club = {
            id: '{{ $club->id }}',
            text: '{{$club->name }}'
        };
        let clubOption = new Option(club.text, club.id, false, false);
        $('#club_id').append(clubOption).trigger('change');
    
        $("#kelamin").val('{{$atlet->jenis_kelamin}}').trigger('change');
        $("#agama").val('{{$atlet->agama}}').trigger('change');
        $("#status").val('{{$atlet->status}}').trigger('change');
        $("#tingkat_kejuaraan").val('{{$atlet->tingkat_kejuaraan}}').trigger('change');

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

      @if(old('jenis_kelamin'))
        $("#kelamin").val('jenis_kelamin').trigger('change');
      @endif
      @if(old('agama'))
        $("#agama").val('agama').trigger('change');
      @endif
      @if(old('status'))
        $("#status").val('status').trigger('change');
      @endif
      @if(old('tingkat_kejuaraan'))
        $("#tingkat_kejuaraan").val('tingkat_kejuaraan').trigger('change');
      @endif
      
  })
  </script>
@endsection

