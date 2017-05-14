# gplaces
GPlaces
===========
Implementation of the Google Places API for Drupal.

Current installation is via Composer
------------------------------------
The following assumes that you have installed Drupal via composer, or are using composer in some way.

Add the following to your root **composer.json** file - nt the one under drupal core or anything (see Drupal's documentation on using composer if you are not familiar with it)

In the repositories section - 
```        
        {
            "type": "vcs",
            "url": "https://github.com/kearon/gplaces"
        }
```
e.g.
```
    "repositories": [
        {
            "type": "composer",
            "url": "https://packages.drupal.org/8"
        },
        {
            "type": "vcs",
            "url": "https://github.com/kearon/gplaces"
        }
    ]
```    

Add the requirement for the GPlaces module to load it -
``"mcna/gplaces": "dev-master"``

e.g.
```
    "require": {
        "composer/installers": "^1.2",
        "cweagans/composer-patches": "^1.6",
        "drupal-composer/drupal-scaffold": "^2.2",
        "drupal/console": "~1.0",
        "drupal/core": "~8.0",
        "drush/drush": "~8.0",
        "webflo/drupal-finder": "^0.3.0",
        "webmozart/path-util": "^2.3",
        "mcna/gplaces": "dev-master"
    }
```

As of Drupal 8.1, composer is used to manage the vendor directory, etc., so the install path for modules should already be set.
If you have probems with GPlaces installing to the wrong directory, check the following to be sure it gets installed into your drupal modules folder.  You might need to edit the path for your installation.
Add a line like this to the `installer-paths` of the `extra section`.

e.g. 
```
    "extra": {
        "installer-paths": {
            "web/core": ["type:drupal-core"],
            "web/libraries/{$name}": ["type:drupal-library"],
            "web/modules/contrib/{$name}": ["type:drupal-module"],
            "web/profiles/contrib/{$name}": ["type:drupal-profile"],
            "web/themes/contrib/{$name}": ["type:drupal-theme"],
            "drush/contrib/{$name}": ["type:drupal-drush"]
        }
    }
```


------------
Method intended later
---------------------
(once composer dependencies are handled more elegantly in Drupal...)
Unpack in the *modules* folder (currently in the root of your Drupal 8
installation) and enable in `/admin/modules`.

Configure the module
--------------------
Then, visit `/admin/config/development/gplaces` and enter your own Google Places API key.
If you need, there's also a specific *google places* permission.

Acknowledgement
---------------
This module makes use of joshtronics php wrapper for the google api.  Composer should take care of this automatically during the install.

Attention
---------
Most bugs have been ironed out, holes covered, features added. But this module
is a work in progress. Please report bugs and suggestions, ok?
