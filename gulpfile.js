const gulp = require('gulp'); // Gulp 
const del = require('del'); // Eliminar archivos
const stylus = require('gulp-stylus'); // Stylus
const pug = require('gulp-pug'); // Pug
const concat = require('gulp-concat'); // Concatenar muchos archivos en uno solo
const uglify = require('gulp-uglify'); // Minizar JS
const rename = require('gulp-rename'); // Renombrar archivos 
const cssmin = require('gulp-clean-css'); // Minimizar css
const sourcemaps = require('gulp-sourcemaps'); // Hacer Sourcemaps auto
const bsp = require('bulma-stylus-plus'); // Bulma para Stylus
const imagemin = require('gulp-imagemin'); // minimizar imagenes

const log = require('fancy-log'); // Logger 

// Convierte los archivos .pug en .php
gulp.task('pug', () => {
    return gulp.src('src/**/*.pug')
    .pipe(pug())
    .pipe(rename({
        extname: '.php'
    }))
    .pipe(
        gulp.dest('dist')
    )
    .on('end', () => {log('Lo guardo!')})
});

gulp.task('js', () => {
    return gulp.src('src/assets/js/**/*.js')
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(concat('main.js'))
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(sourcemaps.write())
        .pipe(
            gulp.dest('dist/assets/js')
        )
        .on('end', () => {log('Ha terminado JS!')})
});

gulp.task('stylus', () => {
    return gulp.src('src/assets/**/*.styl')
        .pipe(sourcemaps.init())
        .pipe(stylus({
            "use": bsp(),
            "import": ["bulma-stylus-plus"]
        }))
        .pipe(cssmin())
        .pipe(concat('style.css'))
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(sourcemaps.write())
        .pipe(
            gulp.dest('dist/assets/css')
        )
        .on('end', () => {log('proceso Stylus terminado')})
});

gulp.task('static', () => {
    return gulp.src('src/**/*.php')
    .pipe(
        gulp.dest('dist')
    )
    .on('end', () => {
        log('proceso static terminado')
    })
}); 

gulp.task('min-img', () => {
    return gulp.src('src/assets/img/*')
        .pipe(imagemin({
            optimizationLevel: 5,
            progressive: true, 
            interlaced: true
        }))
        .pipe(
            gulp.dest('dist/assets/img')
        )
        .on('end', ()=>{log('Proceso min-img terminado')});
});
gulp.task('clean-img', (cb) => {
    return del('dist/assets/img', cb);
});

gulp.task('img', gulp.series(['clean-img', 'min-img']));

gulp.task('pdf', () => {
    return gulp.src('src/**/*.pdf')
    .pipe(gulp.dest('dist'));
});

gulp.task('watch', () => {
    gulp.watch('src/assets/**/*.styl', gulp.series(['stylus']))
    .on('error', (err) => {
        log('error:' + err);
    });
    gulp.watch('src/**/*.pdf', gulp.series(['pdf']));
    gulp.watch('src/**/*.php', gulp.series(['static']));
    gulp.watch('src/**/*.pug', gulp.series(['pug']));
    gulp.watch('src/assets/js/**/*.js', gulp.series(['js']));
    
});

gulp.task('default', gulp.series(['static','pug', 'stylus', 'pdf','watch']));