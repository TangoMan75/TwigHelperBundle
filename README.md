TangoMan TwigHelper Bundle
====================

**TangoMan TwigHelper Bundle** provides functions for twig.

Installation
============

Step 1: Download the Bundle
---------------------------

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```bash
$ composer require tangoman/twig-helper-bundle
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Step 2: Enable Bundle
---------------------

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    // ...

    public function registerBundles()
    {
        $bundles = array(
            // ...
            new TangoMan\TwigHelperBundle\TangoManTwigHelperBundle(),
        );

        // ...
    }
}
```

Availlable functions
====================

start_with
----------

Checks if at least one item from haystack starts with needle.

```twig
{% if start_with(app.request.attributes.get('_route'), item.pages ?? []) %}
    {{ item }}
{% endif %}
```

end_with
--------

Checks if at least one item from haystack ends with needle.

```twig
{% if end_with(app.request.attributes.get('_route'), ['index','list']) %}
    {{ item }}
{% endif %}
```

is_numeric
----------

Finds whether a variable is a number or a numeric string.

```twig
{% if is_numeric(item) %}
    {{ item }}
{% else %}
    "{{ item }}"
{% endif %}
```

is_string
---------

Find whether the type of a variable is string.

```twig
{% if is_string(user) %}
    Welcome {{ user }} !
{% else %}
    Are you kidding me ? Is "{{ user }}" even a name ?
{% endif %}
```

Availlable filters
==================

to_array
--------

Converts stdObject or json string to traversable array.

```twig
{% for key, value in object|to_array %}
    <td>{{ key }}</td>
    <td>{{ value }}</td>
{% endif %}
```

Note
====

If you find any bug please report here : [Issues](https://github.com/TangoMan75/TwigHelperBundle/issues/new)

License
=======

Copyrights (c) 2017 Matthias Morin

[![License][license-MIT]][license-url]
Distributed under the MIT license.

If you like **TangoMan TwigHelper Bundle** please star!
And follow me on GitHub: [TangoMan75](https://github.com/TangoMan75)
... And check my other cool projects.

[Matthias Morin | LinkedIn](https://www.linkedin.com/in/morinmatthias)

[license-GPL]: https://img.shields.io/badge/Licence-GPLv3.0-green.svg
[license-MIT]: https://img.shields.io/badge/Licence-MIT-green.svg
[license-url]: LICENSE
