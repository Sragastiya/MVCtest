/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./app/views/**/*.php"],
  prefix: "tw-",
  corePlugins: {
    preflight: false,
  },
  theme: {
    extend: {},
  },
  plugins: [],
};
