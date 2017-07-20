<?php 
	class Options extends BaseSql{

        protected $id;
        protected $title;
        protected $footer;
        protected $sidebar;


        public function __construct($id=-1, $title=null, $footer=null, $sidebar=null) {
            $this->setId($id);
            $this->setTitle($title);
            $this->setFooter($footer);
            $this->setSidebar($sidebar);
            parent::__construct();
        }

        /* Setters */
        public function setId($id) {
            $this->id=$id;
        }


        public function setTitle($title) {
            $this->title=$title;
        }

        public function setFooter($footer) {
            $this->footer=$footer;
        }

        public function setSidebar($sidebar) {
            $this->sidebar=$sidebar;
        }
        /* Getters */
        public function getId() {
            return $this->id;
        }

        public function getTitle() {
            return $this->title;
        }

        public function getFooter() {
            return $this->footer;
        }

        public function getSidebar() {
            return $this->sidebar;
        }
    }