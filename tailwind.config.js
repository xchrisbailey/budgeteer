const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  purge: {
    content: ['./storage/framework/views/*.php', './resources/views/**/*.blade.php'],
    options: {
      whitelist: ['w-1/6', 'w-1/5', 'w-1/4', 'w-1/3', 'w-2/5', 'w-1/2', 'w-3/5', 'w-2/3', 'w-3/4', 'w-4/5', 'w-5/6'],
    },
  },

  theme: {
    extend: {
      fontFamily: {
        sans: ['Noto Sans', ...defaultTheme.fontFamily.sans],
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
