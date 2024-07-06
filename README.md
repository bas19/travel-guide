## Travel App

A simple travel guide application. The codebase setup is like a monolithic but it uses a backend API to support other single page applications in the future. It uses a service pattern to cater to other third-party API.

The frontend UI is built on VueJS, it is a simple one with a modal popup for information.
It is responsive and easy to use.

## Steps to run the app via CLI

1. rename .env.example to .env
2. composer install
3. php artisan key:generate
4. php artisan migrate
5. npm install
6. npm run build
