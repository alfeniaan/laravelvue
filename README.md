Instalasi Backend Laravel

1. import sample_data.sql pada phpmyadmin
2. sesuaikan .env pada line DB_DATABASE dengan nama database yang telah dibuat
3. cd laravel-app
4. php artisan serve

Instalasi Frontend Vue

1. cd vue-app
2. npm run dev
3. sesuaikan link di src/App.vue
   axios.get('http://127.0.0.1:8000/api/data')
   sesuaikan isi axios.get dengan link server dari laravel
