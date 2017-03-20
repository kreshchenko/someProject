<?php

require_once '../vendor/autoload.php';
require_once 'Rss.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;


$db = new PDO("mysql:host=localhost;dbname=sg_news;", "dbuser", "123");

$sql = "INSERT IGNORE INTO news (title, link, description, pub_date, flag) VALUES (?, ?, ?, ?, ?)";

$stmt = $db->prepare($sql);

$feed = new SimplePie();

$rss = new Rss(); 
$feedUrls = $rss->arrRss();//Масив со всеми RSS

$feed->set_feed_url($feedUrls);//https://rss.unian.net/site/news_rus.rss
$feed->enable_cache(false);
$feed->init();

$items = $feed->get_items();

$count2 = 0;
foreach ($items as $item){
    $stmt->execute([
        $item->get_title(),
        $item->get_feed()->get_link(),
        strip_tags($item->get_description()),
        $item->get_date("Y-m-d H-i-s"),
        1,
    ]);
    $count2++;
}

$count = $stmt->rowCount();

$log = new Logger('sg_news');
$log->pushHandler(new StreamHandler('../logs/sg_news.log', Logger::DEBUG));

$log->info($count2.'Добавлено в БД: '.$count.' записей');