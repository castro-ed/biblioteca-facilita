/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      "./resources/views/**/*.blade.php",
      "./resources/js/**/*.js"
    ],
    theme: {
      extend: {
        colors: {
          primary: {
            50:  '#f4f0f8',
            100: '#e4daf1',
            200: '#c6b0e3',
            300: '#a783d3',
            400: '#8945c4',
            500: '#6d23ab',
            600: '#520a87',
            700: '#260264', 
            800: '#1b013d',
            900: '#120029',
          }
        }
      },
    },
    plugins: [],
  }
