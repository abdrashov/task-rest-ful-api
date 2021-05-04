const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
	purge: ['./storage/framework/views/*.php', './resources/views/**/*.blade.php'],
    darkMode: false, // or 'media' or 'class'
    theme: {
    	extend: {
    		fontFamily: {
    			sans: ['Nunito', ...defaultTheme.fontFamily.sans],
    		},
    	},
    },
    variants: {
    	extend: {
    		opacity: ['disabled'],
    	},
    },
    plugins: [require('@tailwindcss/forms')],
 };