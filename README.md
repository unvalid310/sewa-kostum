## Cara Install<br>

1. resotre databse `app-sewa-kostum.sql`<br>
2. `install composer` pada folder project<br>

## Implementasi Midtrans

1. buat akun midtrans https://dashboard.midtrans.com/register<br>
2. login akun midtrans, pada halaman dashboard ubah `environment` menjadi `sandbox`<br>
   <img width="1512" alt="Screenshot 2024-01-22 at 02 11 58" src="https://github.com/unvalid310/sewa-kostum/assets/52092940/9d4a06da-d6f8-4dd0-a3e8-8e83cd13c79a"><br>
3. pilih manu `settings > access keys` dan copy semua `API Keys`<br>
   <img width="1512" alt="Screenshot 2024-01-22 at 02 14 25" src="https://github.com/unvalid310/sewa-kostum/assets/52092940/ee72a434-65b3-4ea9-9519-a18ed98b3ac7"><br>
4. buka file `.env` lalu masukan `API keys` midtrans<br>
   <img width="769" alt="Screenshot 2024-01-22 at 02 05 21" src="https://github.com/unvalid310/sewa-kostum/assets/52092940/1b78f4df-b950-4013-847f-f9576cd99568"><br>

## Runing aplikasi

1. buat akun dan install `ngrok`<br>
2. konfigurasi file `ngrok.yml` <br>
   <img width="603" alt="Screenshot 2024-01-22 at 02 01 36" src="https://github.com/unvalid310/sewa-kostum/assets/52092940/1ae9291d-5176-4b0a-b671-2e791cfc3fa6"><br>
3. buka file `.env` ubah `APP_DEBUG` menjadi `false`<br>
   <img width="574" alt="Screenshot 2024-01-22 at 02 03 58" src="https://github.com/unvalid310/sewa-kostum/assets/52092940/5526870e-8923-4446-a7cb-f315bf7fef45"><br>
4. jalan kan aplikasi dengan cara `php artisan serve --port=8080` di terminal<br>
   <img width="545" alt="Screenshot 2024-01-22 at 02 08 14" src="https://github.com/unvalid310/sewa-kostum/assets/52092940/d2abf4f3-130f-421b-990c-c240ccfa24b4"><br>
5. kemudian jalankan ngrok dengan cara ketik `ngrok start dev` di terminal<br>
   <img width="547" alt="Screenshot 2024-01-22 at 02 08 50" src="https://github.com/unvalid310/sewa-kostum/assets/52092940/e592388c-5e01-4e28-9069-4c37a008b914"><br>
6. copy alamat foward url ngrok<br>
   <img width="961" alt="Screenshot 2024-01-22 at 02 08 58" src="https://github.com/unvalid310/sewa-kostum/assets/52092940/ae573524-6986-4661-8c11-c058a23d00ad"><br>
7. masuk ke midtrans `environment > sandbox > settings > configration` paste-kan alamat tadi pada field Payment notification url `http://foward_url/payments/midtrans-notification` lalu `save` configurasi<br>
   <img width="1512" alt="Screenshot 2024-01-22 at 02 15 46" src="https://github.com/unvalid310/sewa-kostum/assets/52092940/bfbd93a1-6b2a-498c-828f-1d8e4327b49b"><br>

##simualsi pembayaran

1. pilih metode pembayaran dan copy nomor pembayaran<br>
   ![sewa-kostum_pilih-metode-pembayaran](https://github.com/unvalid310/sewa-kostum/assets/52092940/40481765-6f54-4816-914d-f61d7f6a4d94)<br>
2. masuk https://simulator.sandbox.midtrans.com/openapi/va/index setelah itu pilih metdoe pembayaran sesuai dengan aplikasi dan paste-kan nomor pembayaran danl klik `inqure`<br>
   <img width="1512" alt="Screenshot 2024-01-22 at 09 37 57" src="https://github.com/unvalid310/sewa-kostum/assets/52092940/63b12ae4-f607-4e1c-98d8-ff0cfe5c77c0"><br>
3. jika pemesanan benar maka akan muncul detail pembeli dan jumlah uang yang dibayarkan<br>
   ![sewa-kostum_simulasi-pembayaran](https://github.com/unvalid310/sewa-kostum/assets/52092940/e093fed0-96e3-4633-93f5-77291e5387a5)<br>
4. klik play maka sistem akan otomatis mengubah status pesanan.
