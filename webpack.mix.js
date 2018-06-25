let mix = require('laravel-mix');
require('laravel-mix-purgecss');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app/app.scss', 'public/css')
    .sass('resources/assets/sass/front/front.scss', 'public/css')
    .options({
        processCssUrls: false // Faster compiling in dev, but all css paths must be absolutes from public directory
    })
    .browserSync('shop.test');

mix.webpackConfig({
    resolve: {
        alias: {
            "~": path.resolve(__dirname, 'resources/assets'),
            "js": path.resolve(__dirname, 'resources/assets/js')
        }
    }
});

if (mix.inProduction()) {
    mix.version().purgeCss({
        globs: [
            path.join(__dirname, 'node_modules/buefy/**/*.js'),
            path.join(__dirname, 'node_modules/buefy/**/*.vue'),
        ]
    });
}

/*
 |--------------------------------------------------------------------------
 | Webpack plugin analysis
 |--------------------------------------------------------------------------
 |
 | Analyses the size of each package
 | Requirements: yarn add webpack-bundle-analyzer -D
 |
 */
/*
var BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;

mix.webpackConfig({
    plugins: [new BundleAnalyzerPlugin()]    
});
*/