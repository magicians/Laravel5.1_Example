## Laravel 5.1 example##

**Laravel 5.1 news Website / Blog example** is a simple application for the News Website or Blog.

### Installation ###

* `git clone https://github.com/smile-zhao/Laravel5.1_Example.git ProjectName`
* `cd ProjectName`
* `composer install`
* Create a database and change in *`.env.example`*, 
* Rename `.env.example` to `.env` (`mv .env.example .env`)
* `php artisan key:generate`
* `php artisan migrate --seed` create and seed the database
* `php artisan serve` to start the app on http://localhost:8000/
* All routes are informed in the file `App/Http/routes.php`

### Include ###

* [jQuery](https://jquery.com/m)	
* [Bootstrap](http://getbootstrap.com) for CSS and jQuery plugins
* [DataTables.js](https://www.datatables.net/) table plug-in for jQuery
* [selectize.js](http://selectize.github.io/selectize.js/) for custom Select UI Control
* [pickadate.js](http://amsul.ca/pickadate.js/) for date and time input picker
* [CKEditor](http://ckeditor.com) , a ready-for-use HTML text editor
	
### Features ###

* Admin & Author home page
* Authentication (registration, login, logout)
* Users roles : Admin, Author
* Admin : Audited mechanism (every article need be reviewed before publishing), Tag(create, edit, delete), User(create, edit, delete)
* Author : Article (show, edit, delete, create)
* Tags on articles

### Seeds ###
For testing the application, the database is been seeded with users:

*	name:	admin,		password:	admin
* 	name:	author, 	password:author
