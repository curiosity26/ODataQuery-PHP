<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/22/14
 * Time: 9:44 PM
 */

class ODataQueryParameterCollectionTest extends PHPUnit_Framework_TestCase {
    public function testCollection() {
        $output = new \ODataQuery\Parameter\ODataQueryParameterCollection(array('param1' => 'value1'));
        $this->assertEquals('@param1=value1', (string)$output);
        $output->param2 = 'value2';
        $this->assertEquals('@param1=value1&@param2=value2', (string)$output);
        $output->param1 = 'newValue';
        $this->assertEquals('@param1=newValue&@param2=value2', (string)$output);
    }
}
