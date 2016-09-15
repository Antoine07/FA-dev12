let gulp = require('gulp'),
    minify = require('gulp-minify-css'),
    sass = require('gulp-sass'),
    rename = require('gulp-rename'),
    uglify = require('gulp-uglify'),
    ts = require('gulp-typescript'),
    tsProject = ts.createProject('./resources/ts/tsconfig.json')

let path = {
    'public': {
        'css' : './public/assets/materialize/css',
        'js' : './public/assets/js'
    },
    'resources': {
        'sass': './resources/sass',
        'ts': './resources/ts'
    },
    'sass': "./resources/sass/**/*.scss",
    'ts': "./resources/ts/app/**/*.ts"

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

gulp.task("ts", function () {
    return tsProject.src(path.resources.ts + '/app.ts')
        .pipe(ts(tsProject))
        //.pipe(uglify())
        /*.pipe(rename({suffix: '.min'}))*/
        .js.pipe(gulp.dest(path.resources.ts + '/build'))
})

gulp.task('copy', function () {
    return gulp.src(path.resources.ts + '/build/**/*.js')
    .pipe(gulp.dest(path.public.js + '/app'))
})

gulp.task('watch',['sass', 'ts'],  function(){
    gulp.watch(path.sass, ['sass'])
    gulp.watch(path.ts, ['ts', 'copy'])
});

gulp.task('default', ['watch'])