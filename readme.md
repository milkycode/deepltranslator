# DeepL Translator for laravel

Will translate all files inside a laravel project using the DeepL API and exports it to the requested language

## Installation

Installation can be done through composer

``
composer require milkycode/deepltranslator
``

Publishing the config file

``
php artisan vendor:publish --provider="milkycode\Deepltranslator\DeeplTranslatorServiceProvider" --force
``

Add API Key to .env file or in config/deepltranslator.php

``
DEEPL_API_KEY=XXXXXXXXXXXXXXXXXXXXXXX
``

Add API mode (pro or free) to .env file or in config/deepltranslator.php

``
DEEPL_PRO_API=false|true
``

## Usage

### Command

``
php artisan deepl:translate {from} {to} {--filename} {--json}
``

| Option   | Description  |  Required  |
|---|---|---|
| from | The from language where the translations will be taken from  |  Yes  |
| to  |  The language you want to translate to |  Yes  |
| filename  | In case you want to translate a single file this option can be set  |  No  |
| json  | In case this flag is set , it will search for json translation files instead of PHP  |  No  |

The from language files will be retrieved inside `/lang/{from}/`

### Trait

The trait can be used to translate a single string to multiple languages on-the-fly

### Limitations
- You can only have max 128kb per translate call including all parameters.
- In the DeepL free plan you can only translate a maximum of 500k characters per month.
- If you translate files, a maximum of 50 files per translate call, can be translated.

## Examples

### Translating all files

```php artisan deepl:translate en nl```

This command will translate all php files inside the ``/lang/en`` directory. If the map `nl` is not existing, it will create it and put all translations according to the files retrieved from the `from` language.

### Single file

``php artisan deepl:translate en nl --filename=auth.php``

This will do exactly the same as translating all files but instead will only take 1 file inconsideration.

### Trait usage

```php
namespace App\Http\Controllers;

use milkycode\Deepltranslator\Traits\DeepltranslatorTrait;

class MyTestController extends Controller
{
    use DeepltranslatorTrait;

    public function home(){
        $translated = $this->translateString('This is a test', 'en', ['fr','nl','ru']);

        /*
            $translated = [
              "fr" => "Il s'agit d'un test",
              "nl" => "Dit is een test",
              "ru" => "Это тест"
            ];
        */
    }
}
```

## Upcoming changes
Currently not all options that Laravel supports are supported inside this package. Following options will be added soon:

- [ ] Pluralization inside translation file
- [ ] Numeric if statements inside the translation
- [ ] Database translations
- [x] JSON files as translation files instead of PHP