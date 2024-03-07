/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/views/admin/admin.blade.php",
    "./resources/views/admin/managUsers.blade.php",
    "./resources/views/admin/eventsAccept.blade.php",
    "./resources/views/layouts/adminNav.blade.php",
    "./resources/views/client/client.blade.php",
    "./resources/views/client/home.blade.php",
    "./resources/views/client/ticket.blade.php",
    "./resources/views/client/clientTickets.blade.php",
    "./resources/views/organizer/organizer.blade.php",
    "./resources/views/organizer/reservation.blade.php",
    "./resources/views/register.blade.php",
    "./resources/views/login.blade.php",
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    
  ],

  theme: {
    extend: {},
  },
  plugins: [],
}

