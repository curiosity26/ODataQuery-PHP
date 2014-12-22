<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/22/14
 * Time: 5:19 PM
 */

class ODataDateTimeTest extends PHPUnit_Framework_TestCase {

  public  function testNow() {
    $output = new \ODataQuery\Filter\Operators\Functional\DateTime\ODataNowOperator();
    $this->assertEquals('now()', (string)$output);
  }
  public function testDate() {
    $now = new \ODataQuery\Filter\Operators\Functional\DateTime\ODataNowOperator();
    $output = new \ODataQuery\Filter\Operators\Functional\DateTime\ODataDateOperator('TestDate');
    $this->assertEquals('date(TestDate)', (string)$output);
    $this->assertEquals('date(TestDate) eq 2014-12-21', (string)$output->equals(new DateTime('2014-12-21 UTC')));
    $output->property = $now;
    $this->assertEquals('date(now())', (string)$output);
  }

  public function testDay() {
    $now = new \ODataQuery\Filter\Operators\Functional\DateTime\ODataNowOperator();
    $output = new \ODataQuery\Filter\Operators\Functional\DateTime\ODataDayOperator('TestDate');
    $this->assertEquals('day(TestDate)', (string)$output);
    $this->assertEquals('day(TestDate) eq 10', (string)$output->equals(10));
    $output->property = $now;
    $this->assertEquals('day(now())', (string)$output);
  }

  public function testMonth() {
    $now = new \ODataQuery\Filter\Operators\Functional\DateTime\ODataNowOperator();
    $output = new \ODataQuery\Filter\Operators\Functional\DateTime\ODataMonthOperator('TestDate');
    $this->assertEquals('month(TestDate)', (string)$output);
    $this->assertEquals('month(TestDate) eq 10', (string)$output->equals(10));
    $output->property = $now;
    $this->assertEquals('month(now())', (string)$output);
  }

  public function testYear() {
    $now = new \ODataQuery\Filter\Operators\Functional\DateTime\ODataNowOperator();
    $output = new \ODataQuery\Filter\Operators\Functional\DateTime\ODataYearOperator('TestDate');
    $this->assertEquals('year(TestDate)', (string)$output);
    $this->assertEquals('year(TestDate) eq 10', (string)$output->equals(10));
    $output->property = $now;
    $this->assertEquals('year(now())', (string)$output);
  }

  public function testTime() {
    $now = new \ODataQuery\Filter\Operators\Functional\DateTime\ODataNowOperator();
    $output = new \ODataQuery\Filter\Operators\Functional\DateTime\ODataTimeOperator('TestDate');
    $this->assertEquals('time(TestDate)', (string)$output);
    $this->assertEquals('time(TestDate) eq 08:00:00 UTC', (string)$output->equals(new DateTime('08:00:00 UTC')));
    $output->property = $now;
    $this->assertEquals('time(now())', (string)$output);
  }

  public function testHour() {
    $now = new \ODataQuery\Filter\Operators\Functional\DateTime\ODataNowOperator();
    $output = new \ODataQuery\Filter\Operators\Functional\DateTime\ODataHourOperator('TestDate');
    $this->assertEquals('hour(TestDate)', (string)$output);
    $this->assertEquals('hour(TestDate) eq 10', (string)$output->equals(10));
    $output->property = $now;
    $this->assertEquals('hour(now())', (string)$output);
  }

  public function testMinute() {
    $now = new \ODataQuery\Filter\Operators\Functional\DateTime\ODataNowOperator();
    $output = new \ODataQuery\Filter\Operators\Functional\DateTime\ODataMinuteOperator('TestDate');
    $this->assertEquals('minute(TestDate)', (string)$output);
    $this->assertEquals('minute(TestDate) eq 10', (string)$output->equals(10));
    $output->property = $now;
    $this->assertEquals('minute(now())', (string)$output);
  }

  public function testSecond() {
    $now = new \ODataQuery\Filter\Operators\Functional\DateTime\ODataNowOperator();
    $output = new \ODataQuery\Filter\Operators\Functional\DateTime\ODataSecondOperator('TestDate');
    $this->assertEquals('second(TestDate)', (string)$output);
    $this->assertEquals('second(TestDate) eq 10', (string)$output->equals(10));
    $output->property = $now;
    $this->assertEquals('second(now())', (string)$output);
  }

  public function testFractionalSeconds() {
    $now = new \ODataQuery\Filter\Operators\Functional\DateTime\ODataNowOperator();
    $output = new \ODataQuery\Filter\Operators\Functional\DateTime\ODataFractionalSecondsOperator('TestDate');
    $this->assertEquals('fractionalseconds(TestDate)', (string)$output);
    $this->assertEquals('fractionalseconds(TestDate) lt 10', (string)$output->lessThan(10));
    $output->property = $now;
    $this->assertEquals('fractionalseconds(now())', (string)$output);
  }

  public function testTotalOffsetMinutes() {
    $now = new \ODataQuery\Filter\Operators\Functional\DateTime\ODataNowOperator();
    $output = new \ODataQuery\Filter\Operators\Functional\DateTime\ODataTotalOffsetMinutesOperator('TestDate');
    $this->assertEquals('totaloffsetminutes(TestDate)', (string)$output);
    $this->assertEquals('totaloffsetminutes(TestDate) lt 300', (string)$output->lessThan(300));
    $output->property = $now;
    $this->assertEquals('totaloffsetminutes(now())', (string)$output);
  }

  public function testTotalSeconds() {
    $now = new \ODataQuery\Filter\Operators\Functional\DateTime\ODataNowOperator();
    $output = new \ODataQuery\Filter\Operators\Functional\DateTime\ODataTotalSecondsOperator('TestDate');
    $this->assertEquals('totalseconds(TestDate)', (string)$output);
    $this->assertEquals('totalseconds(TestDate) lt 3000000000', (string)$output->lessThan(3000000000));
    $output->property = $now;
    $this->assertEquals('totalseconds(now())', (string)$output);
  }

  public function testMaxDateTime() {
    $output = new \ODataQuery\Filter\Operators\Functional\DateTime\ODataMaxDateTimeOperator();
    $this->assertEquals('maxdatetime()', (string)$output);
    $this->assertEquals('maxdatetime() eq 2024-10-10 08:00:00 UTC', (string)$output->equals(new DateTime('2024-10-10 08:00:00 UTC')));
  }

  public function testMinDateTime() {
    $output = new \ODataQuery\Filter\Operators\Functional\DateTime\ODataMinDateTimeOperator();
    $this->assertEquals('mindatetime()', (string)$output);
    $this->assertEquals('mindatetime() eq 1970-01-01 08:00:00 UTC', (string)$output->equals(new DateTime('1970-01-01 08:00:00 UTC')));
  }
}
