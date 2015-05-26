<?php

/*
 * This file is part of the fXmlRpc SAX Serialization package.
 *
 * (c) Lars Strojny <lstrojny@php.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace fXmlRpc\Serialization\Exception;

/**
 * @author Lars Strojny <lstrojny@php.net>
 */
final class UnexpectedTagException extends \RuntimeException implements SerializerException
{
    /**
     * @param string  $tagName
     * @param mixed   $elements
     * @param array   $definedVariables
     * @param integer $depth
     * @param string  $xml
     */
    public function __construct($tagName, $elements, array $definedVariables, $depth, $xml)
    {
        $expectedElements = [];
        foreach ($definedVariables as $variableName => $variable) {
            if (substr($variableName, 0, 4) !== 'flag') {
                continue;
            }

            if (($elements & $variable) === $variable) {
                $expectedElements[] = substr($variableName, 4);
            }
        }

        $this->message = sprintf(
            'Invalid XML. Expected one of "%s", got "%s" on depth %d (context: "%s")',
            implode('", "', $expectedElements),
            $tagName,
            $depth,
            $xml
        );
    }
}
