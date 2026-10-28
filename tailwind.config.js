/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./app/views/**/*.php"],
  prefix: "tw-",
  theme: {
    extend: {
      fontFamily: {
        sans: ["Inter", "Arial", "sans-serif"],
      },
    },
  },
  plugins: [],
};
