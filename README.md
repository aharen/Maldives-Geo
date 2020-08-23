# Atolls & Islands of Maldives for PHP

All data collected from [www.atollsofmaldives.gov.mv](https://www.atollsofmaldives.gov.mv/atolls).

If you're looking for a simple JS or JSON version [naxeem/maldives-atoll-islands](https://github.com/naxeem/maldives-atoll-islands)

## Installation

```
composer require aharen/maldives-geo
```

## Usage

This package has 2 main classes, one for Atolls and the other for Islands

### Atolls

Each atoll contains the following information:

```
{
    "code": "HDH",
    "name": "Haa Dhaalu Atoll",
    "alt_name": "Thiladhunmathi Dhekunuburi"
}
```

Fetch all atolls

```
use aharen\MaldivesGeo\Atoll;

(new Atoll)->all();
```

Get an atoll using code

```
use aharen\MaldivesGeo\Atoll;

(new Atoll)->get('gn');
```

Get an atoll with the islands in atoll

```
use aharen\MaldivesGeo\Atoll;

(new Atoll)->getWithIslands('gn');
```

### Islands

Each island contains the following information:

```
{
   "atoll": "HDH",
    "type": "Islands",
    "name": "Vaikaradhoo",
    "alt_name": null,
    "latitude": "6.549444444",
    "longitude": "72.95305556",
    "flags": [
        "I"
    ]
}
```

Get an island by it's name. Optional atoll parameter can be provided as the second argument.

Since multiple islands with the same name exist, if the atoll is not provided it will return the first result

```
use aharen\MaldivesGeo\Island;

(new Island)->get('vaikaradhoo');
```

Get an island by it's name and atoll

```
use aharen\MaldivesGeo\Island;

(new Island)->get('maafushi', 'f);
```

Get an island by it's name with atoll

```
use aharen\MaldivesGeo\Island;

(new Island)->getWithAtoll('vaikaradhoo');
```

Get all islands in an atoll

```
use aharen\MaldivesGeo\Island;

(new Island)->getInAtoll('gn');
```
