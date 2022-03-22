const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const { watch } = require('gulp');

function comprimirCSS() {
  return gulp.src('./public/scss/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./public/css'));
};

function moureJS() {
  return gulp.src('./node_modules/bootstrap/dist/js/*')
    .pipe(gulp.dest('./public/js'));
};

function watcher() {
    watch('./public/scss/**/*.scss', comprimirCSS);
};

exports.compila = comprimirCSS;
exports.pasaJS = moureJS;
exports.actualitza = watcher;