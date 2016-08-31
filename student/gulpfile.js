let gulp = require('gulp'),
    sass = require('gulp-sass'),
    concat = require('gulp-concat'),
    minify = require('gulp-minify-css'),
    rename = require('gulp-rename');

gulp.task('hello', function () {
    console.log('hello dev');
});

let path = {
    'resources': {
        'sass': './resources/assets/sass',
        'knacss' : './resources/assets/sass'
    },
    'public': {
        'css': './public/assets/css'
    },
    'sass': './resources/assets/**/*.scss'
};

gulp.task('task-sass', function () {

    return gulp.src([ path.resources.sass + '/app.scss'])
        .pipe(sass()) // compilation
        .pipe(minify()) // minifycation
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(path.public.css));
});

gulp.task('watch',  function(){

    gulp.watch(path.sass, ['task-sass']);

});

gulp.task('default', ['watch']);














