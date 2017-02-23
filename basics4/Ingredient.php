<?php
/*
    $name - Название ингридиента
    $cost - Цена ингридиента

    getName() - получение названия
    getCOst() - получение цены
    setName() - задать название
    setCost() - задать цену
*/
class Ingredient 
{

    private $name;
    private $cost;

    function getName()
    {
        if (isset($this->name) && !empty($this->name)){
            $name = $this->name;
            return $name;
        }else{
            $error = 'Не существует переменной $name или она не задана';
            return $error;
        }
    }

    function getCost()
    {
        if (isset($this->cost) && !empty($this->cost)){
            $cost = $this->cost;
            return $cost;
        }else{
            $error = 'Не существует переменной $cost или она не задана';
            return $error;
        }
    }

    function setName($name)
    {
        $this->name = $name;
    }

    function setCost($cost)
    {
        $this->cost = $cost;
    }
}
