<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/22/14
 * Time: 5:36 PM
 */

namespace ODataQuery\Filter\Operators\Functional\DateTime;


use ODataQuery\Filter\Operators\Functional\ODataComparableFunctionOperator;

class ODataDateTimeOperator extends ODataComparableFunctionOperator {
  protected $format = 'Y-m-d H:i:s e';
  public function equals($value, $isField = FALSE) {
    if ($value instanceof \DateTimeInterface) {
      $value = $value->format($this->format);
      $isField = TRUE;
    }
    return parent::equals($value, $isField);
  }

  public function notEquals($value, $isField = FALSE) {
    if ($value instanceof \DateTimeInterface) {
      $value = $value->format($this->format);
      $isField = TRUE;
    }
    return parent::notEquals($value, $isField);
  }

  public function lessThan($value, $isField = FALSE) {
    if ($value instanceof \DateTimeInterface) {
      $value = $value->format($this->format);
      $isField = TRUE;
    }
    return parent::lessThan($value, $isField);
  }

  public function lessThanEquals($value, $isField = FALSE) {
    if ($value instanceof \DateTimeInterface) {
      $value = $value->format($this->format);
      $isField = TRUE;
    }
    return parent::lessThanEquals($value, $isField);
  }

  public function greaterThan($value, $isField = FALSE) {
    if ($value instanceof \DateTimeInterface) {
      $value = $value->format($this->format);
      $isField = TRUE;
    }
    return parent::greaterThan($value, $isField);
  }

  public function greaterThanEquals($value, $isField = FALSE) {
    if ($value instanceof \DateTimeInterface) {
      $value = $value->format($this->format);
      $isField = TRUE;
    }
    return parent::greaterThanEquals($value, $isField);
  }
}