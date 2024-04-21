@extends('layouts.adminmaster')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User Edit</h1>
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
                    <form method="POST" action="/user/edit">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id}}">
                        <p>Name:<input type="text" name="name" value="{{$user->name}}"></p>
                        <p>Email:<input type="text" name="email" value="{{$user->email}}"></p>
                        <p>Password:<input type="password" name="password"></p>
                        <p>Role:
                            <select name="role">
                                <option value="1" @if($user->role==1) selected @endif>Director</option>
                                <option value="2" @if($user->role==2) selected @endif>Admin</option>
                                <option value="3" @if($user->role==3) selected @endif>Client</option>
                                <option value="4" @if($user->role==4) selected @endif>Unknown</option>
                            </select>
                        </p>
                        <input type="submit" name="submit">
                    </form>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <div>
                        <a href="/users">
                            <button type="button" class="btn-dark" >Back</button>
                        </a>
                        <a href="/user/view?id={{$user->id}}">
                            <button type="button" class="btn-dark" >view</button>
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
