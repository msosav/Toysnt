![Logo](https://github.com/msosav/Toysnt/assets/85181687/2899530b-eedd-40e7-91a0-92e13d4c63f6)


# Toysnt

Toysnt is an e-commerce for toys that can be both delivered or destroyed by our techniques (such as dynamite or acid).

## Documentation

[Wiki](https://github.com/msosav/Toysnt/wiki)
    
## Run Locally

[Install XAMPP](https://www.apachefriends.org/download.html) or [Install LAMP](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-20-04-es)

Start Apache and MySQL in XAMPP (or LAMP).

[Install composer](https://getcomposer.org/download/)

Clone the repository

```bash
git clone https://github.com/msosav/Toysnt
```

Go to the project directory

```bash
  cd Toysnt
```

Create a .env file and copy the information of the .env.example.

Install dependencies

```bash
composer update
```

Configure the project

```bash
php artisan key:generate
php artisan migrate
php storage:link
```

Run the server

```bash
php artisan serve
```

## Authors

- [@msosav](https://www.github.com/msosav)
- [@EsteTruji](https://github.com/EsteTruji)
- [@cpalacior](https://github.com/cpalacior)
