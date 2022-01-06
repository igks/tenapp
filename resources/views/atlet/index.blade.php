@extends('layouts.template.app')
@section('title', 'Player List')

@section('contents')
<div class="page-wrapper">
  <div id="delete-alert" class="alert alert-success d-none">
    Data have been removed
   </div>
   <div id="not-delete-alert" class="alert alert-danger d-none">
    Can not delete completed order
   </div>
   <div id="duplicate-alert" class="alert alert-success d-none">
    Data was successfully duplicated
   </div>
   <div id="update-status-alert" class="alert alert-success d-none">
    Status successfully updated
   </div>
   <div id="not-update-status-alert" class="alert alert-danger d-none">
    Can not update completed order
   </div>
  @if(session('status'))
  <div id="alert" class="alert alert-success">
    {{ session('status') }}
  </div>
  @endif
  @if(session('error'))
  <div id="alert" class="alert alert-danger">
    {{ session('error') }}
  </div>
  @endif
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-6">
        <div class="col-7 align-self-center">
              <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Player List</h4>
              <div class="d-flex align-items-center">
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb m-0 p-0">
                          <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-muted">Home</a></li>
                          <li class="breadcrumb-item text-muted active" aria-current="page">Player</li>
                      </ol>
                  </nav>
              </div>
          </div>
      </div>
      <div class="col-6">
        <div class="nav-item float-right">
          <a href="{{ route('atlets.create') }}" type="button" class="btn btn-primary btn-rounded mr-4">
            + Add New Record
          </a>

          <a href="{{ route('atlets.report') }}" type="button" class="btn btn-success btn-rounded">
           Export to Excel
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered yajra-datatable table-striped no-wrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Tanggal Lahir</th>
                      <th>Tempat Lahir</th>
                      <th>Jenis Kelamin</th>
                      <th>Agama</th>
                      <th>Status</th>
                      <th>NIK</th>
                      <th>Alamat</th>
                      <th>Kode Pos</th>
                      <th>Nama Sekolah</th>
                      <th>Nama Asal Club</th>
                      <th>Tinggi Badan</th>
                      <th>Berat Badan</th>
                      <th>Telepon/HP</th>
                      <th>Nama Ayah</th>
                      <th>Nama Ibu</th>
                      <th>Telepon/HP Wali</th>
                      <th>Nama Kejuaraan</th>
                      <th>Tahun Kejuaraan</th>
                      <th>Tingkat Kejuaraan</th>
                      <th>Tempat Kejuaraan</th>
                      <th>Sertifikat</th>
                      <th>Pilihan</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
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
  $(function () {
   
        let alert = $('#alert').length;
        if (alert > 0) {
            setTimeout(() => {
                $('#alert').remove();
            }, 3000);
        }
        // data table
        datatable();

        $('body').on('click', '#show-detail', function () {
            let data_id = $(this).data('id');
            let url = "atlets/" + data_id;
            $(location).attr('href', url);
        });

        $('body').on('click', '#edit', function () {
            let data_id = $(this).data('id');
            let url = "atlets/" + data_id + "/edit";
            $(location).attr('href', url);
        });

        $('body').on('click', '#delete',async function () {
            let data_id = $(this).data("id");
            let confirmation = await showDialog("Are you sure?","You want to delete this data!","warning");
            if (confirmation) {
                let url = window.location.origin + "/atlets/" + data_id;
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: data_id
                    },
                    success: function (data) {
                      if(data.error){
                        var element = document.getElementById("not-delete-alert");
                        element.classList.remove("d-none");
                        setTimeout(()=>{
                          element.classList.add("d-none");
                        }, 3000);
                        return;
                      }
                      var table =  $(".yajra-datatable").DataTable();
                      table.ajax.reload();
                      var element = document.getElementById("delete-alert");
                      element.classList.remove("d-none");
                      setTimeout(()=>{
                        element.classList.add("d-none");
                      }, 3000);
                      $.ajax({
                        url: window.location.origin + "/atlets",
                        success: function(data){
                         
                        }
                      });
                    },
                    error: function (data) {
                        $(location).attr('href', window.location.origin + "/atlets");
                    }
                });
            }
        });

  });

  function datatable() {
    $table = $('.yajra-datatable').DataTable({
      destroy: true,
      processing: true,
      serverSide: true,
      ajax: `{{ url('atlet-list') }}`,
      columns: [{
              data: 'DT_RowIndex',
              name: 'DT_RowIndex'
          },
          {
              data: 'nama',
              name: 'nama'
          },
          {
              data: 'tanggal_lahir',
              name: 'tanggal_lahir'
          },
          {
              data: 'tempat_lahir',
              name: 'tempat_lahir'
          },
          {
              data: 'jenis_kelamin',
              name: 'jenis_kelamin'
          },
          {
              data: 'agama',
              name: 'agama'
          },
          {
              data: 'status',
              name: 'status'
          },
          {
              data: 'nik',
              name: 'nik'
          },
          {
              data: 'alamat',
              name: 'alamat'
          },
          {
              data: 'kode_pos',
              name: 'kode_pos'
          },
          {
              data: 'nama_sekolah',
              name: 'nama_sekolah'
          },
          {
              data: 'club_id',
              name: 'club_id'
          },
          {
              data: 'tinggi',
              name: 'tinggi'
          },
          {
              data: 'berat',
              name: 'berat'
          },
          {
              data: 'telepon',
              name: 'telepon'
          },
          {
              data: 'nama_ayah',
              name: 'nama_ayah'
          },
          {
              data: 'nama_ibu',
              name: 'nama_ibu'
          },
          {
              data: 'telepon_wali',
              name: 'telepon_wali'
          },
          {
              data: 'nama_kejuaraan',
              name: 'nama_kejuaraan'
          },
          {
              data: 'tahun_kejuaraan',
              name: 'tahun_kejuaraan'
          },
          {
              data: 'tingkat_kejuaraan',
              name: 'tingkat_kejuaraan'
          },
          {
              data: 'tempat_kejuaraan',
              name: 'tempat_kejuaraan'
          },
          {
              data: 'sertifikat',
              name: 'sertifikat'
          },
          {
              data: 'action',
              name: 'action',
              orderable: false,
              searchable: false
          },
      ]
    });
  }
</script>
@endsection