var gulp         = require("gulp");
var browserSync  = require("browser-sync");

// browser sync
gulp.task('serve', function() {
	browserSync({
		proxy: 'wocker.dev',
		notify: false,
	});
});

// watch
gulp.task('watch', function () {
	gulp.watch([
		'*.php'
	]).on('change', browserSync.reload);
});

// task
gulp.task('default', ['watch', 'serve']);
