const {src, dest, series} = require('gulp');
let gulpSass = require('gulp-sass');
//let gulpSourcemaps = require('gulp-sourcemaps');

const del = require('del');
const fs = require('fs');
const path = require('path');

const pathSrc = path.resolve('src');
const pathSrcApp = path.resolve(pathSrc, 'application');
const pathSrcWeb = path.resolve(pathSrc, 'web');
const pathSrcWebImages = path.resolve(pathSrcWeb, 'images');
//const pathSrcWebScripts = path.resolve(pathSrcWeb, 'scripts');
const pathSrcWebStyles = path.resolve(pathSrcWeb, 'styles');

const pathDist = path.resolve('dist');
const pathDistApp = path.resolve(pathDist, 'application');
const pathDistWeb = path.resolve(pathDist, 'web');
const pathDistWebImages = path.resolve(pathDistWeb, 'images');
const pathDistWebScripts = path.resolve(pathDistWeb, 'scripts');
const pathDistWebStyles = path.resolve(pathDistWeb, 'styles');

function clean(cb) {
    console.log('[gulp::clean] Cleaning output folder.', pathDist);
    del.sync(pathDist);

    cb();
}

function createFolders(cb) {
    console.log('[gulp::build-create-folders] Creating build folders.');

    const folders = [pathDist, pathDistApp, pathDistWeb, pathDistWebImages, pathDistWebScripts, pathDistWebStyles];
    for (let i = 0; i < folders.length; i++) {
        const folder = folders[i];
        if (!fs.existsSync(folder)) { 
            fs.mkdirSync(folder); 
            if (!fs.existsSync(folder)) { 
                console.error('Could not create folder.', folder);
            }
        }
    }

    cb();
}

function copyAppFolder(cb) {
    console.log('[gulp::build-copy-app] Copying PHP app files in src/application to dist/application.');

    src(
        path.resolve(pathSrcApp, '**/*.php'
    )).pipe(dest(pathDistApp));

    cb();
}

function copyWebFolder(cb) {
    console.log('[gulp::build-copy-web] Copying PHP app files in src/web to dist/web.');

    src([
        path.resolve(pathSrcWeb, '*.php'),
        path.resolve(pathSrcWeb, '.htaccess'),
        path.resolve(pathSrcWeb, 'web.config')
    ]).pipe(dest(pathDistWeb));

    cb();
}

function copyWebImages(cb) {
    console.log('[gulp::build-copy-images] Copying image files in src/web/images to dist/web/images.');

    src(
        path.resolve(pathSrcWebImages, '**/*')
    ).pipe(dest(pathDistWebImages));

    cb();
}

function buildStylesheets(cb) {
    console.log('[gulp::build-sass] Transpiling SASS to CSS and generating output.');

    src(
        path.resolve(pathSrcWebStyles, 'appStyles.scss')
    ).pipe(gulpSass().on('error', gulpSass.logError))
    .pipe(dest(pathDistWebStyles));

    cb();
}

exports.clean = clean;
exports.build = series(createFolders, copyAppFolder, copyWebFolder, copyWebImages, buildStylesheets);
exports.cleanBuild = series(clean, createFolders, copyAppFolder, copyWebFolder, copyWebImages, buildStylesheets);
// TODO - deploy with config somehow