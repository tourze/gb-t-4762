# GB/T 4762 Political Affiliation Codes

[English](README.md) | [中文](README.zh-CN.md)

[![Latest Version](https://img.shields.io/packagist/v/tourze/gb-t-4762.svg?style=flat-square)](https://packagist.org/packages/tourze/gb-t-4762)
[![Quality Score](https://img.shields.io/scrutinizer/g/tourze/gb-t-4762.svg?style=flat-square)](https://scrutinizer-ci.com/g/tourze/gb-t-4762)
[![License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](LICENSE)
[![Total Downloads](https://img.shields.io/packagist/dt/tourze/gb-t-4762.svg?style=flat-square)](https://packagist.org/packages/tourze/gb-t-4762)

A PHP implementation of the GB/T 4762-1984 Political Affiliation Codes standard. This package provides a standardized enum for political affiliation classifications suitable for information processing, data exchange, and management systems.

## Features

- Standard-compliant political affiliation enum based on GB/T 4762-1984
- Convenient methods for code retrieval, labeling, and option generation
- Full support for form dropdowns and data validation scenarios
- Environment-controlled option visibility for different display requirements
- Comprehensive test coverage ensuring data integrity

## Installation

**Requirements:**
- PHP 8.1 or higher
- tourze/enum-extra ^0.1.0

```bash
composer require tourze/gb-t-4762
```

## Quick Start

```php
<?php

use Tourze\GBT4762\PoliticalAffiliation;

// Get code value
$code = PoliticalAffiliation::CPC_MEMBER->value; // '01'

// Get label
$label = PoliticalAffiliation::CPC_MEMBER->getLabel(); // '中国共产党党员'

// Get all options for select components
$options = PoliticalAffiliation::genOptions();
// [{"label":"中国共产党党员","value":"01"}, ...]

// Convert to array format
$item = PoliticalAffiliation::CPC_MEMBER->toArray();
// ["value" => "01", "label" => "中国共产党党员"]

// Get select item format
$selectItem = PoliticalAffiliation::CPC_MEMBER->toSelectItem();
// ["label":"中国共产党党员","text":"中国共产党党员","value":"01","name":"中国共产党党员"]

// Create from value
$affiliation = PoliticalAffiliation::from('01'); // PoliticalAffiliation::CPC_MEMBER

// Try create from value (returns null if not found)
$affiliation = PoliticalAffiliation::tryFrom('99'); // null
```

## Documentation

### Available Methods

| Method | Description | Return Type |
|--------|-------------|-------------|
| `value` | Get the code value | `string` |
| `getLabel()` | Get the Chinese label | `string` |
| `genOptions()` | Get all options as array for select components | `array` |
| `toArray()` | Convert single item to array with value and label | `array` |
| `toSelectItem()` | Convert single item to select item format | `array` |
| `from($value)` | Create enum instance from value | `PoliticalAffiliation` |
| `tryFrom($value)` | Try to create enum instance from value | `PoliticalAffiliation\|null` |
| `cases()` | Get all enum cases | `array` |

### Political Affiliation Codes

| Code | Label (Chinese) | Enum Case |
|------|----------------|-----------|
| 01 | 中国共产党党员 | CPC_MEMBER |
| 02 | 中国共产党预备党员 | CPC_PROBATIONARY_MEMBER |
| 03 | 中国共产主义青年团团员 | CYL_MEMBER |
| 04 | 中国国民党革命委员会会员 | RCCK_MEMBER |
| 05 | 中国民主同盟盟员 | CDL_MEMBER |
| 06 | 中国民主建国会会员 | CDNCA_MEMBER |
| 07 | 中国民主促进会会员 | CPPCC_MEMBER |
| 08 | 中国农工民主党党员 | CPD_MEMBER |
| 09 | 中国致公党党员 | ZGD_MEMBER |
| 10 | 九三学社社员 | JS_MEMBER |
| 11 | 台湾民主自治同盟盟员 | TMDSL_MEMBER |
| 12 | 无党派民主人士 | NON_PARTISAN_DEMOCRAT |
| 13 | 群众 | CITIZEN |

### Environment-Controlled Display

You can control the visibility of specific options using environment variables:

```php
// Hide the "群众" option from genOptions()
$_ENV['enum-display:Tourze\GBT4762\PoliticalAffiliation-13'] = false;

$options = PoliticalAffiliation::genOptions();
// The "群众" option will be excluded from the result
```

## Contributing

Feel free to submit issues or pull requests for suggestions and improvements.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.

## Reference

- [GB/T 4762-1984 Political Affiliation Codes](https://openstd.samr.gov.cn/bzgk/gb/newGbInfo?hcno=70D7C663523807D5EB37A03E97BCCB7B)
