<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 11:06 PM
 */

namespace ODataQuery\Expand;


interface ODataExpandableInterface {
    public function setProperty($property = NULL);
    public function setLimits($limits = NULL);
    public function getProperty();
    public function getLimits();
    public function __toString();
}