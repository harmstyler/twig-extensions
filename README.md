# Twig Extensions

A work in progress set of Twig Extensions

## Installation

These Twig Extensions are registered at packagist as harmstyler/twig-extensions and can be easily installed using composer. Alternatively you can simply download the .zip and copy the file from the 'src' folder.

The extensions are designed to be used with Symfony

```yml
services:
  twig.extension.date:
    class: HarmsTyler\Twig\LinkToExtension
    tags:
      - { name: twig.extension }
```

### LinkTo Extension

Extension will build out a link, requires link copy and path name to work. Optional html options can be sent in an array.

```twig
{{ link_to($link_copy, { 'path_name': { 'id': 1 } }, {'data-method': 'get', 'class': 'my-class'}) }}
```
will create
```html
<a href="/events/1" data-method="get" class="my-class">Upcoming Event</a>
```
