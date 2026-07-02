# Инструкция по развёртке приложения для сокращения ссылок

1. Команда копирования минимального файла настроек окружения .env
```bash
cp .env.example .env
```
2. Заполнение параметров базы данных в .env
```
DB_CONNECTION 
DB_HOST 
DB_PORT
DB_DATABASE 
DB_USERNAME 
DB_PASSWORD 
```

3. Обязательно указать в переменной APP_URL доменное имя сервиса

4. Выполнение команд
```bash
composer install                      # установка зависимостей
php artisan migrate                   # запуск миграций
php artisan key:generate              # генерация ключа
php artisan serve                     # запуск приложения на localhost

php artisan serve --host=0.0.0.0.     # запуск на ip адресе устройства
```
