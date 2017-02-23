<?php

/*
spl_autoload_register(function ($class_name){
    include $class_name . '.php';
});
*/

//Все ингридиенты
include_once('ingredients.php');
//Класс "Блюдо"
require_once('Dish.php');

//Блюдо змейка (майоне + 2 черного перца горошком)
$ingredients = [
    $mayo,
    $pepper,
];
$dish1 = new Dish($ingredients);
$dish1->setName('Cалат "Змейка"');

//Блюдо "Оливье" (майонез, зеленый горошек, огурцы, колбаса...)
$ingredients = [
    $mayo,
    $green_papper,
    $potato,
    $sausage,
    $cucumber,
    $eggs,
];
$dish2 = new Dish($ingredients);
$dish2->setName('Салат "Оливье"');

//Блюдо "Салат Крабовый"
$ingredients = [
    $eggs,
    $mayo,
    $crabs,
    $corn,
];
$dish3 = new Dish($ingredients);
$dish3->setName('Салат "Крабовый"');


$dish2->getAllIngredients();
echo 'Цена:'.$dish2->productSum();