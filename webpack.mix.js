const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/frontend.js', 'public/js')
    .js('resources/js/iconpicker.js', 'public/js')
    .js('resources/js/community/app.js', 'public/js/community')
    .sass('resources/scss/students/store.scss', 'public/css').options({
        processUrls: true,
        postCss: [
            require('postcss-import'),
            require('autoprefixer'),
        ]
    })
    .sass('resources/scss/admin/iconpicker.scss', 'public/assets/css').options({
        processUrls: true,
        postCss: [
            require('postcss-import'),
            require('autoprefixer'),
        ]
    })
    .sass('resources/scss/admin/dashboard.scss', 'public/assets/css').options({
        processUrls: true,
        postCss: [
            require('postcss-import'),
            require('autoprefixer'),
        ]
    });

if (mix.inProduction()) {
    mix.version();
}
