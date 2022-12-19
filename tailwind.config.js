/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        fontFamily: {
            sans: ["Poppins", "sans-serif"]
        },
        colors: {
            nav: "#141416",
            black: "#2C3333",
            gray: "#111827",
            white: "#EAEAEA",
            transparent: "transparent",
            green: "#00D100",
            red: "#FF033E",
            'red': {
                100: "#FEE2E2",
                200: "#FECACA",
                300: "#FCA5A5",
                400: "#F87171",
                500: "#EF4444",
                600: "#DC2626",
                700: "#B91C1C",
                800: "#991B1B",
                900: "#7F1D1D",
            }
        },
        extend: {},
    },
    plugins: [],
}
