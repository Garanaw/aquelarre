module.exports = {
  content: [
      './resources/views/welcome.blade.php',
      './app/**/Presentation/Resources/views/**/*.blade.php',
      './resources/**/*.{js,ts}',
      './resources/**/*.vue',
      './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
  ],
  darkMode: 'class', // or 'media'
  theme: {
      extend: {
          fontFamily: {
              aquelarre: ['Aquelarre', 'sans-serif'],
          },
          boxShadow: {
              '3xl': '0 35px 60px -15px rgba(0, 0, 0, 0.6)',
          },
          colors: {
              'thunderbird': 'rgb(190, 23, 34)',
          }
      },
  },
  plugins: [
      require('@headlessui/tailwindcss'),
      require('@tailwindcss/typography'),
  ],
}
