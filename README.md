## App Configuration
### Database
1. `CREATE DATABASE onlinestoredb`
2. Jalankan script di onlinestoredb.sql di bagian query database `onlinestoredb` di phpmyadmin

### File Uploads (Product Images)
#### Allow write access to file upload destination
### `macOS`
1. check owner of httpd process

   `ps aux|grep httpd`

2. change owner of file upload destination directory to httpd process owner

   `sudo chown [httpd proc owner] /Applications/XAMPP/xamppfiles/htdocs/online-store/foto_produk/`
   `sudo chown [httpd proc owner] /Applications/XAMPP/xamppfiles/htdocs/online-store/receipt/`

## Database Server:

    Server: 127.0.0.1 via TCP/IP
    Server type: MariaDB
    Server connection: SSL is not being used Documentation
    Server version: 10.4.14-MariaDB - mariadb.org binary distribution
    Protocol version: 10
    User: root@localhost
    Server charset: UTF-8 Unicode (utf8mb4)


## Web Server:

    Apache/2.4.46 (Win64) OpenSSL/1.1.1g PHP/7.4.11
    Database client version: libmysql - mysqlnd 7.4.11
    PHP extension: mysqli Documentation curl Documentation mbstring Documentation
    PHP version: 7.4.11


## Admin/Staff Login
Untuk login sebagai Admin/Staff dapat login melalui salah satu dari kedua destination/link berikut. Keduanya sama termasuk segi fungsionalitasnya.

[Admin/Staff Login Page ("admin" folder)](http://localhost/online-store/admin/login.php)

[Admin/Staff Login Page ("staff" folder)](http://localhost/online-store/staff/login.php)

#### Pada halaman login, dapat digunakan antara username atau email.

```
Akun Admin

Username/Email : admin / jasonlionardi@yahoo.com
Password : admin
```
```
Akun Staff

Username/Email : janedoe / janedoe@mail.com
Password : janedoe
```


## Customer Login
Untuk login sebagai customer, login melalui destination/link berikut.

[Customer Login Page](http://localhost/online-store/login.php)



