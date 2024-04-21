@extends('layouts.adminmaster')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Account Edit</h1>
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
                    <form method="POST" action="/account/edit">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id}}">
                        <p>description:<input type="text" name="description" value="{{$data->description}}"></p>
                        <p>date:<input type="date" name="date" value="{{$data->date}}"></p>
                        <p>Debit Subtotal:<input type="number" name="debitsubtotal" value="{{$data->debitsubtotal}}"></p>
                        <p>Credit Subtotal:<input type="number" name="creditsubtotal" value="{{$data->creditsubtotal}}"></p>
                        <p>Account Category:
                            <select name="accountcategory_id">
                                @foreach ($accountcategoriesdatas as $accountcategorydata)
                                <option value="{{$accountcategorydata->id}}" @if($data->accountcategory_id==$accountcategorydata->id) selected @endif>{{$accountcategorydata->name}}</option>
                                @endforeach
                            </select>
                        </p>
                        <input type="submit" name="submit">
                    </form>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <div>
                        <a href="/account/category">
                            <button type="button" class="btn-dark" >Back</button>
                        </a>
                        <a href="/account/view?accountcategoryid={{$data->id}}">
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
            window.location.href = "/account/delete?accountid=" + userId;
        } else {
            // If the user cancels, do nothing
        }
    }
</script>
@endsection
