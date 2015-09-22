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

    protected $path;
    protected $parameters;
    protected $order;

    public function __construct($path = NULL, ODataQueryFilterInterface $filter = NULL, ODataQuerySelect $select = NULL,
        ODataExpandableInterface $expand = NULL, ODataQueryPager $pager = NULL,
        ODataQuerySearch $search = NULL, $orderBy = NULL, ODataQueryParameterCollection $params = NULL, $order = NULL) {

        // If all parameters were set then the functions could be chained.
        // But if one is NULL then it will break the chain
        $this->setPath($path);
        $this->setParameters($params);
        $this->setOrder($order);

        parent::__construct($filter, $select, $expand, $pager, $search, $orderBy);
    }

    /**
     * Use getter or setter
     * Retained for backward compatibility
     * @param null $path
     * @return $this
     * @deprecated
     */
    public function path($path = NULL) {
        if (isset($path)) {
            $this->setPath($path);
            return $this;
        }
        return $this->getPath();
    }

    /**
     * Use getter or setter
     * Retained for backward compatibility
     * @param ODataQueryParameterCollection|null $params
     * @return $this
     * @deprecated
     */
    public function parameters(ODataQueryParameterCollection $params = NULL) {
        if (isset($params)) {
            $this->setParameters($params);
            return $this;
        }

        return $this->getParameters();
    }

    public function build() {
        $build = parent::build();
        if (isset($this->order)) {
            $build += array('$order' => $this->order);
        }
        $parameters = $this->getParameters();
        if (isset($parameters)) {
            $build += $parameters->build();
        }
        return $build;
    }

    public function __toString() {
        $args = parent::__toString();
        if (strlen($args) > 0) {
            $args = "?$args";
        }
        return $this->getPath().$args;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return ODataQueryParameterCollection
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param mixed $parameters
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * @return null
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param null $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }

}