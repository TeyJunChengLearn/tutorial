@extends('layouts.adminmaster')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Accounts</h1>
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
                <h3 class="card-title">Accounts</h3>

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
                        <th>Description</th>
                        <th>group</th>
                        <th>date</th>
                        <th>debit</th>
                        <th>credit</th>
                        <th>total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($accountdatas as $data )
                            <tr>
                                <td>
                                    <a href="/account/edit?accountid={{$data->id}}"><ion-icon name="pencil-outline"></ion-icon></a>
                                    <a href="/account/view?accountid={{$data->id}}"><ion-icon name="eye-outline"></ion-icon></a>
                                    <a href="#" onclick="confirmDelete({{ $data->id }})"><ion-icon name="trash-outline"></ion-icon></a>
                                </td>
                                <td>{{$data->description}}</td>
                                <td>{{$data->accountCategory->name}}</td>
                                <td>{{$data->date}}</td>
                                <td>{{$data->debitsubtotal}}</td>
                                <td>{{$data->creditsubtotal}}</td>
                                <td>{{$data->debitsubtotal - $data->creditsubtotal}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        <a href="#" onclick="preventadd()"><button class="btn btn-dark" type="submit">Add new Account</button></a>
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
    function preventadd(){
        if({{$accountcategoriescount}}<=0){
            alert("you have no account categories");
        }else{
            window.location.href = "/account/add";
        }
    }
</script>
@endsection
