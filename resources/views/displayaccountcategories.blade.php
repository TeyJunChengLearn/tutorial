@extends('layouts.adminmaster')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Account Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List</h3>

                <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                    </button>
                    </div>
                </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0" style="height: 650px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                        <th style="width:50px;">control</th>
                        <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data )
                            <tr>
                                <td>
                                    <a href="/account/category/edit?accountcategoryid={{$data->id}}"><ion-icon name="pencil-outline"></ion-icon></a>
                                    <a href="/account/category/view?accountcategoryid={{$data->id}}"><ion-icon name="eye-outline"></ion-icon></a>
                                    <a href="#" onclick="confirmDelete({{ $data->id }})"><ion-icon name="trash-outline"></ion-icon></a>
                                </td>
                                <td>{{$data->name}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        <a href="/account/category/add"><button class="btn btn-dark" type="submit">Add new Category</button></a>
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
