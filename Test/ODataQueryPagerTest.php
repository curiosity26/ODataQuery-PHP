<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/22/14
 * Time: 9:11 PM
 */

class ODataQueryPagerTest extends PHPUnit_Framework_TestCase {
    public function testPager() {
        $output = new \ODataQuery\Pager\ODataQueryPager();
        $this->assertEquals('$top=500&$skip=0', (string)$output);
        $output->limit(20);
        $output->page(6);
        $this->assertEquals('$top=20&$skip=120', (string)$output);
    }
}
