<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 1/1/15
 * Time: 12:24 PM
 */

class ODataFilterFactoryTest extends PHPUnit_Framework_TestCase {
    public function testMath() {
        $factory = new \ODataQuery\Filter\ODataFilterFactory('TestValue');
        $cFac = new \ODataQuery\Filter\ODataFilterFactory('OtherValue');
        $factory
            ->count()
            ->add(10)
            ->round()
            ->subtract(5.05)
            ->ceiling()
            ->equals($cFac
                ->divide(10)
                ->multiply(8)
                ->floor()
            );
        $this
            ->assertEquals(
                'ceiling(round(TestValue/$count add 10) sub 5.05) eq floor((OtherValue div 10) mul 8)',
                (string)$factory);
    }

    public function testString() {
        $factory = new \ODataQuery\Filter\ODataFilterFactory('TestValue');
        $factory
            ->concat('other')
            ->substring(($propLength = new \ODataQuery\Filter\Operators\Functional\String\ODataLengthOperator
            ($factory->originalProperty)), $propLength->add(1))
            ->notEqualsString('p');

        $this
            ->assertEquals('substring(concat(TestValue, \'other\'), length(TestValue), length(TestValue) add 1) ne \'p\'',
            (string)$factory);

        $factory = new \ODataQuery\Filter\ODataFilterFactory('TestValue');
        $factory->contains('op')->not();
        $this->assertEquals('not contains(TestValue, \'op\')', (string)$factory);
    }

    public function testDate() {
        $filter = new \ODataQuery\Filter\ODataFilterFactory();
        $filter
            ->now()
            ->datetime()
            ->equals(new DateTime('1/2/2015 8:00 PM EST'));
        $this->assertEquals('datetime(now()) eq 2015-01-02 20:00:00 EST', (string)$filter);

        $filter
            ->now()
            ->day()
            ->equals(8);
        $this->assertEquals('day(now()) eq 8', (string)$filter);

        $filter->now();
        $filter->month()
            ->greaterThan(6);
        $this->assertEquals('month(now()) gt 6', (string)$filter);

        $filter->maxDateTime();
        $filter->year()
            ->greaterThanEquals(2015);
        $this->assertEquals('year(maxdatetime()) ge 2015', (string)$filter);

        $filter->minDateTime();
        $filter->hour()
            ->lessThan(20);
        $this->assertEquals('hour(mindatetime()) lt 20', (string)$filter);

        $filter->now();
        $filter->minute()
            ->lessThanEquals(43);
        $this->assertEquals('minute(now()) le 43', (string)$filter);

        $filter->now();
        $filter->second()
            ->notEquals(20);
        $this->assertEquals('second(now()) ne 20', (string)$filter);
    }

    public function testLambda() {
        $filter = new \ODataQuery\Filter\ODataFilterFactory('Items');
        $filter->any(new \ODataQuery\Filter\Operators\Logical\ODataGreaterThanEqualsOperator('Quantity', 10));
        $this->assertEquals('Items/any(d:d/Quantity ge 10)', (string)$filter);

        $filter = new \ODataQuery\Filter\ODataFilterFactory('Items');
        $filter->all(new \ODataQuery\Filter\Operators\Logical\ODataGreaterThanEqualsOperator('Quantity', 10));
        $this->assertEquals('Items/all(d:d/Quantity ge 10)', (string)$filter);
    }
}
