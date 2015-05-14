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
use fXmlRpc\Serialization\Parser\NativeParser;
use fXmlRpc\Serialization\Parser\XmlReaderParser;
use Zend\XmlRpc\AbstractValue;

/**
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Parser extends AthleticEvent
{
    /**
     * @var string
     */
    protected $xml;

    /**
     * @var NativeParser
     */
    protected $nativeParser;

    /**
     * @var XmlReaderParser
     */
    protected $xmlReaderParser;

    public function classSetUp()
    {
        $this->xml = file_get_contents(__DIR__ . '/../fixtures/response.xml');
    }

    public function setUp()
    {
        $this->nativeParser = new NativeParser();
        $this->xmlReaderParser = new XmlReaderParser();
    }

    /**
     * @iterations 40
     */
    public function zendFramework2()
    {
        $simpleXml = new \SimpleXmlElement($this->xml);
        $parsed = AbstractValue::getXmlRpcValue($simpleXml->params->param->value->asXml(), AbstractValue::XML_STRING);
    }

    /**
     * @iterations 40
     */
    public function zendFramework1()
    {
        $simpleXml = new \SimpleXmlElement($this->xml);
        $parsed = \Zend_XmlRpc_Value::getXmlRpcValue($simpleXml->params->param->value->asXml(), \Zend_XmlRpc_Value::XML_STRING);
    }

    /**
     * @iterations 40
     */
    public function native()
    {
        $parsed = $this->nativeParser->parse($this->xml, $isFault);
    }

    /**
     * @iterations 40
     */
    public function xmlReader()
    {
        $parsed = $this->xmlReaderParser->parse($this->xml, $isFault);
    }
}
