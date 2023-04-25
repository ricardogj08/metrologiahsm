/** @type {import('tailwindcss').Config} */
/**
 * Archivo de configuración de Tailwind CSS
 * para el sistema web, el sitio web y las landings.
 */
module.exports = {
  content: [
    './app/Views/system/**/*.php',
    './public/js/system/**/*.js',
    './app/Views/landing/**/*.php',
    './public/js/landing/**/*.js',
    './app/Views/website/**/*.php',
    './public/js/website/**/*.js'
  ],
  theme: {
    extend: {
      container: {
        center: true
      },
      padding: {
        DEFAULT: '1rem'
      }
    }
  },
  plugins: []
}
