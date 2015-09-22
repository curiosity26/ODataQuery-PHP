<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 3:57 PM
 */

namespace ODataQuery;


class ODataCount implements ODataQueryOptionInterface {
    protected $property;

    public function __construct($property = NULL) {
        $this->setProperty($property);
    }

    /**
     * Use getter or setter
     * Retained for backward compatibility
     * @param null $property
     * @return $this
     * @deprecated
     */
    public function property($property = NULL) {
        if (isset($property)) {
            $this->setProperty($property);
            return $this;
        }
        return $this->getProperty();
    }

    public function __toString() {
        $property = $this->getProperty();
        return "$property/\$count";
    }

    /**
     * @return mixed
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * @param mixed $property
     */
    public function setProperty($property)
    {
        $this->property = $property;
    }
}