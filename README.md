# Native CMS #

This is made using php native

## Installing ##

Following this guide to install this apps in your server

- Download or Checkout source code from here to local
- Store in your server (exam: htdocs)
- run your server
- create database with name "skripsi_kepegawaian"
- Import file skripsi_pengiriman.sql in folder sql (if you want to changes database name, changes in file config/app.php)

```
class App
{
	const DB_HOST = 'localhost';
	const DB_USER = 'root';
	const DB_PASS = '';
	const DB_DB = 'skripsi_kepegawaian'; //changes in here
}
```

- Access in browser

   in local server
   
   ```
   http://localhost/pengiriman
   ```

- For default administrator login 

```
email : admin@email.com
pass  : 123456
```

- DONE

## Authors

* **Yudha Permana** - *Initial work* - [CodeDex](https://bitbucket.org/permanay/)