Datum
=====

Razred `Datum` predstavlja razširitev odlične PHP knjižnice `Carbon` - ovoja okoli privzetega `DateTime` objekta v PHPju.

`Datum` trenutno vsebuje metodo `relativno`, ki se obnaša enako kot metoda `diffForHumans`, le da je izpis v slovenščini.

Namestitev
==========

Paket je mogoče namestiti preko upravitelja odvisnosti za PHP `Composer` tako, da dodate slednje v `composer.json` projekta:

```
    "require": {
        "jsila/datum": "0.1.0"
    },
```

Uporaba
=======

```php
    echo Datum::now()->subMinutes(34)->relativno(); // pred 34 minutami
    echo Datum::now()->addMinutes(4)->relativno(); // čez 4 minute
```

[Povezava](https://github.com/briannesbitt/Carbon#difference-for-humans) do privzete dokumentacije za `diffForHumans` (v angleščini).