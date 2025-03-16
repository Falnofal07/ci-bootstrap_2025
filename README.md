# Aplikasi CRUD CodeIgniter 3 dengan Bootstrap

![CI3](https://img.shields.io/badge/CodeIgniter-3.x-orange)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.x-blue)

Aplikasi ini adalah sistem manajemen data siswa dengan operasi CRUD (Create, Read, Update, Delete) menggunakan CodeIgniter 3 dan Bootstrap 5.

## 🚀 Fitur
- Tampil data siswa dalam tabel responsif
- Tambah data dengan validasi form
- Edit data dengan autofill
- Hapus data dengan konfirmasi
- Notifikasi sukses/gagal
- Styling modern dengan Bootstrap

## 📥 Instalasi
1. Clone repositori:
   bash
   git clone git@github.com:Falnofal07/ci-bootstrap_2025.git
   

2. Buat database dan tabel:
   sql
   CREATE DATABASE ci_database;
   USE ci_database;
   CREATE TABLE siswa (
     id INT(11) PRIMARY KEY AUTO_INCREMENT,
     nama VARCHAR(100) NOT NULL,
     alamat TEXT NOT NULL,
     no_hp VARCHAR(15) NOT NULL
   );
   

3. Konfigurasi:
   - Salin `application/config/database.php.example` → `database.php`
   - Sesuaikan kredensial di `database.php`:
     php
     'hostname' => 'localhost',
     'username' => 'root',
     'password' => '',
     'database' => 'ci_database',
     

4. Akses di browser:
   
   http://localhost/ci-bootstrap/siswa
   

## 📚 Jawaban Soal Esai & Refleksi

## Esai
---
### 1. Langkah Instalasi CodeIgniter 3
1. Download CodeIgniter 3 dari [situs resmi](https://codeigniter.com/download)
2. Ekstrak ke folder `htdocs/ci-bootstrap`
3. Atur `base_url` di `config.php`:
   php
   $config['base_url'] = 'http://localhost/ci-bootstrap/';
   

### 2. Fungsi config.php
- Mengatur URL dasar aplikasi
- Menentukan environment (development/production)
- Konfigurasi session dan enkripsi

### 3. Cara Hubungkan Database
1. Buka `application/config/database.php`
2. Isi konfigurasi:
   
   ```
   php
   'hostname' => 'localhost',
   'username' => 'root',
   'password' => '',
   'database' => 'ci_database',
   'dbdriver' => 'mysqli',
   ```

### 4. Peran Siswa_model.php
- Berinteraksi langsung dengan database
- Fungsi utama:
  
  ```
  php
  get_all_siswa()   // Ambil semua data 
  insert_siswa($data) // Simpan data baru 
  update_siswa($id, $data) // Update data
  delete_siswa($id) // Hapus data
  ```
  

### 5. Cara Menampilkan Data
1. Controller panggil model: <br/>
```php <br/> $data['siswa'] = $this->Siswa_model->get_all_siswa();```
   
2. Kirim data ke view: <br/>
```php <br/>$this->load->view('siswa_view', $data);```
   
3. Loop data di view: <br/>
  ``` html <br/>
   <?php foreach($siswa as $row): ?>
     <tr>
       <td><?= $row->nama ?></td>
       <td><?= $row->alamat ?></td>
     </tr>
   <?php endforeach; ?>
```

## Refleksi
---
### 1. Mengapa kita perlu menggunakan Bootstrap dalam membuat tampilan aplikasi dengan CodeIgniter?  
- *Responsif*: Bootstrap menyediakan grid system yang membuat tampilan adaptif di berbagai ukuran layar (desktop, tablet, mobile).  
- *Komponen Siap Pakai*: Memiliki komponen UI seperti tabel, form, tombol, dan modal yang sudah di-styling, mempercepat pengembangan.  
- *Konsistensi Desain*: Menjamin keseragaman tampilan di seluruh halaman.  
- *Menghemat Waktu*: Tidak perlu menulis CSS dari awal, fokus lebih ke logika aplikasi.  

---

### 2. Cara Mengintegrasikan Bootstrap dengan CodeIgniter  
- *Unduh Bootstrap*: Download CSS & JS dari [getbootstrap.com](https://getbootstrap.com).  
- **Simpan di Folder assets**:  

  ```
  ci-bootstrap/
  └── assets/
      ├── css/bootstrap.min.css
      └── js/bootstrap.bundle.min.js
  ```  
- *Sertakan di Layout/Header*:  
  html
  <!-- Di file view (misal: header.php) -->
  <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
  <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    
- *Gunakan di Semua View*: Extend template utama yang sudah menyertakan Bootstrap.

---

### 3. Keuntungan Arsitektur MVC pada CodeIgniter  
- *Pemisahan Logika*:  
  - *Model*: Mengelola data dan database.  
  - *View*: Menangani tampilan (HTML/CSS).  
  - *Controller*: Mengontrol alur aplikasi.  
- *Kemudahan Maintenance*: Perubahan di satu komponen tidak mengganggu komponen lain.  
- *Kolaborasi Efisien*: Frontend dan backend developer bisa bekerja paralel.  
- *Reusability*: Kode Model/View bisa digunakan di banyak bagian.  

---

### 4. Perbedaan Model, Controller, dan View  
| *Komponen* | *Peran* | *Contoh* |  
|--------------|-----------|------------|  
| *Model*    | Berinteraksi dengan database (CRUD). | Siswa_model.php: Mengambil data siswa dari tabel. |  
| *Controller* | Menerima input user, memproses logika, menghubungkan Model dan View. | Siswa.php: Menangani request untuk menampilkan/edit data. |  
| *View*     | Menampilkan data ke pengguna (templating HTML). | siswa_view.php: Menampilkan tabel data siswa. |  

---

### 5. Proses Routing di CodeIgniter  
- *Definisi*: Routing mengarahkan URL ke Controller dan Method tertentu.  
- *File Konfigurasi*: application/config/routes.php.  
- *Contoh Konfigurasi*:  
  php
  // Default controller
  $route['default_controller'] = 'Siswa';
  
  // Custom route: /login mengarah ke AuthController::index()
  $route['login'] = 'AuthController/index';
  
  // Route dengan parameter: /siswa/edit/5 → Siswa::edit(5)
  $route['siswa/edit/(:num)'] = 'Siswa/edit/$1';
    
- *Cara Kerja*:  
  1. Pengguna mengakses URL (misal: http://localhost/siswa/edit/5).  
  2. CodeIgniter memeriksa routes.php untuk mencocokkan URI.  
  3. Jika ada route yang sesuai, request diarahkan ke Controller dan Method yang ditentukan.  
  4. Jika tidak, menggunakan konvensi URI standar: controller/method/parameter.  

---

## 🗂 Struktur Proyek
```
ci-bootstrap/
├───application
│   ├───cache
│   ├───config
│   ├───controllers
│   ├───core
│   ├───helpers
│   ├───hooks
│   ├───language
│   │   └───english
│   ├───libraries
│   ├───logs
│   ├───models
│   ├───third_party
│   └───views
│       └───errors
│           ├───cli
│           └───html
├───assets
│   ├───css
│   └───js
└───system
    ├───core
    │   └───compat
    ├───database
    │   └───drivers
    │       ├───cubrid
    │       ├───ibase
    │       ├───mssql
    │       ├───mysql
    │       ├───mysqli
    │       ├───oci8
    │       ├───odbc
    │       ├───pdo
    │       │   └───subdrivers
    │       ├───postgre
    │       ├───sqlite
    │       ├───sqlite3
    │       └───sqlsrv
    ├───fonts
    ├───helpers
    ├───language
    │   └───english
    └───libraries
        ├───Cache
        │   └───drivers
        ├───Javascript
        └───Session
            └───drivers
```

## 🤝 Kontribusi
1. Fork project
2. Buat branch: `git checkout -b fitur-baru`
3. Commit: `git commit -m 'Tambahkan fitur'`
4. Push: `git push origin fitur-baru`
5. Buat Pull Request

## 📜 Lisensi
[MIT License](LICENSE) - Bebas digunakan/modifikasi selama mencantumkan lisensi asli

---

🔧 **Tips Troubleshooting**:
- Jika muncul error database, pastikan:
  - Tabel `siswa` sudah dibuat
  - Kredensial database di `database.php` benar
  - Server MySQL aktif
