<?php

declare(strict_types=1);

namespace Tourze\GBT4762;

use Tourze\EnumExtra\Itemable;
use Tourze\EnumExtra\ItemTrait;
use Tourze\EnumExtra\Labelable;
use Tourze\EnumExtra\Selectable;
use Tourze\EnumExtra\SelectTrait;

/**
 * 标准号：GB/T 4762-1984
 * 中文标准名称：政治面貌代码
 * 英文标准名称：Codes for political affiliation
 *
 * @see https://openstd.samr.gov.cn/bzgk/gb/newGbInfo?hcno=70D7C663523807D5EB37A03E97BCCB7B
 */
enum PoliticalAffiliation: string implements Labelable, Itemable, Selectable
{
    use ItemTrait;
    use SelectTrait;

    case CPC_MEMBER = '01';
    case CPC_PROBATIONARY_MEMBER = '02';
    case CYL_MEMBER = '03';
    case RCCK_MEMBER = '04';
    case CDL_MEMBER = '05';
    case CDNCA_MEMBER = '06';
    case CPPCC_MEMBER = '07';
    case CPD_MEMBER = '08';
    case ZGD_MEMBER = '09';
    case JS_MEMBER = '10';
    case TMDSL_MEMBER = '11';
    case NON_PARTISAN_DEMOCRAT = '12';
    case CITIZEN = '13';

    public function getLabel(): string
    {
        return match ($this) {
            self::CPC_MEMBER => '中国共产党党员',
            self::CPC_PROBATIONARY_MEMBER => '中国共产党预备党员',
            self::CYL_MEMBER => '中国共产主义青年团团员',
            self::RCCK_MEMBER => '中国国民党革命委员会会员',
            self::CDL_MEMBER => '中国民主同盟盟员',
            self::CDNCA_MEMBER => '中国民主建国会会员',
            self::CPPCC_MEMBER => '中国民主促进会会员',
            self::CPD_MEMBER => '中国农工民主党党员',
            self::ZGD_MEMBER => '中国致公党党员',
            self::JS_MEMBER => '九三学社社员',
            self::TMDSL_MEMBER => '台湾民主自治同盟盟员',
            self::NON_PARTISAN_DEMOCRAT => '无党派民主人士',
            self::CITIZEN => '群众',
        };
    }
}
