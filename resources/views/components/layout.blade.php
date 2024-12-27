<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventorify | {{ $title }}</title>
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="https:////cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
</head>

<body>

  <x-drawer>
    <x-navbar />
    <x-slot:content>
      {{ $slot }}
    </x-slot:content>
  </x-drawer>


  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    @if(session()->has('success'))
    Swal.fire({
      icon: 'success',
      title: 'Success!',
      text: '{{ session('success') }}',
      showConfirmButton: false,
      timer: 2000
    });
    @elseif(session('error'))
    Swal.fire({
      icon: 'error',
      title: 'Failed!',
      text: '{{ session('error') }}',
      showConfirmButton: false,
      timer: 2000
    });
    @endif

    $(document).ready( function () {
      let table = new DataTable('#dataTables', {
        responsive: true
      });
    });
  </script>
</body>

</html>