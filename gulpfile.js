const gulp = require('gulp');
const less = require('gulp-less');
const lessGlob = require('gulp-less-glob');
const cleanCSS = require('gulp-clean-css');
const gulpautoprefixer = require('gulp-autoprefixer');
const browserSync = require('browser-sync').create();
const reload = browserSync.reload;

gulp.task('less', () => {
    return gulp.src('src/less/styles.less')
        .pipe(lessGlob())
        .pipe(less())
        .pipe(gulp.dest('assets/'));
});

gulp.task('minify-css', () => {
  return gulp.src('assets/styles.css')
    .pipe(cleanCSS({debug: true}, (details) => {
    }))
    .pipe(gulp.dest('assets/'));
});


gulp.task('styles', gulp.series(['less', 'minify-css']));

gulp.task('watch', function(){
  gulp.watch('src/less/**/*.less', gulp.series(['less', 'minify-css']));
})
