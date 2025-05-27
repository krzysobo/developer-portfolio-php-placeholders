const _default = defaultTask;
export { _default as default };


import { src, dest, watch as __watch, series, parallel } from 'gulp';
// import sass, { logError } from 'gulp-sass';
// import sass from 'gulp-sass';
import gulpSass from 'gulp-sass';
import dartSass from 'sass';


// import gulpSass from 'gulp-sass';
const sass = gulpSass(dartSass)

import logError from 'gulp-sass';

import autoprefixer from 'gulp-autoprefixer';
import rename from "gulp-rename";
import cleanCSS from 'gulp-clean-css';
import { deleteAsync } from 'del';
const del = deleteAsync;

// /*
// import sass, { logError } from 'gulp-sass';
//                ^^^^^^^^
// SyntaxError: Named export 'logError' not found. The requested module 'gulp-sass' is a CommonJS module, which may not support all module.exports as named exports.
// CommonJS modules can always be imported via the default export, for example using:

// import pkg from 'gulp-sass';
// const { logError } = pkg;

// */

import browserSync from 'browser-sync';
const browserSyncInst = browserSync.create();

// const browserSyncInst = require('browser-sync').create();
import uglify from 'gulp-uglify';
import wait from 'gulp-wait';
import { stream as critical } from 'critical';
import useref from 'gulp-useref';
import gulpif from 'gulp-if';

import phpConnect from 'gulp-connect-php';

// Initialize
// =============================================================================

function defaultTask(cb) {
    console.log("DEFAULT TASK\n");
    // place code for your default task here
    cb();
}

// Start PHP server
function phpServer() {
    return phpConnect.server({
        base: 'src',
        port: 8090,
        keepalive: true,
        files: ['./**/*.php', './**/*.phtml'],
        // index: '/index.phtml',
    });
}

// Clean dist
function cleanDist() {
    return del(['dist/**', '!dist']);
}

// Clean vendor (src)
function cleanVendor() {
    return del(['src/vendor/**', '!src/vendor']);
}

// Populate vendor (src)
function populateVendor() {
    return src([
        'node_modules/materialize-css/dist/js/materialize.min.js',
        'node_modules/materialize-css/sass/components/**/*',
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/echarts/dist/echarts.min.js',
        'node_modules/@fortawesome/fontawesome-free/css/all.min.css',
        'node_modules/@fortawesome/fontawesome-free/webfonts/**/*',
        'node_modules/simplebar/dist/simplebar.min.js',
        'node_modules/simplebar/dist/simplebar.min.css',
        'node_modules/aos/dist/aos.js',
        'node_modules/aos/dist/aos.css',
        'node_modules/headroom.js/dist/headroom.min.js'
    ], {
        base: 'node_modules/'
    })
        .pipe(dest('src/vendor/'));
}

// Copy images to dist
function copyImages() {
    return src('src/images/**/*')
        .pipe(dest('dist/images'));
}

// Copy vendor to dist
function copyVendor() {
    return src('src/vendor/**/*')
        .pipe(dest('dist/vendor'));
}

// Copy Html to dist
function copyHtml() {
    return src('src/*.html')
        .pipe(dest('dist'));
}

// Development
// =============================================================================

// Static server (src)
function browserSyncFile(cb, index_file) {
    browserSyncInst.init({
        server: {
            baseDir: "src",
            index: index_file,
        },
        open: "external"
    });
    cb();
}

function browserSyncSrcStatic(cb) {
    return browserSyncFile(cb, "index.html");
}

function browserSyncSrcPhp(cb) {
    // gulpSass.watch("src/sass/**/*.scss", series(compileSass));
    // gulpSass.watch(["src/js/**/*.js"], series(browserReload));
    // gulpSass.watch("src/*.html", series(browserReload));
    browserSyncInst.init({
        proxy: 'http://localhost:8090/',
        // baseDir: "src",
        open: "external",
        notify: false,
        // files: ['./**/*.php', './**/*.phtml'],
    });

    cb();


}

// Browser reload
function browserReload(cb) {
    browserSyncInst.reload();
    cb(); // Signal completion
}

// Compile Sass files
function compileSass() {
    return src('src/sass/developerportfolio.scss')
        .pipe(sass().on('error', logError)) // Compile to CSS
        .pipe(dest('src/css/')) // Save to src
        .pipe(browserSyncInst.stream()); // Inject changes without refreshing the page.
}

// Watch scss/js/html/ files
function watchFiles() {
    console.log("\n-- Watch files --\n");
    __watch("src/sass/**/*.scss", series(compileSass));
    __watch(["src/js/**/*.js"], series(browserReload));
    // __watch("src/*.html", series(browserReload));
    __watch(['src/**/*.phtml', 'src/**/*.php'], browserReload); // Reload on PHP changes
}

// Production
// =============================================================================

// CSS optimization
function css() {
    return src('src/css/*.css')
        .pipe(autoprefixer({
            cascade: false
        })) // Add vendor prefixes
        .pipe(cleanCSS({
            compatibility: 'ie8'
        })) // Minify CSS
        .pipe(dest('dist/css/'));
}

// JS optimization
function js() {
    return src('src/js/*.js')
        .pipe(uglify()) // Minify JS
        .pipe(dest('dist/js/'));
}

// Critical CSS
function criticalCSS() {
    return src('dist/*.html')
        .pipe(
            critical({
                inline: true,
                base: 'dist/',
                // ignore: ['@font-face'],
                dimensions: [{
                    // 9:16 (Mobile)
                    height: 1022,
                    width: 575,
                },
                {
                    // 9:16 (Tablet)
                    height: 1364,
                    width: 767,
                },
                {
                    // 9:16 (Tablet)
                    height: 1762,
                    width: 991,
                },
                {
                    // 9:16 (Tablet)
                    height: 2132,
                    width: 1199,
                },
                {
                    // 9:16 (Tablet)
                    height: 2132,
                    width: 1199,
                },
                {
                    // 3:2 (Desktop)
                    height: 800,
                    width: 1200,
                },
                ]
            })
        )
        .on('error', function (err) {
            document(error);
        })
        .pipe(dest('dist/'));
}

// Tasks
// =============================================================================

// Define tasks
const init = series(cleanDist, cleanVendor, populateVendor, copyImages, copyVendor, copyHtml);
// const build = gulp.series(init, compileSass, css, js, criticalCSS);
const build = series(init, compileSass, css, js);
const watch = series(build, parallel(watchFiles, browserSyncSrcStatic));
// const watchPhp = series(build, parallel(watchFiles, browserSyncSrcPhp));
const watchPhp = series(build, browserSyncSrcPhp, phpServer, watchFiles);

// Register public tasks
const _init = init;
export { _init as init };
const _build = build;
export { _build as build };
const _watch = watch;
export { _watch as watch };

const _watchPhp = watchPhp;
export { _watchPhp as watchPhp };
