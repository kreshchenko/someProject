<?php
    class RSS
    {
        //Добавление ссылки на ресурс в БД
        public static function addRss($request)
        {     
            $post = $request->request->all();

            $db = new PDO("mysql:host=localhost;dbname=sg_news;", "dbuser", "123");

            $sql = "INSERT IGNORE INTO rss (name, link) VALUES (?, ?)";

            $stmt = $db->prepare($sql);
            $stmt->execute([
                    $post['name'],
                    $post['rssUrl'],
                ]);
            header('Location:/cabinet/');
        }

        //Удаления Рсс
        public static function deleteRss($id)
        {
            
            $db = new PDO("mysql:host=localhost;dbname=sg_news;", "dbuser", "123");
            $sql = "DELETE FROM rss WHERE id = $id";
            $db->exec($sql);
        }

        //Получить список всех ресурсов
        public static function listRss()
        {
            $db = new PDO("mysql:host=localhost;dbname=sg_news;", "dbuser", "123");

            $sql = 'SELECT * 
                    FROM rss';
            $result = $db->prepare($sql);

            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            $i=0;
            $rss = [];
            while ($row = $result->fetch()){
                $rss[$i]['name'] = $row['name'];
                $rss[$i]['link'] = $row['link'];
                $i++; 
            } 
            return $rss;
        }

        //Массив ссыок на все ресурсы для set_feed_url;
        public static function arrRss()
        {
            $db = new PDO("mysql:host=localhost;dbname=sg_news;", "dbuser", "123");

            $sql = 'SELECT link 
                    FROM rss';
            $result = $db->prepare($sql);

            $result->execute();

            $i=0;
            $rss = [];
            while ($row = $result->fetch()){
                $rss[$i] = $row;
                $i++; 
            } 
            return $rss;
        }
    }