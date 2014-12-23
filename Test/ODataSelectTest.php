<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/22/14
 * Time: 9:05 PM
 */

class ODataSelectTest extends PHPUnit_Framework_TestCase {
    public function testSelect() {
        $output = new \ODataQuery\Select\ODataQuerySelect(array('Property1', 'Property2'));
        $this->assertEquals('Property1,Property2', (string)$output);
        $output->add('Property3');
        $this->assertEquals('Property1,Property2,Property3', (string)$output);
        $output->remove('Property2');
        $this->assertEquals('Property1,Property3', (string)$output);
    }
}
