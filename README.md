# Common Alerting Protocol Version 1.2 reader

CAP is library for reading Common Alerting Protocol Version 1.2

This library is for now developed only for Czech ČHMÚ (Český hydrometeorologický ústav) structures 

# Documentation of Common Alerting Protocol in czech language
https://www.chmi.cz/files/portal/docs/meteo/om/vystrahy/doc/Dokumentace_CAP.pdf

# Features

 - You can download this file and read as known object without problems
 - some content is modified to objects (string with datetime to \DateTime, ...)
 
# Modified to objects

 - all strings with datetime values to ``\DateTime``
 - all strings with objectable values (e.g. references, senderName,...)
 - arrayed all properties where is possible multiple values, all this properties have plural names

# Installation

## Composer

    {
        "require": {
            "zazimou/cap": "*"
        }
    }

# Usage

```php

use Zazimou\CAP\Cap;

// find Url where is cap file uploaded
$url = "https://www.chmi.cz/files/portal/docs/meteo/om/bulletiny/XOCZ50_OKPR.xml";

// create new instance of Cap
$cap = new Cap;

// download the file
$file = $cap->read($url);


```

# Changelog

## 1.0.0

 - first version of library


