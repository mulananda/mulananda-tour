<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Mulananda Tour Admin</title>

  {{-- memanggil/menambahakan bagian views/includes/admin/style.blade.php --}}
  @include('includes.admin.style')

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    {{-- memanggil/menambahakan bagian views/includes/admin/sidebar.blade.php --}}
   @include('includes.admin.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        {{-- memanggil/menambahakan bagian views/includes/admin/navbar.blade.php --}}
        @include('includes.admin.navbar')

        {{-- menyiapkan bagian kosong untuk extend halaman lain --}}
        @yield('content')

      </div>
      <!-- End of Main Content -->

      {{-- memanggil/menambahakan bagian views/includes/admin/footer.blade.php --}}
      @include('includes.admin.footer')

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <form action="{{ url('logout') }}" method="POST">
            @csrf
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-primary" type="submit">Logout</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  {{-- memanggil/menambahakan bagian views/includes/admin/script.blade.php --}}
  @include('includes.admin.script')

</body>

</html>
