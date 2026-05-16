/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",            // Archivos PHP en la raíz
    "./*.html",           // Archivos HTML en la raíz (por si acaso)
    "./src/**/*.{js,css}", // Archivos JS y CSS dentro de src
    "./**/*.php"          // Busca archivos PHP en cualquier subcarpeta profunda
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}