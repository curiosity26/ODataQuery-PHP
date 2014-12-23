<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/22/14
 * Time: 11:16 PM
 */

class ODataResourcePathTest extends PHPUnit_Framework_TestCase {
    public function testPath() {
        $output = new \ODataQuery\ODataResourcePath('api/Objects');
        $this->assertEquals('api/Objects?$order=ASC', (string)$output);
    }

    public function testSelect() {
        $output = new \ODataQuery\ODataResourcePath('api/Objects');
        $output->select(new \ODataQuery\Select\ODataQuerySelect(array("Prop1", "Prop2")));
        $this->assertEquals('api/Objects?$select=Prop1,Prop2&$order=ASC', (string)$output);
    }

    public function testSearch() {
        $output = new \ODataQuery\ODataResourcePath('api/Objects');
        $output->search(new \ODataQuery\Search\ODataQuerySearch("mountain bike"));
        $this->assertEquals('api/Objects?$search="mountain bike"&$order=ASC', (string)$output);
    }

    public function testFilter() {
        $output = new \ODataQuery\ODataResourcePath('api/Objects');
        $output->filter(new \ODataQuery\Filter\Operators\Logical\ODataEqualsOperator("TestValue", 4));
        $this->assertEquals('api/Objects?$filter=TestValue eq 4&$order=ASC', (string)$output);
    }

    public function testOrderBy() {
        $output = new \ODataQuery\ODataResourcePath('api/Objects');
        $output->orderBy('Property');
        $this->assertEquals('api/Objects?$orderby=Property&$order=ASC', (string)$output);
    }

    public function testExpand() {
        $params = new \ODataQuery\Parameter\ODataQueryParameterCollection();
        $params->prop = 'Property';
        $output = new \ODataQuery\ODataResourcePath('api/Objects');
        $expand = new \ODataQuery\Expand\ODataQueryExpand('@prop');
        $expand->search(new \ODataQuery\Search\ODataQuerySearch("google"))
            ->pager(new \ODataQuery\Pager\ODataQueryPager(20, 5));
        $expand2 = new \ODataQuery\Expand\ODataQueryExpand("SubProperty", new \ODataQuery\Filter\Operators\Logical\ODataLessThanOperator("SubSubProperty", 4));
        $expand->expand(new \ODataQuery\Expand\ODataQueryExpandCollection(array($expand2)));
        $output->expand(new \ODataQuery\Expand\ODataQueryExpandCollection(array($expand)));
        $output->parameters($params);
        $this->assertEquals('api/Objects?$expand=@prop($search=google&$expand=SubProperty($filter=SubSubProperty lt 4)&$top=20&$skip=100)&$order=ASC&@prop=Property', (string)$output);
    }

}
