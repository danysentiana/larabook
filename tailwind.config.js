/** @type {import('tailwindcss').Config} */
module.exports = {
    // mode: "jit",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
                litPur: "#dc166d",
            },
        },
    },
    darkMode: "class",
    plugins: [require("flowbite/plugin")],
};
