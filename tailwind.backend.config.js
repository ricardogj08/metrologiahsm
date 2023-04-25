/** @type {import('tailwindcss').Config} */
/**
 * Archivo de configuración de Tailwind CSS para el backend.
 */
module.exports = {
  content: [
    './app/Views/backend/**/*.php',
    './public/js/backend/**/*.js',
    './node_modules/flowbite/**/*.js'
  ],
  theme: {
    extend: {
      container: {
        center: true,
        padding: {
          DEFAULT: '1rem' // < 540px
        }
      }
    }
  },
  plugins: [
    require('daisyui')
  ],
  // daisyUI config
  daisyui: {
    styled: true,
    themes: true,
    base: true,
    utils: true,
    logs: true,
    rtl: false,
    darkTheme: 'dark',
    prefix: ''
  }
}
