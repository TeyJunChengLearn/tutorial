@extends('layouts.adminmaster')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User View</h1>
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
                    <p>Name: {{$user->name}}</p>
                    <p>Email: {{$user->email}}</p>
                    <p>Created@: {{$user->created_at}}</p>
                    <p>Update@: {{$user->updated_at}}</p>
                    <p>
                        Role: @switch($user->role)
                        @case("1")
                            Director
                            @break
                        @case("2")
                            Admin
                            @break
                        @case("3")
                            Client
                            @break
                        @default
                            Unknown
                            @break
                    @endswitch
                    </p>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <div>
                        <a href="/users">
                            <button type="button" class="btn-dark" >Back</button>
                        </a>
                        <a href="/user/edit?id={{$user->id}}">
                            <button type="button" class="btn-dark" >Edit</button>
                        </a>
                        <a href="#" onclick="confirmDelete({{ $user->id }})">
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
            window.location.href = "/user/delete?id=" + userId;
        } else {
            // If the user cancels, do nothing
        }
    }
</script>
@endsection
