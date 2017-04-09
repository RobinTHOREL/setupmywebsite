<?php 
	class RssFeeds extends BaseSql{

        protected $id;
        protected $id_category;
        protected $name;
        protected $description;
        protected $type;
        protected $option;
        protected $link;


		public function __construct($id=-1, $id_category=0, $name=null, $description=null,
                                        $type=null, $option=null, $link=null) {
			$this->setId($id);
            $this->setIdCategory($id_category);
            $this->setName($name);
            $this->setDescription($description);
            $this->setType($type);
            $this->setOption($option);
            $this->setLink($link);


			parent::__construct();
		}

		/* Setters */
		public function setId($id) {
			$this->id=$id;
		}

        public function setIdCategory($id_category) {
            $this->id_category=$id_category;
        }

        public function setName($name) {
            $this->name=trim($name);
        }

        public function setDescription($description) {
            $this->description=trim($description);
        }

        public function setType($type) {
            $this->type=$type;
        }

        public function setOption($option) {
            $this->option=$option;
        }

        public function setLink($link) {
            $this->link=$link;
        }

        /* Getters */
        public function getId() {
            return $this->id;
        }

        public function getIdCategory() {
            $this->id_category;
        }

        public function getName() {
            return $this->name;
        }

        public function getDescription() {
            return $this->description;
        }

        public function getType() {
            $this->type;
        }

        public function getOption() {
            $this->option;
        }

        public function getLink() {
            $this->link;
        }
	}