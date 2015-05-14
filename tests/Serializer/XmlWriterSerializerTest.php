<?php

/*
 * This file is part of the fXmlRpc Serialization package.
 *
 * (c) Lars Strojny <lstrojny@php.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace fXmlRpc\Serialization\Tests\Serializer;

use fXmlRpc\Serialization\ExtensionSupport;
use fXmlRpc\Serialization\Serializer\XmlWriterSerializer;
use fXmlRpc\Serialization\Tests\SerializerTestCase;

/**
 * @author Lars Strojny <lstrojny@php.net>
 */
class XmlWriterSerializerTest extends SerializerTestCase
{
    public function setUp()
    {
        $this->serializer = new XmlWriterSerializer();
    }

    public function testDisableNilExtension()
    {
        $this->assertInstanceOf('fXmlRpc\Serialization\ExtensionSupport', $this->serializer);
        $nilXml = '<?xml version="1.0" encoding="UTF-8"?>
                <methodCall>
                    <methodName>method</methodName>
                    <params>
                        <param>
                            <value>
                                <nil></nil>
                            </value>
                        </param>
                    </params>
                </methodCall>';

        $this->assertXmlStringEqualsXmlString($nilXml, $this->serializer->serialize('method', [null]));
        $this->assertNull($this->serializer->disableExtension(ExtensionSupport::EXTENSION_NIL));

        $stringXml = '<?xml version="1.0" encoding="UTF-8"?>
                <methodCall>
                    <methodName>method</methodName>
                    <params>
                        <param>
                            <value>
                                <string></string>
                            </value>
                        </param>
                    </params>
                </methodCall>';

        $this->assertXmlStringEqualsXmlString($stringXml, $this->serializer->serialize('method', [null]));
    }
}
