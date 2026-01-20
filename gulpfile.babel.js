import gulp from 'gulp';
import sass from 'gulp-sass';
import dartSass from 'sass';
import sourcemaps from 'gulp-sourcemaps';

const scss = sass(dartSass);

export function styles() {
  return gulp.src('./sass/husky100.scss')         // input SCSS
    .pipe(sourcemaps.init())
    .pipe(scss().on('error', scss.logError))
   // .pipe(autoprefixer())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./css'));                  // output CSS in same folder
}

export function watch() {
  gulp.watch('./sass/husky100.scss', styles);
}

export default gulp.series(styles, watch);