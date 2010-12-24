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
        if (file_exists('actual.xml')) {
            unlink('actual.xml');
        }
        $this->xml = new XmlDzogchen('actual.xml');
    }
    /**
     * CreateXML
     * @return void
     */
    public function testCreateXml()
    {
        $this->xml->addNewValue('11','testovaci');
        $this->assertXmlFileEqualsXmlFile(
          'expected.xml', 'actual.xml');
    }
    /**
     * UpdateXML
     * @return void
     */
    public function testUpdateXml()
    {
        $this->xml->addNewValue('11','testovaci');
        $this->xml->updateValue('11', 'dalsi');
        $this->assertXmlFileEqualsXmlFile(
          'expected-update.xml', 'actual.xml');

    }

}