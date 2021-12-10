@extends('layout.main')

@section('content')

<a href="" data-toggle="modal" data-target="#editDl" class="btn btn-primary">Buat Deadline</a>
<div class="card">
    {{-- <div class="card-header">
      <h1 align="center">DAFTAR LAPORAN</h1>
    </div> --}}
    <br>
    <div class="card-body">
      <table id="myTable">
          <thead>
              <th>Nama</th>
              <th>Email</th>
              <th>Alamat</th>
              <th>Tempat Lahir</th>
              <th>Deadline</th>
              <th>Action</th>
            </thead>
            <tbody>
                @foreach ($user as $u)
                <tr>
                    <td>{{$u->name}}</td>
                    <td>{{$u->email}}</td>
                    <td>{{$u->alamat}}</td>
                    <td>{{$u->tempat_lahir}}</td>
                    {{-- <td>{{$b->fotoUsaha}}</td> --}}
                    <td>
                        {{-- {{strtotime(date("Y-m-d")) }} --}}
                        {{-- {{(strtotime($u->deadline)  - strtotime(date("Y-m-d")))/(3600*24)}} --}}
                        @if ($u->deadline == '' || (strtotime($u->deadline)  - strtotime(date("Y-m-d"))/(3600*24)) <= 0)
                            <button class="btn btn-primary btn-editDl" data-toggle="modal" data-target="#editDl" data-deadline="{{$u->deadline}}"  data-url="{{route('list-user.update', $u->id)}}" data-deadline="{{\Carbon\Carbon::createFromDate($u->deadline)->format('Y-m-d')}}">Tambah Deadline</button>
                        @else
                        {{$u->deadline}} &nbsp; <form action="{{route('ubah-deadline',$u->id)}}" method="GET">@csrf<button type="submit" class="btn btn-primary">Ubah deadline</button></form>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex">
                            <button class="btn btn-warning btn-editUser" data-toggle="modal" data-target="#editDeadline" data-id="{{$u->id}}" data-name="{{$u->name}}" data-email="{{$u->email}}" data-alamat="{{$u->alamat}}" data-url="{{route('list-user.update', $u->id)}}" data-deadline="{{\Carbon\Carbon::createFromDate($u->deadline)->format('Y-m-d')}}" data-tempat_lahir="tempat_lahir">edit</button>
                            <form action="{{route('user.destroy',$u->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                            <button type="submit"  class="btn btn-danger">hapus</button>
                            </form>
                            <a href="{{route('rinci-user',$u->id)}}"  class="btn btn-danger">Keuangan</a>
                            <a href="{{route('lapor-user',$u->id)}}"  class="btn btn-danger">Laporan</a>
                        </div>
                    </td>
                </tr>

                @endforeach
            </tbody>
      </table>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>
    $('.btn-editUser').on('click', function () {
        // console.log('COBA');
        let name = $(this).data('name')
        // let id = $(this).data('id')
        let url = $(this).data('url')
        let tLahir = $(this).data('tempat_lahir')
        let email = $(this).data('email')
        let alamat = $(this).data('alamat')
        let deadline = $(this).data('deadline')
        $('.deadline').val(deadline)
        $('.alamat').val(alamat)
        $('.email').val(email)
        $('.name').val(name)
        $('.tempat_lahir').val(tLahir)
        $('.url').attr('action', url)
        console.log(deadline);
    })

    $('.btn-editDl').on('click', function () {
        // console.log('COBA');
        // let name = $(this).data('name')
        // let id = $(this).data('id')
        let url = $(this).data('url')
        // let tLahir = $(this).data('tempat_lahir')
        // let email = $(this).data('email')
        // let alamat = $(this).data('alamat')
        let deadline = $(this).data('deadline')
        $('.deadline').val(deadline)
        // $('.alamat').val(alamat)
        // $('.email').val(email)
        // $('.name').val(name)
        // $('.tempat_lahir').val(tLahir)
        $('.url').attr('action', url)
        console.log(deadline);
    })
</script>
@endsection


@section('modal')
<div class="modal fade" id="editDeadline" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Deadline</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" class="url" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" class="form-control name" name="name" >
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control email" name="email" >
            </div>
            <div class="form-group">
                <label for="">Tempat lahir</label>
                <input type="text" class="form-control tempat_lahir" value="" name="tempat_lahir" >
            </div>
            <div class="form-group">
                <label for="">alamat</label>
                <input type="text" class="form-control alamat" name="alamat" >
            </div>
            <div class="form-group">
                <label for="">Deadline Laporan</label>
                <input type="date" name="deadline" id="deadline" class="form-control deadline">
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

  {{-- EDIT DEADLINE --}}
<div class="modal fade" id="editDl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Deadline</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('deadline')}}" class="url" method="POST">
            @csrf
            {{-- @method('PUT') --}}
            <div class="form-group">
                <label for="">Deadline Laporan</label>
                <input type="date" name="deadline" id="deadline" class="form-control deadline">
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
