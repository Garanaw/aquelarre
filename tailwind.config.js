module.exports = {
  content: [
      './resources/views/welcome.blade.php',
      './app/Presentation/**/Resources/views/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue',
  ],
  darkMode: 'class', // or 'media'
  theme: {
      extend: {

      },
  },
  plugins: [
      require('@tailwindcss/typography'),
  ],
}
