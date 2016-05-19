# laravel-fileauthprovider
Read Username and Password from .env-File

### Installation

Require `twitnic/laravel-fileauthprovider` in composer.json and run `composer update`.

    {
        "require": {
            "laravel/framework": "5.0.*",
            ...
            "twitnic/laravel-fileauthprovider": "*"
        }
        ...
    }

Composer will download the package. After the package is downloaded, open `config/app.php` and add the service provider:

In Laravel 5.0:

    'providers' => array(
        ...
        'Twitnic\FileAuth\FileAuthProvider',
    ),
    
In Laravel 5.1:

    'providers' => array(
        ...
        'Twitnic\FileAuth\FileAuthProvider::class',
    ),
    

### Usage

#### .env File:

Add the following Lines to your `.env-File`:

* username=admin
* password=admin

#### Configuration

Open `config/auth.php` and set appropiate driver and model:

    [
        ...
	    'driver' => 'File',
        ...
    ]

Use authentication as explained on Laravel's [Authentication](http://laravel.com/docs/5.0/authentication)
chapter.


[![Build Status](https://travis-ci.org/twitnic/laravel-fileauthprovider.svg?branch=master)](https://travis-ci.org/twitnic/laravel-fileauthprovider)
