# GB/T 4762 政治面貌代码

[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

## 简介

本包为 GB/T 4762-1984《政治面貌代码》标准的 PHP 实现。该标准规定了政治面貌的分类与代码，适用于信息处理、交换和管理。

## 功能特性

- 提供标准政治面貌枚举类型，便于代码调用
- 支持获取代码、标签、选项数组等多种便捷方法
- 适配表单下拉选项、数据校验等多场景

## 安装说明

系统要求：PHP 8.1 及以上

依赖：tourze/enum-extra ~0.0.5

```bash
composer require tourze/gb-t-4762
```

## 快速开始

```php
use Tourze\GBT4762\PoliticalAffiliation;

// 获取代码
$code = PoliticalAffiliation::CPC_MEMBER->value; // '01'

// 获取标签
$label = PoliticalAffiliation::CPC_MEMBER->getLabel(); // '中国共产党党员'

// 获取所有选项
$options = PoliticalAffiliation::items(); // ['01' => '中国共产党党员', ...]

// 获取所有选项（用于下拉框）
$selectOptions = PoliticalAffiliation::select(); // ['01' => '中国共产党党员', ...]
```

## 详细文档

- 所有枚举值及标签均见 `src/PoliticalAffiliation.php`
- 支持 `items()`、`select()`、`getLabel()` 等便捷方法

## 贡献指南

欢迎通过 Issue 或 PR 提交建议与改进。

## 版权和许可

MIT License

## 参考

- [GB/T 4762-1984 政治面貌代码](https://openstd.samr.gov.cn/bzgk/gb/newGbInfo?hcno=70D7C663523807D5EB37A03E97BCCB7B)
