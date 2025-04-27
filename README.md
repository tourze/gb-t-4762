# GB/T 4762 Political Affiliation Codes

[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

## Introduction

This package provides a PHP implementation of the political affiliation codes defined in the GB/T 4762-1984 standard. The standard specifies the classification and codes for political affiliations, suitable for information processing, exchange, and management.

## Features

- Provides a standard enum type for political affiliations
- Convenient methods for retrieving codes, labels, and option arrays
- Supports use cases such as form dropdowns and data validation

## Installation

Requirements: PHP 8.1+

Dependency: tourze/enum-extra ~0.0.5

```bash
composer require tourze/gb-t-4762
```

## Quick Start

```php
use Tourze\GBT4762\PoliticalAffiliation;

// Get code
$code = PoliticalAffiliation::CPC_MEMBER->value; // '01'

// Get label
$label = PoliticalAffiliation::CPC_MEMBER->getLabel(); // '中国共产党党员'

// Get all options
$options = PoliticalAffiliation::items(); // ['01' => '中国共产党党员', ...]

// Get all options (for select)
$selectOptions = PoliticalAffiliation::select(); // ['01' => '中国共产党党员', ...]
```

## Documentation

- All enum values and labels are defined in `src/PoliticalAffiliation.php`
- Supports methods like `items()`, `select()`, `getLabel()`, etc.

## Contributing

Feel free to submit issues or pull requests for suggestions and improvements.

## License

MIT License

## Reference

- [GB/T 4762-1984 Political Affiliation Codes](https://openstd.samr.gov.cn/bzgk/gb/newGbInfo?hcno=70D7C663523807D5EB37A03E97BCCB7B)
