/**
 *  Gulp File
 *
 *  Used for automating development tasks.
 */

/* Modules (Can be installed with npm install command using package.json)
 ------------------------------------- */
 gulp = require('gulp'),
 notify = require('gulp-notify'),
 sort = require('gulp-sort'),
 checktextdomain = require('gulp-checktextdomain'),
 wpPot = require('gulp-wp-pot'),

 /* Text-domain task
 ------------------------------------- */
gulp.task('textdomain', function () {
    var options = {
        text_domain: 'TAF',
        keywords: [
            '__:1,2d',
            '_e:1,2d',
            '_x:1,2c,3d',
            'esc_html__:1,2d',
            'esc_html_e:1,2d',
            'esc_html_x:1,2c,3d',
            'esc_attr__:1,2d',
            'esc_attr_e:1,2d',
            'esc_attr_x:1,2c,3d',
            '_ex:1,2c,3d',
            '_n:1,2,4d',
            '_nx:1,2,4c,5d',
            '_n_noop:1,2,3d',
            '_nx_noop:1,2,3c,4d'
        ],
		correct_domain: true
    };
    gulp.src(
            [
                '**/*.php',                   // Include all files
                '!language/**',               // Exclude language/
                '!includes/lib/**',     	  // Exclude libraries/
                '!node_modules/**',           // Exclude node_modules/
                '!vendor/**',                 // Exclude vendor/
                '!assets/**',                 // Exclude assets/
                '!.github/**',                // Exclude .github/
                '!.wordpress-org/**',         // Exclude .github/
            ]
        )
        .pipe(checktextdomain(options))
        .pipe(notify({
            message: 'Textdomain task complete!',
            onLast: true //only notify on completion of task
        }));
});

/* POT file task
 ------------------------------------- */
 gulp.task('pot', function () {
    return gulp.src('**/*.php')
        .pipe(sort())
        .pipe(wpPot({
            package: 'Twitter API Feed',
            domain: 'TAF',
            bugReport: 'https://github.com/ajitbohra/twitter-api-feed/issues/new',
            lastTranslator: '',
            team: 'Ajit Bohra <ajit@lubus.in>'
        }))
        .pipe(gulp.dest('languages/twitter-api-feed.pot'));
});

/* Default Gulp task
 ------------------------------------- */
 gulp.task('default', function () {
	// Run all the tasks!
	gulp.start('textdomain','pot');
});
