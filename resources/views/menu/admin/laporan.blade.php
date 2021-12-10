@extends('layout.main')

@section('content')

        {{-- <a href="" class="btn btn-primary" data-toggle="modal" data-target="#createLaporan">Tambah Laporan</a> --}}
        <table id="myTable">
            <thead>
                <th>Judul</th>
                <th>Isi</th>
                <th>Gambar</th>
                <th>Status</th>

            </thead>
            <tbody>
                @foreach ($lapor as $l)
                <tr>
                    <td>{{$l->judul}}</td>
                    <td>{{$l->isi}}</td>
                    <td><img src="{{asset('storage/'.$l->gambar)}}" alt="" width="100px"></td>
                    <td>
                        <select name="status" id="" class="status" data-id="{{$l->id}}">
                            @if ($l->status == 0)
                            <option value="0" selected>Unconfirmed</option>
                            <option value="1">Confirmed</option>
                            @else
                            <option value="0" >Unconfirmed</option>
                            <option value="1" selected>Confirmed</option>
                            @endif

                        </select></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <script src="{{asset('paper-dashboard-master/assets/js/core/jquery.min.js')}}"></script>
         --}}
         <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script>
            $('.status').on('change', function () {
                var id = $(this).data('id');
                var status = $(this).val();
                console.log(id,status);
                $.ajax({
                    url : '/ubah-status',
                    type : 'GET',
                    dataType : 'JSON',
                    data : {
                        "id" : id,
                        "status" : status
                    },success:function data(data){
                        console.log(data);
                    }
                })
            })

        </script>
@endsection

