<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/22/14
 * Time: 11:31 AM
 */

class ODataMathematicalOperatorTest extends PHPUnit_Framework_TestCase {
  public function testAdd() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataAddOperator('TestValue', 4);
    $this->assertEquals('TestValue add 4', (string)$output);
  }

  public function testSubtract() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataSubtractOperator('TestValue', 4);
    $this->assertEquals('TestValue sub 4', (string)$output);
  }

  public function testMultiply() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataMultiplyOperator('TestValue', 4);
    $this->assertEquals('TestValue mul 4', (string)$output);
  }

  public function testDivide() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataDivideOperator('TestValue', 4);
    $this->assertEquals('TestValue div 4', (string)$output);
  }

  public function testModulo() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataModuloOperator('TestValue', 4);
    $this->assertEquals('TestValue mod 4', (string)$output);
  }
}
