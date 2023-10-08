@extends('layout.main')
@section('navbar-title')
<span class="ml-3">Data Karyawan</span>
@endsection
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Data</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tambah Data</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form action={{ route('user.store')}} method="POST">
          @csrf
        <div class="row d-flex justify-content-center">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama" name="nama">
                    @error('name')
                      <small style="color: red">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Belakang</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Belakang" name="nama_belakang">
                    @error('nama_belakang')
                      <small style="color: red">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Email" name="email">
                    @error('email')
                      <small style="color: red">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Password" name="password">
                    @error('password')
                      <small style="color: red">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Telepon</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan No telepon" name="telepon">
                    @error('telepon')
                      <small style="color: red">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" rows="3" placeholder="Tulis Alamat" name="alamat"></textarea>
                  </div>
                  @error('alamat')
                    <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        </form>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content -->
</div>
@endsection