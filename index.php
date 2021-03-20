<?php

    # REQUIREMENT
    require 'functions.php';
    require 'vendor/autoload.php';

    # NAMESPACE
    use Tracy\Debugger;
    Debugger::enable(Debugger::DEVELOPMENT);

	$arr = [
		'inner_join' 	=> innerJoin(),
		'left_join' 	=> leftJoin(),
		'right_join' 	=> rightJoin(),
	];
	
	$result = execSql($arr['right_join']); 

    foreach ($result as $data) :
		dump($data);
    endforeach;
    
    // echo json_encode(["HTTP" => 200]);
?>