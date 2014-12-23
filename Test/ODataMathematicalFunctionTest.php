<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/22/14
 * Time: 4:33 PM
 */

class ODataMathematicalFunctionTest extends PHPUnit_Framework_TestCase {
  public function testCast() {
    $output = new \ODataQuery\Filter\Operators\Functional\Mathematical\ODataCastOperator('Edm.String');
    $this->assertEquals('cast(Edm.String)', (string)$output);
    $output->property = new \ODataQuery\ODataCount('TestProperty');
    $this->assertEquals('cast(TestProperty/$count, Edm.String)', (string)$output);
  }

  public function testIsOf() {
    $output = new \ODataQuery\Filter\Operators\Functional\Mathematical\ODataIsOfOperator('Edm.Int');
    $this->assertEquals('isof(Edm.Int)', (string)$output);
    $output->property = new \ODataQuery\ODataCount('TestProperty');
    $this->assertEquals('isof(TestProperty/$count, Edm.Int)', (string)$output);
  }

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
