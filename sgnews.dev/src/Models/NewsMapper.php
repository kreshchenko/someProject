<?php

    namespace App\Model;

    use App\Model\Mapper;
    use App\Model\NewsEntity;

    class NewsMapper extends Mapper
    {
        public function getNews(){
            
            $sql = "SELECT *
                    FROM news
                    ORDER BY id";
            
            $stmt = $this->db->query($sql);

            $i=0;
            $news = [];
            while ($row = $stmt->fetch()){
                $news[$i]['title'] = $row['title'];
                $news[$i]['link'] = $row['link'];
                $news[$i]['description'] = $row['description'];
                $news[$i]['pub_date'] = $row['pub_date'];
                $i++;
            }
            
            return $news;
        }

        public function save($news)
        {
            $sql = "INSERT IGNORE INTO news 
                    (title, link, description, pub_date)
                    VALUES (?,?,?,?)";

            $stmt = $this->db->prepare($sql);

            $stmt->execute([
                $news->getTitle(),
                $news->getLink(),
                $news->getDescription(),
                $news->getPubDate(),
            ]);
        }
    }