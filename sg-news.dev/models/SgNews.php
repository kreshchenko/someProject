<?php
    class SgNews
    {
        public static function getNews()
        {
            $db = new PDO("mysql:host=localhost;dbname=sg_news;", "dbuser", "123");

            $sql = "SELECT * FROM news ORDER BY id DESC";
            $result = $db->prepare($sql);

            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            $i=0;
            $news = [];
            while ($row = $result->fetch()){
                $news[$i]['title'] = $row['title'];
                $news[$i]['description'] = $row['description'];
                $news[$i]['link'] = $row['link'];
                $news[$i]['source'] = $row['source'];
                $news[$i]['pub_date'] = $row['pub_date'];
                $i++; 
            } 
            return $news;
        }
    }