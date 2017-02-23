<?php
//Класс "Ингридиент"
require_once('Ingredient.php');


//Ингредиенты
$mayo = new Ingredient;
$mayo->setName('Майонез');
$mayo->setCost(12.55);

$pepper = new Ingredient;
$pepper->setName('Черный перец горошком');
$pepper->setCost(0.12);

$green_papper = new Ingredient;
$green_papper->setName('Зеленый горошек');
$green_papper->setCost(21);

$potato = new Ingredient;
$potato->setName('Картофанчик');
$potato->setCost(3.50);

$sausage = new Ingredient;
$sausage->setName('Колбаса');
$sausage->setCost(110);

$cucumber = new Ingredient;
$cucumber->setName('Огурец');
$cucumber->setCost(38);

$eggs = new Ingredient; 
$eggs->setName('Яйца');
$eggs->setCost(17);

$crabs = new Ingredient;
$crabs->setName('Крабовое мясо');
$crabs->setCost(86);

$corn = new Ingredient;
$corn->setName('Кукуруза');
$corn->setCost(25);

//конец ингридиенты