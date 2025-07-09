@vite('resources/css/app.css')

<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body>
    @yield('content')
</body> 
</html>

{{-- @include('partials.header') <!-- подключаем хедер --> --}}