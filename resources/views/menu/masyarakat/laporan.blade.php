@extends('layout.main')

@section('content')

        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#createLaporan">Tambah Laporan</a>
        <table id="myTable">
            <thead>
                <th>Judul</th>
                <th>Isi</th>
                <th>Gambar</th>
                <th>Status</th>
                <th>aksi</th>
            </thead>
            <tbody>
                @foreach ($laporan as $l)
                <tr>
                    <td>{{$l->judul}}</td>
                    <td>{{$l->isi}}</td>
                    <td><img src="{{asset('storage/'.$l->gambar)}}" alt="" width="100px"></td>
                    <td> @if ($l->status == 0)
                        <span class="alert alert-danger">Unconfirmed</span>
                        @else
                        <span class="alert alert-success">Confirmed</span>
                    @endif</td>
                    <td>
                        <a data-toggle="modal" data-target="#editLaporan" data-id="{{$l->id}}" data-judul="{{$l->judul}}" data-isi="{{$l->isi}}" data-link="{{route('daftar-laporan.update', $l->id)}}" data-gambar="{{asset('storage/'.$l->gambar)}}" class="btn btn-warning editLaporan">edit</a>
                        <form action="{{route('daftar-laporan.destroy', $l->id)}}" method="POST">
                          @csrf
                          @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script>
            $('.editLaporan').on('click', function () {
                var id = $(this).data('id')
                var judul = $(this).data('judul')
                var isi = $(this).data('isi')
                var gambar = $(this).data('gambar')
                var link = $(this).data('link')
                $('.judul').val(judul)
                $('.isi').val(isi)
                // $('.gambar').val(gambar)
                $('.link').attr('action', link)
                // $('.link-u').val(link)
                // console.log(link);
            })
        </script>
@endsection

@section('modal')
<div class="modal fade" id="createLaporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{route('daftar-laporan.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Judul</label>
                <input type="text" class="form-control" name="judul" id="judul">
            </div>
            <div class="form-group">
                <label for="">Isi</label>
                {{-- <input type="text" class="form-control" name="isi" id="isi"> --}}
                <textarea name="isi" id="" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="">Gambar</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="gambar" id="inputGroupFile03">
                    <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                  </div>
            </div>
            {{-- <div class="form-group">
                <label for="">Judul</label>
                <input type="text" name="judul" id="judul">
            </div> --}}
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
        {{-- <div class="modal-footer">

        </div> --}}
      </div>
    </div>
  </div>

  {{-- EDIT --}}
<div class="modal fade" id="editLaporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="" class="link" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- <input type="text" class="link-u" name="" id=""> --}}
            <div class="form-group">
                <label for="">Judul</label>
                <input type="text" class="form-control judul" name="judul" id="judul">
            </div>
            <div class="form-group">
                <label for="">Isi</label>
                {{-- <input type="text" class="form-control" name="isi" id="isi"> --}}
                <textarea name="isi" id="" class="form-control isi" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="">Gambar</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input gambar" name="gambar" id="inputGroupFile03">
                    <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                  </div>
            </div>
            {{-- <div class="form-group">
                <label for="">Judul</label>
                <input type="text" name="judul" id="judul">
            </div> --}}
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
        {{-- <div class="modal-footer">

        </div> --}}
      </div>
    </div>
  </div>
@endsection
