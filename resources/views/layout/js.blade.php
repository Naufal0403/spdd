<script src="{{asset('paper-dashboard-master/assets/js/core/jquery.min.js')}}"></script>
{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
{{-- <script src="{{asset('paper-dashboard-master/assets/js/core/popper.min.js')}}"></script> --}}
  {{-- <script src="{{asset('paper-dashboard-master/assets/js/core/bootstrap.min.js')}}"></script> --}}
  <script src="{{asset('paper-dashboard-master/assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="{{asset('paper-dashboard-master/assets/js/plugins/chartjs.min.js')}}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{asset('paper-dashboard-master/assets/js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('paper-dashboard-master/assets/js/paper-dashboard.min.js')}}" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{asset('paper-dashboard-master/assets/demo/demo.js')}}"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>

<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
  <script>
      $(document).ready(function () {
          $('.btn-editAkun').on('click', function () {
            //   console.lof
              let url = $(this).data('url');
              let gambar = $(this).data('gambar')
              let nama = $(this).data('name')
              let email = $(this).data('email')
              let nik = $(this).data('nik')
              let tmpLahir = $(this).data('lahir')
              let tglLahir = $(this).data('tglLahir')
              let lair = $(this).data('tanggal-lahir')
            //   console.log(lair);
              let telepon = $(this).data('telepon')
              let umur = $(this).data('umur')
              let alamat = $(this).data('alamat')
              $('.url').attr('action', url)
              $('.name').val(nama)
              $('.nik').val(nik)
              $('.tempat_lahir').val(tmpLahir)
              $('.tanggal_lahir').val(lair)
              $('.telepon').val(telepon)
              $('.umur').val(umur)
              $('.email').val(email)
              $('.alamat').val(alamat)

          })
      })
  </script>



