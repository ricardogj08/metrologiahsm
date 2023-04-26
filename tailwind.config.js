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
      screens: {
        sm: '576px',
        md: '768px',
        lg: '992px',
        xl: '1200px',
        '2xl': '1400px'
      },
      container: {
        center: true,
        padding: {
          DEFAULT: '1rem', // < 540px
          md: '7.125rem', // 540px
          lg: '8.5rem', // 720px
          xl: '7.5rem', // 960px
          '2xl': '8.125rem' // 1140px
        }
      },
      gap: {
        7.5: '1.875rem' // Bootstrap's gutter 30px
      },
      fontFamily: {
        sans: ['Open Sans', 'sans-serif']
      },
      colors: {
        hsm: {
          yellow: {
            100: '#FFD200'
          },
          gray: {
            100: '#303039'
          }
        }
      },
      backgroundImage: {
        'back-landing': "url('../images/landing/pages/landing-hero.webp')"
      }
    }
  },
  plugins: []
}
