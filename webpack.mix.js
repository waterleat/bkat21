/*
 * Bka2021 uses AWPS which uses Laravel Mix
 *
 * Check the documentation at
 * https://laravel.com/docs/5.6/mix
 */

let mix = require( 'laravel-mix' );

var tailwindcss = require('tailwindcss');

// BrowserSync and LiveReload on `npm run watch` command
// Update the `proxy` and the location of your SSL Certificates if you're developing over HTTPS
// mix.browserSync({
// 	proxy: 'https://your-local-domain',
// 	https: {
// 		key: '/your/certificates/location/your-local-domain.key',
// 		cert: '/your/certificates/location/your-local-domain.crt'
// 	},
// 	files: [
// 		'**/*.php',
// 		'assets/dist/css/**/*.css',
// 		'assets/dist/js/**/*.js'
// 	],
// 	injectChanges: true,
// 	open: false
// });
mix.browserSync({
	proxy: 'localhost:8080/',
	files: [
		'**/*.php',
		'assets/dist/css/**/*.css',
		'assets/dist/js/**/*.js'
	],
	injectChanges: true,
	open: false
});

// Autloading jQuery to make it accessible to all the packages, because, you know, reasons
// You can comment this line if you don't need jQuery
mix.autoload({
	'jquery': ['jQuery', '$']
});

mix.setPublicPath( './assets/dist' );

// Compile assets
mix.js( 'assets/src/scripts/app.js', 'assets/dist/js' )
	// .js( 'assets/src/scripts/admin.js', 'assets/dist/js' )
	// .js( 'assets/src/scripts/dojomap.js', 'assets/dist/js' )
	.js( 'assets/src/scripts/front.js', 'assets/dist/js' )
	// .js( 'assets/src/scripts/geo.js', 'assets/dist/js' )
	// .js( 'assets/src/scripts/geosm.js', 'assets/dist/js' )
	.js( 'assets/src/scripts/xl.js', 'assets/dist/js' )

	// .react( 'assets/src/scripts/gutenberg.js', 'assets/dist/js' )
	.sass( 'assets/src/sass/style.scss', 'assets/dist/css' )
	.sass( 'assets/src/sass/admin.scss', 'assets/dist/css' )
	// .sass( 'assets/src/sass/front.scss', 'assets/dist/css' )
	// .sass( 'assets/src/sass/gutenberg.scss', 'assets/dist/css' )
	// .sass( 'assets/src/sass/editor.scss', 'assets/dist/css' )

  .options({
    processCssUrls: false,
    postCss: [ tailwindcss('./tailwind.config.js') ],
  });

// Add versioning to assets in production environment
// need to check if this needs extra files
// if ( mix.inProduction() ) {
// 	mix.version();
// }
