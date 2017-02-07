<?php

    class FahrenheitToCelsius{

    public $start;
    public $end;
    public $step;

        function convertWhile() 
        {
            while ($this->start <= $this->end)
            {
                $celsium = ($this->start - 32)*5/9;
                $celsium = number_format($celsium, 2, ',','');
                echo $this->start." &deg;F -> ".$celsium." &deg;C".PHP_EOL;
                $this->start += $this->step;
            }
        }//end function convert

        function convertFor()
        {
            for ($this->start; $this->start <= $this->end; $this->start += $this->step)
            {
                $celsium = ($this->start - 32)*5/9;
                $celsium = number_format($celsium, 2, ',','');
                echo $this->start." &deg;F -> ".$celsium." &deg;C".PHP_EOL;
            }
        }//end function convertFor

    }//end class FahrenheitToCelsius

    class CelsiumToFahrenheit{
        
        public $start;
        public $end;
        public $step;

        function convertWhile()
        {
            while ($this->start <= $this->end)
            {
                $fahrenheit = ($this->start*9/5)+32;
                $fahrenheit = number_format($fahrenheit, 2, ',','');
                echo $this->start." &deg;C -> ".$fahrenheit." &deg;F".PHP_EOL;
                $this->start += $this->step;
            }
        }//end function convertWhile

        function convertFor()
        {
             for ($this->start; $this->start <= $this->end; $this->start += $this->step)
            {
                $fahrenheit = ($this->start - 32)*5/9;
                $fahrenheit = number_format($fahrenheit, 2, ',','');
                echo $this->start." &deg;F -> ".$fahrenheit." &deg;C".PHP_EOL;
            }
        }

    }//end class CelsiumToFahrenheit




    $fahrenheitToCelsius = new FahrenheitToCelsius;
    $fahrenheitToCelsius->start = -50;
    $fahrenheitToCelsius->end = 50;
    $fahrenheitToCelsius->step = 5;

    $celsiumToFahrenheit = new CelsiumToFahrenheit;
    $celsiumToFahrenheit->start = 0;
    $celsiumToFahrenheit->end = 100;
    $celsiumToFahrenheit->step = 1;
    

    echo '<pre>';
    $fahrenheitToCelsius->convertWhile(); 
    //$fahrenheitToCelsius->convertFor();    
    //$celsiumToFahrenheit->convertWhile();
    //$celsiumToFahrenheit->convertFor();
    echo '</pre>';