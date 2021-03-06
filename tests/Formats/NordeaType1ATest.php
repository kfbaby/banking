<?php

namespace byrokrat\banking;

/**
 * @covers \byrokrat\banking\BaseAccount
 */
class NordeaType1ATest extends AccountNumberTestCase
{
    public function getFormatId()
    {
        return BankNames::FORMAT_NORDEA_1A;
    }

    public function getBankIdentifier()
    {
        return BankNames::BANK_NORDEA;
    }

    public function invalidStructureProvider()
    {
        return [
            ['3000,111111'],
            ['3000,11111'],
            ['3000,11111111'],
            ['3000,0000001111111'],
        ];
    }

    public function invalidClearingProvider()
    {
        return [
            ['1099,1234567'],
            ['1200,1234567'],
            ['1399,1234567'],
            ['2100,1234567'],
            ['2999,1234567'],
            ['3300,1234567'],
            ['3400,1234567'],
            ['3409,1234567'],
            ['3782,1234567'],
            ['4000,1234567'],
        ];
    }

    public function invalidCheckDigitProvider()
    {
        return [
            ['3000,1111111'],
            ['3032,0050011'],
            ['3017,0108601'],
            ['3030,0377311'],
            ['1405,3542562'],
            ['3045,0147421'],
            ['3045,0156691'],
        ];
    }

    public function validProvider()
    {
        return [
            ['3000,1111116',      '3000', '', '111111', '6'],
            ['3000,000001111116', '3000', '', '111111', '6'],
            ['3032,0050017',      '3032', '', '005001', '7'],
            ['3017,0108600',      '3017', '', '010860', '0'],
            ['3030,0377312',      '3030', '', '037731', '2'],
            ['1405,354256-1',     '1405', '', '354256', '1'],
            ['3045,014742-8',     '3045', '', '014742', '8'],
            ['3045,015669-9',     '3045', '', '015669', '9'],
        ];
    }
}
