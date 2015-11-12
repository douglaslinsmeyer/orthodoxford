# OrthodOxford

A comma formatting library for converting strings of text from Oxford commas and reverse.

## Usage

```php
$formatter = new \Dlinsmeyer\OrthodOxford\OrthodOxford();
$formattedString = $formatter->right('This is not the right way to list birds, bears and tigers.');

// Returns: "This is not the right way to list birds, bears, and tigers."
```

## To run tests:

```bash
$ composer install
$ bin/phpunit
```
