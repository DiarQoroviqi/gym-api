module.exports = {
  content: [
      "./index.html",
      "./src/**/*.{vue,js,html,ts,jsx,tsx}",
  ],
  theme: {
    extend: {},
  },
  plugins: [
      require('@tailwindcss/forms')
  ],
}
