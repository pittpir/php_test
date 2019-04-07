<?php
//include 'test.php';

// Vehicle classification code based on make/model.
$classes = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15); //this is not used?!?!

// Assumed base warranty of the vehicle make being tested. Both makes should be tested
$base_warranty = array(
    array("make" => "BMW", "term" => 36, "miles" => 48000),
    array("make" => "Volkswagen", "term" => 72, "miles" => 100000)
);

// vehicle model years to test
$years = array(
    array("modelyear" => 2003, "suffix1" => 15),
    array("modelyear" => 2004, "suffix1" => 14),
    array("modelyear" => 2005, "suffix1" => 13),
    array("modelyear" => 2006, "suffix1" => 12),
    array("modelyear" => 2007, "suffix1" => 11),
    array("modelyear" => 2008, "suffix1" => 10),
    array("modelyear" => 2009, "suffix1" => 9),
    array("modelyear" => 2010, "suffix1" => 8),
    array("modelyear" => 2011, "suffix1" => 7),
    array("modelyear" => 2012, "suffix1" => 6),
    array("modelyear" => 2013, "suffix1" => 5),
    array("modelyear" => 2014, "suffix1" => 4),
    array("modelyear" => 2015, "suffix1" => 3),
    array("modelyear" => 2016, "suffix1" => 2),
    array("modelyear" => 2017, "suffix1" => 1),
    array("modelyear" => 2018, "suffix1" => 0),
    array("modelyear" => 2019, "suffix1" => 0));

// mileage of the vehicle at the time the contract is rated
$issue_mileage = array(
    array("min" => 0, "max" => 12000, "suffix2" => "A"),
    array("min" => 12001, "max" => 24000, "suffix2" => "A"),
    array("min" => 24001, "max" => 36000, "suffix2" => "B"),
    array("min" => 36001, "max" => 48000, "suffix2" => "C"),
    array("min" => 48001, "max" => 60000, "suffix2" => "D"),
    array("min" => 60001, "max" => 72000, "suffix2" => "E"),
    array("min" => 72001, "max" => 84000, "suffix2" => "F"),
    array("min" => 84001, "max" => 96000, "suffix2" => "G"),
    array("min" => 96001, "max" => 108000, "suffix2" => "H"),
    array("min" => 108001, "max" => 120000, "suffix2" => "I"),
    array("min" => 120001, "max" => 132000, "suffix2" => "J"),
    array("min" => 132001, "max" => 144000, "suffix2" => "K"),
    array("min" => 144001, "max" => 150000, "suffix2" => "L")
);
// warranty coverage options
// terms = maximum length of time (in months) the contract is in force from the time of sale
// miles = maximum number of miles the warranty is in effect from the time of sale
$coverage = array(
    array("name" => "3 Months/3,000 Miles", "terms" => 3, "miles" => 3000),
    array("name" => "6 Months/12,000 Miles", "terms" => 6, "miles" => 12000),
    array("name" => "12 Months/24,000 Miles", "terms" => 12, "miles" => 24000),
    array("name" => "24 Months/30,000 Miles", "terms" => 24, "miles" => 30000),
    array("name" => "24 Months/36,000 Miles", "terms" => 24, "miles" => 36000),
    array("name" => "36 Months/36,000 Miles", "terms" => 36, "miles" => 36000),
    array("name" => "36 Months/45,000 Miles", "terms" => 36, "miles" => 45000),
    array("name" => "36 Months/50,000 Miles", "terms" => 36, "miles" => 50000),
    array("name" => "48 Months/50,000 Miles", "terms" => 48, "miles" => 50000),
    array("name" => "48 Months/60,000 Miles", "terms" => 48, "miles" => 60000),
    array("name" => "60 Months/72,000 Miles", "terms" => 60, "miles" => 72000),
    array("name" => "60 Months/75,000 Miles", "terms" => 60, "miles" => 75000),
    array("name" => "72 Months/100,000 Miles", "terms" => 72, "miles" => 100000),
    array("name" => "84 Months/84,000 Miles", "terms" => 84, "miles" => 84000),
    array("name" => "84 Months/96,000 Miles", "terms" => 84, "miles" => 96000),
    array("name" => "100 Months/100,000 Miles", "terms" => 100, "miles" => 100000),
    array("name" => "100 Months/120,000 Miles", "terms" => 100, "miles" => 120000),
    array("name" => "120 Months/120,000 Miles", "terms" => 120, "miles" => 120000)
);
//php test.php --make=BMW --model_year=2010 --issue_mileage=45000

function CheckSuffix($issue_mileage, $str) : void {
    for ($i=0; $i<sizeof($issue_mileage); $i++) {        
        exec("php test.php --make=BMW --model_year=2018 --issue_mileage=" . $issue_mileage[$i][$str], $output,$return);
        
        $compare = preg_match('/suffix2\:(\w)/',$output[2],$matches);
        if ($matches[1] == $issue_mileage[$i]['suffix2']) {
            echo "\033[32mValidation Passed\033[0m    ";
        } else {
            echo "\033[31mValidation Failed\033[0m    ";
        }
        echo $output[2] . "\n";
        $output = array();
    }
}


echo "---------------------------Checking Min Suffix2---------------------------\n";
CheckSuffix($issue_mileage,'min');
echo "\n---------------------------Checking Max Suffix2---------------------------\n";
CheckSuffix($issue_mileage,'max');


//exec("php test.php --make=BMW --model_year=2010 --issue_mileage=45000", $output,$return);
//print_r($output);
//var_dump($return);

//echo "\n\n";
//end of file
?>