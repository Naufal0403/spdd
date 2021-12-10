@extends('layout.main')

@section('content')
<button class="btn btn-primary" data-toggle="modal" data-target="#tambahKeuangan">Tambah keuangan</button>

<div class="card">
    <div class="card-header">
      <h1 align="center">Rincian Keuangan</h1>
    </div>
    <br>

    <div class="card-body">
      <table id="myTable">
          <thead>
              <th>tanggal</th>
              <th>Pemasukan</th>
              <th>Pengeluaran</th>
              <th>Keterangan</th>
              {{-- <th>Foto Usaha</th> --}}
              <th>Action</th>
            </thead>
            <tbody>
                @foreach ($uang as $u)
                <tr>
                    <td>{{$u->tanggal}}</td>
                    <td>{{$u->pemasukan}}</td>
                    <td>{{$u->pengeluaran}}</td>
                    <td>{{$u->keterangan}}</td>
                    {{-- <td>{{$b->fotoUsaha}}</td> --}}
                    <td>
                        <button class="btn btn-warning btn-editKeuangan" data-tgl="{{$u->tanggal}}" data-url="{{route('keuangan.update',$u->id)}}" data-pemasukan="{{$u->pemasukan}}" data-pengeluaran="{{$u->pengeluaran}}" data-keterangan="{{$u->keterangan}}" data-toggle="modal" data-target="#editKeuangan">edit</button>

                        <form action="{{route('keuangan.destroy', $u->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                        <button class="btn btn-danger" type="submit" onclick="return confirm('apakah anda yakin akan menghapus data ini?')">HAPUS</button>
                    </form>
                    </td>
                </tr>

                @endforeach
            </tbody>
      </table>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>
    $('.btn-editKeuangan').on('click', function () {
        let url = $(this).data('url')
        let tgl = $(this).data('tgl')
        let masuk = $(this).data('pemasukan')
        let keluar = $(this).data('pengeluaran')
        let ket = $(this).data('keterangan')
        $('.url').attr('action', url)
        $('.tanggal').val(tgl)
        $('.pemasukan').val(masuk)
        $('.pengeluaran').val(keluar)
        $('.keterangan').val(ket)
    })
</script>
@endsection

@section('modal')
<div class="modal fade" id="tambahKeuangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('keuangan.store')}}" method="POST">
                @csrf
                {{-- <input type="text" value="{{Auth::user()->id}}" name=""> --}}
                <div class="form-group">
                    <label for="">Tanggal Transaksi</label>
                    <input type="date" class="form-control" name="tanggal" id="tanggal">
                </div>
                <div class="form-group">
                    <label for="">Pemasukan</label>
                    <input type="text"  class="form-control" name="pemasukan" id="pemasukan">
                </div>
                <div class="form-group">
                    <label for="">Pengeluaran</label>
                    <input type="text" class="form-control" name="pengeluaran" id="pengeluaran">
                </div>
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" id="keterangan">
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </div>
        {{-- <div class="modal-footer">

        </div> --}}
      </div>
    </div>
  </div>


  {{-- EDIT KEUANGAN --}}

  <div class="modal fade" id="editKeuangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" class="url" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Tanggal Transaksi</label>
                    <input type="date" class="form-control tanggal" name="tanggal" id="tanggal">
                </div>
                <div class="form-group">
                    <label for="">Pemasukan</label>
                    <input type="text"  class="form-control pemasukan" name="pemasukan" id="pemasukan">
                </div>
                <div class="form-group">
                    <label for="">Pengeluaran</label>
                    <input type="text" class="form-control pengeluaran" name="pengeluaran" id="pengeluaran">
                </div>
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <input type="text" class="form-control keterangan" name="keterangan" id="keterangan">
                </div>
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
