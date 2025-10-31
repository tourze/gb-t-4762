<?php

declare(strict_types=1);

namespace Tourze\GBT4762\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use Tourze\GBT4762\PoliticalAffiliation;
use Tourze\PHPUnitEnum\AbstractEnumTestCase;

/**
 * @internal
 */
#[CoversClass(PoliticalAffiliation::class)]
final class PoliticalAffiliationTest extends AbstractEnumTestCase
{
    /**
     * 测试枚举值的有效性
     */
    public function testEnumValues(): void
    {
        $this->assertEquals('01', PoliticalAffiliation::CPC_MEMBER->value);
        $this->assertEquals('02', PoliticalAffiliation::CPC_PROBATIONARY_MEMBER->value);
        $this->assertEquals('03', PoliticalAffiliation::CYL_MEMBER->value);
        $this->assertEquals('04', PoliticalAffiliation::RCCK_MEMBER->value);
        $this->assertEquals('05', PoliticalAffiliation::CDL_MEMBER->value);
        $this->assertEquals('06', PoliticalAffiliation::CDNCA_MEMBER->value);
        $this->assertEquals('07', PoliticalAffiliation::CPPCC_MEMBER->value);
        $this->assertEquals('08', PoliticalAffiliation::CPD_MEMBER->value);
        $this->assertEquals('09', PoliticalAffiliation::ZGD_MEMBER->value);
        $this->assertEquals('10', PoliticalAffiliation::JS_MEMBER->value);
        $this->assertEquals('11', PoliticalAffiliation::TMDSL_MEMBER->value);
        $this->assertEquals('12', PoliticalAffiliation::NON_PARTISAN_DEMOCRAT->value);
        $this->assertEquals('13', PoliticalAffiliation::CITIZEN->value);
    }

    /**
     * 测试 getLabel 方法
     */
    public function testGetLabel(): void
    {
        $this->assertEquals('中国共产党党员', PoliticalAffiliation::CPC_MEMBER->getLabel());
        $this->assertEquals('中国共产党预备党员', PoliticalAffiliation::CPC_PROBATIONARY_MEMBER->getLabel());
        $this->assertEquals('中国共产主义青年团团员', PoliticalAffiliation::CYL_MEMBER->getLabel());
        $this->assertEquals('中国国民党革命委员会会员', PoliticalAffiliation::RCCK_MEMBER->getLabel());
        $this->assertEquals('中国民主同盟盟员', PoliticalAffiliation::CDL_MEMBER->getLabel());
        $this->assertEquals('中国民主建国会会员', PoliticalAffiliation::CDNCA_MEMBER->getLabel());
        $this->assertEquals('中国民主促进会会员', PoliticalAffiliation::CPPCC_MEMBER->getLabel());
        $this->assertEquals('中国农工民主党党员', PoliticalAffiliation::CPD_MEMBER->getLabel());
        $this->assertEquals('中国致公党党员', PoliticalAffiliation::ZGD_MEMBER->getLabel());
        $this->assertEquals('九三学社社员', PoliticalAffiliation::JS_MEMBER->getLabel());
        $this->assertEquals('台湾民主自治同盟盟员', PoliticalAffiliation::TMDSL_MEMBER->getLabel());
        $this->assertEquals('无党派民主人士', PoliticalAffiliation::NON_PARTISAN_DEMOCRAT->getLabel());
        $this->assertEquals('群众', PoliticalAffiliation::CITIZEN->getLabel());
    }

    /**
     * 测试 toSelectItem 方法
     */

    /**
     * 测试 toArray 方法
     */
    public function testToArray(): void
    {
        $expectedArray = [
            'value' => '01',
            'label' => '中国共产党党员',
        ];

        $this->assertEquals($expectedArray, PoliticalAffiliation::CPC_MEMBER->toArray());
    }

    /**
     * 测试 genOptions 方法
     */
    public function testGenOptions(): void
    {
        $options = PoliticalAffiliation::genOptions();

        // 检查数组长度是否与枚举值数量相同
        $this->assertCount(count(PoliticalAffiliation::cases()), $options);

        // 验证第一个选项是否正确
        $this->assertEquals('中国共产党党员', $options[0]['label']);
        $this->assertEquals('01', $options[0]['value']);

        // 检查选项中是否包含特定值
        $citizenFound = false;
        foreach ($options as $option) {
            if ('13' === $option['value'] && '群众' === $option['label']) {
                $citizenFound = true;
                break;
            }
        }
        $this->assertTrue($citizenFound, '未找到"群众"选项');
    }

    /**
     * 测试环境变量控制的选项隐藏功能
     */
    public function testOptionHiding(): void
    {
        // 保存当前环境变量
        $originalEnv = $_ENV['enum-display:Tourze\GBT4762\PoliticalAffiliation-13'] ?? null;

        try {
            // 设置环境变量以隐藏"群众"选项
            $_ENV['enum-display:Tourze\GBT4762\PoliticalAffiliation-13'] = false;

            $options = PoliticalAffiliation::genOptions();

            // 选项数量应该比枚举值少1个
            $this->assertCount(count(PoliticalAffiliation::cases()) - 1, $options);

            // 确认"群众"选项不在列表中
            foreach ($options as $option) {
                $this->assertNotEquals('13', $option['value'], '"群众"选项不应出现在列表中');
            }
        } finally {
            // 恢复环境变量
            if (null === $originalEnv) {
                unset($_ENV['enum-display:Tourze\GBT4762\PoliticalAffiliation-13']);
            } else {
                $_ENV['enum-display:Tourze\GBT4762\PoliticalAffiliation-13'] = $originalEnv;
            }
        }
    }

    /**
     * 测试从值创建枚举
     */
    public function testFromValue(): void
    {
        $this->assertSame(PoliticalAffiliation::CPC_MEMBER, PoliticalAffiliation::from('01'));
        $this->assertSame(PoliticalAffiliation::CITIZEN, PoliticalAffiliation::from('13'));

        $this->expectException(\ValueError::class);
        PoliticalAffiliation::from('99'); // 不存在的值
    }

    /**
     * 测试尝试从值创建枚举
     */
    public function testTryFromValue(): void
    {
        $this->assertSame(PoliticalAffiliation::CPC_MEMBER, PoliticalAffiliation::tryFrom('01'));
        $this->assertSame(PoliticalAffiliation::CITIZEN, PoliticalAffiliation::tryFrom('13'));
        $this->assertNull(PoliticalAffiliation::tryFrom('99')); // 不存在的值
    }
}
