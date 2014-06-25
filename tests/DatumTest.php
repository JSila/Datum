<?php

use JSila\Datum\Datum;
use Carbon\Carbon;

class DatumTest extends \PHPUnit_Framework_TestCase
{
	protected $datum;

	protected function setUp()
	{
		$this->datum = new Datum;
	}

	/**
     * @dataProvider differentDatesForBeforeProvider
     */
	public function testBefore($input, $expected)
	{
		$this->assertEquals($expected, $this->datum->relativno($input));
	}

	/**
     * @dataProvider differentDatesForAfterProvider
     */
	public function testAfter($input, $expected)
	{
		$this->assertEquals($expected, $this->datum->relativno($input));
	}

	public function testChained()
	{
		$this->assertEquals('pred 2 minutama', Datum::now()->subMinutes(2)->relativno());
	}

	public function differentDatesForBeforeProvider()
	{
		return array(
			array(Datum::now()->addSeconds(10), 'pred 10 sekundami'),
			array(Datum::now()->addMinutes(50), 'pred 50 minutami'),
			array(Datum::now()->addWeek(),      'pred 1 tednom'),
			array(Datum::now()->addWeeks(3),    'pred 3 tedni'),
			array(Datum::now()->addYears(2),    'pred 2 letoma'),
			array(Datum::now()->addYears(3),    'pred 3 leti')
		);
	}

	public function differentDatesForAfterProvider()
	{
		return array(
			array(Datum::now()->subSeconds(10), 'čez 10 sekund'),
			array(Datum::now()->subMinutes(50), 'čez 50 minut'),
			array(Datum::now()->subWeek(),      'čez 1 teden'),
			array(Datum::now()->subWeeks(3),    'čez 3 tedne'),
			array(Datum::now()->subYears(2),    'čez 2 leti'),
			array(Datum::now()->subYears(3),    'čez 3 leta')
		);
	}
}