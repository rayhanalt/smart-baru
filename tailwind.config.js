/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  daisyui: {
    themes: [
      "luxury",
      "cupcake",
      "forest",
      "business",
      "valentine"
    ],
  },
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/typography'),
    require("daisyui"),
  ],
}
