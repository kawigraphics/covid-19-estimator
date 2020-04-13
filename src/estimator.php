<?php

/**
 *  ===========================================================================
 *  COVID-19 CHALLENGE TEST
 *  ===========================================================================
 *  Your estimator will receive input data structured as JSON
 *
 *  {
 *    "region": {
 *      "name": "Africa",
 *      "avgAge": 19.7,
 *      "avgDailyIncomeInUSD": 5,
 *      "avgDailyIncomePopulation": 0.71
 *    },
 *    "periodType": "days",
 *    "timeToElapse": 58,
 *    "reportedCases": 674,
 *    "population": 66622705,
 *    "totalHospitalBeds": 1380614
 *  }
 *
 *
 * and the out put will be required to be an impact estimatation
 * having the data structures pecified as
 *
 *   {
 *      data: {},          // the input data you got
 *      impact: {},        // your best case estimation
 *      severeImpact: {}   // your severe case estimation
 *   }
 *
 *
 *  ==========================================================================
 *  CHALLENGE ONE (1)
 *  ===========================================================================
 *
 * (i) Currently Infected Patients Best Case
 * (ii) Convert Months, Weeks & Days to Basic Days
 * (iii) Estimated Infections in 28 Days. No rounding off the result
 */

// Currently Infected Patients Best Case
function currentlyInfected($data)
{
	// reportedCases
	$reported_cases = $data['reportedCases'];
	// currently Infected(* ten)
	$currently_infected = $reported_cases * 10;

	// echo $reported_cases;
	return $currently_infected;
}


// Currently Infected Patients Severe Case
function severeImpact($data)
{
	// Projected Cases
	$severe_impact = $data['reportedCases'];
	// Currently Infected(* ten)
	$severe_impact = $severe_impact * 50;

	// Echo $severe_impact;
	return $severe_impact;
};

/**
 * Convert Months, Weeks & Days to Basic Days
 * Years to Months and Months to Days
 * Months to Days
 */
function convertToDays($data)
{
	// Get the Duration Type
	$period_type = $data['periodType'];
	$time_to_elapse = $data['timeToElapse'];

	switch ($period_type) {
			// If Months, convert to days
		case 'months':
			$duration = $time_to_elapse * 30;
			break;
			// if Weeks, convert to days
		case 'weeks':
			$duration = $time_to_elapse * 7;
			break;
			// if Days, leave as is
		default:
			$duration = $time_to_elapse;
			break;
	}

	return $duration;
};


// Estimated Infections in 28 Days. No rounding off the result
function infectionsByRequestedTime($data)
{
	// Normalize duration to days
	$duration = convertToDays($data);

	// Exponential Growth
	$factor = (int)($duration / 3);
	$pow = 2 ** $factor;

	// Currently Infected Patients - Impact
	$impact = currentlyInfected($data) * $pow;

	// Currently Infected Patients - Severe Cases
	$severe_impact = severeImpact($data) * $pow;

	// Affected Projection in 28 Days for both impact and Severe
	return array(
		'impact' => $impact,
		'severe_impact' => $severe_impact
	);
}




/**
 * Main Covid19 Impact Estimator Method
 */
function covid19ImpactEstimator($data)
{
	// convert input JSON string to Array
	$data = json_encode($data);
	$data = json_decode($data, true);

	// Challenge 1
	$currently_infected = currentlyInfected($data);
	$severe_impact = severeImpact($data);
	$infections_by_requested_time = infectionsByRequestedTime($data);


	// Output Data Structure
	$data = [
		'data' => $data,
		'impact' => [
			'currentlyInfected' => (int) $currently_infected,
			'infectionsByRequestedTime' => (int) $infections_by_requested_time['impact']
		],
		'severeImpact' => [
			'currentlyInfected' => (int) $severe_impact,
			'infectionsByRequestedTime' => (int) $infections_by_requested_time['severe_impact']
		]
	];

	// return the array
	return $data;
	// var_dump($data);
}

// Execute the Method
covid19ImpactEstimator($data);
// covid19ImpactEstimator(file_get_contents('./data.json', true));