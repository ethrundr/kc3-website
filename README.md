# KC3 Website [![Build Status](https://travis-ci.org/KC3Kai/kc3-website.svg)](https://travis-ci.org/KC3Kai/kc3-website)

URL: http://kc3.jetri.co

Website for KC3改 and its Social System.


## Environment
#### Development
* PHP ~5.5
* Database: MySQL ~5.6
* Web Server: Apache
* Framework: Laravel ~5
* npm, grunt, composer
* CVS: Public GitHub repository

#### Server
* Amazon EC2: t2.micro size
* Database: As localhost to the same server


## How to run
#### Requirements
* Local PHP webserver applications: e.g. [XAMPP](https://www.apachefriends.org/index.html) or [WAMP](http://www.wampserver.com/en/) (Optional, as long as PHP is installed)
* Local MySQL webserver (required, comes with the software above)
* [composer](https://getcomposer.org/) (package manager for PHP)
* [nodejs](https://nodejs.org/en/) for **npm** (package manager for JS)
* [gulpjs](http://gulpjs.com/) to be installed globally via **npm** (`npm install --global gulp`)

#### Prodedure (with webserver applications)
1. Clone the repository on designated web directories such as `htdocs`
* Run `composer install`
* Run `npm install`
* Run `gulp`
* Use the webserver application's control panel to make sure Apache is running
* Test the application by going to `http://localhost/<project_dir>` on your browser


#### Prodedure (without webserver applications)
Even without webserver apps like XAMPP or WAMP, you'll still need PHP installed on the computer.

1. Clone on any directory
* Run `composer install`
* Run `npm install`
* Run `gulp`
* Run `php -S localhost:8000`. This will run a temporary webserver.
* Test the application by going to `http://localhost:8000` on your browser
* When done, press `Ctrl+C` on the console to stop the temp webserver
