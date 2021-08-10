<?php

class  Company{

    public string $asset;
    public $presentObj;
    public $percentageObj;
        public function __construct(string $asset,$present,$percentage)
        {
            $this->asset =$asset;
            //By this Coupling we can access the child class property (this a type o dependency injection)
            $this->presentObj =new Employee($present);
            $this->percentageObj =new shareHolder($percentage);
        }


}


class Employee extends Company{

        public $present;

        public function __construct($present)
        {
            $this->present=$present;
        }

        public function showPresent (){
        
            echo "show All Employee present list";
        }

}

class shareHolder extends Company{

    public $percentage;
    public function __construct($percentage)
    {
        $this->percentage =$percentage;
    }
}

//have to mention all parent parameter
$company =New Company("value", 25,10);

$company->$presentObj->showPresent();

