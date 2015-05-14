<?php

/*
 * This file is part of the fXmlRpc package.
 *
 * (c) Lars Strojny <lstrojny@php.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace fXmlRpc\Benchmark;

use Athletic\AthleticEvent;
use fXmlRpc\Serialization\Serializer\NativeSerializer;
use fXmlRpc\Serialization\Serializer\XmlWriterSerializer;
use fXmlRpc\Serialization\Value\Base64;
use Zend\XmlRpc\Request;

/**
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Serializer extends AthleticEvent
{
    /**
     * @var array
     */
    protected $args;

    /**
     * @var NativeSerializer
     */
    protected $nativeSerializer;

    /**
     * @var XmlWriterSerializer
     */
    protected $xmlReaderWriterSerializer;

    public function classSetUp()
    {
        for ($i = 0; $i < 1000; $i++) {
            $this->args[] = [
                'test_string' => [$i => str_repeat('a', $i)],
                'test_integer' => (int) rand(),
                'test_float' => (float) rand(),
                'test_datetime' => new \DateTime(),
                'test_base64' => Base64::serialize(str_repeat('a', $i)),
            ];
            $this->args[] = $i;
            $this->args[] = str_repeat('ä', $i);
        }
    }

    public function setUp()
    {
        $this->nativeSerializer = new NativeSerializer();
        $this->xmlWriterSerializer = new XmlWriterSerializer();
    }

    /**
     * @iterations 40
     */
    public function zendFramework2()
    {
        $request = new Request();
        $request->setMethod('test');
        $request->setParams($this->args);
        $serialized = $request->saveXml();
    }

    /**
     * @iterations 40
     */
    public function zendFramework1()
    {
        $request = new \Zend_XmlRpc_Request();
        $request->setMethod('test');
        $request->setParams($this->args);
        $serialized = $request->saveXml();
    }

    /**
     * @iterations 40
     */
    public function native()
    {
        $serialized = $this->nativeSerializer->serialize('test', $this->args);
    }

    /**
     * @iterations 40
     */
    public function xmlWriter()
    {
        $serialized = $this->xmlWriterSerializer->serialize('test', $this->args);
    }
}
