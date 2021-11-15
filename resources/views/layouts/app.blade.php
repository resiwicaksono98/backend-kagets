<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-white">
        <div class="flex">
            @include('layouts.sidebar')

            <!-- Page Content -->
            <main class="w-4/5 p-5">
                @if ($header)
                    <h1 class="fot-light text-2xl">{{ $header }}</h1>
                    <div class="h-1 w-20 bg-blue-600 mb-5 mt-2 rounded-full"></div>
                @endif
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $('#category').select2({
            placeholder: 'Select Category'
        });
        $('#user_id').select2({
            placeholder: 'Select User'
        });
       
    });
</script>
</html>


