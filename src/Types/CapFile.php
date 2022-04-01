<?php declare(strict_types=1);


namespace Zazimou\CAP\Types;


use SimpleXMLElement;


class CapFile
{
    /** @var Alert */
    public $alert;

    public static function createInstance(SimpleXMLElement $simpleXMLElement): CapFile
    {
        $ret = new self;
        $ret->alert = Alert::createInstance($simpleXMLElement);

        return $ret;
    }
}