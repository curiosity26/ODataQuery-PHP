<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/22/14
 * Time: 12:14 PM
 */

namespace ODataQuery\Filter\Operators\Logical\Mathematical;


interface ODataMathematicalOperatorInterface {
  public function add($value);
  public function subtract($value);
  public function multiply($value);
  public function divide($value);
  public function modulo($value);
}