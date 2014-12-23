<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/22/14
 * Time: 9:15 PM
 */

class ODataQuerySearchTest extends PHPUnit_Framework_TestCase {
    public function testSearch() {
        $output = new \ODataQuery\Search\ODataQuerySearch('mountain');
        $this->assertEquals('mountain', (string)$output);
        $output->query('mountain bike');
        $this->assertEquals('"mountain bike"', (string)$output);
    }

    public function testSearchAnd() {
        $output = new \ODataQuery\Search\ODataQuerySearch('mountain');
        $output->_and('bike');
        $this->assertEquals('mountain AND bike', (string)$output);
    }

    public function testSearchOr() {
        $output = new \ODataQuery\Search\ODataQuerySearch('mountain');
        $output->_or('mountain bike');
        $this->assertEquals('mountain OR "mountain bike"', (string)$output);
    }

    public function testSearchDeepNesting() {
        $and = new \ODataQuery\Search\ODataQuerySearch('mountain');
        $and->_and('bike');
        $output = new \ODataQuery\Search\ODataQuerySearch("moutain bike");
        $this->assertEquals('"moutain bike" OR (mountain AND bike)', (string)$output->_or($and));
        $output = new \ODataQuery\Search\ODataQuerySearch($and);
        $or = $output->_or('mountain bike');
        $this->assertEquals('(mountain AND bike) OR "mountain bike"', (string)$or);
        $group = new \ODataQuery\Search\ODataQuerySearch($or);
        $group->_and('test');
        $this->assertEquals('((mountain AND bike) OR "mountain bike") AND test', (string)$group);
    }
}
