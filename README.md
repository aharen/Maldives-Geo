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
