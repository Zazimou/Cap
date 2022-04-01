<?php declare(strict_types=1);


namespace Zazimou\CAP;


use Curl\Curl;
use ErrorException;
use SimpleXMLElement;
use Zazimou\CAP\Exceptions\NotFoundException;
use Zazimou\CAP\Types\CapFile;
use UnexpectedValueException;


class Cap
{

    public static function getNullIfEmpty(?string $value): ?string
    {
        if (empty($value)) {
            return null;
        }

        return $value;
    }

    /**
     * @param string $url
     * @return CapFile
     * @throws ErrorException
     * @throws NotFoundException
     */
    public function read(string $url): CapFile
    {
        $curl = new Curl($url);
        $curl->setOpt(CURLOPT_FOLLOWLOCATION, true);
        $response = $curl->get($url);
        if ($curl->error == true) {
            if ($curl->errorCode == 404) {
                throw new NotFoundException(sprintf('File at url "%s" not found', $url));
            }
            if ($curl->errorCode == 6) {
                throw new NotFoundException(sprintf('Couldn\'t resolve host: "%s" not found', $url));
            }
        }
        if ($response instanceof SimpleXMLElement === false) {
            throw new UnexpectedValueException(sprintf('Bad response from url "%s"', $url));
        }
        return CapFile::createInstance($response);
    }

    public static function trimString(?string $value): ?string
    {
        if (empty($value) === false) {
            $value = trim($value);
        }

        return $value;
    }
}