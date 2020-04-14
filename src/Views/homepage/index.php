<?php require APP_ROOT . '/Views/includes/header.php'; ?>

<!-- Main Content -->

<style>
    .invalid-feedback {
        display: block;
        margin-bottom: 15px;
        color: red;
        font-size: .7em;
    }
</style>

<div class="container-fluid pv6" style="background: #f8fafd">
    <div class="row  col-md-10 col-sm-12 col-md-offset-1">

        <!-- Estimator Form -->
        <div class="col-md-5 col-sm-12 pt-lg ">
            <div class="form-wrapper contact-form-wrapper form-white-bg pa2">
                <form action="" method="POST" autocomplete="off" id="" class="pa3">
                    <h3 class="uppercase">Covid 19 Calculator</h3>
                    <input style="display:none" class="" name="" value="">
                    <fieldset>
                        <!-- population -->
                        <div class="form-field">
                            <input type="text" name="population" data-population class="last-name-form field-fix <?php echo (!empty($data['population_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['population']; ?>">
                            <label class="form-placeholder">Population</label>
                        </div>
                        <span class="invalid-feedback"><?php echo $data['population_err']; ?></span>
                        <!-- population -->

                        <!-- timeToElapse -->
                        <div class="form-field">
                            <input type="text" name="timeToElapse" data-time-to-elapse class="email-form field-fix <?php echo (!empty($data['time_to_elapse_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['time_to_elapse']; ?>">
                            <label class="form-placeholder">Time To Elapse</label>
                        </div>
                        <span class="invalid-feedback"><?php echo $data['time_to_elapse_err']; ?></span>
                        <!-- timeToElapse -->

                        <!-- reportedCases -->
                        <div class="form-field">
                            <input type="text" name="reportedCases" data-reported-cases class="email-form field-fix <?php echo (!empty($data['reported_cases_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['reported_cases']; ?>">
                            <label class="form-placeholder">Reported Cases</label>
                        </div>
                        <span class="invalid-feedback"><?php echo $data['reported_cases_err']; ?></span>
                        <!-- reportedCases -->

                        <!-- totalHospitalBeds -->
                        <div class="form-field">
                            <input type="text" name="totalHospitalBeds" data-total-hospital-beds class="email-form field-fix <?php echo (!empty($data['total_hospital_beds_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['total_hospital_beds']; ?>">
                            <label class="form-placeholder">Total Hospital Beds</label>
                        </div>
                        <span class="invalid-feedback"><?php echo $data['total_hospital_beds_err']; ?></span>
                        <!-- totalHospitalBeds -->


                        <div class="form-field field-dropdown">
                            <select name="periodType" data-period-type class="field-fix" aria-invalid="true" style="opacity: 1;">
                                <option class="hide"></option>
                                <option class="pv2" value="months">Months</option>
                                <option class="pv2" value="weeks">Weeks</option>
                                <option class="pv2" value="days">days</option>
                            </select>
                            <label class="form-placeholder">Type of query</label>
                        </div>
                    </fieldset>

                    <!-- Submit Results -->
                    <fieldset>
                        <input type="submit" data-go-estimate value="calculate" class="mv2 btn btn-lg btn-block text-uppercase txt-white" style="background: #f56729;">
                        <div class="signup-terms">
                            <small> By clicking on <strong>CALCULATE</strong>, you acknowledge having read our&nbsp;<a href="#">Privacy notice</small>
                        </div>
                    </fieldset>
                    <!-- Submit Results -->
                </form>
            </div>
        </div>
        <!-- Estimator Form -->

        <!-- Results Section -->
        <div class="col-md-6 col-sm-12 mt-xl col-md-offset-1">
            <div class="pt-sm-3 mt-sm-3">
                <h2>Covid 19 Estimations</h2>
                <h3 class="">Best Case Scenario</h3>
                <p class="" style="color: #57575b">
                    Currently Infected :&nbsp; <?php echo $data['impact']['currentlyInfected']; ?> <br>
                    Infections by Requested Time :&nbsp;<?php echo $data['impact']['infectionsByRequestedTime'];?><br>
                    Severe Cases by Requested Time :&nbsp; <?php echo $data['impact']['severeCasesByRequestedTime'];?> <br>
                    Hospital Beds by Requested Time :&nbsp;<?php echo $data['impact']['hospitalBedsByRequestedTime'];?> <br>
                    Cases for ICU by Requested Time :&nbsp; <?php echo $data['impact']['casesForICUByRequestedTime'];?> <br>
                    Cases for Ventilators by Requested Time :&nbsp;<?php echo $data['impact']['casesForVentilatorsByRequestedTime'];?><br>
                    Dollars in Flight :&nbsp; <?php echo $data['impact']['dollarsInFlight'];?>
                </p>

                <h3 class="pt-xs sub-text">Worst Case Scenario</h3>
                <p class="" style="color: #57575b">
                    Currently Infected :&nbsp; <?php echo $data['severeImpact']['currentlyInfected']; ?> <br>
                    Infections by Requested Time :&nbsp;<?php echo $data['severeImpact']['infectionsByRequestedTime'];?><br>
                    Severe Cases by Requested Time :&nbsp; <?php echo $data['severeImpact']['severeCasesByRequestedTime'];?> <br>
                    Hospital Beds by Requested Time :&nbsp;<?php echo $data['severeImpact']['hospitalBedsByRequestedTime'];?> <br>
                    Cases for ICU by Requested Time :&nbsp; <?php echo $data['severeImpact']['casesForICUByRequestedTime'];?> <br>
                    Cases for Ventilators by Requested Time :&nbsp;<?php echo $data['severeImpact']['casesForVentilatorsByRequestedTime'];?><br>
                    Dollars in Flight :&nbsp; <?php echo $data['severeImpact']['dollarsInFlight'];?>
                </p>
            </div>


        </div>

        <!-- Results Section -->
    </div>
</div>
<!-- Main Content -->

<?php require APP_ROOT . '/Views/includes/footer.php'; ?>