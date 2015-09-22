<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/22/14
 * Time: 9:59 PM
 */

class ODataQueryExpandCollectionTest extends PHPUnit_Framework_TestCase {
    public function testBasicExpand() {
        $collection = new \ODataQuery\Expand\ODataQueryExpandCollection();
        $item1 = new \ODataQuery\Expand\ODataQueryExpand('TestValue');
        $item2 = new \ODataQuery\Expand\ODataQueryExpand(new \ODataQuery\ODataCount('Property'));
        $collection->add($item1);
        $collection->add($item2);
        $this->assertEquals('TestValue,Property/$count', (string)$collection);
    }

    public function testExpandWithParameter() {
        $collection = new \ODataQuery\Expand\ODataQueryExpandCollection();
        $item1 = new \ODataQuery\Expand\ODataQueryExpand('TestValue');
        $item2 = new \ODataQuery\Expand\ODataQueryExpand('Property');

        $item1->setLimits(4)
            ->setFilter(new \ODataQuery\Filter\Operators\Logical\ODataEqualsOperator('SubValue', 6))
            ->setSelect(new \ODataQuery\Select\ODataQuerySelect(array('SubValue', 'OtherValue')))
            ->setSearch(new \ODataQuery\Search\ODataQuerySearch("mountain bike"));

        $item2->setExpand(new \ODataQuery\Expand\ODataQueryExpandCollection(array($item1)))
            ->setSearch(new \ODataQuery\Search\ODataQuerySearch("google"));

        $collection->add($item2);
        $this->assertEquals('Property($search=google&$expand=TestValue($select=SubValue,OtherValue&$filter=SubValue eq 6&$search="mountain bike"&$limits=4))', (string)$collection);
    }
}
