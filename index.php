<?php

    # REQUIREMENT
    require 'functions.php';
    require 'vendor/autoload.php';

    # NAMESPACE
    use Tracy\Debugger;
    Debugger::enable(Debugger::DEVELOPMENT);

    // dump('Queries consume lots of resources. Beware !'); die;

	$arr = [
		'inner_join' 	=> innerJoin(),
		'left_join' 	=> leftJoin(),
		'right_join' 	=> rightJoin(),
	];
	
	$result = execSql($arr['right_join']); 

    foreach ($result as $data) :
        dump($data);
    endforeach;
    

    dump(execSql(jsonBuild()));
    
?>