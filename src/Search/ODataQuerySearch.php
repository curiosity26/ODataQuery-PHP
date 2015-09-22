<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 12:44 PM
 */

namespace ODataQuery\Search;


use ODataQuery\ODataQueryOptionInterface;

class ODataQuerySearch implements ODataQueryOptionInterface, ODataQuerySearchInterface {
    protected $query;
    protected $conditionals = array();

    public function __construct($query = NULL) {
        $this->setQuery($query);
    }

    /**
     * Use getter or setter
     * Retained for backward compatibility
     * @param null $query
     * @return $this
     * @deprecated
     */
    public function query($query = NULL) {
        if (isset($query)) {
            $this->setQuery(self::cleanQuery($query));
            return $this;
        }
        return $this->getQuery();
    }

    static protected function cleanQuery($query) {
        if (!is_string($query)) {
            return $query;
        }
        $query = trim($query);
        if (preg_match('/\s+/', $query) != FALSE) {
            $query = "\"$query\"";
        }
        return $query;
    }

    public function _and($conditional) {
        $conditional = self::cleanQuery($conditional);
        $this->conditionals[] = array('AND', $conditional);
        return $this;
    }

    public function _or($conditional) {
        $conditional = self::cleanQuery($conditional);
        $this->conditionals[] = array('OR', $conditional);
        return $this;
    }

    public function clear() {
        $this->conditionals = array();
        return $this;
    }

    public function __toString() {
        $query = $this->getQuery();
        if ($query instanceof ODataQuerySearchInterface) {
            $query = "($query)";
        }
        foreach ($this->conditionals as $conditional) {
            $op = $conditional[0];
            $condition = is_string($conditional[1]) ? $conditional[1] : "({$conditional[1]})";
            $query .= " $op $condition";
        }
        return $query;
    }

    /**
     * @return mixed
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param mixed $query
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }

    /**
     * @return array
     */
    public function getConditionals()
    {
        return $this->conditionals;
    }

    /**
     * @param array $conditionals
     */
    public function setConditionals($conditionals)
    {
        $this->conditionals = $conditionals;
    }
}