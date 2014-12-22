<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/22/14
 * Time: 9:22 AM
 */

class ODataLogicalOperatorTest extends \PHPUnit_Framework_TestCase {

  public function testCheckValue() {
    $output = new \ODataQuery\Filter\Operators\Logical\ODataEqualsOperator('TestValue', 4);
    $this->assertEquals(4, $output->value);
    $output->value = 5;
    $this->assertEquals(5, $output->value);
  }

  public function testEquals() {
    $output = new \ODataQuery\Filter\Operators\Logical\ODataEqualsOperator('TestValue', 4);
    $this->assertEquals('TestValue eq 4', (string)$output);
  }

  public function testNotEquals() {
    $output = new \ODataQuery\Filter\Operators\Logical\ODataNotEqualsOperator('TestValue', 4);
    $this->assertEquals('TestValue ne 4', (string)$output);
  }

  public function testLessThan() {
    $output = new \ODataQuery\Filter\Operators\Logical\ODataLessThanOperator('TestValue', 4);
    $this->assertEquals('TestValue lt 4', (string)$output);
  }

  public function testLessThanEquals() {
    $output = new \ODataQuery\Filter\Operators\Logical\ODataLessThanEqualsOperator('TestValue', 4);
    $this->assertEquals('TestValue le 4', (string)$output);
  }

  public function testGreaterThan() {
    $output = new \ODataQuery\Filter\Operators\Logical\ODataGreaterThanOperator('TestValue', 4);
    $this->assertEquals('TestValue gt 4', (string)$output);
  }

  public function testGreaterThanEquals() {
    $output = new \ODataQuery\Filter\Operators\Logical\ODataGreaterThanEqualsOperator('TestValue', 4);
    $this->assertEquals('TestValue ge 4', (string)$output);
  }

  public function testHas() {
    $output = new \ODataQuery\Filter\Operators\Logical\ODataHasOperator('TestProperty', 'propertyName');
    $this->assertEquals('TestProperty has propertyName', (string)$output);
  }

  public function testAnd() {
    $gt = new \ODataQuery\Filter\Operators\Logical\ODataGreaterThanOperator('TestValue', 4);
    $lt = new \ODataQuery\Filter\Operators\Logical\ODataLessThanOperator('TestValue', 10);
    $this->assertEquals('(TestValue gt 4) and (TestValue lt 10)', (string)$gt->_and($lt));
  }

  public function testOr() {
    $gt = new \ODataQuery\Filter\Operators\Logical\ODataGreaterThanOperator('TestValue', 4);
    $lt = new \ODataQuery\Filter\Operators\Logical\ODataLessThanOperator('TestValue', 10);
    $this->assertEquals('(TestValue gt 4) or (TestValue lt 10)', (string)$gt->_or($lt));
  }
}
