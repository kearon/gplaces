# gplaces
GPlaces
===========
implementation of the Google Places API for Drupal.
Instructions
------------
Unpack in the *modules* folder (currently in the root of your Drupal 8
installation) and enable in `/admin/modules`.
Then, visit `/admin/config/development/gplaces` and enter your own Google Places API key.
If you need, there's also a specific *google places* permission.

This module makes use of joshtronics php wrapper for the google api.  You can use composer to install this appropriately.
See / use the composer.json file.

Attention
---------
Most bugs have been ironed out, holes covered, features added. But this module
is a work in progress. Please report bugs and suggestions, ok?
