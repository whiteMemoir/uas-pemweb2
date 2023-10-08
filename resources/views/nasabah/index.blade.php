@extends('layout.main')
@section('navbar-title')
<span class="ml-3">Data Nasabah</span>
@endsection
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Nasabah</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
            <a href={{route('client.create')}} class="btn btn-success mb-3 mr-2 ml-auto "><i class="fas fa-plus"></i> &nbsp;Tambah Data</a>
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with minimal features & hover style</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nama</th>
                  <th>Nama Belakang</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($data as $d)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$d->nama}}</td>
                      <td>{{$d->nama_belakang}}</td>
                      <td>{{$d->email}}</td>
                      <td>{{$d->alamat}}</td>
                      <td>{{$d->telepon}}</td>
                      <td>
                        <a href="{{route('client.edit', ['id' => $d->id])}}" class="btn btn-primary"><i class="fas fa-pen"> Edit</i></a>
                        <a  data-toggle="modal" data-target="#modal-hapus" class="btn btn-danger"><i class="fas fa-trash"> Delete</i></a>
                      </td>
                    </tr>
                    <!-- MODAL -->
                    <div class="modal fade" id="modal-hapus">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Default Modal</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>Apakah kamu yakin ingin menghapus data <b>{{$d->name}}</b></p>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <form action="{{route('client.delete', ['id' => $d->id])}}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                              <button type="submit" class="btn btn-primary">Ya, hapus</button>
                            </form>
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    <!-- MODAL -->

                    </div>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection