ShareMeBaby (module for Omeka S)
=================================

[ShareMeBaby] is a module for [Omeka S] that allows you to easily add sharing tools on social networks without calling external scripts.

Installation
------------

Use the release zip to install it, or use the source.

* From the zip

Download the last release [ShareMeBaby.zip] from the list of releases, and uncompress it in the `modules` directory.

* From the source:

If the module was installed from the source, rename the name of the folder of the module to `ShareMeBaby`, and copy it in the `modules` directory.

Then install it like any other Omeka S module.


Usage
-----

### Configuration

In the module configuration, you can:
* enter the default title of the block
* enter your Twitter username
* choose the sharing buttons to display: Facebook, Twitter, LinkedIn and send by e-mail

### Display

A block layout is available to add the viewer in any standard page.

To embed ShareMeBaby somewhere else, just use the helper:

```php
    // Display ShareMeBaby.
    echo $this->shareMeBaby();
```


Copyright
---------

ShareMeBaby module for Omeka S:

* Copyright Kaeness & Christian Lescuyer, 2022


[ShareMeBaby]: https://github.com/Kaeness/Omeka-S-module-ShareMeBaby
[Omeka S]: https://omeka.org/s
[ShareMeBaby.zip]: https://github.com/Kaeness/Omeka-S-module-ShareMeBaby/releases
