# GB/T 4762 政治面貌代码

[English](README.md) | [中文](README.zh-CN.md)

[![Latest Version](https://img.shields.io/packagist/v/tourze/gb-t-4762.svg?style=flat-square)](https://packagist.org/packages/tourze/gb-t-4762)
[![Quality Score](https://img.shields.io/scrutinizer/g/tourze/gb-t-4762.svg?style=flat-square)](https://scrutinizer-ci.com/g/tourze/gb-t-4762)
[![License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](LICENSE)
[![Total Downloads](https://img.shields.io/packagist/dt/tourze/gb-t-4762.svg?style=flat-square)](https://packagist.org/packages/tourze/gb-t-4762)

GB/T 4762-1984《政治面貌代码》标准的 PHP 实现。本包提供了标准化的政治面貌分类枚举，适用于信息处理、数据交换和管理系统。

## 功能特性

- 基于 GB/T 4762-1984 标准的政治面貌枚举类型
- 提供代码获取、标签显示、选项生成等便捷方法
- 全面支持表单下拉选择和数据验证场景
- 支持环境变量控制选项可见性，满足不同显示需求
- 提供全面的测试覆盖，确保数据完整性

## 安装说明

**系统要求：**
- PHP 8.1 及以上
- tourze/enum-extra ^0.1.0

```bash
composer require tourze/gb-t-4762
```

## 快速开始

```php
<?php

use Tourze\GBT4762\PoliticalAffiliation;

// 获取代码值
$code = PoliticalAffiliation::CPC_MEMBER->value; // '01'

// 获取标签
$label = PoliticalAffiliation::CPC_MEMBER->getLabel(); // '中国共产党党员'

// 获取所有选项（用于选择组件）
$options = PoliticalAffiliation::genOptions();
// [{"label":"中国共产党党员","value":"01"}, ...]

// 转换为数组格式
$item = PoliticalAffiliation::CPC_MEMBER->toArray();
// ["value" => "01", "label" => "中国共产党党员"]

// 获取选择项格式
$selectItem = PoliticalAffiliation::CPC_MEMBER->toSelectItem();
// ["label":"中国共产党党员","text":"中国共产党党员","value":"01","name":"中国共产党党员"]

// 根据值创建枚举实例
$affiliation = PoliticalAffiliation::from('01'); // PoliticalAffiliation::CPC_MEMBER

// 尝试根据值创建枚举实例（找不到返回null）
$affiliation = PoliticalAffiliation::tryFrom('99'); // null
```

## 详细文档

### 可用方法

| 方法 | 描述 | 返回类型 |
|------|------|----------|
| `value` | 获取代码值 | `string` |
| `getLabel()` | 获取中文标签 | `string` |
| `genOptions()` | 获取所有选项数组，用于选择组件 | `array` |
| `toArray()` | 将单个项目转为包含值和标签的数组 | `array` |
| `toSelectItem()` | 将单个项目转为选择项格式 | `array` |
| `from($value)` | 根据值创建枚举实例 | `PoliticalAffiliation` |
| `tryFrom($value)` | 尝试根据值创建枚举实例 | `PoliticalAffiliation\|null` |
| `cases()` | 获取所有枚举项 | `array` |

### 政治面貌代码表

| 代码 | 标签 | 枚举名称 |
|------|------|----------|
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

### 环境变量控制显示

您可以通过环境变量控制特定选项的可见性：

```php
// 隐藏"群众"选项不在 genOptions() 中显示
$_ENV['enum-display:Tourze\GBT4762\PoliticalAffiliation-13'] = false;

$options = PoliticalAffiliation::genOptions();
// "群众"选项将从结果中排除
```

## 贡献指南

欢迎通过 Issue 或 Pull Request 提交建议与改进。

## 版权和许可

MIT License (MIT)。更多信息请参阅 [License File](LICENSE)。

## 参考

- [GB/T 4762-1984 政治面貌代码](https://openstd.samr.gov.cn/bzgk/gb/newGbInfo?hcno=70D7C663523807D5EB37A03E97BCCB7B)
