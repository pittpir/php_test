# PHP Developer Test 17

### Basic Instructions

Write a class which will validate if a vehicle can carry any of the warranty coverages in the $coverage array


# How To Execute Tests

### Start API

**NOTE: The API must be started prior to running the main program!!!**

Start the API prior to running the main application.  The API iinvoke the server on the localhost at port 8888.  The program is called api_get_coverage.php.  It uses PHP mini webserver to host the API.  The API can be launched by running this command... 

```
php -S localhost:8888 api_get_coverage.php
```

### Main Program

NOTE: The program will create the coverage_array JSON file if the file does not exist.  This is to simulate an API call per the instructions.

test.php is the main program which will determine if a vehicle can carry any of the warranty coverages from the $coverage array.  The program is invoked by using some command line paramters.  You must supply the required command line arguements in order for it to execute properly.  To see a help screen just issue the following command...

```
php test.php --help
```

and it will output...

```
This the PHP Test
The program has the following required options: 

--make             Provide the make of the car.  Valid options are BMW and Volkswagen only!
--model_year       Provide the year of the car.  Valid options are from 2019 to 2003!
--issue_mileage    Provide the mileage of the car rounded to the nearest 1000 miles.

An exmaple...
php test.php --make=BMW --model_year=2015 --issue_mileage=15000
```

Below are some examples of an input and output...

#### Input 1

```
php test.php --make=Volkswagen --model_year=2012 --issue_mileage=90000
```

#### Output 1

```
Volkswagen  2012  90000  USED  "3 Months/3,000 Miles"  suffix1:06  suffix2:A  RESULTS: SUCCESS   
Volkswagen  2012  90000  USED  "6 Months/12,000 Miles"  suffix1:06  suffix2:A  RESULTS: SUCCESS   
Volkswagen  2012  90000  USED  "12 Months/24,000 Miles"  suffix1:06  suffix2:A  RESULTS: SUCCESS   
Volkswagen  2012  90000  USED  "24 Months/30,000 Miles"  suffix1:06  suffix2:A  RESULTS: SUCCESS   
Volkswagen  2012  90000  USED  "24 Months/36,000 Miles"  suffix1:06  suffix2:A  RESULTS: SUCCESS   
Volkswagen  2012  90000  USED  "36 Months/36,000 Miles"  suffix1:06  suffix2:A  RESULTS: SUCCESS   
Volkswagen  2012  90000  USED  "36 Months/45,000 Miles"  suffix1:06  suffix2:A  RESULTS: SUCCESS   
Volkswagen  2012  90000  USED  "36 Months/50,000 Miles"  suffix1:06  suffix2:A  RESULTS: SUCCESS   
Volkswagen  2012  90000  USED  "48 Months/50,000 Miles"  suffix1:06  suffix2:A  RESULTS: SUCCESS   
Volkswagen  2012  90000  USED  "48 Months/60,000 Miles"  suffix1:06  suffix2:A  RESULTS: SUCCESS   
Volkswagen  2012  90000  USED  "60 Months/72,000 Miles"  suffix1:06  suffix2:A  RESULTS: FAILURE   Mileage greater than 153000 before contract ends   
Volkswagen  2012  90000  USED  "60 Months/75,000 Miles"  suffix1:06  suffix2:A  RESULTS: FAILURE   Mileage greater than 153000 before contract ends   
Volkswagen  2012  90000  USED  "72 Months/100,000 Miles"  suffix1:06  suffix2:A  RESULTS: FAILURE   Mileage greater than 153000 before contract ends   
Volkswagen  2012  90000  USED  "84 Months/84,000 Miles"  suffix1:06  suffix2:A  RESULTS: FAILURE   Mileage greater than 153000 before contract ends   Term greater than 147 months   
Volkswagen  2012  90000  USED  "84 Months/96,000 Miles"  suffix1:06  suffix2:A  RESULTS: FAILURE   Mileage greater than 153000 before contract ends   Term greater than 147 months   
Volkswagen  2012  90000  USED  "100 Months/100,000 Miles"  suffix1:06  suffix2:A  RESULTS: FAILURE   Mileage greater than 153000 before contract ends   Term greater than 147 months   
Volkswagen  2012  90000  USED  "100 Months/120,000 Miles"  suffix1:06  suffix2:A  RESULTS: FAILURE   Mileage greater than 153000 before contract ends   Term greater than 147 months   
Volkswagen  2012  90000  USED  "120 Months/120,000 Miles"  suffix1:06  suffix2:A  RESULTS: FAILURE   Mileage greater than 153000 before contract ends   Term greater than 147 months 
```

#### Input 2
```
php test.php --make=Volkswagen --model_year=2006 --issue_mileage=90000
```

#### Output 2

```
No valid contracts available!
```

#### Input 3

```
php test.php --make=BMW --model_year=2018 --issue_mileage=1000
```

#### Output 3

```
BMW  2018  1000  NEW  "3 Months/3,000 Miles"  suffix1:00  suffix2:A  RESULTS: FAILURE   Miles expires before base warranty   Term expires before base warranty   
BMW  2018  1000  NEW  "6 Months/12,000 Miles"  suffix1:00  suffix2:A  RESULTS: FAILURE   Miles expires before base warranty   Term expires before base warranty   
BMW  2018  1000  NEW  "12 Months/24,000 Miles"  suffix1:00  suffix2:A  RESULTS: FAILURE   Miles expires before base warranty   Term expires before base warranty   
BMW  2018  1000  NEW  "24 Months/30,000 Miles"  suffix1:00  suffix2:A  RESULTS: FAILURE   Miles expires before base warranty   Term expires before base warranty   
BMW  2018  1000  NEW  "24 Months/36,000 Miles"  suffix1:00  suffix2:A  RESULTS: FAILURE   Miles expires before base warranty   Term expires before base warranty   
BMW  2018  1000  NEW  "36 Months/36,000 Miles"  suffix1:00  suffix2:A  RESULTS: FAILURE   Miles expires before base warranty   
BMW  2018  1000  NEW  "36 Months/45,000 Miles"  suffix1:00  suffix2:A  RESULTS: FAILURE   Miles expires before base warranty   
BMW  2018  1000  NEW  "36 Months/50,000 Miles"  suffix1:00  suffix2:A  RESULTS: SUCCESS   
BMW  2018  1000  NEW  "48 Months/50,000 Miles"  suffix1:00  suffix2:A  RESULTS: SUCCESS   
BMW  2018  1000  NEW  "48 Months/60,000 Miles"  suffix1:00  suffix2:A  RESULTS: SUCCESS   
BMW  2018  1000  NEW  "60 Months/72,000 Miles"  suffix1:00  suffix2:A  RESULTS: SUCCESS   
BMW  2018  1000  NEW  "60 Months/75,000 Miles"  suffix1:00  suffix2:A  RESULTS: SUCCESS   
BMW  2018  1000  NEW  "72 Months/100,000 Miles"  suffix1:00  suffix2:A  RESULTS: SUCCESS   
BMW  2018  1000  NEW  "84 Months/84,000 Miles"  suffix1:00  suffix2:A  RESULTS: SUCCESS   
BMW  2018  1000  NEW  "84 Months/96,000 Miles"  suffix1:00  suffix2:A  RESULTS: SUCCESS   
BMW  2018  1000  NEW  "100 Months/100,000 Miles"  suffix1:00  suffix2:A  RESULTS: SUCCESS   
BMW  2018  1000  NEW  "100 Months/120,000 Miles"  suffix1:00  suffix2:A  RESULTS: SUCCESS   
BMW  2018  1000  NEW  "120 Months/120,000 Miles"  suffix1:00  suffix2:A  RESULTS: SUCCESS
```

#### Input 4

```
php test.php --make=BMW --model_year=2010 --issue_mileage=45000
```

### Output 4

```
BMW  2010  45000  USED  "3 Months/3,000 Miles"  suffix1:08  suffix2:A  RESULTS: SUCCESS   
BMW  2010  45000  USED  "6 Months/12,000 Miles"  suffix1:08  suffix2:A  RESULTS: SUCCESS   
BMW  2010  45000  USED  "12 Months/24,000 Miles"  suffix1:08  suffix2:A  RESULTS: SUCCESS   
BMW  2010  45000  USED  "24 Months/30,000 Miles"  suffix1:08  suffix2:A  RESULTS: SUCCESS   
BMW  2010  45000  USED  "24 Months/36,000 Miles"  suffix1:08  suffix2:A  RESULTS: SUCCESS   
BMW  2010  45000  USED  "36 Months/36,000 Miles"  suffix1:08  suffix2:A  RESULTS: SUCCESS   
BMW  2010  45000  USED  "36 Months/45,000 Miles"  suffix1:08  suffix2:A  RESULTS: SUCCESS   
BMW  2010  45000  USED  "36 Months/50,000 Miles"  suffix1:08  suffix2:A  RESULTS: SUCCESS   
BMW  2010  45000  USED  "48 Months/50,000 Miles"  suffix1:08  suffix2:A  RESULTS: SUCCESS   
BMW  2010  45000  USED  "48 Months/60,000 Miles"  suffix1:08  suffix2:A  RESULTS: SUCCESS   
BMW  2010  45000  USED  "60 Months/72,000 Miles"  suffix1:08  suffix2:A  RESULTS: FAILURE   Term greater than 147 months   
BMW  2010  45000  USED  "60 Months/75,000 Miles"  suffix1:08  suffix2:A  RESULTS: FAILURE   Term greater than 147 months   
BMW  2010  45000  USED  "72 Months/100,000 Miles"  suffix1:08  suffix2:A  RESULTS: FAILURE   Term greater than 147 months   
BMW  2010  45000  USED  "84 Months/84,000 Miles"  suffix1:08  suffix2:A  RESULTS: FAILURE   Term greater than 147 months   
BMW  2010  45000  USED  "84 Months/96,000 Miles"  suffix1:08  suffix2:A  RESULTS: FAILURE   Term greater than 147 months   
BMW  2010  45000  USED  "100 Months/100,000 Miles"  suffix1:08  suffix2:A  RESULTS: FAILURE   Term greater than 147 months   
BMW  2010  45000  USED  "100 Months/120,000 Miles"  suffix1:08  suffix2:A  RESULTS: FAILURE   Mileage greater than 153000 before contract ends   Term greater than 147 months   
BMW  2010  45000  USED  "120 Months/120,000 Miles"  suffix1:08  suffix2:A  RESULTS: FAILURE   Mileage greater than 153000 before contract ends   Term greater than 147 months
```

#Unit Testing

TBD

