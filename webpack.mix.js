let mix = require('laravel-mix');
let build = require('./tasks/build.js');

let ImageminPlugin = require('imagemin-webpack-plugin').default;
let CopyWebpackPlugin = require('copy-webpack-plugin');
let imageminMozjpeg = require('imagemin-mozjpeg');


mix.disableSuccessNotifications();
mix.setPublicPath('source/assets/build');
mix.webpackConfig({
    plugins: [
        build.jigsaw,
        build.browserSync(),
        build.watch(['source/**/*.md', 'source/**/*.php', 'source/**/*.scss', '!source/**/_tmp/*'])
    ]
});

mix.js('source/_assets/js/main.js', 'js')
    .sass('source/_assets/sass/main.scss', 'css')
    .options({
        processCssUrls: true
    }).version();
