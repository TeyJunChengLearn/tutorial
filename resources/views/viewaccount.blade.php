@extends('layouts.adminmaster')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Account View</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <!-- Default box -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title"></h3>
                  </div>
                  <div class="card-body">
                    <p>Description: {{$data->description}}</p>
                    <p>Group: {{$data->accountCategory->name}}</p>
                    <p>Date: {{$data->date}}</p>
                    <p>Debit: {{$data->debitsubtotal}}</p>
                    <p>Credit: {{$data->creditsubtotal}}</p>
                    <p>Total: {{$data->debitsubtotal - $data->creditsubtotal}}</p>
                    <p>Created@: {{$data->created_at}}</p>
                    <p>Update@: {{$data->updated_at}}</p>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <div>
                        <a href="/account">
                            <button type="button" class="btn-dark" >Back</button>
                        </a>
                        <a href="/account/edit?accountid={{ $data->id }}">
                            <button type="button" class="btn-dark" >Edit</button>
                        </a>
                        <a href="#" onclick="confirmDelete({{ $data->id }})">
                            <button type="button" class="btn-dark" >Delete</button>
                        </a>
                    </div>
                  </div>
                  <!-- /.card-footer-->
                </div>
                <!-- /.card -->
              </div>
            </div>
          </div>
    </section>
    <!-- /.content -->
  </div>
  <script>
    function confirmDelete(userId) {
        var confirmation = confirm("Are you sure you want to delete this user?");

        if (confirmation) {
            // If the user confirms, perform the delete action
            window.location.href = "/account/delete?accountid=" + userId;
        } else {
            // If the user cancels, do nothing
        }
    }
</script>
@endsection
