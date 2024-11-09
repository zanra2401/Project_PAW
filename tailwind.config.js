/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/views/**/*.php"
  ],
  theme: {
    extend: {
      fontFamily: {
        'Roboto-normal': ['Roboto normal'],
        'Roboto-medium': ['Roboto medium'],
        'Roboto-bold': ['Roboto bold']
      },
      colors: {
        'base-color': '#b5966f',
      },
    },
  },
  plugins: [],
}

