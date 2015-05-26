<?php

/*
 * This file is part of the fXmlRpc Native Serialization package.
 *
 * (c) Lars Strojny <lstrojny@php.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace fXmlRpc\Serialization\Parser;

use fXmlRpc\Serialization\Parser;
use fXmlRpc\Serialization\Value\Base64;

/**
 * Parser to parse XML responses into its PHP representation using XML RPC extension
 *
 * @author Lars Strojny <lstrojny@php.net>
 */
final class NativeParser implements Parser
{
    /**
     * {@inheritdoc}
     */
    public function parse($xmlString, &$isFault)
    {
        $result = xmlrpc_decode($xmlString, 'UTF-8');

        $isFault = false;

        $toBeVisited = [&$result];
        while (isset($toBeVisited[0]) && $value = &$toBeVisited[0]) {

            $type = gettype($value);
            if ($type === 'object') {
                $xmlRpcType = $value->{'xmlrpc_type'};
                if ($xmlRpcType === 'datetime') {
                    $value = \DateTime::createFromFormat(
                        'Ymd\TH:i:s',
                        $value->scalar,
                        isset($timezone) ? $timezone : $timezone = new \DateTimeZone('UTC')
                    );

                } elseif ($xmlRpcType === 'base64') {
                    if ($value->scalar !== '') {
                        $value = Base64::serialize($value->scalar);
                    } else {
                        $value = null;
                    }
                }

            } elseif ($type === 'array') {
                foreach ($value as &$element) {
                    $toBeVisited[] = &$element;
                }
            }

            array_shift($toBeVisited);
        }

        if (is_array($result)) {
            reset($result);
            $isFault = xmlrpc_is_fault($result);
        }

        return $result;
    }
}
