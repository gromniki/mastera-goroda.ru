Sypex Dumper под CMF Cotonti Siena 0.9.18

Плагин SypexDumper обеспечивает сохранение и восстановление базы данных из панели администратора. Плагин является оберткой для интерфейса  Sypex Dumper .

1. Установка
Распаковать содержимое архива в каталог plugins
Установить chmod 777 для каталога plugins/SypexDumper/inc/sxd/backup
Установить chmod 666 или 777 для файлов plugins/SypexDumper/inc/sxd/cfg.php и plugins/SypexDumper/inc/sxd/ses.php
Установить плагин из панели администратора
Прописать уникальное имя папки для хранения дампов в конфигурации плагина.(Необходимо для безопасности)
Интерфейс дампера доступен в панели администратора в разделе прочее.

Если в админ панели у вас появляется 404 ошибка, то добавьте в основной файл .htaccess

# Rules for SypexDumper
RewriteRule ^(.*)/SypexDumper/(.*)/(\w+)\.php(.*)$ $1/SypexDumper/$2/$3.php$4 [QSA,NC,NE,L]
RewriteRule ^(.*)/SypexDumper/(.*)/$ $1/SypexDumper/$2/index.php [QSA,NC,NE,L]
RewriteRule ^(.*)/SypexDumper/(.*)/backup/([\w\.\-]+)\.gz$ $1/SypexDumper/$2/backup/$3.gz [QSA,NC,NE,L]

P.S. Данный плагин работает на Cotonti Siena  Версий ниже 0.9.18 (проверялось на 0.9.17, 0.9.16)