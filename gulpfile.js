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
const devBrowserSyncInst = browserSync.create();

// const devBrowserSyncInst = require('browser-sync').create();
import uglify from 'gulp-uglify';
import wait from 'gulp-wait';
import { stream as critical } from 'critical';
import useref from 'gulp-useref';
import gulpif from 'gulp-if';

import phpConnect from 'gulp-connect-php';

// Initialize
// =============================================================================
// ---- default task ----
function defaultTask(cb) {
    console.log("DEFAULT TASK\n");
    // place code for your default task here
    cb();
}


// ---- cleanup of files ----
// Clean dist
function cleanDist() {
    return del(['dist/**', '!dist']);
}

// Clean vendor (src)
function cleanVendor() {
    return del(['src/vendor/**', '!src/vendor']);
}
// ---- /cleanup of files ----

// ---- copying of files ----
// Populate vendor (src), preparing the files to be copied to the destination
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
        base: 'node_modules/',
        // encoding: false is VERY IMPORTANT, otherwise files get broken/corrupted
        // https://stackoverflow.com/questions/78391263/copying-images-with-gulp-are-corrupted-damaged
        encoding: false,
    })
        .pipe(dest('src/vendor/'));
}

// Copy images to dist
function copyImages() {
    // encoding: false is VERY IMPORTANT, otherwise files get broken/corrupted
    // https://stackoverflow.com/questions/78391263/copying-images-with-gulp-are-corrupted-damaged
    return src('src/images/**/*', { encoding: false })
        .pipe(dest('dist/images'));
}


// Copy vendor to dist
function copyVendor() {
    // encoding: false is VERY IMPORTANT, otherwise files get broken/corrupted
    // https://stackoverflow.com/questions/78391263/copying-images-with-gulp-are-corrupted-damaged
    return src('src/vendor/**/*', { encoding: false })
        .pipe(dest('dist/vendor'));
}

// Copy Html to dist
function copyHtmlWithPhp() {
    // encoding: false is VERY IMPORTANT, otherwise images get broken/corrupted
    // https://stackoverflow.com/questions/78391263/copying-images-with-gulp-are-corrupted-damaged
    return src(['src/*.html', 'src/**/*.php', '!src/index.html'],
        { encoding: false })
        .pipe(dest('dist'));
}

function copyAllSampleData() {
    // encoding: false is VERY IMPORTANT, otherwise images get broken/corrupted
    // https://stackoverflow.com/questions/78391263/copying-images-with-gulp-are-corrupted-damaged
    return src(['src/sample/**/*'],
        { encoding: false })
        .pipe(dest('dist/sample'));
}

function copyAllActualData() {
    // encoding: false is VERY IMPORTANT, otherwise images get broken/corrupted
    // https://stackoverflow.com/questions/78391263/copying-images-with-gulp-are-corrupted-damaged
    return src(['src/actual/**/*'],
        { encoding: false })
        .pipe(dest('dist/actual'));
}

function copyHtmlStatic() {
    // encoding: false is VERY IMPORTANT, otherwise images get broken/corrupted
    // https://stackoverflow.com/questions/78391263/copying-images-with-gulp-are-corrupted-damaged
    return src(['src/*.html', 'src/*.html'],
        { encoding: false })
        .pipe(dest('dist'));
}

// function renameIndexHtmlStatic() {
//     // .pipe(rename(dest('dist/index.html-ORIG-STATIC'), dest('dist/index.html')));
//     return src(['dist/index.html-ORIG-STATIC'],
//         { encoding: false })
//         .pipe(rename('index.html'))
//         .pipe(dest('dist'));
// }

// function delIndexOrigStaticFromDist() {
//     // .pipe(rename(dest('dist/index.html-ORIG-STATIC'), dest('dist/index.html')));
//     return del(['dist/index.html-ORIG-STATIC']);
// }

// Compile Sass files
function compileSass() {
    // encoding: false is VERY IMPORTANT, otherwise images get broken/corrupted
    // https://stackoverflow.com/questions/78391263/copying-images-with-gulp-are-corrupted-damaged
    return src('src/sass/developerportfolio.scss', { encoding: false })
        .pipe(sass().on('error', logError)) // Compile to CSS
        .pipe(dest('src/css/')) // Save to src
        .pipe(devBrowserSyncInst.stream()); // Inject changes without refreshing the page.
}
// ---- /copying of files ----

// ---- installations for production, including optimizations and minifications
// ----> CSS optimization and installation
function installCss() {
    // encoding: false is VERY IMPORTANT, otherwise images get broken/corrupted
    // https://stackoverflow.com/questions/78391263/copying-images-with-gulp-are-corrupted-damaged
    return src('src/css/*.css', { encoding: false })
        .pipe(autoprefixer({
            cascade: false
        })) // Add vendor prefixes
        .pipe(cleanCSS({
            compatibility: 'ie8'
        })) // Minify CSS
        .pipe(dest('dist/css/'));
}

// ----> JS optimization and installation
function installJs() {
    // encoding: false is VERY IMPORTANT, otherwise images get broken/corrupted
    // https://stackoverflow.com/questions/78391263/copying-images-with-gulp-are-corrupted-damaged
    return src('src/js/*.js', { encoding: false })
        .pipe(uglify()) // Minify JS
        .pipe(dest('dist/js/'));
}

// ----> JS configuration installation
function installJsConfig() {
    // encoding: false is VERY IMPORTANT, otherwise images get broken/corrupted
    // https://stackoverflow.com/questions/78391263/copying-images-with-gulp-are-corrupted-damaged
    return src('src/js/config/*.json', { encoding: false })
        .pipe(dest('dist/js/config/'));
}

// ----> Critical CSS optimization and installation
function installCriticalCSS() {
    // encoding: false is VERY IMPORTANT, otherwise images get broken/corrupted
    // https://stackoverflow.com/questions/78391263/copying-images-with-gulp-are-corrupted-damaged
    return src('dist/*.html', { encoding: false })
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



// ---- Development server for gulp watch ----
// Start PHP server
function devPhpServer() {
    return phpConnect.server({
        base: 'src',
        port: 8090,
        keepalive: true,
        files: ['./**/*.php', './**/*.phtml'],
        // index: '/index.phtml',
    });
}

// Static server (src)
function devBrowserSyncFile(cb, index_file) {
    devBrowserSyncInst.init({
        server: {
            baseDir: "src",
            index: index_file,
        },
        open: "external"
    });
    cb();
}

function devBrowserSyncSrcStatic(cb) {
    return devBrowserSyncFile(cb, "index.html");
}

function devBrowserSyncSrcPhp(cb) {
    devBrowserSyncInst.init({
        proxy: 'http://localhost:8090/',
        // baseDir: "src",
        open: "external",
        notify: false,
        // files: ['./**/*.php', './**/*.phtml'],
    });

    cb();
}

// Browser reload
function devBrowserReload(cb) {
    devBrowserSyncInst.reload();
    cb(); // Signal completion
}

// Watch scss/js/html/ files
function watchFiles() {
    console.log("\n-- Watch files --\n");
    __watch("src/sass/**/*.scss", series(compileSass));
    __watch("src/sass/**/*.woff2", series(compileSass));
    __watch("src/sass/**/*.ttf", series(compileSass));
    __watch(["src/js/**/*.js"], series(devBrowserReload));
    // __watch("src/*.html", series(devBrowserReload));
    __watch(['src/**/*.phtml', 'src/**/*.php'], devBrowserReload); // Reload on PHP changes
}


// Tasks
// =============================================================================

// Define tasks
const initStatic = series(cleanDist, cleanVendor, populateVendor, copyImages, copyVendor, copyHtmlStatic);
const init = series(cleanDist, cleanVendor, populateVendor, copyImages, copyAllSampleData, copyAllActualData, copyVendor, copyHtmlWithPhp);

// const build = gulp.series(init, compileSass, css, js, criticalCSS);
const buildStatic = series(initStatic, compileSass, installCss, installJs, installJsConfig, installCriticalCSS);
const build = series(init, compileSass, installCss, installJs, installJsConfig, installCriticalCSS);
const watchStatic = series(build, parallel(watchFiles, devBrowserSyncSrcStatic));
// const watchStatic = series(build, devBrowserSyncSrcStatic, watchFiles);
// const watchPhp = series(build, parallel(watchFiles, devBrowserSyncSrcPhp));
const watch = series(build, devBrowserSyncSrcPhp, devPhpServer, watchFiles);

// Register public tasks
const _init = init;
export { _init as init };

const _initStatic = initStatic;
export { _initStatic as initStatic };

const _build = build;
export { _build as build };

const _buildStatic = buildStatic;
export { _buildStatic as buildStatic };

const _watchStatic = watchStatic;
export { _watchStatic as watchStatic };

const _watch = watch;
export { _watch as watch };
