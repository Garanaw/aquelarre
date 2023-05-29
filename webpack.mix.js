const mix = require('laravel-mix');
require('laravel-micro.js/src/mix');
const [laravelMicroReserved] = require('./laravel-micro.reserved');
const inProduction = mix.inProduction();

mix
    .micro(laravelMicroReserved, inProduction === false)
    .options({
        terser: {
            terserOptions: {
                compress: { warnings: false },
                output: { comments: false },
                mangle: {
                    keep_fnames: true,
                    keep_classnames: true
                },
            }
        },
        plugins: [
            '@babel/plugin-proposal-class-properties',
        ],
        processCssUrls: false,
    })
    .webpackConfig({
        resolve: {
            extensions: ['.js', '.vue', '.json', '.ts'],
        },
        module: {
            rules: [
                {
                    test: /\.ts$/,
                    loader: 'ts-loader',
                    options: { appendTsSuffixTo: [/\.vue$/] },
                }
            ],
        },
        stats: {
            children: true,
        }
    });

mix.js('resources/js/app.js', 'public/js')
    .vue({
        version: 3,
    });

mix.ts('resources/js/menu/menu.ts', 'public/js/menu.js');

mix
    .ts('resources/js/app/character/views/create/classic.ts', 'public/js/character/create/classic.js')
    .ts('resources/js/app/character/views/create/free.ts', 'public/js/character/create/free.js');

mix.postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
