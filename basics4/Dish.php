<?php
/*
    $name - название блюда
    $ingredients - масив который будет хранить обьекты всех ингредиентов блюда
    productSum() - функция, которая возвращаеться сумму всех ингридиентов блюда
    getAllIngredients() - функция, которая возвращает список всех ингридиентов
*/

class Dish
{

    public $name = 'Snake';//Название блюда
    private $ingredients;

    function __construct($ingredients)
    {
        //Проверяем или мы получили обьекты класа Ингрилиент
        foreach ($ingredients as $ing){
            if ($ing instanceof Ingredient){
                $this->ingredients[] = $ing;
            }    
        }
    }

    function productSum()
    {
        $sum = 0;
        if (isset($this->ingredients)){
            foreach ($this->ingredients as $ing)
            {
                $sum += $ing->getCost();
            }
            return $sum;   
        } else {
            return 'Нету ниодного ингридиента для блюда';
        }
    }

    function getAllIngredients()
    {
        echo 'Блюдо:'.$this->name.PHP_EOL.'Ингридиенты:'.PHP_EOL;
        foreach ($this->ingredients as $ing)
            {
                echo $ing->getName().PHP_EOL;
            }
    }

    function setName($name)
    {
        $this->name = $name;
    }
}