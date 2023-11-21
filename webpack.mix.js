// webpack.mix.js

let mix = require('laravel-mix');

mix.setPublicPath(`dist/`);
mix.options({
    processCssUrls: false,
})
mix.sass('src/sass/nbd-style.scss', 'dist/')
    .js('src/js/nbd-script.js', 'dist/scripts')
    .js('src/js/components/header.js', 'dist/scripts')
    .js('src/js/components/single-product.js', 'dist/scripts')
    

mix.browserSync({
    proxy: "http://nbd.local/",
    files: [
        './**/*.*'
    ]
});

mix.webpackConfig({
    stats: {
         children: true
    }
});