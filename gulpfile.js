var gulp = require('gulp');
var plugins = require('gulp-load-plugins')();

/**
 * Get Tasks Function
 **/
function getTask(task, options) {
    return require('./gulp-tasks/' + task)(gulp, plugins, options);
}

/**
 * Three Js Task
 **/
gulp.task('three', getTask('three', { name:'three' }));
gulp.watch('resources/assets/three/**/*.js', ['three']);

/**
 * Dev JS Task
 **/
gulp.task('dev', getTask('dev', { name:'dev' }));
gulp.watch('resources/assets/dev/**/*.js', ['dev']);