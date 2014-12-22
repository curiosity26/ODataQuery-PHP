<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 10:09 PM
 */

namespace ODataQuery\Search;


class ODataQuerySearchAndConditional implements ODataQuerySearchInterface {
    private $query;
    private $conditional;
    private $negate = FALSE;

    public function __construct(ODataQuerySearchInterface $query = NULL, ODataQuerySearchInterface $conditional = NULL,
        $negate = FALSE) {
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

    public function _and(ODataQuerySearchInterface $conditional, $negate = FALSE) {
        return new ODataQuerySearchAndConditional($this, $conditional, $negate);
    }

    public function _or(ODataQuerySearchInterface $conditional, $negate = FALSE) {
        return new ODataQuerySearchOrConditional($this, $conditional, $negate);
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

        $op = $this->negate !== TRUE ? "AND" : "AND NOT";

        return "$query $op $conditional";
    }
}