<?php
class Elevator{
	
	private $state; //переменная для состояния лифта
	private $curElFloor;  // переменная для этажа, где находится лифт
	//private $calledEFloor; //переменная вызова лифта с внешней панели на этаже
	private $selEFloor; // переменная выбора этажа назначения с панели
	private $weightLimit; // max грузоподьемность лифта
	private $numFlrs; // количество этажей в доме
	private $doors;  //состояние дверей
	
	
	
	public function __construct( $numFlrs, $curElFloor, $weightLimit){
	   
	    $this->numFlrs = $numFlrs;
	    $this->curElFloor = $curElFloor;
	    $this->weightLimit = $weightLimit;
	    $this->doors='closed';		  
	    $this->state=0;
		$this->selEFloor;
       
	    if ($curElFloor > $numFlrs) exit("Текущий этаж не может быть больше количества этажей в доме!<br>");
	 	  //if (empty ($calledEFloor) && empty ($selEFloor)){ // проверка  вызван ли лифт, если вызова нет - лифт в состоянии ожидания
		
	    //echo "Здравствуйте, лифт ожидает вызов <br>"; 
	   
		
	}
    public function getDoors(){   //состояние дверей
		
		return $this->doors;
	}	
	
	public function getState(){ // состояние лифта, впринципе не использую, но в модели с таймингами должна была быть и с другими значениями
		
		return $this->state;
	}	
	
	public function getLimWeight(){ //значение предельного веса
		
		return $this->weightLimit;
	}
	
	public function setLimWeight($weightLimit){  //устанавливаем вес
		
		$this->weightLimit= $weightLimit;
		return $this;
	}
	
	public function getNumFlrs(){  
		
		return $this->numFlrs;
	}
	
	public function setNumFlrs($numFlrs){ //устанавливаем кол. этажей
		
		$this->numFlrs= $numFlrs;
		return $this;
	}
	
	public function opnDrs(){  //открываем двери
			         
	    $this->doors = 'open';
		echo "| Двери открылись! |<br>";
	}
	
	public function clsDrs(){  //открываем двери
			         
		$this->doors = 'closed';
		echo "| Двери закрылись! |<br>";
	}
	
	public function getCurElFloor(){  
		
		return $this->curElFloor;
	}
	
	public function callElevator($calledEFloor){                  // Логика - проверка на корректность этажа, проверка открытых дверей, 
		                                                         // двери открыты - ворнинг- закрываем, проверяем этаж вызова = этажу, 
	    if ($this->state===0){                                  // на котором стоит лифт - откр. двери, если нет - едем на этаж вызова.
			$this->state= 1;                                   // Лифт занят вызовом c кнопки, нажатие на кнопку в данный момент ничего не даст
			if ($calledEFloor>$this->numFlrs) die ("Номер вызываемого этажа больше общего количества этажей в доме");
		    
			if($this->doors==='open'){                        
			    echo "Двери лифта открыты, возможна неисправность! <br>"; 
			    $this->doors='closed';
			    echo "| Двери закрыты принудительно |<br>";}
			
			if($calledEFloor===$this->curElFloor){
			    echo "Лифт находится на Вашем этаже<br>";
			    $this->doors='open';
			    echo "| Двери открылись! |<br>";
			}else{
			    echo "| Произведен вызов лифта с ".$calledEFloor." этажа | <br>";
				echo "| Лифт движется с ". $this->curElFloor." этажа на ".$calledEFloor." этаж |<br>";
			    $this->curElFloor = $calledEFloor;
			    $this->doors='open';
         	    echo "| Двери открылись |<br>";}
				
		} else {echo  "| Лифт занят, пожалуйста подождите |<br>";}
		$this->state= 0;                                        //Лифт доехал, состояние  - готов к вызову
	}
	        
	public function addPassengers($arrayNames,$curWeight){
		$this->state= 1;		
		if ($this->weightLimit<$curWeight) die ("Перегрузка лифта, кто то должен покинуть кабину");
	    echo "В лифт зашло ".count($arrayNames). "человек(а)<br>";
        $this->doors='closed';
		echo "| Двери закрылись |<br>";
		
	}
	  
	
	public function moveToSelFloor($selEFloor){         //движение лифта к выбранному в кабине этажу
		
		
		$this->state= 1;
		if ($selEFloor>$this->numFlrs) die ("Номер выбранного этажа больше общего количества этажей в доме.");
			   
		$this->doors='closed';
		echo "| Двери закрылись |<br>";
        
		if ($selEFloor===$this->curElFloor){
			echo "Лифт уже находится на этом этаже";
			$this->doors='open';
		}else{
			echo "Выбран ".$selEFloor." этаж <br>";
			echo "| Лифт движется с ". $this->curElFloor." этажа на ".$selEFloor." этаж |<br>";
		    $this->curElFloor = $selEFloor;
			$this->doors='open';
         	echo "| Двери открылись |<br>";
		}
		
	}	
	 public function rmvPassengers($arrayNames ,$name, $selPFloor){
		$this->state= 1;
		
		if($this->doors==='closed'){                        
			    echo "Двери лифта закрыты, возможна неисправность! <br>"; 
			    $this->doors='closed';
			    echo "| Двери открыты принудительно |<br>";}
		
		if  ($selPFloor===$this->curElFloor) {
			if (in_array($name, $arrayNames)) 
                unset($arrayNames[$key]);
            
		}
	 echo "| ".$name." вышел(ла) из лифта | <br>";
		
	    if(empty($arrayNames)) {
		echo "| Все пассажиры покинули лифт | <br>"
		}
	
	}	
		
}           
	
	
	
	
//$e = new Elevator(16,1,500 );


//echo $e->getDoors();
//echo "<br>".$e->getDoors();
//echo "Максимальный вес = ".$e->getLimWeight()."  |";
//echo "Количество этажей = ".$e->getNumFlrs()."  |";
//$e-> opnDrs();
//$e->setLimWeight(500);
//$e-> clsDrs();
//echo $e->getDoors();
//echo $e->getNumFlrs()."<br>";
//$e-> opnDrs();
//$e->callElevator(8);
//echo $e->getState();
//var_dump ($e);
//$e->moveToSelFloor(11);
//$b= array($Sam,$Nick,$Luiza);
//$e->addPassengers($b, 254);
?>
