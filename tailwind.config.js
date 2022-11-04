/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    colors: {
      black: "#252525",
      blue: [
        "#e6f2ff",
        "#cce6ff",
        "#99ccff",
        "#66b3ff",
        "#3399ff",
        "#0080ff",
        "#0066cc",
        "#004d99",
        "#003366",
        "#001a33",
      ]
      },
    extend: {},
  },
  plugins: [],
}