/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
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
