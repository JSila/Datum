<?php

namespace JSila\Datum;

use Carbon\Carbon;

class Datum extends Carbon {

	public function relativno(Carbon $other = null)
	{
		$isNow = is_null($other);

		if ($isNow) $other = static::now($this->tz);
		
		$delta = $other->diffInSeconds($this);

		// 4 weeks per month, 365 days per year... good enough!!
		$divs = array(
			'second' => self::SECONDS_PER_MINUTE,
			'minute' => self::MINUTES_PER_HOUR,
			'hour'   => self::HOURS_PER_DAY,
			'day'    => self::DAYS_PER_WEEK,
			'week'   => 4,
			'month'  => self::MONTHS_PER_YEAR
		);

		$unit = 'year';

		foreach ($divs as $divUnit => $divValue) {
			if ($delta < $divValue) {
				$unit = $divUnit;
				break;
			}

			$delta = floor($delta / $divValue);
		}

		if ($delta == 0) $delta = 1;

		$translation = include 'units.php';
		$translation = $translation[$unit];

		$which = $this->gt($other) ? 'after' : 'before';
		$numberOfTranslations = count($translation[$which]);

		$index = ($delta > $numberOfTranslations) ? $numberOfTranslations-1 : $delta-1;

		return sprintf($translation[$which][$index], $delta);
	}
}