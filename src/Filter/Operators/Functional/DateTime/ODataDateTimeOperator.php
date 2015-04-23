<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/22/14
 * Time: 5:36 PM
 */

namespace ODataQuery\Filter\Operators\Functional\DateTime;



class ODataDateTimeOperator extends ODataDateTimeFilter {
  protected $format = 'Y-m-d H:i:s e';

  public function __construct($property = NULL) {
    parent::__construct('datetime', $property);
  }
}