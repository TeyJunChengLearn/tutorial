@extends('layouts.adminmaster')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Account</h1>
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
                    <form method="POST" action="/account/add">
                        @csrf
                        <input type="hidden" name="userid" value="{{ $userid}}">
                        <p>description:<input type="text" name="description"></p>
                        <p>date:<input type="date" name="date"></p>
                        <p>Debit Subtotal:<input type="number" name="debitsubtotal"></p>
                        <p>Credit Subtotal:<input type="number" name="creditsubtotal"></p>
                        <p>Account Category:
                            <select name="accountcategory_id">
                                @foreach ($accountcategoriesdatas as $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
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
                            <button type="button" class="btn-dark" >Cancel</button>
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
@endsection
