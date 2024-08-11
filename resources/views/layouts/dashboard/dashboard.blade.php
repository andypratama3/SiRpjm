
<!DOCTYPE html>
<html lang="en">

<head>
  @include('layouts.dashboard.head')
</head>

<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    @include('layouts.dashboard.sidebar')
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
   @include('layouts.dashboard.navbar')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        @yield('content')
        {{-- @include('layouts.dashboard.footer') --}}
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="{{ asset('asset_dashboard/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('asset_dashboard/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('asset_dashboard/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('asset_dashboard/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('asset_dashboard/js/plugins/chartjs.min.js') }}"></script>

  <script src="{{ asset('asset_dashboard/js/soft-ui-dashboard.min.js?v=1.0.7' ) }}"></script>
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function () {
        $(".table").on('click', '.delete', function (e) {
            e.preventDefault();

            let slug = $(this).data('id');

            Swal.fire({
                title: 'Anda yakin?',
                text: 'Data yang sudah dihapus tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true  // Reverses the order of the buttons
            }).then((result) => {
                if (result.isConfirmed) {
                    $(`#delete-${slug}`).submit();
                }
            });
        });
    });
    </script>


</body>

</html>
