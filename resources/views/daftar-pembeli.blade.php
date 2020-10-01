@extends('layouts.master-admin')

@section('content')
<br>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahPembeliModal">
    Tambah Pembeli
</button>
<!-- Add Modal -->
<div class="modal fade" id="tambahPembeliModal" tabindex="-1" role="dialog" aria-labelledby="tambahPembeliModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPembeliModalLabel">Tambah Pembeli</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('tambah-pembeli') }}" method="post">
                {{ csrf_field() }}
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
                    <div class="form-group">
                        <label for="statusVerifikasi">Status Verifikasi</label>
                        <select name="statusVerifikasi" id="statusVerifikasi" class="form-control">
                            <option>aktif</option>
                            <option>nonaktif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="latitude">Latitude</label>
                        <input type="number" step="any" class="form-control" name="latitude" required id="latitude">
                    </div>
                    <div class="form-group">
                        <label for="longitude">Longitude</label>
                        <input type="number" step="any" class="form-control" name="longitude" required id="longitude">
                    </div>
                    <div class="form-group">
                        <label for="noTelp">Nomor Telepon</label>
                        <input type="number" class="form-control" name="noTelp" required id="noTelp">
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
<div class="modal fade" id="editPembeliModal" tabindex="-1" role="dialog" aria-labelledby="editPembeliModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPembeliModalLabel">Edit Pembeli</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('edit-pembeli') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="idEdit">ID</label>
                        <input type="text" class="form-control" name="id" readonly id="idEdit">
                    </div>
                    <div class="form-group">
                        <label for="namaEdit">Nama</label>
                        <input type="text" class="form-control" name="nama" required id="namaEdit">
                    </div>
                    <div class="form-group">
                        <label for="emailEdit">Email</label>
                        <input type="email" class="form-control" required name="email" id="emailEdit">
                    </div>
                    <div class="form-group">
                        <label for="passwordEdit">Password</label>
                        <input type="password" class="form-control" required name="password" id="passwordEdit">
                    </div>
                    <div class="form-group">
                        <label for="statusVerifikasiEdit">Status Verifikasi</label>
                        <select name="statusVerifikasi" id="statusVerifikasiEdit" class="form-control">
                            <option>aktif</option>
                            <option>nonaktif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="latitudeEdit">Latitude</label>
                        <input type="number" step="any" class="form-control" name="latitude" required id="latitudeEdit">
                    </div>
                    <div class="form-group">
                        <label for="longitudeEdit">Longitude</label>
                        <input type="number" step="any" class="form-control" name="longitude" required
                            id="longitudeEdit">
                    </div>
                    <div class="form-group">
                        <label for="noTelpEdit">Nomor Telepon</label>
                        <input type="number" class="form-control" name="noTelp" required id="noTelpEdit">
                    </div>
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
<div class="modal modal-danger fade" id="deletePembeliModal" tabindex="-1" role="dialog"
    aria-labelledby="deletePembeliModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletePembeliModalLabel">Konfirmasi Hapus Pembeli</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('hapus-pembeli') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <h5 class="text-center"> Yakin akan menghapus pembeli ini?</h5>
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
            {{-- <form action="{{route('user.search-admin') }}" method="get">
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
                            <th>Status Verifikasi</th>
                            <th>Lokasi</th>
                            <th>No Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pembeli as $item)
                            <tr>
                                <td>{{ $item->id() }}</td>
                                <td>{{ $item['nama'] }}</td>
                                <td>{{ $item['email'] }}</td>
                                <td>{{ $item['statusVerifikasi'] }}</td>
                                <td>{{ $item['lokasi']->latitude().' , '.$item['lokasi']->longitude() }}
                                </td>
                                <td>{{ $item['noTelp'] }}</td>
                                <td>
                                    <button class="btn btn-info" data-toggle="modal" data-id="{{ $item->id() }}"
                                        data-nama="{{ $item['nama'] }}"
                                        data-email="{{ $item['email'] }}"
                                        data-statusverifikasi="{{ $item['statusVerifikasi'] }}"
                                        data-longitude="{{ $item['lokasi']->longitude() }}"
                                        data-latitude="{{ $item['lokasi']->latitude() }}"
                                        data-notelp="{{ $item['noTelp'] }}"
                                        data-target="#editPembeliModal">Edit</button>
                                    /
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#deletePembeliModal"
                                        data-id="{{ $item->id() }}">Hapus</button>
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
            {{-- {{$admin->links() }} --}}
        </div>
    </div>
</div>
@endsection
