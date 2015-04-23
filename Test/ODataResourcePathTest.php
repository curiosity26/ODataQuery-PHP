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
        $this->assertEquals('api/Objects', (string)$output);
    }

    public function testSelect() {
        $output = new \ODataQuery\ODataResourcePath('api/Objects');
        $output->select(new \ODataQuery\Select\ODataQuerySelect(array("Prop1", "Prop2")));
        $this->assertEquals('api/Objects?$select=Prop1,Prop2', (string)$output);
    }

    public function testSearch() {
        $output = new \ODataQuery\ODataResourcePath('api/Objects');
        $output->search(new \ODataQuery\Search\ODataQuerySearch("mountain bike"));
        $this->assertEquals('api/Objects?$search="mountain bike"', (string)$output);
    }

    public function testFilter() {
        $output = new \ODataQuery\ODataResourcePath('api/Objects');
        $output->filter(new \ODataQuery\Filter\Operators\Logical\ODataEqualsOperator("TestValue", 4));
        $this->assertEquals('api/Objects?$filter=TestValue eq 4', (string)$output);
    }

    public function testPager() {
        $output = new \ODataQuery\ODataResourcePath('api/Objects');
        $output->pager(new \ODataQuery\Pager\ODataQueryPager(50, 4));
        $this->assertEquals('api/Objects?$top=50&$skip=200', (string)$output);
    }

    public function testOrderBy() {
        $output = new \ODataQuery\ODataResourcePath('api/Objects');
        $output->orderBy('Property');
        $this->assertEquals('api/Objects?$orderby=Property', (string)$output);
    }

    public function testParameters() {
        $output = new \ODataQuery\ODataResourcePath('api/Objects');
        $params = new \ODataQuery\Parameter\ODataQueryParameterCollection();
        $params->prop = 'Property';
        $output->parameters($params);
        $this->assertEquals('api/Objects?@prop=Property', (string)$output);
        $params->test = 'TestProperty';
        $this->assertEquals('api/Objects?@prop=Property&@test=TestProperty', (string)$output);
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
        $this->assertEquals('api/Objects?$expand=@prop($search=google&$expand=SubProperty($filter=SubSubProperty lt 4)&$top=20&$skip=100)&@prop=Property', (string)$output);
    }

    public function testExpand2() {
        $query = new \ODataQuery\ODataResourcePath('api/Objects');
        $expand = new \ODataQuery\Expand\ODataQueryExpand('PrimaryContact');
        $filter = new \ODataQuery\Filter\Operators\Logical\ODataEqualsOperator('FirstName', "'Bob'");

        //$query = new \ODataQuery\ODataResource();
        $expand->filter($filter->_and(new \ODataQuery\Filter\Operators\Logical\ODataEqualsOperator('LastName',
            "'Jones'")));
        $query->expand(new \ODataQuery\Expand\ODataQueryExpandCollection(array($expand)));
        $this->assertEquals("api/Objects?\$expand=PrimaryContact(\$filter=(FirstName eq 'Bob') and (LastName eq 'Jones'))", (string)
        $query);
    }
}
