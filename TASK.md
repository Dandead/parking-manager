# Тестовое задание для стажера

Попробуйте сделать следующее задание. Результат работы необходимо разместить в публичном репозитории bitbucket или Github. Ссылку прислать на электронную почту info@monodigital.ru

##### Задание:
Реализовать систему учёта клиентов автостоянки на фреймворке Laravel. Система должна иметь функции создания, редактирования, удаления данных о клиентах и их автомобилях, (*)а также должна быть возможность ведения учёта того, сколько и какие автомобили находится на стоянке. При написании проекта следует обратить внимание на защиту от XSS атак и SQL–инъекций.

##### Основные сущности:
Клиент
Автомобиль

##### Атрибуты сущности "Клиент":
- ФИО (мин 3 символа)
- Пол (обязательный)
- Телефон (обязательный, уникальный)
- Адрес
- Автомобил(ь/и) (обязательный, мин 1)

##### Атрибуты сущности "Автомобиль":
- Марка (обязательный)
- Моделель (обязательный)
- Цвет кузова (обязательный)
- Гос Номер РФ (обязательный, уникальный)
- Флаг статуса автомобиля означающий, что авто находится или отсутствует на стоянке (обязательный)

##### Необходимые страницы:
- Просмотр всех клиентов и их машин с пагинацией и ссылками на переходы к страницам редактирования и кнопками удаления соответствующих сущностей
- Страница создания клиента и данных о его машинах
- Страница редактирования клиента и данных о его машинах

> (*) Просмотр всех автомобилей, которые стоят на автостоянке, на странице должна быть форма ввода существующего клиента на стоянку. Форма состоит из 2х выпадающих списков, первый - клиенты, которые есть в системе, второй - автомобили выбранного клиента. Также должны быть кнопки при клике на которые меняется статус автомобиля (рис 2)

#### Требования к используемым технологиям:
- PHP 5.6 и выше
- MySQL 5.6 и выше

##### Разрешено использовать фреймворки:
Codeigniter или Laravel последних стабильных версий. Если используется laravel, то все запросы к БД должны быть написаны через QueryBuilder или Raw Query (т. е. без методов Eloquent ORM).

Веб-интерфейс можно верстать с использованием или Bootstrap, или Foundation, или Semantic UI.

![Все клиенты](1.jpg)
![Клиент](2.jpg)
