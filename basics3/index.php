<?php

$citiesAndPopulation = 
[
	'New York, NY' => 8175133,
	'Los Angeles, CA' => 3792621,
	'Chicago, IL' => 2695598,
	'Houston, TX' => 2100263,
	'Philadelphia, PA' => 1526006,
	'Phoenix, AZ' => 1445632,
	'San Antonio, TX' => 1327407,
	'San Diego, CA' => 1307402,
	'Dallas, TX' => 945942,
];

//Cортируем в порядке увелечения населения
//asort($citiesAndPopulation);

//Сортируем в порядке уменьшения населения
//arsort($citiesAndPopulation);

//Cортируем по ключу по возрастанию алфавита
//ksort($citiesAndPopulation);

//Cортируем по ключу в обратном порядке алфавита
//krsort($citiesAndPopulation);

foreach ($citiesAndPopulation as $key => $value)
{
	printf ("%-20s %d \n",$key,$value);	
	$strtmp[] = $key.', '.$value;//создаем строку, для создания нового массива
}

//Cоздание и вывод массива с метками штатов
foreach($strtmp as $value)
{
	$newCitiesAndPopulation = explode(', ', $value);
	$arr[] = $newCitiesAndPopulation;
	printf("%-17s %-2s %d \n",$newCitiesAndPopulation[0],$newCitiesAndPopulation[1],$newCitiesAndPopulation[2]);
}

$stateArr = [];//Массив для штатов и населения stateName => population

foreach ($arr as $value)
{
	if (!array_key_exists($value[1],$stateArr))
	{
		$stateArr += [$value[1] => $value[2]];
	}
	else 
	{
		$stateArr[$value[1]] += $value[2]; 
	}
}

asort($stateArr);

foreach ($stateArr as $key => $value)
{
	printf ("%-3s %d \n",$key,$value);
}