## Проект
Состоит из связанных между собой контейнеров приложения (PHP), сервера (Nginx) и базы данных (PostgreSQL).
В проекте реализованы на языке PHP:
- сортировка массива (пузырьковая, выбором, быстрая и слиянием)
- поиск по массиву (линейный и бинарный)
- реверс строк (без использования массивов)

## Требования к программному обеспечению
На компьютере должен быть установлены:
- Docker Version 27.3.1 либо выше
- Docker Compose version v2.29.7 либо выше
- GNU Make 4.3 либо выше  

## Как запустить
1) Клонировать репозиторий к себе на компьютер.
2) Файл .env-example необходимо переименовать в .env
3) В терминале, в корневом каталоге проекта выполнить команду make start (создаёт и запускает все контейнеры).
4) Выполнить команду make terminal (заходит в контейнер приложения (PHP) и запускает командную строку).
5) В командной строке контейнера выполнить команду composer install.
6) В файле app/index.php изменить аргументы в методе $test->startTestSearching() на необходимые:
   - Первый аргумент - количество элементов в случайном масиве, либо массив
   - Второй аргумент - искомый элемент
   - Третий аргумент - метод поиска ('ALL', 'LINEAR', 'BINARY')
   - Четвёртый аргумент - распечатка массива
7) В браузере перейти по ссылке http://localhost:8080/ 
8) На странице отобразится результат поиска.

Основная ветка: переключить ветку командой git checkout master.
Сортировка: переключить ветку командой git checkout 1_sorting, далее следовать указаниям в readme.
Реверс строк: переключить ветку командой git checkout 3_reverse, далее следовать указаниям в readme.

Команда make stop - останавливает все контейнеры.