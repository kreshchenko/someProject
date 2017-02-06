<?php 
	$hamburgerPrice = 4.95;
	$hamburgerAmount = 2;

	$milkshakePrice = 1.95;
	$milkshakeAmount = 1;
	
	$cocacolaPrice = 0.85;
	$cocacolaAmount = 1;
	
	$tax = 0.075;
	$preTax = 0.16;
	
	$totalCost = $hamburgerPrice*$hamburgerAmount + $milkshakePrice*$milkshakeAmount + $cocacolaPrice*$cocacolaAmount;
	$totalCostVsTax = $totalCost + $totalCost*$tax;
	$totalCostVsPreTax = $totalCostVsTax + $totalCostVsTax*$preTax;
	
	//Форматирование
	$totalCost = number_format($totalCost, 2, ',', '');
	$totalCostVsTax = number_format($totalCostVsTax, 2, ',', '');
	$totalCostVsPreTax = number_format($totalCostVsPreTax, 2, ',', '');
	
	echo $totalCost.' '.$totalCostVsTax.' '.$totalCostVsPreTax;