<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/22/14
 * Time: 3:54 PM
 */

namespace ODataQuery\Filter\Operators\Functional\String;


interface ODataStringOperatorInterface {
  public function concat($value);
  public function contains($value);
  public function startsWith($value);
  public function endsWith($value);
  public function indexOf($value);
  public function length();
  public function trim();
  public function substring($start, $end = NULL);
  public function toUpper();
  public function toLower();
}