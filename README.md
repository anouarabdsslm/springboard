## Springboard Application

### Installation Guide :

During active development session, some non-update configuration that load non-exists service-provider or packages could stop unexpectedly `composer update` command when you try to synchronize your local repository.

If this happening while you pull new code from this repo, you could execute :

```bash
cd /path/to/meetings

# Delete all previous lock and vendor
rm composer.lock
rm vendor -r

# Install fresh
php composer.phar install

# In unix environment, these additional steps may needed
chmod 777 app/storage/meta -R
sudo service apache2 restart
```

### How to install this application.

#### 1. Clone this repository, then simply execute :

```bash
curl -s http://getcomposer.org/installer | php
php composer.phar install
```
