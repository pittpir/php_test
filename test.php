<?php
/**
 * PHP Developer Test 17
 *
 * Test a developers ability to create a class along with supporting methods.
 * Test a developers ability to create unit tests to validate each methods logic.
 *
 * INSTRUCTIONS:
 * --------------------------------------------------------------------
 * Write a class which will validate if a vehicle can carry any of the warranty coverages in the $coverage array
 *
 * Rules:
 * Book of Contracts should not have active contracts on vehicles where the mileage on the vehicle is > 153,000 miles before contract expires.
 * Book of Contracts should not have active contracts on vehicles who's age is more than 12 years old + 3 months (147 months) before contract expires.
 * Contract coverage should not be available if the term and miles of the coverage expire before the base warranty of the vehicle has expired.
 *
 * Test will validate each vehicle make in the $base_warranty array, each model year of the make in the $years array, and every issue mileage
 * between 0 and 150,000 in 1,000 mile increments.
 *
 * Additionally, a "New" or "Used" flag will be assigned to the output based on the vehicle issue mileage where if the issue mileage falls within the
 * base warranty, "New" value is assigned, otherwise a "Used" value is assigned.
 *
 * Output the following: make, model year, issue mileage, New or Used, coverage name, suffix1 (as a 2 digit zero fill left padded number),
 * suffix2 and success/failure, indicating the reason for the failure. Failure message should include all validation failures.
 *
 * Example (for demonstration purposes):
 *  Test Values: make: BMW, model year: 2018, issue mileage: 1000; testing coverage: "3 Months/3,000 Miles"
 *  Example Output: BMW  2018  1000  NEW  "3 Months/3,000 Miles"  suffix1:00  suffix2:A  RESULT: FAILURE array('Term expires before warranty', 'Miles expires before warranty');
 *
 *  Test Values: make: BMW, model year: 2018, issue mileage: 1000; testing coverage: "100 Months/120,000 Miles"
 *  Example Output: BMW  2018  1000  NEW  "100 Months/120,000 Miles"  suffix1:00  suffix2:A  RESULT: SUCCESS
 *
 * Convert the $coverage array to a json file, simulate an API call in a private method to pull the json file to create the coverage array.
 *
 * Make this a self contained script executable from a linux command line.
 *
 * phpunit test should be included as a separate file.
 *
 * Do not use built-in libraries or frameworks.
 *
 */

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

$filename = 'coverage_json_array.txt';

//Write a class which will validate if a vehicle can carry any of the warranty coverages in the $coverage array
class Validate
{
    //public variables
    protected $coverage1;
    protected $failure;
    protected $retArray;
    protected $suffix1;
    protected $suffix2;
    protected $new_or_used;
    
    //private variables
    private $data;
    private $json_data;
    private $opts;
    private $context;
    private $url;
    private $result;

    //constructor 
    public function Validate() {
        $this->failure = array();
        $this->coverage1 = array();
        $this->retArray = array();
        $this->data = array();
        $this->json_data = array();
        $this->opts = array();
        $this->context = array();
        $this->url = '';
        $this->result = array();
        $this->suffix1 = '';
        $this->new_or_used = '';
        $this->suffix2 = '';
    }

    public function clear() {
        $this->failure = array();
        $this->retArray = array();
    }


    //compile the results of the contract
    public function booksOfContract(array $arr, array $base_warranty, array $years, array $issue_mileage, array $classes) : array {
        
        //issue mileage above what any contract would cover.  Return a -1 to indicate no contracts available.
        if ( ($arr['issue mileage'] + 3000) > 153000)
        {
            return $this->retArray;
        }
    
        //get suffix1 and total months on the car.
        for ($i=0; $i<sizeof($years); $i++) {
            if ($arr['model year'] == $years[$i]['modelyear']) {
                $this->suffix1 = $years[$i]['suffix1'];
            }
        }

        //the age of the car is too old for any contract. Return a -1 to indicate no contracts available. 
        if ( (($this->suffix1*12)+3) >= 147) {
            return $this->retArray;
        }

        for ($i=0; $i<sizeof($base_warranty); $i++) {
            
            //check if base term warranty + term coverage is below original warranty
            $warranty_term = $arr['terms'];
            
            //check for new or used
            if ($base_warranty[$i]['make'] == $arr['make']) {
                $this->new_or_used = ( ($arr['issue mileage']>=$base_warranty[$i]['miles']) ? "USED" : "NEW");
                $this->new_or_used = ( (($this->suffix1*12) >= $base_warranty[$i]['term'] ) ? "USED" : "NEW");
 
                //check if base mileage warranty + coverage is below original warranty
                $warranty_mileage = $arr['miles'];
                if ( (($warranty_mileage + $arr['issue mileage']) < $base_warranty[$i]['miles']) && ($this->new_or_used == "NEW")) {
                    array_push($this->failure, "Miles expires before base warranty");
                }

                if ( ($warranty_mileage + $arr['issue mileage']) >= 153000) {
                    //return -1;
                    array_push($this->failure, "Mileage greater than 153000 before contract ends");
                }

                

                if  ( ($warranty_term + ($this->suffix1*12) < $base_warranty[$i]['term'] ) && ($this->new_or_used == "NEW"))  {
                   array_push($this->failure, "Term expires before base warranty");
                }

                if  ( ($warranty_term + ($this->suffix1*12)) >= 147) {
                   //return -1;
                   array_push($this->failure, "Term greater than 147 months");
                }
            }
        }

        for ($i=0; $i<sizeof($issue_mileage); $i++) {        
            if ( ($arr['issue mileage'] > $issue_mileage[$i]['min']) && ($arr['model year'] < $issue_mileage[$i]['max']) ) {
                $this->suffix2 = $issue_mileage[$i]['suffix2'];
                break;
            }

        }

        array_push($this->retArray, $this->new_or_used);
        array_push($this->retArray, $this->suffix1);
        array_push($this->retArray, $this->suffix2);
        array_push($this->retArray, sizeof($this->failure));

        return $this->retArray;
    }  //end of booksOfContract

    public function printPrettyFailArray() {
        for ($i=0; $i<sizeof($this->failure); $i++) {
            echo $this->failure[$i] . "   ";
        }
    }

    //getter function for obtaining the JSON data from the file
    public function GetJSONResults(string $filename) : array {
        $this->coverage1 = $this->GetJSON($filename);
        return $this->coverage1;
    }

    //this will retrieve and populate the coverage array from the API
    private function GetJSON(string $filename) : array {
        $this->data = [
            'filename' => $filename
        ];
        $this->json_data = json_encode($this->data);

        $this->opts = array('http' =>
            array(
                'method'  => 'GET',
                'header'  => 'Content-type: application/json',
                'content' => $this->json_data
            )
        );

        $this->context = stream_context_create($this->opts);
        $this->url = 'http://localhost:8888' . getcwd() . 'api_get_coverage.php';
        $this->result = file_get_contents($this->url, false, $this->context);
        $this->coverage1 = json_decode($this->result, true);
        return $this->coverage1;
    }
}  //end of class


function printHelp() : void {
    echo "This the PHP Test\n";
    echo "The program has the following required options: \n\n";
    echo "--make             Provide the make of the car.  Valid options are BMW and Volkswagen only!\n";
    echo "--model_year       Provide the year of the car.  Valid options are from 2019 to 2003!\n";
    echo "--issue_mileage    Provide the mileage of the car rounded to the nearest 1000 miles.\n\n";
    echo "An exmaple...\n";
    echo "php test.php --make=BMW --model_year=2015 --issue_mileage=15000\n";
}

$array1 = array('make' => '', 
                'model year' => 0,
                'issue mileage' => 0, 
                'testing coverage' => "",
                'terms' => 0,
                'miles' => 0);

//Get the command line options to run the test
$args = getopt('', array('help', 'make:', 'model_year:', 'issue_mileage:'));
$required_opts = 0;
     
if (sizeof($args) == 0) {
    printHelp();
    exit;
}

foreach ($args as $option => $value) {
    switch ($option) {
        case 'help':
            printHelp();
            exit;
        case 'make':
            if ( ($value != 'BMW') && ($value != 'Volkswagen') ) {
                echo "An invalid make was entered.  Valid makes are BMW and Volkswagen.\n";
                exit;
            } else {
                $array1['make'] = $value;
                $required_opts += 1;
            }
            break;
        case 'model_year':
            if ( ($value > 2019) || ($value < 2003) ) {
                echo "An invalid year was entered.  Valid years are from 2003 to 2019.\n";
                exit;
            } else {
                $array1['model year'] = $value;
                $required_opts += 2;
            }
            break;
        case 'issue_mileage':
            //check if the issue)mileage entered is a number.
            if (!is_numeric($value)) {
                echo "The issue_milage is not a number.\n";
                exit;
            }
            if ( ($value > 153000) || ($value < 0) ) {
                echo "No contracts are available for the mileage entered.\n";
                exit;
            } else {
                $array1['issue mileage'] = $value;
                $required_opts += 4;
            }
            break;
        default: 
            echo $option . " " . $value . "\n";
            echo "Missing a required entry.  Please try again\n\n";
            printHelp();
            exit;
    }
}

if ($required_opts != 7) {
    echo "Missing a required entry.  Please try again\n\n";
    printHelp();
    exit;
}

//Convert the $coverage array to a json file, simulate an API call in a private method to pull the json file to create the coverage array.
//the following below will create the JSCON file if it does not exist or file size is 0.
if (!file_exists($filename) || !(filesize($filename) > 0)) {
    echo "The file $filename does not exist -- Creating it now\n";
    $coverage_to_json = json_encode($coverage);
    file_put_contents($filename, $coverage_to_json);
}

//create an instance of the class
$validateCar = new Validate();  

//call the getter function to populate the coverage array from the API
//make sure the API is running using the following command...
//php -S localhost:8888 api_get_coverage.php
$coverage_array = $validateCar->GetJSONResults($filename);  


//run thru the list of coverages to determine if they fit.
for ($i=0; $i<sizeof($coverage_array); $i++) {
    $array1['testing coverage'] = $coverage_array[$i]['name'];
    $array1['terms'] = $coverage_array[$i]['terms'];
    $array1['miles'] = $coverage_array[$i]['miles'];
    $ret = $validateCar->booksOfContract($array1, $base_warranty, $years, $issue_mileage, $classes);
    
    if (sizeof($ret) == 0) {
        echo "No valid contracts available! \n";
        break;
    }






        echo $array1['make'] . "  " . $array1['model year'] . "  " . $array1['issue mileage'] . "  ";
        echo $ret[0] . "  "; 
        echo "\"". $array1['testing coverage']. "\"" . "  ";
        echo "suffix1:";
        printf("%02d", $ret[1]);
        echo "  ";
        echo "suffix2:" . $ret[2] . "  ";
        echo "RESULTS: ";
        echo ($ret[3] == 0 ? "SUCCESS" : "FAILURE") . "   ";
        $ret[3] == 0 ? "" : $validateCar->printPrettyFailArray();
        echo "\n";

$validateCar->clear();



}

//end of file
?>