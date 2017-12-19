const          gulp = require('gulp'),
        browserSync = require('browser-sync');


gulp.task('watch', () => {
	browserSync.init({
		notify: false,
		proxy: 'http://localhost/printfulapp/',
		ghostMode: false
	});

	gulp.watch('./**', () => {
		browserSync.reload();
	});
});