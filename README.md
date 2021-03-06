# Deskripsi Program

Program dibuat untuk memenuhi test Tahap Pertama Paninti, Merupakan program yang menyediakan API untuk mengelola toko dan admin pada tiap toko.  

---

# Fitur

Memiliki 2 Role User yaitu : 

1. Super Admin , memiliki akses untuk melakukan :
   
   1. Login Kedalam Aplikasi
   
   2. Melakukan Pengelolaan Toko (CRUD TOKO)
   
   3. Melakukan Pengelolaan Akun user dengan Role sebagai Admin (CRUD ADMIN)
   
   4. Melakukan Assign admin ke dalam toko yang dipilih
   
   5. Melakukan semua kegiatan yang dilakukan oleh admin, Seperti role user admin,

2. Admin, Memiliki akses untuk melakukan :
   
   1. Login Kedalam Aplikasi
   
   2. Dapat Melihat List dan Detail Toko
   
   3. Melakukan Pengelolaan Data Produk (CRUD PRODUK)
   
   4. Melakukan Pengelolaan Data Kategori Produk (CRUD kategori PRODUK)
   
   5. Melakukan Pengelolaan Data Stock Produk (CRUD Stock Product)



Fitur Tambahan : 

- Registrasi user sebagai role Super Admin

- Menampilkan Data Produk, Kategori Produk dan Stok Produk Berdasarkan Toko yang dipilih

---

# Alat Yang harus dipersiapkan

- Code Editor (Sublime, Visual Studio Code, dll)

- PHP >=7.2

- MySQL

- Postman

- XAMPP / SQL Yog

---

# Cara Install

Sebelum menjalankan program ini ada beberapa langkah installasi yang harus dikerjakan terlebih dahulu. sebagai berikut:

1. Download / Clone File Program ini dari [GitHub - Aghniyan/Paninti-Test](https://github.com/Aghniyan/Paninti-Test/) Ke folder lokal anda.

2. Buat Database dengan nama **db__paninti** lalu import file db_paninti.SQL nya terletak di FolderUtama/paninti.sql

3. Apabila ingin menggunakan migrate dari laravel maka tulis code ini di terminal.
   
   **php artisan migrate**

4. Jalankan Servernya agar bisa kita gunakan di postman dengan perintah terminal **"php artisan serve"**

5. Selesai

---

# Cara Penggunaan

Buka Aplikasi Postman dengan link berikut

> [![Run in Postman](https://ww1.prweb.com/prfiles/2018/10/05/16050123/postman-logo-vert-2018.png)](https://app.getpostman.com/run-collection/a1bb753b18835e01b425)
### Fitur Login

apabila di awal installasi menggunakan import sql ke phpmyadmin maka username dan password defaultnya adalah :

| Role        | username        | password |
| ----------- | --------------- | -------- |
| Super Admin | super@gmail.com | super123 |
| Admin       | admin@gmail.com | admin123 |

jika awalnya menggunakan migrasi maka anda gunakan Registrasi di "Super Admin" > AUTH > REGISTER

### Mengelola Toko

Super admin dapat mengelola toko seperti menambah melihat mengubah dan menghapus toko dengan cara : 



1. Menambah 
   
   Akses Folder "Super Admin > CRUD TOKO > create Toko".  Dengan Method POST masukkan URL http://127.0.0.1:8000/api/super/shop settingan bagian header seperti berikut 
   
   ![](C:\Users\Aghniya\AppData\Roaming\marktext\images\2020-11-05-05-09-49-image.png)
   
   sedangkan pada bagian Body isikan data Seperti berikut, (data bebas)
   
   ![](C:\Users\Aghniya\AppData\Roaming\marktext\images\2020-11-05-05-10-46-image.png)
   
   Untuk hasil dari respone nya akan seperti ini
   
   ![](C:\Users\Aghniya\AppData\Roaming\marktext\images\2020-11-05-05-11-50-image.png)

2. Melihat Keseluruhan Data Toko
   
   Akses Folder "Super Admin > CRUD TOKO > Read Toko". Dengan Method GET masukkan URL http://127.0.0.1:8000/api/super/shop settingan bagian header sama  dan body dikosongkan.

3. Mengubah Data Toko
   
   Akses Folder "Super Admin > CRUD TOKO > Update Toko". Dengan Method PUT masukkan URL http://127.0.0.1:8000/api/super/shop/4, Angka **4** ini digunakan sebagai id_toko yg akan diupdate. settingan bagian header sama dan untuk body sebagai berikut 
   
   ![](C:\Users\Aghniya\AppData\Roaming\marktext\images\2020-11-05-05-14-55-image.png)
   
   4. Menghapus Data Toko 
      
      Akses Folder "Super Admin > CRUD TOKO > Delete Toko". Dengan Method DELETE masukkan URL http://127.0.0.1:8000/api/super/shop/4, Angka **4** ini digunakan sebagai id_toko yang akan dihapus. settingan bagian header sama dan untuk body dihilangkan.
   
   
   
   Untuk Bagian ROLE sebagai Admin, Hanya dapat melihat toko yang dikelola dan update Toko yang dikelolanya. untuk link sama dengan super admin hanya hilangkan **super/** nya.
   
   ### Mengelola Admin
   
   Mengelola Admin ini hanya bisa digunakan oleh Super Admin, memiliki fitur untuk menambah, melihat, mengubah, dan menghapus.
   
   1. Menambah Akun Admin
      
      Akses Folder "Super Admin > CRUD ADMIN > Create Admin". Dengan Method POST masukkan URL http://127.0.0.1:8000/api/super/user, settingan bagian header sama dan untuk body  seperti  ini value nya bebas.
      
      ![](C:\Users\Aghniya\AppData\Roaming\marktext\images\2020-11-05-05-48-17-image.png)
   
   2. Melihat List Admin
      
      Akses Folder "Super Admin > CRUD ADMIN > Read Admin". Dengan Method GET masukkan URL http://127.0.0.1:8000/api/super/user, settingan bagian header sama dan untuk body dikosongkan.
   
   3. Mengubah Akun Admin
      
      Akses Folder "Super Admin > CRUD ADMIN > Update Admin". Dengan Method PUT masukkan URL http://127.0.0.1:8000/api/super/user/4, Angka **4** ini digunakan sebagai id_user yang akan di update. settingan bagian header sama dan untuk body seperti ini value nya bebas.
      
      ![](C:\Users\Aghniya\AppData\Roaming\marktext\images\2020-11-05-05-50-46-image.png)
   
   4. Menghapus Akun Admin
      
      Akses Folder "Super Admin > CRUD ADMIN > Delete Admin". Dengan Method DELETE masukkan URL http://127.0.0.1:8000/api/super/user/4, Angka **4** ini digunakan sebagai id_user yang akan dihapus. settingan bagian header sama dan untuk body dihilangkan.
   
   ### Mengelola Assign Admin ke toko
   
   Akses Folder "Super Admin > ASSIGN ADMIN To TOKO > ASSIGN ADMIN To TOKO". Dengan Method POST masukkan URL http://127.0.0.1:8000/api/super/user, settingan bagian header sama dan untuk body seperti ini value nya bebas.
   
   ![](C:\Users\Aghniya\AppData\Roaming\marktext\images\2020-11-05-06-13-26-image.png)
   
   ### Mengelola Kategori Produk
   
   Mengelola Kategori Produk ini bisa digunakan oleh Super Admin maupun Admin, memiliki fitur untuk menambah, melihat, mengubah, dan menghapus.
   
   1. Menambah Akun Kategori Produk
      
      Akses Folder "Super Admin > PRIVILAGE ADMIN > CRUD KATEGORI PRODUK> Create Kategori Produk". Dengan Method POST masukkan URL http://127.0.0.1:8000/api/super/category, settingan bagian header sama dan untuk body seperti ini value nya bebas.
      
      
   
   2. Melihat List Kategori Produk
      
      Akses Folder "Super Admin > PRIVILAGE ADMIN > CRUD KATEGORI PRODUK> Read Kategori Produk". Dengan Method GET masukkan URL http://127.0.0.1:8000/api/super/category, settingan bagian header sama dan untuk body dikosongkan.
   
   3. Mengubah Akun Kategori Produk
      
      Akses Folder "Super Admin > PRIVILAGE ADMIN > CRUD KATEGORI PRODUK> Update Kategori Produk". Dengan Method PUT masukkan URL http://127.0.0.1:8000/api/super/category/4, Angka **4** ini digunakan sebagai id_category yang akan di update. settingan bagian header sama dan untuk body seperti ini value nya bebas.
      
      
   
   4. Menghapus Akun Kategori Produk
      
      Akses Folder "Super Admin > PRIVILAGE ADMIN > CRUD KATEGORI PRODUK> Delete Kategori Produk". Dengan Method DELETE masukkan URL http://127.0.0.1:8000/api/super/category/4, Angka **4** ini digunakan sebagai id_produk yang akan dihapus. settingan bagian header sama dan untuk body dihilangkan.
   
   5. Melihat List Kategori Per Toko 
      
      Akses Folder "Super Admin > PRIVILAGE ADMIN > CRUD KATEGORI PRODUK> Read Kategori Produk per Toko". Dengan Method GET masukkan URL http://127.0.0.1:8000/api/super/category/shop/3, settingan bagian header sama dan untuk body dikosongkan.
   
   ### Mengelola Produk
   
   Mengelola  Produk ini bisa digunakan oleh Super Admin maupun Admin, memiliki fitur untuk menambah, melihat, mengubah, dan menghapus.
   
   1. Menambah Akun  Produk
      
      Akses Folder "Super Admin > PRIVILAGE ADMIN > CRUD  PRODUK> Create  Produk". Dengan Method POST masukkan URL http://127.0.0.1:8000/api/super/product/shop/5, shop/5 menandakan untuk menambahkan produk di toko dengan id 5. settingan bagian header sama dan untuk body seperti ini value nya bebas.
      
      ![](C:\Users\Aghniya\AppData\Roaming\marktext\images\2020-11-05-05-54-12-image.png)
   
   2. Melihat List  Produk
      
      Akses Folder "Super Admin > PRIVILAGE ADMIN > CRUD  PRODUK> Read  Produk". Dengan Method GET masukkan URL http://127.0.0.1:8000/api/super/product, settingan bagian header sama dan untuk body dikosongkan.
   
   3. Mengubah Akun Produk
      
      Akses Folder "Super Admin > PRIVILAGE ADMIN > CRUD  PRODUK> Update  Produk". Dengan Method PUT masukkan URL http://127.0.0.1:8000/api/super/product/4, Angka **4** ini digunakan sebagai id_category yang akan di update. settingan bagian header sama dan untuk body seperti ini value nya bebas.
      
      ![](C:\Users\Aghniya\AppData\Roaming\marktext\images\2020-11-05-05-56-36-image.png)
   
   4. Menghapus Akun  Produk
      
      Akses Folder "Super Admin > PRIVILAGE ADMIN > CRUD  PRODUK> Delete  Produk". Dengan Method DELETE masukkan URL http://127.0.0.1:8000/api/super/category/4, Angka **4** ini digunakan sebagai id_produk yang akan dihapus. settingan bagian header sama dan untuk body dihilangkan.
   
   5. Melihat List Produk Per Toko
      
      Akses Folder "Super Admin > PRIVILAGE ADMIN > CRUD  PRODUK> Read Produk per Toko". Dengan Method GET masukkan URL http://127.0.0.1:8000/api/super/category/shop/3, settingan bagian header sama dan untuk body dikosongkan.
   
   ### Mengelola Stock Produk
   
   Mengelola Produk ini bisa digunakan oleh Super Admin maupun Admin, memiliki fitur untuk menambah, melihat, mengubah, dan menghapus.
   
   1. Menambah Stock Produk
      
      Akses Folder "Super Admin > PRIVILAGE ADMIN > CRUD Stock> Create Stock". Dengan Method POST masukkan URL http://127.0.0.1:8000/api/super/stock/5, menandakan produk 5 yang akan ditambahkan stock nya . settingan bagian header sama dan untuk body seperti ini value nya bebas.
      
      ![](C:\Users\Aghniya\AppData\Roaming\marktext\images\2020-11-05-06-07-33-image.png)
   
   2. Melihat List Stock Produk
      
      Akses Folder "Super Admin > PRIVILAGE ADMIN > CRUD STOCK> Read Stock". Dengan Method GET masukkan URLhttp://127.0.0.1:8000/api/super/stock/5, settingan bagian header sama dan untuk body dikosongkan.
   
   3. Mengubah List Produk
      
      Akses Folder "Super Admin > PRIVILAGE ADMIN > CRUD STOCK> Update Stock". Dengan Method PUT masukkan URL http://127.0.0.1:8000/api/super/stock/5 Angka **5** ini digunakan sebagai id_product_ yang akan di update stock nya Jika ingin menambah maka pada type tulis **+** jika ingin dikurangi **-**. settingan bagian header sama dan untuk body seperti ini value nya bebas.
      
      ![](C:\Users\Aghniya\AppData\Roaming\marktext\images\2020-11-05-06-09-41-image.png)
   
   4. Menghapus Stock Produk
      
      Akses Folder "Super Admin > PRIVILAGE ADMIN > CRUD STOCK> Delete Stock". Dengan Method DELETE masukkan URL http://127.0.0.1:8000/api/super/stock/4, Angka **4** ini digunakan sebagai id_produk yang akan dihapus stoknya. settingan bagian header sama dan untuk body dihilangkan.
   
   5. Melihat List stock Produk Per Toko
      
      Akses Folder "Super Admin > PRIVILAGE ADMIN > CRUD STOCK> Read Stock per Toko". Dengan Method GET masukkan URL http://127.0.0.1:8000/api/super/stock/5, settingan bagian header sama dan untuk body dikosongkan.

----
