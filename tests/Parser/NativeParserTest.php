<?php

/*
 * This file is part of the fXmlRpc Native Serialization package.
 *
 * (c) Lars Strojny <lstrojny@php.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace fXmlRpc\Serialization\Tests\Parser;

use fXmlRpc\Serialization\Parser\NativeParser;
use fXmlRpc\Serialization\Tests\ParserTestCase;

/**
 * @author Lars Strojny <lstrojny@php.net>
 */
class NativeParserTest extends ParserTestCase
{
    public function setUp()
    {
        $this->parser = new NativeParser();
    }
}
