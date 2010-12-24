<?php
/**
 * Created by JetBrains PhpStorm.
 * User: prskavecl
 * Date: 24.12.10
 * Time: 13:12
 * To change this template use File | Settings | File Templates.
 */
require_once('XmlDzogchen.php');
/**
 * XmlDzogchenTest
 */
class XmlDzogchenTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var XmlDzogchen
     */
    protected $xml;
    /**
     * SetUp
     * @return void
     */
    public function setUp()
    {
        $this->xml = new XmlDzogchen('actual.xml');
    }
    /**
     * CreateXML
     * @return void
     */
    public function testCreateXml()
    {
        $this->xml->addNewValue('11','testovaci');
        $this->assertTrue(true);
        $this->assertXmlFileEqualsXmlFile(
          'expected.xml', 'actual.xml');
    }
}