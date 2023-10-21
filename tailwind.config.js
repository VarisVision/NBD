
module.exports = {
  content: ['**/*.scss'],
  theme: {
    extend: {},
  },
  plugins: [require("tailwindcss"), require("postcss"), require("autoprefixer"), require('postcss-nested')],
}

