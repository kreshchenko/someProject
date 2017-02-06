<?php
class product
{
    var $name;
    var $price;
    var $amount;

    //Цена для каждого продукта
    function productCost ()
    {
        $productCost = $this->price*$this->amount;

        $productCost = number_format($productCost, 2, ',', '');

        return $productCost;
    }
}

$tax = 0.075;
$preTax = 0.16;

$hamburger = new product;
$hamburger->name = "Гамбургер";
$hamburger->price = 4.95;
$hamburger->amount = 2;

$milkshake = new product;
$milkshake->name = "Молочный коктейль";
$milkshake->price = 1.95;
$milkshake->amount = 1;

$cocacola = new product;
$cocacola->name = "Кока Кола";
$cocacola->price = 0.85;
$cocacola->amount = 1;

$totalCost = $cocacola->productCost() + $hamburger->productCost() + $milkshake->productCost();
$totalCost = number_format($totalCost, 2, ',', '');

$totalCostVsTax = $totalCost + $totalCost*$tax;
$totalCostVsTax = number_format($totalCostVsTax, 2, ',', '');

$totalCostVsPreTax = $totalCostVsTax + $totalCostVsTax*$preTax;
$totalCostVsPreTax = number_format($totalCostVsPreTax, 2, ',', '');

//Дата
$today = date("m.d.y H:i:s");
?>


<html>
        <head>
            <title>Чек</title>
            <style>
                .layer {
                    width: 200px;
                    background: WhiteSmoke;
                }
            </style>
        </head>
        <body>
            <div class = 'layer'>
                <div align="center">
                    <b>Кафе "Хрущъ"</b>
                </div>
                <br>
                <div align = center>
                    *** 
                    <br>
                    <?=$today?>
                    <br>
                    ***
                    <br>
                    <div align="left" style="width: 75%; float: left;">
                        <?=$hamburger->name?> 
                        <br>
                        <?php
                            echo $hamburger->amount.'*'.$hamburger->price;
                        ?>
                    </div>
                    <div style="width: 20%; float: right;">
                        <?=$hamburger->productCost()?>
                    </div>
                    <br>

                    <br>
                    <div align="left" style="width: 75%; float: left;">
                        <?=$milkshake->name?> 
                        <br>
                        <?php
                            echo $milkshake->amount.'*'.$milkshake->price;
                        ?>
                    </div>
                    <div style="width: 20%; float: right;">
                        <?=$milkshake->productCost()?>
                    </div>
                    <br>

                    <br>
                    <div align="left" style="width: 75%; float: left;">
                        <?=$cocacola->name?> 
                        <br>
                        <?php
                            echo $cocacola->amount.'*'.$cocacola->price;
                        ?>
                    </div>
                    <div style="width: 20%; float: right;">
                        <?=$cocacola->productCost()?>
                    </div>
                    <br><br>
                    ***
                    <br>
                    Налог: <?=$tax*100?>%
                    Чаевые: <?=$preTax*100?>%

                    ВСЕГО: <?=$totalCostVsPreTax?> 
                </div>

            </div>
        </body>
</html>