import gulp from 'gulp';
import babel from 'gulp-babel';
import browserSync from 'browser-sync';
import concat from 'gulp-concat';
import cssnano from 'cssnano';
//import eslint from 'gulp-eslint';
import postcss from 'gulp-postcss';
import postcssPresetEnv from 'postcss-preset-env';
import print from 'gulp-print';
import dartSass from 'sass'; // Dart Sass
import gulpSass from 'gulp-sass'; // Gulp Sass
import uglify from 'gulp-uglify';

const sass = gulpSass(dartSass); // Use DartSass with Gulp Sass; note, this did not change anything in Sass!


const paths = {
	styles: {
		src: ['dev/scss/**/*.scss', '!dev/scss/**/_*.scss'] ,
		dest: 'css/'
	},
	scripts: {
		src: 'dev/js/**/*.js',
		dest: 'js/'
	}
};

// Initialize Browser Sync
const server = browserSync.create();
//const getPostcssPresetEnv = async () => (await import('postcss-preset-env')).default;

function reload(done) {
	server.reload();
	done();
}

function serve(done) {
	server.init({
		proxy: 'https://uw-multisite.local/', 
		port: 8181,
	});
	done();
}

/*
* You can also declare named functions and export them as tasks
*/
export function styles() {
	return gulp.src(paths.styles.src)
		.pipe(print())
		.pipe(sass.sync({
			outputStyle: 'compressed',
			precision: 2,
			errLogToConsole: true,
		}).on('error', sass.logError))
		.pipe(postcss([
			postcssPresetEnv({
				autoprefixer: { grid: false }
			}),
			cssnano
		]))
		.pipe(concat('husky100.css'))
		.pipe(gulp.dest(paths.styles.dest));
}

export function scripts() {
	return gulp.src(paths.scripts.src)
		.pipe(print())
		// .pipe(eslint())
		// .pipe(eslint.format())
		.pipe(babel())
		.pipe(uglify())
		.pipe(concat('main.min.js'))
		.pipe(gulp.dest(paths.scripts.dest));
}



export function watch() {
	gulp.watch(paths.scripts.src, gulp.series(scripts, reload));
	gulp.watch(paths.styles.src, gulp.series(styles, reload));
	
}

// Run serve on first load, which also watches
const firstRun = gulp.series(scripts,  styles, serve, watch);

/**
 * Run the whole thing.
 */
export default firstRun;
