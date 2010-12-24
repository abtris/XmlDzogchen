<?php
/**
 * @package dzogchen
 */
class XmlDzogchen
{
    /**
     * @var string
     */
    protected $filename;
    /**
     * @var DOMDocument
     */
    protected $doc;
    /**
     * @var bool
     */
    protected $debug;
    /**
     * Contruct
     * @param string $filename
     * @param bool $debug
     */
    public function __construct($filename, $debug = false)
    {
        $this->filename = $filename;
        $this->debug = $debug;
        $this->doc = new DOMDocument('1.0', 'UTF-8');
        $this->doc->preserveWhiteSpace = false;
        $this->doc->formatOutput = true;
        if (file_exists($this->filename)) {
            echo "Load file: ".$this->filename . PHP_EOL;
            $this->doc->load($this->filename);
        } else {
            echo "Create new file" . PHP_EOL;
            $element = $this->doc->createElement('data', '');
            $this->doc->appendChild($element);
        }
    }
    /**
     * Add new value into XML
     * @param int $id
     * @param string $value
     * @return void
     */
    public function addNewValue($id, $value)
    {
        $root = $this->doc->getElementsByTagName('data')->item(0);

        $root_child = $this->doc->createElement('item');
        $root->appendChild($root_child);

        $root_attr1 = $this->doc->createAttribute('id');
        $root_child->appendChild($root_attr1);

        $root_text = $this->doc->createTextNode($id);
        $root_attr1->appendChild($root_text);

        $root_attr2= $this->doc->createAttribute('person');
        $root_child->appendChild($root_attr2);

        $root_text = $this->doc->createTextNode($value);
        $root_attr2->appendChild($root_text);

        $this->output();
    }
    /**
     * Update value in XML
     * @param int $id
     * @param string $value
     * @return void
     */
    public function updateValue($id, $value)
    {
        $xpath = new DOMXpath($this->doc);
        /* @var $entries DOMNodeList  */
        $entries = $xpath->query("//data/item[@id='$id']");
        foreach ($entries as $entry)
        {
            $entry->removeAttribute('person');
            $entry->setAttribute("person", $value);
        }
        $this->output();
    }
    /**
     * Output
     * @return void
     */
    public function output()
    {
        if ($this->debug) {
            print $this->doc->saveXML();
        } else {
            $this->doc->save($this->filename);
        }
    }


}

