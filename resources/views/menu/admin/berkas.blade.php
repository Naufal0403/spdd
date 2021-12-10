@extends('layout.main')


@section('content')
<div class="card">
    <div class="card-header">
      <h1 align="center">BERKAS PENDAFTARAN</h1>
    </div>
    <br>
    <div class="card-body">
      <table id="myTable">
          <thead>
              <th>Nama</th>
              <th>Pesan</th>
              <th>No. KK</th>
              <th>NIK</th>
              <th>Foto Usaha</th>
              <th>Status</th>
            </thead>
            <tbody>
                @foreach ($berkas as $b)
                <tr>
                    <td>{{$b->name_lengkap}}</td>
                    <td>{{$b->pesan}}</td>
                    <td>{{$b->nkk}}</td>
                    <td>{{$b->nik}}</td>
                    <td><a href="{{asset('storage/'.  $b->fotoUsaha )}}"><img src="{{asset('storage/'.  $b->fotoUsaha )}}" alt="" style="width: 100px"></a></td>
                    <td>
                        {{-- <input type="text" name="id" id="id" value="{{$b->id}}" hidden> --}}
                        <select class="custom-select change-status" id="change" data-id="{{$b->id}}">
                            @if ($b->status == 1)
                            <option value="0" >Belum Disetujui</option>
                            <option value="1" selected>Proses</option>
                            <option value="2" >Selesai</option>
                            @elseif ($b->status == 0)
                            <option value="0" selected>Belum Disetujui</option>
                            <option value="1" >Proses</option>
                            <option value="2" >Selesai</option>
                            @elseif ($b->status == 2)
                            <option value="0" >Belum Disetujui</option>
                            <option value="1" >Proses</option>
                            <option value="2" selected >Selesai</option>
                            @endif

                          </select>
                    </td>
                </tr>

                @endforeach
            </tbody>
      </table>

    </div>
</div>

{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    $('.change-status').on('change', function() {
        var status = $('#change').find(':selected').val();
        var id = $(this).data('id');
        console.log('coba' , id, status);
        $.ajax({
            dataType : 'JSON',
            url : '/change-berkas',
            type : 'GET',
            data : {
                "id" : id,
                "status" : status},
            success:function data(data){
                     console.log(data.success);
                 }
        })


    })
</script>
@endsection
