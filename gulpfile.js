let gulp = require('gulp');
let gulpSass = require('gulp-sass');
//let gulpSourcemaps = require('gulp-sourcemaps');

const del = require('del');
const fs = require('fs');
const path = require('path');

const pathSrc = path.resolve('src');
const pathSrcApp = path.resolve(pathSrc, 'application');
const pathSrcWeb = path.resolve(pathSrc, 'web');
//const pathSrcWebScripts = path.resolve(pathSrcWeb, 'scripts');
const pathSrcWebStyles = path.resolve(pathSrcWeb, 'styles');

const pathDist = path.resolve('dist');
const pathDistApp = path.resolve(pathDist, 'application');
const pathDistWeb = path.resolve(pathDist, 'web');
const pathDistWebScripts = path.resolve(pathDistWeb, 'scripts');
const pathDistWebStyles = path.resolve(pathDistWeb, 'styles');

gulp.task('clean', () => {
    console.log('[gulp::clean] Cleaning output folder.', pathDist);
    return del(pathDist);
});

gulp.task('build-create-folders', () => {
    console.log('[gulp::build-create-folders] Creating build folders.');

    const folders = [pathDist, pathDistApp, pathDistWeb, pathDistWebScripts, pathDistWebStyles];
    let doAnyFoldersNotExist = false;
    for (let i = 0; i < folders.length; i++) {
        const folder = folders[i];
        if (!fs.existsSync(folder)) { 
            fs.mkdirSync(folder); 
            if (!fs.existsSync(folder)) { doAnyFoldersNotExist = true; }
        }
    }

    if (doAnyFoldersNotExist) {
        console.error('Some configured path could not be verified as created.');
        return false;
    }
});

gulp.task('build-copy-app', ['build-create-folders'], () => {
    console.log('[gulp::build-copy-app] Copying PHP app files in src/application to dist/application.');

    const srcFiles = path.resolve(pathSrcApp, '**/*.php');

    return gulp.src(srcFiles)
        .pipe(gulp.dest(pathDistApp));
});

gulp.task('build-copy-web', ['build-create-folders'], () => {
    console.log('[gulp::build-copy-web] Copying PHP app files in src/web to dist/web.');

    const srcFiles = [
        path.resolve(pathSrcWeb, '*.php'),
        path.resolve(pathSrcWeb, '.htaccess')
    ];

    return gulp.src(srcFiles)
        .pipe(gulp.dest(pathDistWeb));
});

gulp.task('build-sass', ['build-create-folders'], () => {
    console.log('[gulp::build-sass] Transpiling SASS to CSS and generating output.');

    const srcFiles = path.resolve(pathSrcWebStyles, 'appStyles.scss');

    return gulp.src(srcFiles)
        .pipe(gulpSass().on('error', gulpSass.logError))
        .pipe(gulp.dest(pathDistWebStyles));
});

gulp.task('build-all', ['clean', 'build-copy-app', 'build-copy-web', 'build-sass'], () => {
    console.log('[gulp::build-all] Parent clean then run all build tasks.');
    // TODO - anything else?
});