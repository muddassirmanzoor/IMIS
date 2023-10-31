sudo yum update httpd
kill -9 10366
sudo yum update httpd
sudo yum install httpd
sudo firewall-cmd --permanent --add-service=http
sudo firewall-cmd --permanent --add-service=https
sudo firewall-cmd --reload
sudo systemctl start httpd
sudo systemctl reload httpd
sudo systemctl enable httpd
sudo yum install mariadb-server mariadb
sudo systemctl start mariadb
sudo mysql_secure_installation
sudo systemctl enable mariadb.service
sudo yum install php php-mysql
sudo systemctl restart httpd.service
sudo nano /var/www/html/info.php
sudo rm /var/www/html/info.php
mysql -u root -p
sudo firewall-cmd --permanent --add-port=3306/tcp
sudo firewall-cmd --reload
logout
mysql -v
mysql
mysql -v
mysql -V
logout
php -v
logout
ls
cd /var
ls
cd www/html
ls
cd cot
ls
composer
cd ../..
ls
cd ..
ls
php composer-setup.php --install-dir=/usr/local/bin --filename=composer
sudo yum -y update
yum install php-cli php-zip wget unzipCopied!
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
HASH="$(wget -q -O - https://composer.github.io/installer.sig)"
php composer-setup.php --install-dir=/usr/local/bin --filename=composer
composer
ls
cd www/html
ls
cd cot
composer
composer install
 ls
cd ..
ls
cd ..
ls
cd ..
ls
cd ..
ls
cd ..
ls
cd /var/www/html
ls
cd cot
ls
composer install
composer
php -v
yum install http://rpms.remirepo.net/enterprise/remi-release-7.rpm
yum install yum-utils
yum-config-manager --enable remi-php71
yum-config-manager --enable remi-php72
yum-config-manager --enable remi-php73
yum-config-manager --enable remi-php74
yum update
php -v
cd /var/www/html
cd cot
composer install
composer update
ls
cd..
..cd
cd..
cd/
cd ..
cd /var/www/html/school_council
install composer
composer install
composer update
ls
php ver
cd..
cd ..
php -v
cd /var/www/html/school_council
composer install
composer update
cd ..
sudo apt-get update
composer require cviebrock/eloquent-sluggable
apt install php7.4-xml
yumm apt install php7.4-xml
composer require --dev phpunit/phpunit ^7.5
composer update
composer fund
phpunit -v
composer update -v
composer clearcache
composer install --prefer-source
cd /var/www/html
cd cot
composer install
