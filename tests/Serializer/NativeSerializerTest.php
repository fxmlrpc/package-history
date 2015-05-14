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

use fXmlRpc\Serialization\Serializer\NativeSerializer;
use fXmlRpc\Serialization\Tests\SerializerTestCase;

/**
 * @author Lars Strojny <lstrojny@php.net>
 */
class NativeSerializerTest extends SerializerTestCase
{
    public function setUp()
    {
        $this->serializer = new NativeSerializer();
    }
}
