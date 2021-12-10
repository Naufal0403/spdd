@extends('layout.main')

@section('content')
<div class="row d-flex justify-content-around">

    <div class="col-md-4">
        <div class="card alert-success">
            <div class="card-body">
                <h3 align='center'><i class="nc-icon nc-single-02" ></i></h3>

               <h3 align='center'>User</h3>
               <h4  align='center'>{{
                       count($user)
                   }}</h4>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body alert-info">
                <h3 align='center'><i class="nc-icon nc-paper" ></i></h3>
               <h3  align='center'>Berkas</h3>
               <h4  align='center'>{{
                       count($berkas)
                   }}</h4>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body alert-danger" >
                <h3 align='center'><i class="nc-icon nc-support-17" ></i></h3>
               <h3  align='center'>Laporan</h3>
               <h4  align='center'>{{
                       count($laporan)
                   }}</h4>
            </div>
        </div>
    </div>
</div>

@endsection
