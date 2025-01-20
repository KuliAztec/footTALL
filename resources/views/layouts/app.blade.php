<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @livewireStyles
</head>
<body>
    @yield('content')
    @livewireScripts
    <script>
        document.addEventListener('livewire:load', () => {
            console.log('Livewire scripts loaded'); // Debugging message
        });
    </script>
</body>
</html>
