@extends('layout.main')

@section('content')

        {{-- {{  (strtotime($user->deadline)  - strtotime(date("Y-m-d")))/(3600*24) }}
        @if ((strtotime($user->deadline)  - strtotime(date("Y-m-d")))/(3600*24))

        @else

        @endif --}}
        <div id="notification"></div>
        <div class="alert alert-danger" role="alert">
            <h3><i class="nc-icon nc-time-alarm"></i>&nbsp;PERINGATAN</h3>
                <hr>
                <p class="p-2">DEADLINE PENGUMPULAN LAPORAN DANA DESA SEBELUM {{$user->deadline}}</p>

        </div>
        <div class="alert alert-success" role="alert">
            <h3><i class="nc-icon nc-time-alarm"></i>&nbsp;Pengumuman</h3>
                <hr>
                <p class="p-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab nulla iusto maiores esse quis temporibus hic illo delectus nostrum molestias, fugiat non impedit doloremque laboriosam in minus, illum iste deleniti!
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente animi itaque laboriosam cupiditate saepe dicta eveniet delectus quasi quod ad esse repellat, molestias praesentium cumque labore a recusandae corporis ullam?
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur natus ex facilis expedita qui consectetur minus unde voluptates consequuntur fugit assumenda aliquid soluta quae eligendi, quisquam accusantium! Qui, deleniti obcaecati.</p>

        </div>
        <br>
        <div class="alert alert-info" role="alert">
            <h3><i class="nc-icon nc-bulb-63"></i>&nbsp;Informasi</h3>
                <hr>
                <p class="p-2">

                  Pemberdayaan dilakukan dalam upaya peningkatan kualitas kesejahteraan masyarakat yang meliputi kesejahteraan keluarga, memandirikan masyarakat miskin, mengangkat harkat dan martabat masyarakat lapisan bawah, menjadikan masyarakat sebagai subjek dalam bertindak. Pemberdayaan dapat dilakukan oleh masyarakat maupun pemerintah setempat. Untuk mencapai tujuan tersebut, perlu diciptakan suatu program pemberdayaan di pedesaan sehingga mampu mensejahterakan keluarga dan masyarakat.
                </p>
      </div>

      <br>
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
                          <td><img src="{{asset('storage/'. $b->fotoUsaha)}}" style="width: 100px" alt=""></td>
                          <td>
                              @if ($b->status == 0)
                                  <span class="alert alert-danger">Belum Disepakati</span>
                              @elseif ($b->status == 1)
                              <span class="alert alert-info">Proses</span>
                              @else
                              <span class="alert alert-success">Selesai</span>
                              @endif
                          </td>
                      </tr>

                      @endforeach
                  </tbody>
            </table>

          </div>
      </div>

      @if (Auth::user()->role == 0)
        @if ((strtotime($user->deadline)  - strtotime(date("Y-m-d")))/(3600*24) <= 10)

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script type="text/javascript">
        $(window).on('load', function() {
            $('#myModal').modal('show');
        });

    </script>
        @endif

      @endif

      <script>
          window.laravel_echo_port='{{env("LARAVEL_ECHO_PORT")}}';
          </script>
    <script src="//{{Request::getHost()}} : {{env('LARAVEL_ECHO_PORT')}}/socket.io/socket.io.js"></script>
    <script src="{{url('/js/laravel-echo-setup.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        var i = 0;
        window.Echo.channel('user-channel').listen('.UserEvent', (data)=> {
            i++;
            $('#notification').append('div class ="alert alert-success"' + i +  '. ' +data.title +'</div>');
        })
    </script>
  @endsection


  @section('modal')

  <div class="modal fade " id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">DEADLINE!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="alert-danger p-3">
                <h3 style="text-align: center">Mohon Segera Melaporkan Sebelum tanggal {{$user->deadline}}</h3>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="{{route('berkas.create')}}" type="button" class="btn btn-primary">Buat Laporan</a>
        </div>
      </div>
    </div>
  </div>
  {{-- <div class="modal hide fade" id="myModal">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Modal header</h3>
    </div>
    <div class="modal-body">
        <p>One fine body…</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn">Close</a>
        <a href="#" class="btn btn-primary">Save changes</a>
    </div>
</div> --}}
  @endsection
