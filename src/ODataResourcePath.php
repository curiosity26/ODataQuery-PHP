<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 2:00 PM
 */

namespace ODataQuery;


use ODataQuery\Expand\ODataExpandableInterface;
use ODataQuery\Filter\ODataQueryFilterInterface;
use ODataQuery\Pager\ODataQueryPager;
use ODataQuery\Parameter\ODataQueryParameterCollection;
use ODataQuery\Search\ODataQuerySearch;
use ODataQuery\Select\ODataQuerySelect;

class ODataResourcePath extends ODataResource {

    const ORDER_ASC = 'ASC';
    const ORDER_DESC = 'DESC';

    private $path;
    private $parameters = array();
    private $order = self::ORDER_ASC;

    public function __construct($path = NULL, ODataQueryFilterInterface $filter, ODataQuerySelect $select = NULL,
        ODataExpandableInterface $expand = NULL, ODataQueryPager $pager = NULL,
        ODataQuerySearch $search = NULL, $orderBy = NULL, ODataQueryParameterCollection $params = NULL, $order = self::ORDER_ASC) {

        // If all parameters were set then the functions could be chained.
        // But if one is NULL then it will break the chain
        $this->path($path);
        $this->parameters($params);
        $this->order = $order;

        parent::__construct($filter, $select, $expand, $pager, $search, $orderBy);
    }

    public function path($path = NULL) {
        if (isset($path)) {
            $this->path = $path;
            return $this;
        }
        return $this->path;
    }

    public function parameters(ODataQueryParameterCollection $params = NULL) {
        if (isset($params)) {
            $this->parameters = $params;
            return $this;
        }

        return $this->parameters;
    }

    public function __toString() {
        return $this->path().'?'.parent::__toString();
    }
}