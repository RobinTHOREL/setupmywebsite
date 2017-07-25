<<<<<<< HEAD
<?php 
	class Options extends BaseSql{

        protected $id;
        protected $name;
        protected $value;

        public function __construct($id=-1, $Name=null, $value=null) {
            $this->setId($id);
            $this->setName($Name);
            $this->setValue($value);

            parent::__construct();
        }

        /* Setters */
        public function setId($id) {
            $this->id=$id;
        }

        public function setName($Name) {
            $this->name=$Name;
        }

        public function setValue($value) {
            $this->value=$value;
        }

        /* Getters */
        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function getValue() {
            return $this->value;
        }
=======
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
>>>>>>> ec1c4617d20cd1c2f5c8ce841f662ef5761ef7b0
    }