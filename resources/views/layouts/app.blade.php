<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Petédex | @yield('title')</title>
    <meta name="description" content="Discover the world of pets, one paw at a time.">
    <link rel="icon" href="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzMiIgaGVpZ2h0PSIzMiIgZmlsbD0iIzAwMDAwMCIgdmlld0JveD0iMCAwIDI1NiAyNTYiPjxwYXRoIGQ9Ik0yNDAsMTA4YTI4LDI4LDAsMSwxLTI4LTI4QTI4LDI4LDAsMCwxLDI0MCwxMDhaTTcyLDEwOGEyOCwyOCwwLDEsMC0yOCwyOEEyOCwyOCwwLDAsMCw3MiwxMDhaTTkyLDg4QTI4LDI4LDAsMSwwLDY0LDYwLDI4LDI4LDAsMCwwLDkyLDg4Wm03MiwwYTI4LDI4LDAsMSwwLTI4LTI4QTI4LDI4LDAsMCwwLDE2NCw4OFptMjMuMTIsNjAuODZhMzUuMywzNS4zLDAsMCwxLTE2Ljg3LTIxLjE0LDQ0LDQ0LDAsMCwwLTg0LjUsMEEzNS4yNSwzNS4yNSwwLDAsMSw2OSwxNDguODIsNDAsNDAsMCwwLDAsODgsMjI0YTM5LjQ4LDM5LjQ4LDAsMCwwLDE1LjUyLTMuMTMsNjQuMDksNjQuMDksMCwwLDEsNDguODcsMCw0MCw0MCwwLDAsMCwzNC43My03MloiPjwvcGF0aD48L3N2Zz4=">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/phosphor-icons.js') }}"></script>
    @stack('style')
</head>
<body>

<div class="logo">
    <i class="ph-fill ph-paw-print"></i>
</div>

<div class="toggle-darkmode" id="darkModeToggle">
    <i class="ph-fill ph-sun-horizon"></i>
</div>

<div class="container text-center">
    @yield('content')
</div>

<footer>
    <p class="mb-0"><i class="ph ph-copyright"></i> 2024 Shopblocks Dev Test</p>
</footer>

<script src="{{ asset('js/boostrap5-3.min.js') }}"></script>
@stack('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggle = document.getElementById('darkModeToggle');
        const body = document.body;
        const searchInput = document.getElementById('searchInput');

        if (localStorage.getItem('darkMode') === 'enabled') {
            enableDarkMode();
        }

        toggle.addEventListener('click', function() {
            if (body.classList.contains('dark-mode')) {
                disableDarkMode();
            } else {
                enableDarkMode();
            }
        });

        function enableDarkMode() {
            localStorage.setItem('darkMode', 'enabled');
            body.classList.add('dark-mode');
            toggle.innerHTML = '<i class="ph-fill ph-cloud-moon"></i>';
            searchInput.classList.add('dark-mode');
        }

        function disableDarkMode() {
            localStorage.setItem('darkMode', 'disabled');
            body.classList.remove('dark-mode');
            toggle.innerHTML = '<i class="ph-fill ph-sun-horizon"></i>';
            searchInput.classList.remove('dark-mode');
        }
    });
</script>
</body>
</html>
