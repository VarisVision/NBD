// webpack.mix.js

let mix = require('laravel-mix');

mix.setPublicPath(`dist/`);
mix.options({
    processCssUrls: false,
})
mix.sass('src/sass/nbdc-styles.scss', 'dist/')
    .js('src/js/nbdc-scripts.js', 'dist/scripts')
    .js('src/js/components/header.js', 'dist/scripts')
    .js('src/js/components/single-product.js', 'dist/scripts')
    .js('src/js/components/checkout.js', 'dist/scripts')
    .js('src/js/components/lookbook.js', 'dist/scripts')
    

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