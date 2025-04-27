# GB/T 4762 政治面貌代码 - 实体设计说明

本模块主要包含一个核心枚举实体：`PoliticalAffiliation`，用于标准化政治面貌的代码及其标签。

## 实体结构

| 枚举成员 | 代码（value） | 标签（label）           |
|----------|---------------|-------------------------|
| CPC_MEMBER | '01'        | 中国共产党党员           |
| CPC_PROBATIONARY_MEMBER | '02' | 中国共产党预备党员     |
| CYL_MEMBER | '03'        | 中国共产主义青年团团员   |
| RCCK_MEMBER | '04'       | 中国国民党革命委员会会员 |
| CDL_MEMBER | '05'        | 中国民主同盟盟员         |
| CDNCA_MEMBER | '06'      | 中国民主建国会会员       |
| CPPCC_MEMBER | '07'      | 中国民主促进会会员       |
| CPD_MEMBER | '08'        | 中国农工民主党党员       |
| ZGD_MEMBER | '09'        | 中国致公党党员           |
| JS_MEMBER | '10'         | 九三学社社员             |
| TMDSL_MEMBER | '11'      | 台湾民主自治同盟盟员     |
| NON_PARTISAN_DEMOCRAT | '12' | 无党派民主人士         |
| CITIZEN | '13'           | 群众                     |

## 设计说明

- 该枚举实现了 `Labelable`、`Itemable`、`Selectable` 接口，支持获取标签、选项数组、下拉选项等多种常用能力。
- 所有枚举值均严格对应国家标准 GB/T 4762-1984。
- 适用于数据库字段、表单选项、数据校验等多种业务场景。

## 代码示例

```php
use Tourze\GBT4762\PoliticalAffiliation;

// 获取所有枚举项
$options = PoliticalAffiliation::items();

// 获取下拉选项
$select = PoliticalAffiliation::select();
```
