<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/22/14
 * Time: 1:31 PM
 */

class ODataStringFunctionTest extends PHPUnit_Framework_TestCase {
  public function testStartsWith() {
    $output = new \ODataQuery\Filter\Operators\Functional\String\ODataStartsWithOperator('TestValue', 'teststring');
    $this->assertEquals("startswith(TestValue, 'teststring')", (string)$output);
    $this->assertEquals("not startswith(TestValue, 'teststring')", (string)$output->not());
  }

  public function testEndsWith() {
    $output = new \ODataQuery\Filter\Operators\Functional\String\ODataEndsWithOperator('TestValue', 'teststring');
    $this->assertEquals("endswith(TestValue, 'teststring')", (string)$output);
    $this->assertEquals("not endswith(TestValue, 'teststring')", (string)$output->not());
  }

  public function testContains() {
    $output = new \ODataQuery\Filter\Operators\Functional\String\ODataContainsOperator('TestValue', 'teststring');
    $this->assertEquals("contains(TestValue, 'teststring')", (string)$output);
    $this->assertEquals("not contains(TestValue, 'teststring')", (string)$output->not());
  }

  public function testConcat() {
    $output = new \ODataQuery\Filter\Operators\Functional\String\ODataConcatOperator('TestValue', 'teststring');
    $this->assertEquals("concat(TestValue, 'teststring')", (string)$output);
  }

  public function testIndexOf() {
    $output = new \ODataQuery\Filter\Operators\Functional\String\ODataIndexOfOperator('TestValue', 'teststring');
    $this->assertEquals("indexof(TestValue, 'teststring')", (string)$output);
    $this->assertEquals("not indexof(TestValue, 'teststring')", (string)$output->not());
    $this->assertEquals("indexof(TestValue, 'teststring') eq 5", (string)$output->equals(5));
    $this->assertEquals("indexof(TestValue, 'teststring') add 4 eq 5", (string)$output->add(4)->equals(5));
    $add = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataAddOperator('TestValue', 6);
    $this->assertEquals("indexof(TestValue, 'teststring') eq (TestValue add 6)", (string)$output->equals($add));
  }

  public function testLength() {
    $output = new \ODataQuery\Filter\Operators\Functional\String\ODataLengthOperator('TestValue');
    $this->assertEquals("length(TestValue)", (string)$output);
    $this->assertEquals("length(TestValue) eq 5", (string)$output->equals(5));
    $this->assertEquals("length(TestValue) add 4 eq 5", (string)$output->add(4)->equals(5));
    $add = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataAddOperator('TestValue', 6);
    $this->assertEquals("length(TestValue) eq (TestValue add 6)", (string)$output->equals($add));
  }

  public function testSubstring() {
    $output = new \ODataQuery\Filter\Operators\Functional\String\ODataSubstringOperator('TestValue', 3);
    $this->assertEquals('substring(TestValue, 3)', (string)$output);
    $output->range(3, 5);
    $this->assertEquals('substring(TestValue, 3, 5)', (string)$output);
  }

  public function testToLower() {
    $output = new \ODataQuery\Filter\Operators\Functional\String\ODataToLowerOperator('TestValue');
    $this->assertEquals('tolower(TestValue)', (string)$output);
    $this->assertEquals("tolower(TestValue) eq 'teststring'", (string)$output->equals("TestString"));
    $this->assertEquals("tolower(TestValue) eq SubProperty", (string)$output->equals("SubProperty", TRUE));
  }

  public function testToUpper() {
    $output = new \ODataQuery\Filter\Operators\Functional\String\ODataToUpperOperator('TestValue');
    $this->assertEquals('toupper(TestValue)', (string)$output);
    $this->assertEquals("toupper(TestValue) eq 'TESTSTRING'", (string)$output->equals("TestString"));
    $this->assertEquals("toupper(TestValue) eq SubProperty", (string)$output->equals("SubProperty", TRUE));
  }

  public function testTrim() {
    $output = new \ODataQuery\Filter\Operators\Functional\String\ODataTrimOperator('TestValue');
    $this->assertEquals('trim(TestValue)', (string)$output);
  }

  public function testCombo() {
    $concat = new \ODataQuery\Filter\Operators\Functional\String\ODataConcatOperator('TestValue', 'testconcat');
    $output = $concat->substring(0, 4)
      ->toUpper()->toLower()->trim()->length()->equals(5);

    $this->assertEquals("length(trim(tolower(toupper(substring(concat(TestValue, 'testconcat'), 0, 4))))) eq 5", (string)$output);
  }
}
