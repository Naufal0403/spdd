@extends('layout.main')

@section('content')
<form action="{{route('berkas.store')}}" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">Nama Lengkap</label>
      <input type="text" name="name_lengkap" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">NIK</label>
      <input type="text" name="nik" class="form-control" id="exampleFormControlInput1" placeholder="35151XXXXX">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">No. Kartu Keluarga</label>
      <input type="text" name="nkk" class="form-control" id="exampleFormControlInput1" placeholder="35151XXXXX">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Telepon</label>
      <input type="text" name="telepon" class="form-control" id="exampleFormControlInput1" placeholder="35151XXXXX">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Umur</label>
      <input type="text" name="umur" class="form-control" id="exampleFormControlInput1" placeholder="18">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Pesan</label>
      <input type="text" name="pesan" class="form-control" id="exampleFormControlInput1" placeholder="Pesan">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Alamat</label>
      <input type="text" name="alamat" class="form-control" id="exampleFormControlInput1" placeholder="Malang">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Email</label>
      <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Malang">
    </div>
    <div class="form-group">
        <label for="">Foto Usaha</label>
        <div class="custom-file">
            <input type="file" name="fotoUsaha" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
          </div>
    </div>
    <div class="form-group">
        <label for="">Foto KK</label>
        {{-- <input type="file" class="form-control"> --}}
        <div class="custom-file">
            <input type="file" name="fotoKK" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
          </div>
    </div>


    <div class="form-group">
        <button type="submit" class="btn btn-primary">Daftar Berkas</button>
    </div>
    {{-- <div class="form-group">
      <label for="exampleFormControlTextarea1">Example textarea</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div> --}}
  </form>
@endsection
