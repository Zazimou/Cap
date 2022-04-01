<?php declare(strict_types=1);


namespace Zazimou\CAP\Types;


use Zazimou\CAP\Cap;


class GeoCode
{
    const NAME_CISORP = 'CISORP';
    const NAME_EMMAID = 'EMMAID';
    const NAME_NUTS3 = 'NUTS3';

    /** @var string */
    public $valueName;
    /** @var string */
    public $value;

    public static function createInstance(?string $valueName, ?string $value): GeoCode
    {
        $item = new self;
        $item->valueName = Cap::trimString($valueName);
        $item->value = $value;

        return $item;
    }
}