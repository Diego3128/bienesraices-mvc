//gulp and plugins
import { dest, src, series, parallel, watch } from 'gulp';
// Javascript
import terser from 'gulp-terser';
import concat from 'gulp-concat';
import sourcemaps from 'gulp-sourcemaps';
import rename from 'gulp-rename';
//image boosting
import imagemin, { gifsicle, mozjpeg, optipng, svgo } from 'gulp-imagemin';
import cache from 'gulp-cache';
//webp
import webp from 'gulp-webp';
///// css and sass //////
//sass
import * as dartsass from 'sass';
import gulpSass from 'gulp-sass';
const sass = gulpSass(dartsass);
//css
import autoprefixer from 'autoprefixer';
import postcss from 'gulp-postcss';
import cssnanoPlugin from 'cssnano';
const plugins = [autoprefixer(), cssnanoPlugin];

const paths = {
    scss: './src/scss/**/*.scss',
    js: './src/js/**/*.js',
    images: './src/img/**/*'
}
function webpImg() {
    // if the option: {encoding: false} is not used the images will be broken
    return src(paths.images, { encoding: false })
        .pipe(webp())
        .pipe(dest('./public/build/img/'))
}
function buildImg() {
    return src(paths.images, { encoding: false })
        .pipe(cache(imagemin([
            gifsicle({ interlaced: true }),
            mozjpeg({ quality: 75, progressive: true }),
            optipng({ optimizationLevel: 3 }),
            svgo({
                plugins: [
                    {
                        name: 'removeViewBox',
                        active: true
                    },
                    {
                        name: 'cleanupIDs',
                        active: false
                    }
                ]
            })
        ])))
        .pipe(dest('./public/build/img/'))
}
function buildJS() {
    return src(paths.js)
        .pipe(sourcemaps.init())
        .pipe(concat('bundle.js'))
        .pipe(terser())
        .pipe(rename({ suffix: '.min', dirname: 'js' }))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('./public/build/'))

}
function buildStyles() {
    return src('./src/scss/app.scss', { sourcemaps: true })
        .pipe(sass().on('error', sass.logError))
        .pipe(postcss(plugins))
        .pipe(dest('./public/build/css/', { sourcemaps: '.' }));
}
function main() {
    watch(paths.scss, { ignoreInitial: false, delay: 1500 }, series(buildStyles));
    watch(paths.js, { ignoreInitial: false, delay: 1500 }, series(buildJS));
    watch(paths.images, { ignoreInitial: false }, series(buildImg, webpImg));
}

export default series(main);
