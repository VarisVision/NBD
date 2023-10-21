// webpack.mix.js

let mix = require('laravel-mix');
mix.setPublicPath(`dist/`);
mix.js('src/js/nbd-script.js', 'dist/')
    .sass('src/sass/nbd-style.scss', 'dist/');
mix.browserSync({
    proxy: "http://nbd.local/",
    files: [
        './**/*.*'
    ]
});