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

            $db = new PDO("mysql:host=localhost;dbname=sg_news;", "dbuser", "123");
            $sql = "UPDATE rss SET flag = 0 WHERE rssId = $id";
            $stmt = $db->prepare($sql);
            $stmt->execute();
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

            $rss = $result->fetchAll(PDO::FETCH_COLUMN);
            
            return $rss;
        }

    }