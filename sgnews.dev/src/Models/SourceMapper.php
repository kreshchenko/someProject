<?php

    namespace App\Model;

    use App\Model\Mapper;
    use App\Model\SourceEntity;

    class SourceMapper extends Mapper
    {
        public function getSources()
        {
             $sql = "SELECT *
                    FROM rss";
            
            $stmt = $this->db->query($sql);

            $i=0;
            $feeds = [];
            while ($row = $stmt->fetch()){
                $feeds[$i]['link'] = $row['link'];
                $i++;
            }
            
            return $feeds;
        }
    


    public static function getSourceById($id)
    {
        $sql = "SELECT * FROM rss WHERE id = $id LIMIT 1";

        $stmt = $this->db->query($sql);

        return $stmt;
    }

    public function save(SourceEntity $source)
    {
        $sql = "INSERT IGNORE INTO rss 
                    (name, sourceLink)
                    VALUES (?,?)";

            $stmt = $this->db->prepare($sql);

            $stmt->execute([
                'juik',
                'ssss',
            ]);
    }
}