# Atolls & Islands of Maldives for PHP

All data collected from [https://www.atollsofmaldives.gov.mv/atolls](www.atollsofmaldives.gov.mv).

If you're looking for a simple JS or JSON version [https://github.com/naxeem/maldives-atoll-islands](naxeem/maldives-atoll-islands)

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

Get an island by it's name

```
use aharen\MaldivesGeo\Island;

(new Island)->get('vaikaradhoo');
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
