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
          <a href="{{ route('players.create') }}" type="button" class="btn btn-primary btn-rounded mr-4">
            + Add New Record
          </a>

          <a href="{{ route('players.report') }}" type="button" class="btn btn-success btn-rounded">
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
                      <th>Club</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>NIK</th>
                      <th>Age</th>
                      <th>Address</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Handed</th>
                      <th>Bet Wood</th>
                      <th>Front Hand Rubber</th>
                      <th>Back Hand Rubber</th>
                      <th>Action</th>
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
            let url = "players/" + data_id;
            $(location).attr('href', url);
        });

        $('body').on('click', '#edit', function () {
            let data_id = $(this).data('id');
            let url = "players/" + data_id + "/edit";
            $(location).attr('href', url);
        });

        $('body').on('click', '#delete',async function () {
            let data_id = $(this).data("id");
            let confirmation = await showDialog("Are you sure?","You want to delete this data!","warning");
            if (confirmation) {
                let url = window.location.origin + "/players/" + data_id;
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
                        url: window.location.origin + "/players",
                        success: function(data){
                        }
                      });
                    },
                    error: function (data) {
                        $(location).attr('href', window.location.origin + "/players");
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
      ajax: `{{ url('player-list') }}`,
      columns: [{
              data: 'DT_RowIndex',
              name: 'DT_RowIndex'
          },
          {
              data: 'club_id',
              name: 'club_id'
          },
          {
              data: 'first_name',
              name: 'first_name'
          },
          {
              data: 'last_name',
              name: 'last_name'
          },
          {
              data: 'nik',
              name: 'nik'
          },
          {
              data: 'date_of_birth',
              name: 'date_of_birth'
          },
          {
              data: 'address',
              name: 'address'
          },
          {
              data: 'city',
              name: 'city'
          },
          {
              data: 'state',
              name: 'state'
          },
          {
              data: 'handed',
              name: 'handed'
          },
          {
              data: 'bet_wood',
              name: 'bet_wood'
          },
          {
              data: 'fh_rubber',
              name: 'fh_rubber'
          },
          {
              data: 'bh_rubber',
              name: 'bh_rubber'
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