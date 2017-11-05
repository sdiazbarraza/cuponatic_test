# Web Service search & stadistic of Product

### Prerequisites

```
PHP 7.0>
MySQL 5.4>
Composer
```

### Installing

Clone Repo in folder project
```
git clone https://github.com/simp06/cuponatic_test /folderProject
```
Install Dependence
```
composer install
```
Create  Database 
```
mysql>CREATE DATABASE test_cuponatic;
```

Execute to Migration;
```
php artisan migrate --path=/database/migrations/productospalabras/
```
Execute dump csv  or execute script dump sql to database (bd_test_cuponatic.sql) 
```
mysql>use test_cuponatic;
mysql>LOAD  DATA LOCAL INFILE '/PathProject/data_producto.csv'
INTO TABLE producto_test
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 LINES;


```
### Requisites Functions Webservice
*Content-Type Allowed : 
```
application/json
```
*Format json 
```
{"field":"value"..}
```
## Method Allowed Webservice
```
GET,POST
```
### Metod GET /stadistic
Show 20 product most searched & top 5 word like test
```
//host:PORT/api/stadistic
```
### Metod POST /search
Search product by keyword
```
//host:PORT/api/search
```

### NOTE:File csv to modified and add PK (id_producto) view rootfolderproject/data_producto.csv
