<?php 
require_once ('models/Elevator.php');
require_once ('models/Passengers.php');

$Sam = new Fatman(Sam);
$Kate = new Thin (Kate);
$Dennis = new Normal (Dennis);
$Lana = new Normal (Lana);
$Rick = new Thin (Rick);
$Romario = new Normal(Romario);
$Brienna = new Thin (Brienna);
$Olga = new Normal (Olga);

$arrTotal = array(
	                 "0" => (array) ($Sam),
					 "1" => (array) ($Kate),
					 "2" => (array) ($Dennis),
					 "3" => (array) ($Lana),
					 "4" => (array) ($Rick),
					 "5" => (array) ($Romario),
                     "6" => (array) ($Brienna),
					 "7" => (array) ($Olga), 
                                              );
					
//var_dump ($arrTotal);
echo "<br><br><br>".json_encode($arrTotal);				

//usort($arrTotal, function($a, $b){
    //return ($a['tStrike'] - $b['tStrike']);
echo "<br><br><br>".json_encode($arrTotal);

//отсортировать и выбрать массив значений Имя - Tstrike - Этаж
//в полученном массиве выбрать данные : имена людей с наименшим значением tStrike
// если на 1ном этаже стоит несколько человек - добавляем всех в кабину
//сравниваем значения $selPFloor в группе и наименшее устанавливаем как $selEFloor
//





});
?>


