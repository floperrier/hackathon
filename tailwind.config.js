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
    ],

    theme: {
        colors: ({ colors }) => ({
            inherit: colors.inherit,
            current: colors.current,
            transparent: colors.transparent,
            black: '#282B2A',
            white: '#FDFDFD',
            slate: colors.slate,
            gray: colors.gray,
            zinc: colors.zinc,
            neutral: colors.neutral,
            stone: colors.stone,
            red: {
                50: '#E53F49',
                100: '#E53F49',
                200: '#E53F49',
                300: '#E53F49',
                400: '#E53F49',
                500: '#E53F49',
                600: '#E53F49',
                700: '#E53F49',
                800: '#E53F49',
                900: '#E53F49',
                950: '#E53F49',
            },
            orange: colors.orange,
            amber: colors.amber,
            yellow: colors.yellow,
            lime: colors.lime,
            green: {
                50: '#00BB7E',
                100: '#00BB7E',
                200: '#00BB7E',
                300: '#00BB7E',
                400: '#00BB7E',
                500: '#00BB7E',
                600: '#00BB7E',
                700: '#00BB7E',
                800: '#00BB7E',
                900: '#00BB7E',
                950: '#00BB7E',
            },
            emerald: colors.emerald,
            teal: colors.teal,
            cyan: colors.cyan,
            sky: colors.sky,
            blue: {
                50: '#5B98D2',
                100: '#5B98D2',
                200: '#5B98D2',
                300: '#5B98D2',
                400: '#5B98D2',
                500: '#5B98D2',
                600: '#5B98D2',
                700: '#5B98D2',
                800: '#5B98D2',
                900: '#5B98D2',
                950: '#5B98D2',
            },
            indigo: colors.indigo,
            violet: colors.violet,
            purple: colors.purple,
            fuchsia: colors.fuchsia,
            pink: colors.pink,
            rose: colors.rose,
          }),

        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography, require("daisyui")],
    darkMode: 'class',
    daisyui: {
        themes: ["light", "dark", "cupcake"],
        utils: true,
        styled: true,
    },
};
