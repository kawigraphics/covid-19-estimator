<?php

class Homepage extends Controller{

    public function __construct(){
    }

    public function index(){

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST DATA
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = array(
                'title' => 'Covid 19 Estimator',
                'population' => trim($_POST['population']),
                'time_to_elapse' => trim($_POST['timeToElapse']),
                'reported_cases' => trim($_POST['reportedCases']),
                'total_hospital_beds' => trim($_POST['totalHospitalBeds']),
                'period_type' => trim($_POST['periodType'])

            );

            // Validate Input population
            if (empty($data['population'])) {
                $data['population_err'] = 'Please enter valid figure';
            } else {
                if (preg_match('/^\d+$/', $data['population']) == 0) {
                    $data['population_err'] = 'Please enter valid figure';
                }
            }

            // Validate Input time_to_elapse
            if (empty($data['time_to_elapse'])) {
                $data['time_to_elapse_err'] = 'Please enter valid figure';
            } else {
                if (preg_match('/^\d+$/', $data['time_to_elapse']) == 0) {
                    $data['time_to_elapse_err'] = 'Please enter valid figure';
                }
            }

            // Validate Input reported_cases
            if (empty($data['reported_cases'])) {
                $data['reported_cases_err'] = 'Please enter valid figure';
            } else {
                if (preg_match('/^\d+$/', $data['reported_cases']) == 0) {
                    $data['reported_cases_err'] = 'Please enter valid figure';
                }
            }

            // Validate Input total_hospital_beds
            if (empty($data['total_hospital_beds'])) {
                $data['total_hospital_beds_err'] = 'Please enter valid figure';
            } else {
                if (preg_match('/^\d+$/', $data['total_hospital_beds']) == 0) {
                    $data['total_hospital_beds_err'] = 'Please enter valid figure';
                }
            }

            // Validate Input period_type
            if (empty($data['period_type'])) {
                $data['period_type_err'] = 'Please enter valid type';
            }


            // Make sure errors are empty
            if (empty($data['population_err']) && empty($data['time_to_elapse_err']) && empty($data['reported_cases_err']) && empty($data['total_hospital_beds_err']) && empty($data['period_type_err'])) {

                //PHP ARRAY
                $data = array(
                    'region' => [
                        'name' => 'Africa',
                        'avgAge' => 19.7,
                        'avgDailyIncomeInUSD' => 4,
                        'avgDailyIncomePopulation' => 0.73

                    ],
                    'periodType' => $data['population'],
                    'timeToElapse' => $data['population'],
                    'reportedCases' => $data['population'],
                    'population' => $data['population'],
                    'totalHospitalBeds' => $data['population']
                );

                // call estimator function
                $data = covid19ImpactEstimator($data);

                $this->view('homepage/index', $data);
            } else {
                // Load view with errors
                $this->view('homepage/index', $data);
            }
        } else {
            // Init data
            $data = array(
                'title' => 'Covid 19 Estimator',
                'population' => '',
                'time_to_elapse' => '',
                'reported_cases' => '',
                'total_hospital_beds' => '',
                'period_type' => ''
            );

            $this->view('homepage/index', $data);
        }

    }
}