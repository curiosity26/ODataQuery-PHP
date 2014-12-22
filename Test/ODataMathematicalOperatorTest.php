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

  public function testAddEquals() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataAddOperator('TestValue', 4);
    $this->assertEquals('TestValue add 4 eq 6', (string)$output->equals(6));
  }

  public function testAddEqualsOperator() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataAddOperator('TestValue', 4);
    $add = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataAddOperator('OtherValue', 7);
    $this->assertEquals('TestValue add 4 eq (OtherValue add 7)', (string)$output->equals($add));
    $this->assertEquals('TestValue add 4 eq ((OtherValue add 7) add 6)', (string)$output->equals($add->add(6)));
  }

  public function testAddNotEquals() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataAddOperator('TestValue', 4);
    $this->assertEquals('TestValue add 4 ne 6', (string)$output->notEquals(6));
  }

  public function testAddNotEqualsOperator() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataAddOperator('TestValue', 4);
    $add = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataAddOperator('OtherValue', 7);
    $this->assertEquals('TestValue add 4 ne (OtherValue add 7)', (string)$output->notEquals($add));
    $this->assertEquals('TestValue add 4 ne ((OtherValue add 7) add 6)', (string)$output->notEquals($add->add(6)));
  }

  public function testAddLessThan() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataAddOperator('TestValue', 4);
    $this->assertEquals('TestValue add 4 lt 6', (string)$output->lessThan(6));
  }

  public function testAddLessThanOperator() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataAddOperator('TestValue', 4);
    $add = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataAddOperator('OtherValue', 7);
    $this->assertEquals('TestValue add 4 lt (OtherValue add 7)', (string)$output->lessThan($add));
    $this->assertEquals('TestValue add 4 lt ((OtherValue add 7) add 6)', (string)$output->lessThan($add->add(6)));
  }

  public function testAddLessThanEquals() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataAddOperator('TestValue', 4);
    $this->assertEquals('TestValue add 4 le 6', (string)$output->lessThanEquals(6));
  }

  public function testAddLessThanEqualsOperator() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataAddOperator('TestValue', 4);
    $add = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataAddOperator('OtherValue', 7);
    $this->assertEquals('TestValue add 4 le (OtherValue add 7)', (string)$output->lessThanEquals($add));
    $this->assertEquals('TestValue add 4 le ((OtherValue add 7) add 6)', (string)$output->lessThanEquals($add->add(6)));
  }

  public function testAddGreaterThan() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataAddOperator('TestValue', 4);
    $this->assertEquals('TestValue add 4 gt 6', (string)$output->greaterThan(6));
  }

  public function testAddGreaterThanOperator() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataAddOperator('TestValue', 4);
    $add = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataAddOperator('OtherValue', 7);
    $this->assertEquals('TestValue add 4 gt (OtherValue add 7)', (string)$output->greaterThan($add));
    $this->assertEquals('TestValue add 4 gt ((OtherValue add 7) add 6)', (string)$output->greaterThan($add->add(6)));
  }

  public function testAddGreaterThanEquals() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataAddOperator('TestValue', 4);
    $this->assertEquals('TestValue add 4 ge 6', (string)$output->greaterThanEquals(6));
  }

  public function testAddGreaterThanEqualsOperator() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataAddOperator('TestValue', 4);
    $add = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataAddOperator('OtherValue', 7);
    $this->assertEquals('TestValue add 4 ge (OtherValue add 7)', (string)$output->greaterThanEquals($add));
    $this->assertEquals('TestValue add 4 ge ((OtherValue add 7) add 6)', (string)$output->greaterThanEquals($add->add(6)));
  }

  public function testSubtract() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataSubtractOperator('TestValue', 4);
    $this->assertEquals('TestValue sub 4', (string)$output);
  }

  public function testSubtractEquals() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataSubtractOperator('TestValue', 4);
    $this->assertEquals('TestValue sub 4 eq 6', (string)$output->equals(6));
  }

  public function testSubtractEqualsOperator() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataSubtractOperator('TestValue', 4);
    $sub = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataSubtractOperator('OtherValue', 7);
    $this->assertEquals('TestValue sub 4 eq (OtherValue sub 7)', (string)$output->equals($sub));
  }

  public function testSubtractNotEquals() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataSubtractOperator('TestValue', 4);
    $this->assertEquals('TestValue sub 4 ne 6', (string)$output->notEquals(6));
  }

  public function testSubtractNotEqualsOperator() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataSubtractOperator('TestValue', 4);
    $sub = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataSubtractOperator('OtherValue', 7);
    $this->assertEquals('TestValue sub 4 ne (OtherValue sub 7)', (string)$output->notEquals($sub));
    $this->assertEquals('TestValue sub 4 ne ((OtherValue sub 7) sub 6)', (string)$output->notEquals($sub->subtract(6)));
  }

  public function testSubtractLessThan() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataSubtractOperator('TestValue', 4);
    $this->assertEquals('TestValue sub 4 lt 6', (string)$output->lessThan(6));
  }

  public function testSubtractLessThanOperator() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataSubtractOperator('TestValue', 4);
    $sub = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataSubtractOperator('OtherValue', 7);
    $this->assertEquals('TestValue sub 4 lt (OtherValue sub 7)', (string)$output->lessThan($sub));
    $this->assertEquals('TestValue sub 4 lt ((OtherValue sub 7) sub 6)', (string)$output->lessThan($sub->subtract(6)));
  }

  public function testSubtractLessThanEquals() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataSubtractOperator('TestValue', 4);
    $this->assertEquals('TestValue sub 4 le 6', (string)$output->lessThanEquals(6));
  }

  public function testSubtractLessThanEqualsOperator() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataSubtractOperator('TestValue', 4);
    $sub = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataSubtractOperator('OtherValue', 7);
    $this->assertEquals('TestValue sub 4 le (OtherValue sub 7)', (string)$output->lessThanEquals($sub));
    $this->assertEquals('TestValue sub 4 le ((OtherValue sub 7) sub 6)', (string)$output->lessThanEquals($sub->subtract(6)));
  }

  public function testSubtractGreaterThan() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataSubtractOperator('TestValue', 4);
    $this->assertEquals('TestValue sub 4 gt 6', (string)$output->greaterThan(6));
  }

  public function testSubtractGreaterThanOperator() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataSubtractOperator('TestValue', 4);
    $sub = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataSubtractOperator('OtherValue', 7);
    $this->assertEquals('TestValue sub 4 gt (OtherValue sub 7)', (string)$output->greaterThan($sub));
    $this->assertEquals('TestValue sub 4 gt ((OtherValue sub 7) sub 6)', (string)$output->greaterThan($sub->subtract(6)));
  }

  public function testSubtractGreaterThanEquals() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataSubtractOperator('TestValue', 4);
    $this->assertEquals('TestValue sub 4 ge 6', (string)$output->greaterThanEquals(6));
  }

  public function testSubtractGreaterThanEqualsOperator() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataSubtractOperator('TestValue', 4);
    $sub = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataSubtractOperator('OtherValue', 7);
    $this->assertEquals('TestValue sub 4 ge (OtherValue sub 7)', (string)$output->greaterThanEquals($sub));
    $this->assertEquals('TestValue sub 4 ge ((OtherValue sub 7) sub 6)', (string)$output->greaterThanEquals($sub->subtract(6)));
  }

  public function testMultiply() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataMultiplyOperator('TestValue', 4);
    $this->assertEquals('TestValue mul 4', (string)$output);
  }

  public function testMultiplyEquals() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataMultiplyOperator('TestValue', 4);
    $this->assertEquals('TestValue mul 4 eq 6', (string)$output->equals(6));
  }

  public function testMultiplyEqualsOperator() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataMultiplyOperator('TestValue', 4);
    $mul = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataMultiplyOperator('OtherValue', 7);
    $this->assertEquals('TestValue mul 4 eq (OtherValue mul 7)', (string)$output->equals($mul));
    $this->assertEquals('TestValue mul 4 eq ((OtherValue mul 7) mul 6)', (string)$output->equals($mul->multiply(6)));
  }

  public function testMultiplyNotEquals() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataMultiplyOperator('TestValue', 4);
    $this->assertEquals('TestValue mul 4 ne 6', (string)$output->notEquals(6));
  }

  public function testMultiplyNotEqualsOperator() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataMultiplyOperator('TestValue', 4);
    $mul = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataMultiplyOperator('OtherValue', 7);
    $this->assertEquals('TestValue mul 4 ne (OtherValue mul 7)', (string)$output->notEquals($mul));
    $this->assertEquals('TestValue mul 4 ne ((OtherValue mul 7) mul 6)', (string)$output->notEquals($mul->multiply(6)));
  }

  public function testMultiplyLessThan() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataMultiplyOperator('TestValue', 4);
    $this->assertEquals('TestValue mul 4 lt 6', (string)$output->lessThan(6));
  }

  public function testMultiplyLessThanOperator() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataMultiplyOperator('TestValue', 4);
    $mul = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataMultiplyOperator('OtherValue', 7);
    $this->assertEquals('TestValue mul 4 lt (OtherValue mul 7)', (string)$output->lessThan($mul));
    $this->assertEquals('TestValue mul 4 lt ((OtherValue mul 7) mul 6)', (string)$output->lessThan($mul->multiply(6)));
  }

  public function testMultiplyLessThanEquals() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataMultiplyOperator('TestValue', 4);
    $this->assertEquals('TestValue mul 4 le 6', (string)$output->lessThanEquals(6));
  }

  public function testMultiplyLessThanEqualsOperator() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataMultiplyOperator('TestValue', 4);
    $mul = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataMultiplyOperator('OtherValue', 7);
    $this->assertEquals('TestValue mul 4 le (OtherValue mul 7)', (string)$output->lessThanEquals($mul));
    $this->assertEquals('TestValue mul 4 le ((OtherValue mul 7) mul 6)', (string)$output->lessThanEquals($mul->multiply(6)));
  }

  public function testMultiplyGreaterThan() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataMultiplyOperator('TestValue', 4);
    $this->assertEquals('TestValue mul 4 gt 6', (string)$output->greaterThan(6));
  }

  public function testMultiplyGreaterThanOperator() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataMultiplyOperator('TestValue', 4);
    $mul = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataMultiplyOperator('OtherValue', 7);
    $this->assertEquals('TestValue mul 4 gt (OtherValue mul 7)', (string)$output->greaterThan($mul));
    $this->assertEquals('TestValue mul 4 gt ((OtherValue mul 7) mul 6)', (string)$output->greaterThan($mul->multiply(6)));
  }

  public function testMultiplyGreaterThanEquals() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataMultiplyOperator('TestValue', 4);
    $this->assertEquals('TestValue mul 4 ge 6', (string)$output->greaterThanEquals(6));
  }

  public function testMultiplyGreaterThanEqualsOperator() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataMultiplyOperator('TestValue', 4);
    $mul = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataMultiplyOperator('OtherValue', 7);
    $this->assertEquals('TestValue mul 4 ge (OtherValue mul 7)', (string)$output->greaterThanEquals($mul));
    $this->assertEquals('TestValue mul 4 ge ((OtherValue mul 7) mul 6)', (string)$output->greaterThanEquals($mul->multiply(6)));
  }

  public function testDivide() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataDivideOperator('TestValue', 4);
    $this->assertEquals('TestValue div 4', (string)$output);
  }

  public function testDivideEquals() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataDivideOperator('TestValue', 4);
    $this->assertEquals('TestValue div 4 eq 6', (string)$output->equals(6));
  }

  public function testDivideEqualsOperator() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataDivideOperator('TestValue', 4);
    $div = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataDivideOperator('OtherValue', 7);
    $this->assertEquals('TestValue div 4 eq (OtherValue div 7)', (string)$output->equals($div));
    $this->assertEquals('TestValue div 4 eq ((OtherValue div 7) div 6)', (string)$output->equals($div->divide(6)));
  }

  public function testDivideNotEquals() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataDivideOperator('TestValue', 4);
    $this->assertEquals('TestValue div 4 ne 6', (string)$output->notEquals(6));
  }

  public function testDivideNotEqualsOperator() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataDivideOperator('TestValue', 4);
    $div = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataDivideOperator('OtherValue', 7);
    $this->assertEquals('TestValue div 4 ne (OtherValue div 7)', (string)$output->notEquals($div));
    $this->assertEquals('TestValue div 4 ne ((OtherValue div 7) div 6)', (string)$output->notEquals($div->divide(6)));
  }

  public function testDivideLessThan() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataDivideOperator('TestValue', 4);
    $this->assertEquals('TestValue div 4 lt 6', (string)$output->lessThan(6));
  }

  public function testDivideLessThanOperator() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataDivideOperator('TestValue', 4);
    $div = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataDivideOperator('OtherValue', 7);
    $this->assertEquals('TestValue div 4 lt (OtherValue div 7)', (string)$output->lessThan($div));
    $this->assertEquals('TestValue div 4 lt ((OtherValue div 7) div 6)', (string)$output->lessThan($div->divide(6)));
  }

  public function testDivideLessThanEquals() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataDivideOperator('TestValue', 4);
    $this->assertEquals('TestValue div 4 le 6', (string)$output->lessThanEquals(6));
  }

  public function testDivideLessThanEqualsOperator() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataDivideOperator('TestValue', 4);
    $div = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataDivideOperator('OtherValue', 7);
    $this->assertEquals('TestValue div 4 le (OtherValue div 7)', (string)$output->lessThanEquals($div));
    $this->assertEquals('TestValue div 4 le ((OtherValue div 7) div 6)', (string)$output->lessThanEquals($div->divide(6)));
  }

  public function testDivideGreaterThan() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataDivideOperator('TestValue', 4);
    $this->assertEquals('TestValue div 4 gt 6', (string)$output->greaterThan(6));
  }

  public function testDivideGreaterThanOperator() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataDivideOperator('TestValue', 4);
    $div = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataDivideOperator('OtherValue', 7);
    $this->assertEquals('TestValue div 4 gt (OtherValue div 7)', (string)$output->greaterThan($div));
    $this->assertEquals('TestValue div 4 gt ((OtherValue div 7) div 6)', (string)$output->greaterThan($div->divide(6)));
  }

  public function testDivideGreaterThanEqualsOperator() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataDivideOperator('TestValue', 4);
    $div = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataDivideOperator('OtherValue', 7);
    $this->assertEquals('TestValue div 4 ge (OtherValue div 7)', (string)$output->greaterThanEquals($div));
    $this->assertEquals('TestValue div 4 ge ((OtherValue div 7) div 6)', (string)$output->greaterThanEquals($div->divide(6)));
  }

  public function testDivideGreaterThanEquals() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataDivideOperator('TestValue', 4);
    $this->assertEquals('TestValue div 4 ge 6', (string)$output->greaterThanEquals(6));
  }

  public function testModulo() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataModuloOperator('TestValue', 4);
    $this->assertEquals('TestValue mod 4', (string)$output);
  }

  public function testModuloEquals() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataModuloOperator('TestValue', 4);
    $this->assertEquals('TestValue mod 4 eq 6', (string)$output->equals(6));
  }

  public function testModuloEqualsOperator() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataModuloOperator('TestValue', 4);
    $mod = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataModuloOperator('OtherValue', 7);
    $this->assertEquals('TestValue mod 4 eq (OtherValue mod 7)', (string)$output->equals($mod));
    $this->assertEquals('TestValue mod 4 eq ((OtherValue mod 7) mod 6)', (string)$output->equals($mod->modulo(6)));
  }

  public function testModuloNotEquals() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataModuloOperator('TestValue', 4);
    $this->assertEquals('TestValue mod 4 ne 6', (string)$output->notEquals(6));
  }

  public function testModuloNotEqualsOperator() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataModuloOperator('TestValue', 4);
    $mod = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataModuloOperator('OtherValue', 7);
    $this->assertEquals('TestValue mod 4 ne (OtherValue mod 7)', (string)$output->notEquals($mod));
    $this->assertEquals('TestValue mod 4 ne ((OtherValue mod 7) mod 6)', (string)$output->notEquals($mod->modulo(6)));
  }

  public function testModuloLessThan() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataModuloOperator('TestValue', 4);
    $this->assertEquals('TestValue mod 4 lt 6', (string)$output->lessThan(6));
  }

  public function testModuloLessThanOperator() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataModuloOperator('TestValue', 4);
    $mod = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataModuloOperator('OtherValue', 7);
    $this->assertEquals('TestValue mod 4 lt (OtherValue mod 7)', (string)$output->lessThan($mod));
    $this->assertEquals('TestValue mod 4 lt ((OtherValue mod 7) mod 6)', (string)$output->lessThan($mod->modulo(6)));
  }

  public function testModuloLessThanEquals() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataModuloOperator('TestValue', 4);
    $this->assertEquals('TestValue mod 4 le 6', (string)$output->lessThanEquals(6));
  }

  public function testModuloLessThanEqualsOperator() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataModuloOperator('TestValue', 4);
    $mod = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataModuloOperator('OtherValue', 7);
    $this->assertEquals('TestValue mod 4 le (OtherValue mod 7)', (string)$output->lessThanEquals($mod));
    $this->assertEquals('TestValue mod 4 le ((OtherValue mod 7) mod 6)', (string)$output->lessThanEquals($mod->modulo(6)));
  }

  public function testModuloGreaterThan() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataModuloOperator('TestValue', 4);
    $this->assertEquals('TestValue mod 4 gt 6', (string)$output->greaterThan(6));
  }

  public function testModuloGreaterThanOperator() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataModuloOperator('TestValue', 4);
    $mod = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataModuloOperator('OtherValue', 7);
    $this->assertEquals('TestValue mod 4 gt (OtherValue mod 7)', (string)$output->greaterThan($mod));
    $this->assertEquals('TestValue mod 4 gt ((OtherValue mod 7) mod 6)', (string)$output->greaterThan($mod->modulo(6)));
  }

  public function testModuloGreaterThanEquals() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataModuloOperator('TestValue', 4);
    $this->assertEquals('TestValue mod 4 ge 6', (string)$output->greaterThanEquals(6));
  }

  public function testModuloGreaterThanEqualsOperator() {
    $output = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataModuloOperator('TestValue', 4);
    $mod = new \ODataQuery\Filter\Operators\Logical\Mathematical\ODataModuloOperator('OtherValue', 7);
    $this->assertEquals('TestValue mod 4 ge (OtherValue mod 7)', (string)$output->greaterThanEquals($mod));
    $this->assertEquals('TestValue mod 4 ge ((OtherValue mod 7) mod 6)', (string)$output->greaterThanEquals($mod->modulo(6)));
  }
}
