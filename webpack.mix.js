const mix = require('laravel-mix');

mix.browserSync({
	proxy: process.env.APP_URL,
	notify: false
});
mix.setPublicPath('public_html/');
mix.js('resources/js/app.js', 'js').vue();
mix.postCss('resources/css/app.css', 'css', [
	require('tailwindcss'),
	require('autoprefixer'),
]);
