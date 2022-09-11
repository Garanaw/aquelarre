module.exports = {
  content: [
      './resources/views/welcome.blade.php',
      './app/**/Presentation/Resources/views/**/*.blade.php',
      './resources/**/*.{js,ts}',
      './resources/**/*.vue',
  ],
  darkMode: 'class', // or 'media'
  theme: {
      extend: {
          fontFamily: {
              aquelarre: ['Aquelarre', 'sans-serif'],
          }
      },
  },
  plugins: [
      require('@tailwindcss/typography'),
  ],
}
