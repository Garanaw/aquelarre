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
          },
          boxShadow: {
              '3xl': '0 35px 60px -15px rgba(0, 0, 0, 0.6)',
          }
      },
  },
  plugins: [
      require('@headlessui/tailwindcss'),
      require('@tailwindcss/typography'),
  ],
}
