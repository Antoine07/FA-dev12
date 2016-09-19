let gulp = require('gulp'),
    minify = require('gulp-minify-css'),
    sass = require('gulp-sass'),
    rename = require('gulp-rename'),
    uglify = require('gulp-uglify')

let path = {
    'public': {
        'css' : './public/assets/materialize/css',
        'js' : './public/assets/js'
    },
    'resources': {
        'sass': './resources/sass',
    },
    'sass': "./resources/sass/**/*.scss",

}

gulp.task('sass', function () {
    return gulp.src(path.resources.sass + '/app.scss')
        .pipe(sass({
            onError: console.error.bind(console, 'SASS ERROR')
        }))
        .pipe(minify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(path.public.css))
});

gulp.task('watch',['sass'],  function(){
    gulp.watch(path.sass, ['sass'])
});

gulp.task('default', ['watch'])