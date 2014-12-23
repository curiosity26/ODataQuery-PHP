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

        $item1->limits(4)
            ->filter(new \ODataQuery\Filter\Operators\Logical\ODataEqualsOperator('SubValue', 6))
            ->select(new \ODataQuery\Select\ODataQuerySelect(array('SubValue', 'OtherValue')))
            ->search(new \ODataQuery\Search\ODataQuerySearch("mountain bike"));

        $item2->expand(new \ODataQuery\Expand\ODataQueryExpandCollection(array($item1)))
            ->search(new \ODataQuery\Search\ODataQuerySearch("google"));

        $collection->add($item2);
        $this->assertEquals('Property($search=google&$expand=TestValue($select=SubValue,OtherValue&$filter=SubValue eq 6&$search="mountain bike"&$limits=4))', (string)$collection);
    }
}
