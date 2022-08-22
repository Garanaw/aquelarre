const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .vue({
        version: 3,
    });

mix.ts('resources/js/menu/menu.ts', 'public/js/menu.js');

mix.ts('resources/js/app/character/create/classic.ts', 'public/js/character/create/classic.js');

mix.postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
