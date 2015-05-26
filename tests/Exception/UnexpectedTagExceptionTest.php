<?php

/*
 * This file is part of the fXmlRpc SAX Serialization package.
 *
 * (c) Lars Strojny <lstrojny@php.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace fXmlRpc\Serialization\Tests\Exception;

use fXmlRpc\Serialization\Exception\UnexpectedTagException;

/**
 * @author Lars Strojny <lstrojny@php.net>
 */
class UnexpectedTagExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testHasUnexpectedTagConstructor()
    {
        $e = new UnexpectedTagException(
            'invalid',
            'val',
            [
                'flagTest'          => 'val',
                'flagAnother'       => 'val',
                'thisWIllBeSkipped' => 'val',
            ],
            5,
            '<tag><invalid></invalid></tag>'
        );

        $this->assertInstanceOf('fXmlRpc\Serialization\Exception\SerializerException', $e);

        $this->assertEquals(
            'Invalid XML. Expected one of "Test", "Another", got "invalid" on depth 5 (context: "<tag><invalid></invalid></tag>")',
            $e->getMessage()
        );
    }
}
