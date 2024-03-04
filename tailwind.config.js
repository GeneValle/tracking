import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            colors: {
                custom: {
                    'header': '#fffbf8',
                    'linksmenu': 'rgba(34,34,34,.7)',
                    'hoverlinksmenu' : '#b68b44',
                    'morado' : '#7b3a7d'
                },
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('flowbite/plugin'), forms, typography],
};
