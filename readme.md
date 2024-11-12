## Проект
Состоит из связанных между собой контейнеров приложения (PHP), сервера (Nginx) и базы данных (PostgreSQL).\
В проекте реализованы на языке PHP:
- сортировка массива (пузырьковая, выбором, быстрая и слиянием)
- поиск по массиву (линейный и бинарный)
- реверс строк
- структура данных deque
- структура данных queue

## Требования к программному обеспечению
На компьютере должны быть установлены:
- Docker Version 27.3.1 либо выше
- Docker Compose version v2.29.7 либо выше
- GNU Make 4.3 либо выше  

## Как запустить
1) Клонировать репозиторий к себе на компьютер.
2) Файл .env-example необходимо переименовать в .env
3) В терминале, в корневом каталоге проекта выполнить команду make start (создаёт и запускает все контейнеры).
4) Выполнить команду make terminal (заходит в контейнер приложения (PHP) и запускает командную строку).
5) В командной строке контейнера выполнить команду composer install.
6) В файле app/index.php изменить код на необходимый, либо оставить существующий. 
7) Перечень доступных методов объекта Queue:
   - addToQueue добавляет элемент в конец очереди
   - getFromQueue убирает первый элемент из очереди
   - printQueue распечатывает содержимое очереди на экран приложения
   - clearQueue очищает очередь
8) В браузере перейти по ссылке http://localhost:8080/
9) На странице отобразится результат работы приложения.

Основная ветка: переключить ветку командой git checkout master.\
Сортировка: переключить ветку командой git checkout 1_sorting, далее следовать указаниям в readme.\
Поиск по массиву: переключить ветку командой git checkout 2_search, далее следовать указаниям в readme.\
Реверс строк: переключить ветку командой git checkout 3_reverse, далее следовать указаниям в readme.\
Deque: переключить ветку командой git checkout 4_deque, далее следовать указаниям в readme.\
Команда make stop - останавливает все контейнеры.