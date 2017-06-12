<?php 
	class Users extends BaseSql{

		protected $id;
		protected $firstname;
		protected $lastname;
		protected $email;
		protected $login;
		protected $password;
		protected $status;
		protected $permission;
        protected $activation_key;
		//protected $date_inserted;
		//protected $date_updated;

		public function __construct($id=-1, $email=null, $lastname=null, $firstname=null,
										$login=null, $password=null, $status=0, $permission=0,
                                        $activation_key=null, $date_inserted=null) {
			$this->setId($id);
			$this->setFirstName($firstname);
			$this->setLastName($lastname);
			$this->setEmail($email);
			$this->setLogin($login);
			$this->setPassword($password);
			$this->setStatus($status);
			$this->setPermission($permission);
            $this->setActivationKey($activation_key);
            $this->setDateInserted($date_inserted);
            //$this->setDateUpdated($date_updated);

			parent::__construct();
		}

		/* Setters */
		public function setId($id) {
			$this->id=$id;
		}

        public function setFirstName($firstname) {
            $this->firstname=trim($firstname);
        }

        public function setLastName($lastname) {
            $this->lastname=trim($lastname);
        }

		public function setEmail($email) {
			$this->email=trim($email);
		}

        public function setLogin($login) {
            $this->login=trim($login);
        }

		public function setPassword($password) {
			$this->password=password_hash($password, PASSWORD_DEFAULT);
		}

		public function setStatus($status) {
			$this->status=$status;
		}

		public function setPermission($permission) {
			$this->permission=$permission;
		}

        public function setActivationKey($activation_key) {
            $this->activation_key=$activation_key;
        }

        public function setDateInserted($date_inserted) {
            $this->date_inserted=$date_inserted;
        }

        /* Getters */
        public function getId() {
            return $this->id;
        }

        public function getFirstName() {
            return $this->firstname;
        }

        public function getLastName() {
            return $this->lastname;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getLogin() {
            return $this->login;
        }

        public function getPassword() {
            return $this->password;
        }

        public function getStatus() {
            return $this->status;
        }

        public function getPermission() {
            return $this->permission;
        }

        public function getActivationKey() {
            return $this->activation_key;
        }

        public function getDateInserted() {
            return $this->date_inserted;
        }

	}