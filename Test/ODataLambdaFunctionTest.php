<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/22/14
 * Time: 4:47 PM
 */

class ODataLambdaFunctionTest extends PHPUnit_Framework_TestCase {
  public function testAny() {
    $argument = new \ODataQuery\Filter\Operators\Logical\ODataEqualsOperator('TestArgument', 5);
    $output = new \ODataQuery\Filter\Operators\Functional\Lambda\ODataAnyOperator('TestValue', $argument);
    $this->assertEquals('TestValue/any(d:d/TestArgument eq 5)', (string)$output);
  }

  public function testAll() {
    $argument = new \ODataQuery\Filter\Operators\Logical\ODataEqualsOperator('TestArgument', 5);
    $output = new \ODataQuery\Filter\Operators\Functional\Lambda\ODataAllOperator('TestValue', $argument);
    $this->assertEquals('TestValue/all(d:d/TestArgument eq 5)', (string)$output);
  }
}
