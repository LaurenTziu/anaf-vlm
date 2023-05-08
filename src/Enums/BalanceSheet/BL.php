<?php

namespace Anaf\Enums\BalanceSheet;

CLASS BL
{
    CONST AVERAGE_NUMBER_OF_EMPLOYEES = 'NUMAR MEDIU DE SALARIATI';
    CONST NET_LOSS = 'PIERDERE NETA';
    CONST NET_PROFIT = 'PROFIT NET';
    CONST GROSS_LOSS = 'PIERDERE BRUTA';
    CONST GROSS_PROFIT = 'PROFIT BRUT';
    CONST TOTAL_EXPENSES = 'CHELTUIELI TOTALE';
    CONST TOTAL_INCOME = 'VENITURI TOTALE';
    CONST NET_TURNOVER = 'CIFRA DE AFACERI NETA';
    CONST HERITAGE_OF_THE_KINGDOM = 'PATRIMONIUL REGIEI';
    CONST PAID_SUBSCRIBED_CAPITAL = 'CAPITAL SUBSCRIS VARSAT';
    CONST CAPITAL_TOTAL = 'CAPITALURI - TOTAL, DIN CARE';
    CONST PROVISIONS = 'PROVIZIOANE';
    CONST ADVANCE_INCOME = 'VENITURI IN AVANS';
    CONST LIABILITIES = 'DATORII';
    CONST PREPAYMENTS = 'CHELTUIELI IN AVANS';
    // CONST HOME_AND_BANK_ACCOUNTS = 'CASA SI CONTURI LA BANCI';
    CONST HOME_AND_BANK_ACCOUNTS = 'CASA ?I CONTURI LA B?NCI';
    CONST DEBT = 'CREANTE';
    CONST INVENTORIES = 'STOCURI';
    CONST CURRENT_ASSETS = 'ACTIVE CIRCULANTE - TOTAL, DIN CARE';
    CONST FIXED_ASSETS = 'ACTIVE IMOBILIZATE - TOTAL';

    private  $value;

    private function __construct( $value)
    {
        $this->value = $value;
    }


    public static function from( $value)
    {
        switch ($value) {
            case self::AVERAGE_NUMBER_OF_EMPLOYEES:
                return 'AVERAGE_NUMBER_OF_EMPLOYEES';
            case self::NET_LOSS:
                return 'NET_LOSS';
            case self::NET_PROFIT:
                return 'NET_PROFIT';
            case self::GROSS_LOSS:
                return 'GROSS_LOSS';
            case self::GROSS_PROFIT:
                return 'GROSS_PROFIT';
            case self::TOTAL_EXPENSES:
                return 'TOTAL_EXPENSES';
            case self::TOTAL_INCOME:
                return 'TOTAL_INCOME';
            case self::NET_TURNOVER:
                return 'NET_TURNOVER';
            case self::HERITAGE_OF_THE_KINGDOM:
                return 'HERITAGE_OF_THE_KINGDOM';
            case self::PAID_SUBSCRIBED_CAPITAL:
                return 'PAID_SUBSCRIBED_CAPITAL';
            case self::CAPITAL_TOTAL:
                return 'CAPITAL_TOTAL';
            case self::PROVISIONS:
                return 'PROVISIONS';
            case self::ADVANCE_INCOME:
                return 'ADVANCE_INCOME';
            case self::LIABILITIES:
                return 'LIABILITIES';
            case self::PREPAYMENTS:
                return 'PREPAYMENTS';
            case self::HOME_AND_BANK_ACCOUNTS:
                return 'HOME_AND_BANK_ACCOUNTS';
            case self::DEBT:
                return 'DEBT';
            case self::INVENTORIES:
                return 'INVENTORIES';
            case self::CURRENT_ASSETS:
                return 'CURRENT_ASSETS';
            case self::FIXED_ASSETS:
                return 'FIXED_ASSETS';
            default:
                throw new \InvalidArgumentException("Invalid value '$value' for enum " . __CLASS__);
        }
    }

    public static function __callStatic( $name,  $arguments): self
    {
        if (!defined(self::class."::".$name)) {
            throw new \InvalidArgumentException(sprintf('Undefined enum constant "%s"', $name));
        }

        return new self(constant(self::class . '::' . $name));
    }

    public function getValue()
    {
        return $this->value;
    }
}