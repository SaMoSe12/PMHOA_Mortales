const gulp = require('gulp');
const log = require('fancy-log');
const stylus = require('gulp-stylus');
const pug = require('gulp-pug');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const rename = require('gulp-rename');

gulp.task('pug', () => {
    return gulp.src('src/**/*.pug')
    .pipe(pug())
    .on('end', () => {log('termino PUG!')})
    .pipe(rename({
        extname: '.php'
    }))
    .on('end', () => {log('Lo renombro!')})
    .pipe(
        gulp.dest('dist')
    )
    .on('end', () => {log('Lo guardo?')})
});