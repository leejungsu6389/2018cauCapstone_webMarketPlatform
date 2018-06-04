<?php

	/* ============================================ */
	/* User Class */
	class User {

		private $id;
		private $pswd;
		private $date;
		private $name;
		private $zipCode;
		private $address;
		private $email;
		private $telNum;
		private $point;


		/* constructor */
		function __constructor(){
						
		}
    
  
		/* setter */
		public function setID($input){
			$this->id = $input;
		}
    
		public function setPswd($input){
			$this->pswd = $input;
		}
    
		public function setDate($input){
			$this->date = $input;
		}
    
		public function setName($input){
			$this->name = $input;
		}
    
		public function setZipCode($input){
			$this->zipCode = $input;
		}
    
		public function setAddress($input){
			$this->address = $input;
		}
    
		public function setEmail($input){
			$this->email = $input;
		}
    
		public function setTelNum($input){
			$this->telNum = $input;
		}
    
  		public function setPoint($input){
			$this->point = $input;
		}
    
    
		/* getter */
		public function getID(){
			return $this->id;
		}

		public function getPswd(){
			return $this->pswd;
		}
		
		public function getDate(){
			return $this->date;
		}
		
		public function getName(){
			return $this->name;
		}
		
		public function getZipCode(){
			return $this->zipCode;
		}
		
		public function getAddress(){
			return $this->address;
		}
		
		public function getEmail(){
			return $this->email;
		}
		
		public function getTelNum(){
			return $this->telNum;
		}
		
		public function getPoint(){
			return $this->point;
		}
	
	}





	/* ============================================ */
	/* admin Class */

	class Admin {

		private $id;
		private $pswd;
		private $authority;
		
    
    function __constructor(){
						
		}
    
 
		public function setID($input){
			$this->id = $input;
		}
    
		public function setPswd($input){
			$this->pswd = $input;
		}
    
		public function setAuthority($input){
			$this->authority = $input;
		}
    
		
		public function getId(){
			return $this->id;
		}

		public function getPswd(){
			return $this->pswd;
		}
		
		public function getAuthority(){
			return $this->authority;
		}	
	}



	/* ============================================ */
	/* Item Class */

	class Item {

		private $itemID;
		private $itemName;
		private $price;
		private $category;
		private $company;
		private $description;
		private $description2;
		private $description3;
		private $img;
	

    function __constructor(){
						
		}
    
    
    public function setItemID($input){
			$this->itemID = $input;
		}
    
		public function setItemName($input){
			$this->itemName = $input;
		}
    
		public function setPrice($input){
			$this->price = $input;
		}
    
    public function setCategory($input){
			$this->category = $input;
		}
    
		public function setCompany($input){
			$this->company = $input;
		}
    
		public function setDescription($input){
			$this->description = $input;
		}    
    
		public function setDescription2($input){
			$this->description2 = $input;
		}    
    
		public function setDescription3($input){
			$this->description3 = $input;
		}
    
		
    
    public function getItemID(){
			return $this->itemID;
		}
    
		public function getItemName(){
			return $this->itemName;
		}

		public function getPrice(){
			return $this->price;
		}

		public function getCategory(){
			return $this->category;
		}
		public function getCompany(){
			return $this->company;
		}
		public function getDescription(){
			return $this->description;
		}
		public function getDescription2(){
			return $this->description2;
		}
		public function getDescription3(){
			return $this->description3;
		}
    
	}



	/* ============================================ */
	/* cart Class */

	class Cart {

		private $cost;
		private $itemCode;
		private $quantity;
	

    function __constructor(){
						
		}
		
    
		public function setCost($input){
			$this->cost = $input;
		}
    
		public function setItemCode($input){
			$this->ItemCode = $input;
		}
    
		public function setQuantity($input){
			$this->quantity = $input;
		}
    		
		
		public function getCost(){
			return $this->cost;
		}

		public function getItemCode(){
			return $this->itemCode;
		}
		
		public function getQuantity(){
			return $this->quantity;
		}
	}



	/* ============================================ */
	/* order Class */

	class Order {

		private $orderID;
		private $itemList;
		private $receiverName;
		private $receiverTelNum;
		private $receiverAddr;
		private $receiverAddr2;
		private $deliveryMessage;
		private $paymentType;


    function __constructor(){
						
		}		

    
		public function setOrderID($input){
			$this->orderID = $input;
		}
    
		public function setItemList($input){
			$this->itemList = $input;
		}
    
		public function setReceiverName($input){
			$this->receiverName = $input;
		}
    		public function setReceiverTelNum($input){
			$this->receiverTelNum = $input;
		}
    
		public function setReceiverAddr($input){
			$this->receiverAddr = $input;
		}
    
		public function setReceiverAddr2($input){
			$this->receiverAddr2 = $input;
		}
    		public function setDeliveryMessage($input){
			$this->deliveryMessage = $input;
		}
    
		public function setPaymentType($input){
			$this->paymentType = $input;
		}
    		

		public function getOrderID(){
			return $this->orderID;
		}

		public function getItemList(){
			return $this->itemList;
		}
		
		public function getReceiverName(){
			return $this->receiverName;
		}
		public function getReceiverTelNum(){
			return $this->receiverTelNum;
		}

		public function getReceiverAddr(){
			return $this->receiverAddr;
		}
		
		public function getReceiverAddr2(){
			return $this->receiverAddr2;
		}
		public function getDeliveryMessage(){
			return $this->deliveryMessage;
		}

		public function getPaymentType(){
			return $this->paymentType;
		}
	}


?>