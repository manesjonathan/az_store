/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.php"],
  theme: {
    extend: {
      fontFamily: {
        'ubuntu': ['Ubuntu', 'sans-serif'],
        'londrina': ['Londrina Outline', 'cursive']
      }
    },
  },
  plugins: [],
}
