import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    daisyui: {
        themes: [
            {
                mytheme: {
                    "primary": "#a7f9d8",
                    "secondary": "#f998d9",
                    "accent": "#c7d356",
                    "neutral": "#181b2a",
                    "base-100": "#3d364a",
                    "info": "#9fade5",
                    "success": "#2cdd88",
                    "warning": "#a05903",
                    "error": "#eb3752",
                },
            },
        ],
    },

    plugins: [forms, require("daisyui")],
};
