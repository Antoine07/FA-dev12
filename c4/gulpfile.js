let gulp = require('gulp'),
    minify = require('gulp-minify-css'),
    sass = require('gulp-sass'),
    rename = require('gulp-rename'),
    uglify = require('gulp-uglify'),
    babel = require('babelify')

let path = {
    'public': {
        'css' : './public/assets/materialize/css',
        'js' : './public/assets/js'
    },
    'resources': {
        'sass': './resources/sass',
        'js': './resources/js'
    },
    'sass': "./resources/sass/**/*.scss",
    'js': "./resources/app/**/*.js"
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

gulp.task('js', function () {

    return gulp.src(path.resources.js + '/app.js')
        /*.pipe(uglify())*/
        //.transform(babel,{presets: ["es2015"]})
        //.bundle()
        //.pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(path.public.js))
});

gulp.task('watch',['sass', 'js'],  function(){
    gulp.watch(path.sass, ['sass'])
    gulp.watch(path.js, ['js'])
});

gulp.task('default', ['watch'])