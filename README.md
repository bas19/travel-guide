## Travel App

A simple travel guide application. The codebase setup is like a monolithic but it uses a backend API to support other single page applications in the future. It uses a service pattern to cater to other third-party API.

The frontend UI is built on VueJS, it is a simple one with a modal popup for information.
It is responsive and easy to use.

## Steps to run the app via CLI

1. rename .env.example to .env
2. add the following data below in the .env file

```
  WEATHER_MAP_API_URL=https://api.openweathermap.org/data/2.5
  WEATHER_MAP_API_KEY=ca3a0418d40242bcbe484d1905563974
  FOURSQUARE_API_URL=https://api.foursquare.com/v3
  FOURSQUARE_AUTH_TOKEN=fsq3r5VYUNU3P47+3cvLtGgjLec110oCqZrUAPbgOG05zyk=
```

3. composer install
4. php artisan key:generate
5. php artisan migrate
6. npm install
7. npm run build
8. php artisan serve
