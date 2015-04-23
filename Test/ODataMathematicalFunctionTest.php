<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/22/14
 * Time: 4:33 PM
 */

class ODataMathematicalFunctionTest extends PHPUnit_Framework_TestCase {

  public function testCeiling() {
    $output = new \ODataQuery\Filter\Operators\Functional\Mathematical\ODataCeilingOperator('TestValue');
    $this->assertEquals('ceiling(TestValue)', (string)$output);
  }

  public function testFloor() {
    $output = new \ODataQuery\Filter\Operators\Functional\Mathematical\ODataFloorOperator('TestValue');
    $this->assertEquals('floor(TestValue)', (string)$output);
  }

  public function testRound() {
    $output = new \ODataQuery\Filter\Operators\Functional\Mathematical\ODataRoundOperator('TestValue');
    $this->assertEquals('round(TestValue)', (string)$output);
  }
}
