const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  purge: ['./storage/framework/views/*.php', './resources/views/**/*.blade.php'],

  theme: {
    extend: {
      fontFamily: {
        sans: ['Nunito', ...defaultTheme.fontFamily.sans],
      },
    },
  },

  variants: {
    extend: {
      opacity: ['disabled'],
      backgroundColor: ['odd', 'even', 'hover'],
    },
  },

  plugins: [require('@tailwindcss/forms')],
};
