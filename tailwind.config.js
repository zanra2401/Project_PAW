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
        'base-color': '#83493d',
        'warna-second': '#c48d6e',
        'warna-third': '#68422d',
        'bg-cerah' : "#d7dbdd"
      },
    },
  },
  plugins: [],
}

