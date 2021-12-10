@extends('layout.main')

@section('content')
<div>
    {{-- <img src="{{asset($user->name)}}" alt=""> --}}
    <form action="{{route('user.create')}}" enctype="multipart/form-data">
        {{-- <input type="file" name="photo" id="photo" value=""> --}}
        <a href="" data-toggle="modal" data-target="#"></a>
{{-- <input type="file" id="pic" name="pic" style="display:none" onchange="document.getElementById('filename').value=this.value">
<input type="text" id="filename" hidden>
<input type="button" value="Ganti Foto Profil" onclick="document.getElementById('pic').click()"> --}}
        {{-- <input type="file" class="filestyle" data-classButton="btn btn-primary" data-input="false" data-classIcon="icon-plus" data-buttonText="Your label here."> --}}
    </form>
</div>
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
    <div class="col-md-2 ml-auto"><a href="" data-toggle="modal" data-target="#editAkun" class="btn btn-warning btn-editAkun" data-url="{{route("myprofile.update", $user->id)}}" data-name="{{$user->name}}" data-email="{{$user->email}}" data-nik="{{$user->nik}}" data-lahir="{{$user->tempat_lahir}}" data-tglLahir="{{$user->tanggal_lahir}}" data-telepon="{{$user->telepon}}" data-umur="{{$user->umur}}" data-alamat="{{$user->alamat}}">Edit</a></div>

@endsection


@section('modal')

{{-- Edit foto --}}

{{-- Edit Akun --}}
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
            <form enctype="multipart/form-data" class="url" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" class="form-control name" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">NIK</label>
                  <input type="text" class="form-control nik" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">tempat lahir</label>
                  <input type="text" class="form-control tempat_lahir" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal Lahir</label>
                  <input type="date" class="form-control tanggal_lahir" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Telepon</label>
                  <input type="text" class="form-control telepon" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Umur</label>
                  <input type="text" class="form-control umur" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  <input type="text" class="form-control alamat" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">email</label>
                  <input type="text" class="form-control email" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Foto Profil</label>
                  <input type="file" name="" id="">
                  <input type="file" class="form-control custom-file-input profile_photo_path" id="exampleInputPassword1">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection
