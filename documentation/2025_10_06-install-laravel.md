### Installation requirements

To install a Laravel project, you have to make sure that following components are installed on your computer:

- composer
- PHP with extentions
- A DBMS (Database Management System)
  - MySQL || MariaDB || Postgres || Mongo


### Installations

There are 2 main ways to install a fresh Laravel project. Both require the use of `cli`. So open your terminal, and chose one of my instructions

**The first one (I prefere it)**
```bash
# it use the create-project feature of composer
composer create-project laravel/laravel projectName

# install a specific version
composer create-project laravel/laravel:^10.0 projectName
```

**The second**
```bash
# install globally the laravel installer tool
composer global require "laravel/installer"

# once the tool is installed, spine up a new project
laravel new projectName

# If you get an error's like
-bash: laravel: command not found

# Solve it with the following steps
nano .bashrc

### Add this at the end of the file
export PATH="$PATH:$HOME/.config/composer/vendor/bin"


### Save & exit and run the next command
source ~/.bashrc

# Type laravel and you will get an output like this
laravel

Laravel Installer 5.23.0

Usage:
  command [options] [arguments]

...

```
