KODE SOAL 4

Cara Kerja USHOP
1. Buat database baru dengan nama  ushop di phpmyadmin kemudian import database ushop.sql
2. kemudian buka project mini, setelah proses berlangsung maka akan diarahkan kehalaman login
3. User yang telah terdaftar melakukan input terhadap berupa ID dan Password Jika user id dan password yang diinput sudah benar 
   maka User akan di-direct ke page index berdasarkan Role User pada saat login. Sedangkan apabila id atau password salah maka akan muncul Error Message.
4. Kemudian akan masuk ke page index sesuai dengan role, dimana terdapat 4 role yaitu pembeli, kasir, manager, admin
---Pembeli------
Pada bagian pembeli terdapat Data Table yang berisi produk-produk yang tersedia serta dapat dilihat oleh User pembeli.
User pembeli juga dapat mengakses informasi detail dari setiap produk yang tersedia.jika sudah mengisi form maka akan ada pilihan untuk kembali 
ke bagian awal.
---Kasir--------
Pada bagian kasi terdapat Data Table terhadap produk-produk yang tersedia serta informasi lengkapnya, dimana user kasir dapat mengubah jumlah produk
yang tersedia serta harga pada masing-masing produk tersebut. Apabila Stock / Price = 0 maka Form Edit tersebut akan muncul lagi beserta 
terdapat Error Message.jika sudah mengisi form akan langsung pindah ke page index, jika tidak pada page add tadi silahkan tekan cancel
---Manager-------
Pada halaman ini terdapat Data Table Product serta  button yang akan memunculkan Form yang dapat dilakukan untuk penambahan produk baru.
User manager juga dapat mengubah serta menghapus data product secara bebas. ketika melakukan penambahan produk baru dengan Price / Stock = 0 
maka Form Create tersebut akan muncul lagi dengan Error Message. jika sudah mengisi form akan langsung pindah ke page index, 
jika tidak pada page add tadi silahkan tekan cancel
---Admin--------
Pada halaman ini akan terdapat sebuah Data Table yang berisi informasi terhadap User-User yang telah terdaftar serta terdapat button add new 
untuk menambahkan User baru. User admin dapat melakukan CRUD secara leluasa melalui Button yang telah tersedia. jika sudah mengisi form akan langsung
pindah ke page index, jika tidak pada page add tadi silahkan tekan cancel

5. Seluruh User dapat mengakses pada Detail informasi mereka yang terdapat pada 'welcome', User-user tersebut juga dapat mengakses 
Creator Profile pada bagian 'Profile', jika user ingin kembali kehalaman pertama maka user dapat mengklik ushop
6. Seluruh User dapat melakukan proses keluar [log Out].

--------------------------------------------------------------------
1. Tipe atau kode soal apa yang anda dapatkan dalam pengerjaan mini project anda? Jelaskan secara singkat, proyek apa yang anda buat? (7.5 Poin) 
Tipe 4, mini project dengan portal CRUD (Create, Read, Update & Delete) untuk sebuah supermarket yang bernama Ushop,dimana tiap user harus login terlebih dahulu, 
dimana disini terdapat 4 tingkatan user yaitu role 
1. Pembeli (Dapat melihat barang yang tersedia serta harganya)
2. Kasir (Dapat mengedit stock barang dan harga barang)
3. Manager (Dapat menambahkan barang baru)
4. Admin (Dapat melakukan CRUD secara leluasa pada User) 
dimana masing masing tingkatan memiliki akses yang berbeda.
---------------------------------------------------------------------
2. Secara keseluruhan berapa halaman web yang anda buat? Sebutkan halaman – halaman web anda buat! (7.5 Poin) 
ada 8 halaman web, yaitu 
1. account 
2. admin 
3. cashier 
4. customer 
5. header 
6. index
7. manager 
8. profile 
--------------------------------------------------------
3. Jelaskan secara singkat bagaimana mekanisme atau cara kerja mini project yang anda buat! (7.5 Poin) 
User harus memiliki akun untuk dapat masuk ke mini project ini, dan untuk pendaftaran dilakukan oleh admin. 
Pada awal mini project ini akan memunculkan page login, setelah login user akan masuk ke page index sesuai tingkatan atau role , dimana masing masing 
tingkatan memiliki akses yang berbeda. 
1. Pembeli (Dapat melihat barang yang tersedia serta harganya), dimana user pembeli dapat melihat Data Table yang berisi produk-produk yang tersedia serta 
   dapat melihat produk secara detail.
2. Kasir (Dapat mengedit stock barang dan harga barang), dimana user kasir dapat melihat Data Table terhadap produk-produk yang tersedia serta 
   informasi lengkapnya, serta user kasir dapat mengubah jumlah produk.
3. Manager (Dapat menambahkan barang baru), dimana user manager dapat melihat Data Table Product serta button yang akan memunculkan Form yang dapat 
   dilakukan untuk penambahan produk baru. User manager juga dapat mengubah serta menghapus data product secara leluasa
4. Admin (Dapat melakukan CRUD secara leluasa pada User), dimana Data Table yang berisi informasi terhadap User-User yang telah terdaftar, 
   serta terdapat button add new untuk menambahkan User baru. 

*Akses yang ada pada mini project ini:,
-button edit, jika diklik maka akan pindah ke page edit yang sudah terisi data yang akan diedit,jika selesai klik tombol edit 
 dan page akan pindah ke index dan data berubah sesuai dengan yang diedit
-button delete, jika diklik maka akan muncul pop up "are you sure to delete......", apabila yes ditekan
 data user terpilih akan terhapus jika no maka user tidak akan terhapus
-button create( +barang dan +user), jika ditekan akan pindah ke page add dimana user harus mengisi form, apabila kosong semua user akan diberi notifikasi 
 untuk mengisi semua field,setelah selesai mengisi form tekan tombol dan akan langsung pindah ke page index, jika batal untuk create pada page add silahkan tekan cancel
*page profil dapat diakses dengan klik tulisan welcome pada navbar, kemudian terdapat pilihan yaitu profile.
*page account dapat diakses dengan klik tulisan welcome pada navbar, kemudian terdapat pilihan yaitu account yang berisi data user.
*untuk logout dapat klik tulisan welcome pada navbar.
----------------------------------------------------------------------
4. Sebutkan referensi yang anda gunakan ketika membuat project ini! Tuliskan juga nama teman anda yang membantu anda apabila ada! (7.5 Poin) 
project mini ini saya dibantu teman saya - vera (mencari solusi dalam error yang ada)
referensi dari internet:
https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js
https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js
https://code.jquery.com/jquery-3.4.1.slim.min.js
https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css
https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css
