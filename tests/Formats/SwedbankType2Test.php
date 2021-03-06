<?php

namespace byrokrat\banking;

/**
 * @covers \byrokrat\banking\BaseAccount
 */
class SwedbankType2Test extends AccountNumberTestCase
{
    public function getFormatId()
    {
        return BankNames::FORMAT_SWEDBANK_2;
    }

    public function getBankIdentifier()
    {
        return BankNames::BANK_SWEDBANK;
    }

    public function invalidStructureProvider()
    {
        return [
            ['8000,1'],
            ['8000,11111111111'],
            ['8000,0000000000018'],
            ['8000-,1111111'],
            ['8000-1111111'],
            ['80001000001111111'],
        ];
    }

    public function invalidClearingProvider()
    {
        return [
            ['7999,11'],
            ['9000,11'],
        ];
    }

    public function invalidCheckDigitProvider()
    {
        return [
            ['8000,1111112'],
            ['8214,9837107772'],
            ['8150,9942266951'],
            ['8327,9940298181'],
            ['8214,9846665701'],
            ['8214,9844447351'],
            ['8006,5330010161'],
            ['8424,39984101'],
            ['8150,9942187552'],
            ['8214,9133844001'],
            ['8000-1,1111111'],
            ['8105-1,744202466'],
        ];
    }

    public function validProvider()
    {
        return [
            ['8000,1111111',         '8000', '',  '111111',    '1'],
            ['8000,000001111111',    '8000', '',  '111111',    '1'],
            ['80000,000001111111',   '8000', '0', '111111',    '1'],
            ['8214,9837107771',      '8214', '',  '983710777', '1'],
            ['8150,9942266959',      '8150', '',  '994226695', '9'],
            ['8327,9940298186',      '8327', '',  '994029818', '6'],
            ['8214,9846665702',      '8214', '',  '984666570', '2'],
            ['8214,9844447350',      '8214', '',  '984444735', '0'],
            ['8006,5330010165',      '8006', '',  '533001016', '5'],
            ['8424,39984109',        '8424', '',  '3998410',   '9'],
            ['8150,9942187551',      '8150', '',  '994218755', '1'],
            ['8214,9133844002',      '8214', '',  '913384400', '2'],
            ['8000,001111111116',    '8000', '',  '111111111', '6'],
            ['8105,74420246-6',      '8105', '',  '74420246',  '6'],
            ['81050,74420246-6',     '8105', '0', '74420246',  '6'],
            ['8105-0,74420246-6',    '8105', '0', '74420246',  '6'],
            ['8214-9,923 472 612-4', '8214', '9', '923472612', '4'],
        ];
    }

    public function testFormatClearingCheckDigut()
    {
        $this->assertSame(
            '8105-0,744 202 46-6',
            $this->buildAccount('81050,744202466')->getNumber()
        );
    }
}
