<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/22/14
 * Time: 3:53 PM
 */

namespace ODataQuery\Filter\Operators\Functional\String;


use ODataQuery\Filter\Operators\Functional\ODataFunctionalOperator;

class ODataStringOperator extends ODataFunctionalOperator implements ODataStringOperatorInterface {
  public function concat($value) {
    return new ODataConcatOperator($this, $value);
  }

  public function contains($value) {
    return new ODataContainsOperator($this, $value);
  }

  public function startsWith($value) {
    return new ODataStartsWithOperator($this, $value);
  }

  public function endsWith($value) {
    return new ODataEndsWithOperator($this, $value);
  }

  public function indexOf($value) {
    return new ODataIndexOfOperator($this, $value);
  }

  public function length() {
    return new ODataLengthOperator($this);
  }

  public function trim() {
    return new ODataTrimOperator($this);
  }

  public function substring($start, $end = NULL) {
    return new ODataSubstringOperator($this, $start, $end);
  }

  public function toUpper() {
    return new ODataToUpperOperator($this);
  }

  public function toLower() {
    return new ODataToLowerOperator($this);
  }

}