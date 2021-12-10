@extends('layout.main')

@section('content')
<div class="card">
    <div class="card-header">
      <h1 align="center">DAFTAR LAPORAN</h1>
    </div>
    <br>
    <div class="card-body">
      <table id="myTable">
          <thead>
              <th>Nama</th>
              <th>Judul</th>
              <th>Isi</th>
              <th>Gambar</th>
              {{-- <th>Foto Usaha</th> --}}
              <th>Status</th>
            </thead>
            <tbody>
                @foreach ($laporan as $b)
                <tr>
                    <td>{{$b->user->name}}</td>
                    <td>{{$b->judul}}</td>
                    <td>{{$b->isi}}</td>
                    <td><a href="{{asset('storage/'.$b->gambar)}}"><img src="{{asset('storage/'.$b->gambar)}}" width="100px" alt=""></a></td>
                    {{-- <td>{{$b->fotoUsaha}}</td> --}}
                    <td>
                        <span class="btn btn-danger">Belum Disepakati</span>
                    </td>
                </tr>

                @endforeach
            </tbody>
      </table>

    </div>
</div>
@endsection
