<?php 
	class RssFeeds extends BaseSql{

        protected $id;
        protected $id_category;
        protected $id_author;
        protected $name;
        protected $description;
        protected $type;
        protected $option;
        protected $link;
        protected $active;
        protected $date_created;


		public function __construct($id=-1, $id_category=0, $id_author=0, $name=null,
                                        $description=null, $type=null, $option=null, $link=null,
                                        $active=0, $date_created=null) {
			$this->setId($id);
            $this->setIdCategory($id_category);
            $this->setIdAuthor($id_author);
            $this->setName($name);
            $this->setDescription($description);
            $this->setType($type);
            $this->setOption($option);
            $this->setLink($link);
            $this->setActive($active);
            $this->setDateCreated($date_created);

			parent::__construct();
		}

		/* Setters */
		public function setId($id) {
			$this->id=$id;
		}

        public function setIdCategory($id_category) {
            $this->id_category=$id_category;
        }

        public function setIdAuthor($id_author) {
            $this->id_author=$id_author;
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

        public function setActive($active) {
            $this->active=$active;
        }

        public function setDateCreated($date_created) {
            $this->date_created=$date_created;
        }

        /* Getters */
        public function getId() {
            return $this->id;
        }

        public function getIdCategory() {
            $this->id_category;
        }

        public function getIdAuthor() {
            return $this->id_author;
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

        public function getActive() {
            return $this->active;
        }

        public function getDateCreated() {
            return $this->date_created;
        }
	}