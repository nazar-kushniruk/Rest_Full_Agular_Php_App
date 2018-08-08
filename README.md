# Rest_Full_Agular_Php_App

## Бекенд:
Написати REST FULL сервіс який при виклику файлу rest.php буде обробляти GET, POST, PUT, DELETE запити.

В MySQL є таблиця reports
CREATE TABLE `reports` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `host` VARCHAR(255) NOT NULL,
    `code` INT(10) UNSIGNED NOT NULL,
    `message` MEDIUMTEXT NOT NULL,
    `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB;

Потрібно:
1) створити модель даних для таблиці (ORM)

2) обробити відповідні запити до REST
GET - повертає список з reports
GET з вказаним id - повертає конкретний запис з reports
POST - створює новий запис в reports
PUT - оновлює існуючий запис в reports
DELETE - видаляє запис з reports
Формат повернення даних - JSON

Бажано використовувати наступні механізми з PHP - PDO, Composer, Namespacing, Magic methods.

## Фронтенд:
 написати на AngularJS простий додаток який буде показувати список репортів, кожен репорт можна редагувати, видаляти. Над списком кнопка яка додає новий репорт. Фронтенд має використовувати REST сервіс.
