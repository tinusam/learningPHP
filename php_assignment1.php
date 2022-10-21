<?php 
    namespace Assignement;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment</title>
</head>

<body>
    <?php

    trait companyperks
    {
        public function perks()
        {
            return " Fun at work, sports, food festival, etc.";
        }
    }
    


    class Company
    {
        private $companyname;
        private $companysize;
        private $activeyears;
        use companyperks;


        function __construct($name, $size, $years)
        {
            $this->companyname = $name;
            $this->companysize = $size;
            $this->activeyears = $years;
        }

        public function company_name()
        {
            return $this->companyname;
        }

        protected function company_size()
        {
            return $this->companysize;
        }

        private function active_years()
        {
            return $this->activeyears;
        }
        
        public function display()
        {
            echo "[company] => " . $this->company_name();
            echo "[companySize] => " . $this->company_size();
            echo "[activeYears] => " . $this->active_years();
            echo "[companyPerks] =>" . $this->perks();
        }
    }


    interface Bonus
    {
        public function calculateBonus();
    }

    class Employee extends Company implements Bonus
    {
        public $experience;
        public $bonus;
        public $employeename;

        function __construct($employeename, $experience, $cname, $size, $years)
        {
            $this->employeename = $employeename;
            $this->experience = $experience;
            parent::__construct($cname, $size, $years);
        }

        public function calculateBonus()
        {
            if ($this->experience < 5) {
                $this->bonus = $this->experience * 1000;
            } else if ($this->experience < 10) {
                $this->bonus = $this->experience * 2000;
            } else {
                $this->bonus = $this->experience * 3000;
            }
        }
        
        public function display()
        {
            echo "[empName] => $this->employeename";
            parent::display();
            echo "[companyExpBonus] => $this->bonus";
        }
    }

    $emp_list = ['0'=>['name'=>'Alex',
                'experience'=>2],
        '1'=>['name'=>'John',
                'experience'=>5],
        '2'=>['name'=>'Tom',
                'experience'=>10],
        '3'=>['name'=>'Paul', 
                'experience'=>15]
    ];

    $emps = array();

    foreach($emp_list as $emp){
        array_push($emps, new Employee(
            $emp['name'],
            $emp['experience'],
            'InApp Information Technologies',
            '400+',
            22
        ));
    }


    foreach($emps as $emp ){
        $emp->calculateBonus();
    }

    echo "Array([finalArr] => Array(";

    foreach($emps as  $key => $emp){
        echo "[$key]=>Array(";
        $emp->display();
    }

    echo ")[nameSpace] => " . __NAMESPACE__ . ")";

    ?>
</body>

</html>