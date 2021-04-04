## **WEBIMG Blog Site For Programmers**

WEBIMG is a blog site to share programming related blogs from admin using admin panel and visitor and come and checkout blogs.

You can check out live demo from [here](http://minlwinkyaw.com/demo/webimg/public)

Start Of Project Date: 01.04.2021

End Of Project Date: 03.04.2021

## **Requirements**

1. PHP, 7.4.3 or above
2. Composer 
3. Linux, MacOS (Didn't Test On Windows using setup command but can be installed easily)

## **How To Install**
* `git clone` this project and enter to the folder
* Create Database
* Create `.env`
* Copy `.env.example` to `.env`
* Fill database username, password, database name to the `.env` file
* run `php artisan setup:install` or `make install` if you have make in your computer

php artisan setup:install includes all the migrations and seeding dummy data.

To access admin page, go to `/login`. In live demo site click [here](http://minlwinkyaw.com/demo/webimg/public/login). Email is `minlwinkyaw@gmail.com` and password is `password`
