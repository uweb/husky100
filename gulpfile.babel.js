import gulp from 'gulp';
import sass from 'gulp-sass';
import dartSass from 'sass';
import sourcemaps from 'gulp-sourcemaps';
import babel from 'gulp-babel';
import browserSync from 'browser-sync';
import concat from 'gulp-concat';
import terser from 'gulp-terser';

const scss = sass(dartSass);

// Initialize Browser Sync
const server = browserSync.create();

function reload(done) {
    server.reload();
    done();
}

function serve(done) {
	server.init({
		proxy: 'https://uw-multisite.local/',
		port: '8181',
       // open: false
	});
	done();
}

export function styles() {
  return gulp.src('./dev/sass/husky100.scss')         // input SCSS
    .pipe(sourcemaps.init())
    .pipe(scss().on('error', scss.logError))
   // .pipe(autoprefixer())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./css'));                  // output CSS 
}console.log(styles)

export function scripts() {
    return gulp.src('./dev/js/tiles.dev.js')
        .pipe(babel())
        .pipe(terser())
        .pipe(concat('./tiles.js'))
        .pipe(gulp.dest('./js'));
}
export function watch() {
    gulp.watch('./dev/sass/husky100.scss', gulp.series(styles, reload) ) ;
    gulp.watch('./dev/js/tiles.dev.js', gulp.series(scripts, reload));
}

//export default gulp.series(styles, scripts, watch);
// Run serve on first load, which also watches
const firstRun = gulp.series(scripts, styles, serve, watch);
export default firstRun;