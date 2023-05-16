const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./src/**/*.{html,js}",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        // "./node_modules/tw-elements/dist/js/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            gridTemplateRows: {
                "[auto,auto,1fr]": "auto auto 1fr",
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        // require("tw-elements/dist/plugin.cjs"),
        require("@tailwindcss/aspect-ratio"),
    ],
    corePlugins: {
        preflight: false,
        aspectRatio: false,
    },
};
