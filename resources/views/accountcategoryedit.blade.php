@extends('layouts.adminmaster')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Account Categories Edit</h1>
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
                    <h3 class="card-title">
                        @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                        @endif
                    </h3>
                  </div>
                  <div class="card-body">
                    <form method="POST" action="/account/category/edit">
                        @csrf
                        <input type="hidden" name="accountcategoryid" value="{{ $data->id}}">
                        <p>Name:<input type="text" name="name" value="{{$data->name}}"></p>
                        <input type="submit" name="submit">
                    </form>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <div>
                        <a href="/account/category">
                            <button type="button" class="btn-dark" >Back</button>
                        </a>
                        <a href="/account/category/view?accountcategoryid={{$data->id}}">
                            <button type="button" class="btn-dark" >view</button>
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
            window.location.href = "/account/category/delete?accountcategoryid=" + userId;
        } else {
            // If the user cancels, do nothing
        }
    }
</script>
@endsection
