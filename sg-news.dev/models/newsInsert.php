<?php

require_once '../vendor/autoload.php';

$db = new PDO("mysql:host=localhost;dbname=sg_news;", "dbuser", "123");

$sql = "INSERT INTO news (title, link, description, source, pub_date) VALUES (?, ?, ?, ?, ?)";

$stmt = $db->prepare($sql);

$feed = new SimplePie();
$feed->set_feed_url('https://rss.unian.net/site/news_ukr.rss');
$feed->enable_cache(false);
$feed->init();

$items = $feed->get_items();

foreach ($items as $item){
    $stmt->execute([
        $item->get_title(),
        $item->get_link(),
        strip_tags($item->get_description()),
        $item->get_source(),
        $item->get_date("Y-m-d H:i:s"),
    ]);
}