<?php 
	class Posts extends BaseSql{

        protected $id;
        protected $users_id;
        protected $pages_id;
        //protected $id_parent;
        protected $name;
        protected $description;
        protected $title;
        protected $content;

		public function __construct($id=-1, $id_pages=0, /*$id_parent=0,*/ $id_author=0, $name=null,
                                        $description=null, $title=null, $content=null) {
			$this->setId($id);
			$this->setPagesId($id_pages);
            //$this->setIdParent($id_parent);
            $this->setUsersId($id_author);
            $this->setName($name);
			$this->setDescription($description);
            $this->setTitle($title);
            $this->setContent($content);

			parent::__construct();
		}

		/* Setters */
		public function setId($id) {
			$this->id=$id;
		}

        public function setPagesId($pages_id) {
            $this->pages_id=$pages_id;
        }

        public function setIdParent($id_parent) {
            $this->id_parent=$id_parent;
        }

        public function setUsersId($users_id) {
            $this->users_id=$users_id;
        }

        public function setName($name) {
            $this->name=trim($name);
        }

        public function setDescription($description) {
            $this->description=$description;
        }

		public function setTitle($title) {
			$this->title=trim($title);
		}

        public function setContent($content) {
            $this->content=$content;
        }

        /* Getters */
        public function getId() {
            return $this->id;
        }

        public function getPagesId() {
            return $this->pages_id;
        }

        public function getIdParent() {
            return $this->id_parent;
        }

        public function getUsersId() {
            return $this->users_id;
        }

        public function getName() {
            return $this->name;
        }

        public function getDescription() {
            return $this->description;
        }

        public function getTitle() {
            return $this->title;
        }

        public function getContent() {
            return $this->content;
        }

	}