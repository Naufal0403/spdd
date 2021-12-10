@extends('layout.main')

@section('content')
<div>

</div>
    <div class="row d-flex justify-content-around">
        <div class="col-md-3">
            <div class="text-center">
                @if ($user->profile_photo_path == 'images/no-profile.png')
                <img src="{{asset($user->profile_photo_path)}}" alt="">
                @else
                <img src="{{asset('storage/'.$user->profile_photo_path)}}" class="rounded img-fluid" alt="">

                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="row d-flex justify-content-around">
                <div class="col-md-4">Nama</div>
                <div class="col-md-6">: {{$user->name}}</div>
                <div class="col-md-4">Email</div>
                <div class="col-md-6">: {{$user->email}}</div>
                <div class="col-md-4">NIK</div>
                <div class="col-md-6">: {{$user->nik}}</div>
                <div class="col-md-4">Tempat lahir</div>
                <div class="col-md-6">: {{$user->tempat_lahir}}</div>
                <div class="col-md-4">Tanggal Lahir</div>
                <div class="col-md-6">: {{$user->tanggal_lahir}}</div>
                <div class="col-md-4">Telepon</div>
                <div class="col-md-6">: {{$user->telepon}}</div>
                <div class="col-md-4">Umur</div>
                <div class="col-md-6">: {{$user->umur}}</div>
            </div>
        </div>

    </div>
    <div class="col-md-2 ml-auto"><a href="" data-toggle="modal" data-target="#editAkun" class="btn btn-warning btn-editAkun" data-name="{{$user->name}}" data-email="{{$user->email}}" data-nik="{{$user->nik}}" data-lahir="{{$user->tempat_lahir}}" data-tanggal-lahir = "{{$user->tanggal_lahir}}" data-tglLahir="{{\Carbon\Carbon::createFromDate($user->tanggal_lahir)->format('Y-m-d')}}" data-telepon="{{$user->telepon}}" data-umur="{{$user->umur}}" data-alamat="{{$user->alamat}}" data-url="{{route('myprofile.update', $user->id)}}">Edit</a></div>

@endsection


@section('modal')
<div class="modal fade" id="editAkun" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Akun</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form  class="url" action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" class="form-control name" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">NIK</label>
                  <input type="text" class="form-control nik" name="nik" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">tempat lahir</label>
                  <input type="text" class="form-control tempat_lahir" name="tempat_lahir" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal Lahir</label>
                  <input type="date" class="form-control tanggal_lahir" name="tanggal_lahir" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Telepon</label>
                  <input type="text" class="form-control telepon" name="telepon" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Umur</label>
                  <input type="text" class="form-control umur" name="umur" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  <input type="text" class="form-control alamat" name="alamat" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">email</label>
                  <input type="text" class="form-control email" name="email" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Foto Profil</label>
                  <input type="file" class="custom-file-input profile_photo_path" id="exampleInputPassword1">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="profile_photo_path" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>
@endsection
