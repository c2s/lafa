const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .js('resources/js/administrator.js', 'public/js')
    .sass('resources/sass/administrator.scss', 'public/css')
    .js('resources/js/website.js', 'public/js')
    .sass('resources/sass/website.scss', 'public/css')
    .copyDirectory('resources/plugins', 'public/plugins')
    .copyDirectory('resources/images', 'public/images')
;

mix.browserSync({
    port: 3000,
    proxy: 'lafa.local.com' // 这里修改成当前项目域名
});

mix.disableNotifications();
