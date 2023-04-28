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
    './public/js/website/**/*.js',
    './node_modules/flowbite/**/*.js'
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
      fontSize: {
        13: '0.813rem', // 13px
        15: '0.938rem', // 15px
        22: '1.375rem' // 22px
      },
      colors: {
        hsm: {
          yellow: {
            100: '#FFD200'
          },
          light: {
            100: '#F5F6FF',
            200: '#F9FAFF'
          },
          dark: {
            100: '#1b1b21'
          },
          gray: {
            100: '#303039',
            200: '#565765'
          },
          blue: {
            100: '#304FFE'
          },
          purple: {
            50: '#E8E8FF',
            100: '#A9AFD2',
            200: '#6749E6'
          },
          green: {
            100: '#00BA5E',
            200: '#00BF66'
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
