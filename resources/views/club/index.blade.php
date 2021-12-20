@extends('layouts.template.app')
@section('title', 'Club List')

@section('contents')
<div class="page-wrapper">
  <div id="delete-alert" class="alert alert-success d-none">
    Data have been removed
   </div>
   <div id="delete-alert-fail" class="alert alert-danger d-none">
    Can not delete the club since 1 or more players is registered under this club!
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
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Club List</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-muted">Home</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Club</li>
                    </ol>
                </nav>
            </div>
        </div>
      </div>
      <div class="col-6">
          <div class="nav-item float-right">
            <a href="{{ route('clubs.create') }}" type="button" class="btn btn-primary btn-rounded mr-4">
              + Add New Record
            </a>

            <a href="{{ route('club.report') }}" type="button" class="btn btn-success btn-rounded">
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
                      <th>Name</th>
                      <th>Leader</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>City</th>
                      <th>State</th>
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
            let url = "clubs/" + data_id;
            $(location).attr('href', url);
        });

        $('body').on('click', '#edit', function () {
            let data_id = $(this).data('id');
            let url = "clubs/" + data_id + "/edit";
            $(location).attr('href', url);
        });

        $('body').on('click', '#delete',async function () {
            let data_id = $(this).data("id");
            let confirmation = await showDialog("Are you sure?","You want to delete this data!","warning");
            if (confirmation) {
                let url = window.location.origin + "/clubs/" + data_id;
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
                        url: window.location.origin + "/clubs",
                        success: function(data){
                          updateBadge(data);
                        }
                      });
                    },
                    error: function (data) {
                      var element = document.getElementById("delete-alert-fail");
                      element.classList.remove("d-none");
                      setTimeout(()=>{
                        element.classList.add("d-none");
                      }, 3000);
                        // $(location).attr('href', window.location.origin + "/clubs");
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
      ajax: `{{ url('club-list') }}`,
      columns: [{
              data: 'DT_RowIndex',
              name: 'DT_RowIndex'
          },
          {
              data: 'name',
              name: 'name'
          },
          {
              data: 'leader',
              name: 'leader'
          },
          {
              data: 'phone',
              name: 'phone'
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