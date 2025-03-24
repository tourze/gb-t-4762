# GB/T 4762 政治面貌代码 / Political Affiliation Codes

[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

## 简介 / Introduction

本包提供了 GB/T 4762-1984 标准中定义的政治面貌代码的 PHP 实现。该标准规定了政治面貌的分类与代码，适用于信息处理、交换和管理。

This package provides a PHP implementation of political affiliation codes defined in GB/T 4762-1984 standard. This standard specifies the classification and codes for political affiliations, applicable to information processing, exchange and management.

## 安装 / Installation

```bash
composer require tourze/gb-t-4762
```

## 使用说明 / Usage

```php
use Tourze\GBT4762\PoliticalAffiliation;

// 获取代码 / Get code
$code = PoliticalAffiliation::CPC_MEMBER->value; // '01'

// 获取标签 / Get label
$label = PoliticalAffiliation::CPC_MEMBER->getLabel(); // '中国共产党党员'

// 获取所有选项 / Get all options
$options = PoliticalAffiliation::items(); // ['01' => '中国共产党党员', ...]

// 获取所有选项（用于下拉框） / Get all options (for select)
$selectOptions = PoliticalAffiliation::select(); // ['01' => '中国共产党党员', ...]
```

## 参考 / Reference

- [GB/T 4762-1984 政治面貌代码](https://openstd.samr.gov.cn/bzgk/gb/newGbInfo?hcno=70D7C663523807D5EB37A03E97BCCB7B)
