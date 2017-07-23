<?php 
	class Posts extends BaseSql{

        protected $id;
        protected $users_id;
        protected $pages_id;
        protected $title;
        protected $content;
        protected $description;
        protected $show_date;

        public function __construct($id=-1, $users_id=0, $pages_id=0, $title=null,
                                        $content=null, $description=null, $show_date=null) {
			$this->setId($id);
			$this->setUsersId($users_id);
			$this->setPagesId($pages_id);
			$this->setTitle($title);
			$this->setContent($content);
			$this->setDescription($description);
			$this->setShowDate($show_date);

			parent::__construct();
		}

		/* Setters */
		public function setId($id) {
			$this->id=$id;
		}

        public function setPagesId($pages_id) {
            $this->pages_id=$pages_id;
        }

        public function setUsersId($users_id) {
            $this->users_id=$users_id;
        }

        public function setTitle($title) {
            $this->title=trim($title);
        }

        public function setContent($content) {
            $this->content=$content;
        }
        
        public function setDescription($description) {
            $this->description=$description;
        }

        public function setShowDate($show_date) {
            $this->show_date=$show_date;
        }



        /* Getters */
        public function getId() {
            return $this->id;
        }

        public function getPagesId() {
            return $this->pages_id;
        }

        public function getUsersId() {
            return $this->users_id;
        }

        public function getTitle() {
            return $this->title;
        }
        
        public function getContent() {
            return $this->content;
        }

        public function getDescription() {
            return $this->description;
        }

        public function getShowDate() {
            return $this->show_date;
        }
    }
