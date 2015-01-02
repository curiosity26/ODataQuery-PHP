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

    }

    public function testLambda() {

    }
}
