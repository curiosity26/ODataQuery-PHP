<?php
/**
 * Created by PhpStorm.
 * User: mskrzypecki
 * Date: 25-8-2015
 * Time: 14:26
 */

class ODataQueryFormatTest extends PHPUnit_Framework_TestCase
{
    public function testFormat()
    {
        $f = new \ODataQuery\Format\ODataQueryFormat('json');
        $this->assertEquals('json', (string) $f);
    }
}
