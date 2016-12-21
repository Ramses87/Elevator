<?php

abstract class Passenger{
	
	public $weightP;
	public $name;
	public $tStrike;
	public $selPFloor;
    public $curPFloor;
		
	public function  __construct($name){
		
		$this->weightP;
		$this->name=$name;
		$this->tStrike = rand(0,10);  // пинг нажатия кнопки, у кого меньше тот первый и жмет
		$this->selPfloor = rand(1,16); // Не смог привязать переменную из Elevator.php модели- numFloor, отвечающую за количество этажей
		$this->curPFloor = rand (1,16);
		$this->setWeight();
		
	}
	
	abstract function setWeight();
	
	}
	//public function getArray();		


class Fatman extends Passenger{
	
	protected $type='fatman';
	public function setWeight(){
		
		$this->weightP=(60+rand(40,60));
	}
}

class Normal extends Passenger{
 
    protected $type='normal';
    public function setWeight(){
		
		$this->weightP=(60+rand(10,20));
	}
}

class Thin extends Passenger{
	
    protected $type='thin';
	public function setWeight(){
		
		$this->weightP=(60-rand(10,20));
	}
}

/*class PassFactory {
	public function create ($type){
	    switch($type){
		    case 'fatman':
		        return new Fatman($name);
		    case 'normal':
	            return new Normal($name);
	        case  'thin':
		        return new Thin($name);
	
	    }
	
    }
}	*/
	
//$passFactory = new PassFactory();
//$Kate = $passFactory->create('thin');
$Sam = new Fatman(Sam);
$Kate = new Fatman (Kate);
$Dennis = new Normal (Dennis);
$Lana = new Normal (Lana);
$Rick = new Thin (Rick);





//var_dump ($Kate);
//echo $b;    //<br>".($e->getNumFlrs())."<br>";
//var_dump($e);
//$arrayKate = (array)($Kate);
//echo "<br>";
//var_dump ($arrayKate);


?>