<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>{{ $title }}</title>
    <!-- CSS files -->
    <link href="./dist/css/tabler.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="./dist/css/tabler-vendors.min.css" rel="stylesheet"/>
    <link href="./dist/css/demo.min.css" rel="stylesheet"/>
</head>
<body style="overflow: hidden" class=" border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
        <div class="container-tight py-4">
            @yield('login-screen')
            @yield('forgotPassword-screen')
            @yield('verify')
            @yield('success-register')
            @yield('clientHome')
        </div>
    </div>
    <!-- Libs JS -->
    {{-- JQUERY --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Tabler Core -->

    <script src="./dist/js/tabler.min.js"></script>
    <script src="./dist/js/demo.min.js"></script>
    <script>
        function ShowPassword()
        {
            if(document.getElementById("pass").value!="")
            {
                document.getElementById("pass").type="text";
                document.getElementById("show").style.display="none";
                document.getElementById("hide").style.display="block";
            }
        }

        function HidePassword()
        {
            if(document.getElementById("pass").type == "text")
            {
                document.getElementById("pass").type="password"
                document.getElementById("show").style.display="block";
                document.getElementById("hide").style.display="none";
            }
        }
    </script>

    {{-- close alert otomatis --}}
    <script>
        $(document).ready(function() {
            // Buat fungsi closeAlert()
            function closeAlert() {
                // Buat timer dengan javascript
                setInterval(function(){ // fungsi ini akan dijalankan ketika timer selesai
                    $('.auto-close').slideUp(200); // buat animasi slideup dengan waktu 200 miliseconds = 0.2 detik
                }, 2000); // set timer menjadi 3000 miliseconds = 3 detik
            }
            closeAlert(); // panggil fungsi closeAlert() untuk menutup alert
        });
    </script>

</body>
</html>
