<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 1/1/15
 * Time: 12:24 PM
 */

class ODataFilterFactoryTest extends PHPUnit_Framework_TestCase {
    public function testEquals() {
        $factory = new \ODataQuery\Filter\ODataFilterFactory('TestValue');
        $factory->add(10)->equals(1);
        $this->assertEquals('TestValue add 10 eq 1', (string)$factory);
    }
}
