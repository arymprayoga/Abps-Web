@extends('layouts.master-admin')

@section('content')
<br>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Tambah Admin
</button>
<!-- Add Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('tambah-admin')}}" method="post">
            {{csrf_field()}}
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" required id="nama">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" required name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" required name="password" id="password">
                </div>
            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  {{-- End Of Add Modal --}}

  {{-- Edit Modal --}}
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Admin</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('edit-admin')}}" method="post">
            {{csrf_field()}}
            <div class="modal-body">
                <div class="form-group">
                    <label for="id">ID</label>
                    <input readonly type="text" class="form-control" name="id" id="idEdit">
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="namaEdit">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="emailEdit">
                </div>
                {{-- <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="passwordEdit">
                </div> --}}
            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  {{-- End Of Edit Modal --}}

  {{-- Delete Modal --}}
  <div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Admin</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('hapus-admin')}}" method="post">
            {{csrf_field()}}
            <div class="modal-body">
                <h5 class="text-center"> Yakin akan menghapus admin ini?</h5>
                <input type="hidden" name="id" id="idDelete" value="">
            </div>
            <div class="modal-footer">
                <button button type="button" class="btn btn-secondary">Tidak</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  {{-- End Of Delete Modal --}}

  <br><br>
<div class="row">
    <div class="col-12">
      <div class="card">
      {{-- <form action="{{route('user.search-admin')}}" method="get">
        <div class="card-header">
          <h3 class="card-title">Daftar Admin</h3>
          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>        
        </div>
    </form> --}}
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap text-center">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($admin as $item)
                    <tr>
                        <td>{{$item->id()}}</td>
                        <td>{{$item['nama']}}</td>
                        <td>{{$item['email']}}</td>
                        <td>
                        <button class="btn btn-info" data-toggle="modal" data-id="{{$item->id()}}" data-nama="{{$item['nama']}}"
                        data-email="{{$item['email']}}" data-target="#editModal">Edit</button>
                             / 
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{$item->id()}}">Hapus</button>
                      </td>
                    </tr>
                @endforeach              
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <div class="container">
      {{-- {{$admin->links()}} --}}
    </div>
    </div>
  </div>
@endsection