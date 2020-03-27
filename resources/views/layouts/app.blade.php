{{-- home & detail mulananda tour --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>

    {{-- memanggil/menambahkan style yang ada dihalaman detail ke halaman home agarr menumpuk di halaman home --}}
    @stack('prepend-style')

    {{-- memanggil/menambahakan bagian views/includes/style.blade.php --}}
    @include('includes.style')

    {{-- memanggil/menambahkan style yang ada dihalaman detail ke halaman home agarr menumpuk di halaman home --}}
    @stack('addon-style')

</head>

<body>
    {{-- memanggil/menambahakan bagian views/includes/navbar.blade.php --}}
    @include('includes.navbar')

    {{-- menyiapkan bagian kosong untuk extend halaman lain --}}
    @yield('content')

    {{-- memanggil/menambahakan bagian views/includes/footer.blade.php --}}
    @include('includes.footer')

    {{-- memanggil/menambahkan script yang ada dihalaman detail ke halaman home agarr menumpuk di halaman home --}}
    @stack('prepend-script')

    {{-- memanggil/menambahakan bagian views/includes/script.blade.php --}}
    @include('includes.script')

    {{-- memanggil/menambahkan script yang ada dihalaman detail ke halaman home agarr menumpuk di halaman home --}}
    @stack('addon-script')

</body>

</html>