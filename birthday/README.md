1. добавляем в hosts.
sudo nano /etc/hosts

в конец пишем
127.0.0.1 birthday.zz

2. birthday.zz.conf

<VirtualHost *:80>
  ServerAlias birthday.zz www.birthday.zz
  DocumentRoot /home/masha/Desktop/becode_projects/github/birthday
  <Directory /home/masha/Desktop/becode_projects/github/birthday>
    AllowOverride None
    Require all granted
  </Directory>
</VirtualHost>


3. sudo cp /home/masha/Desktop/becode_projects/github/birthday/birthday.zz.conf /etc/apache2/sites-available/birthday.zz.conf


4. sudo a2ensite birthday.zz.conf
sudo systemctl reload apache2
