const mix = require('laravel-mix');

mix.css('resources/css/app.css', 'public/css');
mix.css('resources/css/bootstrap.min.css', 'public/css')
mix.js('resources/js/phosphor-icons.js', 'public/js');
mix.js('resources/js/bootstrap5.3.min.js', 'public/js');
