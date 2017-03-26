<?php 

    namespace App\Model;

    class SourceEntity
    {
        protected $id;
        protected $name;
        protected $sourceLink;
        protected $rssFeedLink;
        protected $isActive;

        public function __construct(array $data)
        {
            if (isset($data['id'])){
                $this->id = $data['id'];
            }

            $this->name = $data['name'];
            $this->sourceLink = $data['sourceLink'];
            $this->rssFeedLink = $data['rssFeedLink'];
            $this->isActive = $data['isActive'] ? true : false;
        }

        public function getId(){
            return $this->id;
        }

        public function getName(){
            return $this->name;
        }

        public function getSourceLink(){
            return $this->sourceLink;
        }

        public function getRssFeedLink(){
            return $this->RssFeedLink;
        }

        public function getIsActive(){
            return $this->isActive;
        }
    }