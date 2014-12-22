<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/22/14
 * Time: 5:00 PM
 */

class ODataGeoFunctionTest extends PHPUnit_Framework_TestCase {
  public function testGeoDistance() {
    $output = new \ODataQuery\Filter\Operators\Functional\Geo\ODataGeoDistanceOperator('Location', "geography'SRID=0;Point(142.1 64.1)'");
    $this->assertEquals("geo.distance(Location, geography'SRID=0;Point(142.1 64.1)')", (string)$output);
    $output->points("geography'SRID=0;Point(142.1 64.1)'", 'Location'); // Just for the sake of testing. Not actually OData compliant
    $this->assertEquals("geo.distance(geography'SRID=0;Point(142.1 64.1)', Location)", (string)$output);
    $this->assertEquals("geo.distance(geography'SRID=0;Point(142.1 64.1)', Location) eq 10.01", (string)$output->equals(10.01));
  }

  public function testGeoIntersects() {
    $output = new \ODataQuery\Filter\Operators\Functional\Geo\ODataGeoIntersectsOperator('Location', "geography'SRID=0;Point(142.1 64.1)'");
    $this->assertEquals("geo.intersects(Location, geography'SRID=0;Point(142.1 64.1)')", (string)$output);
    $output->points("geography'SRID=0;Point(142.1 64.1)'", 'Location'); // Just for the sake of testing. Not actually OData compliant
    $this->assertEquals("geo.intersects(geography'SRID=0;Point(142.1 64.1)', Location)", (string)$output);
  }

  public function testGeoLength() {
    $output = new \ODataQuery\Filter\Operators\Functional\Geo\ODataGeoLengthOperator('GeometricLine');
    $this->assertEquals('geo.length(GeometricLine)', (string)$output);
    $this->assertEquals('geo.length(GeometricLine) eq 10.01', (string)$output->equals(10.01));
    $this->assertEquals('geo.length(GeometricLine) add 1 eq 10.01', (string)$output->add(1)->equals(10.01));
  }
}
