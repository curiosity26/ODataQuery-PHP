<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 10:09 PM
 */

namespace ODataQuery\Search;


class ODataQuerySearchOrConditional implements ODataQuerySearchInterface {
    private $query;
    private $conditional;
    private $negate = FALSE;

    public function __construct($query = NULL, $conditional = NULL, $negate = FALSE) {
        $this->query($query);
        $this->conditional($conditional);
    }

    public function query(ODataQuerySearchInterface $query = NULL) {
        if (isset($query)) {
            $this->query = $query;
            return $this;
        }
        return $this->query;
    }

    public function conditional(ODataQuerySearchInterface $conditional = NULL) {
        if (isset($conditional)) {
            $this->conditional = $conditional;
            return $this;
        }
        return $this->conditional;
    }

    public function not() {
        $this->negate = !$this->negate;
        return $this;
    }

    public function _and(ODataQuerySearchInterface $conditional) {
        return new ODataQuerySearchAndConditional($this, $conditional);
    }

    public function _or(ODataQuerySearchInterface $conditional) {
        return new ODataQuerySearchOrConditional($this, $conditional);
    }

    public function __toString() {
        $query = $this->query();
        $conditional = $this->conditional();
        if (!($query instanceof ODataQuerySearch)) {
            $query = "($query)";
        }
        if (!($conditional instanceof ODataQuerySearch)) {
            $conditional = "($conditional)";
        }

        $op = $this->negate !== TRUE ? "OR" : "OR NOT";

        return "$query $op $conditional";
    }
}