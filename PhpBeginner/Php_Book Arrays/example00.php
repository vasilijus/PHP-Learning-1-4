<?php

echo "hello";
// /**
// 	Method to execute a command in the terminal
// 	Uses :
	
// 	1. system
// 	2. passthru
// 	3. exec
// 	4. shell_exec

// */
// function terminal($command)
// {
// 	//system
// 	if(function_exists('system'))
// 	{
// 		ob_start();
// 		system($command , $return_var);
// 		$output = ob_get_contents();
// 		ob_end_clean();
// 	}
// 	//passthru
// 	else if(function_exists('passthru'))
// 	{
// 		ob_start();
// 		passthru($command , $return_var);
// 		$output = ob_get_contents();
// 		ob_end_clean();
// 	}
	
// 	//exec
// 	else if(function_exists('exec'))
// 	{
// 		exec($command , $output , $return_var);
// 		$output = implode(&quot;n&quot; , $output);
// 	}
	
// 	//shell_exec
// 	else if(function_exists('shell_exec'))
// 	{
// 		$output = shell_exec($command) ;
// 	}
	
// 	else
// 	{
// 		$output = 'Command execution not possible on this system';
// 		$return_var = 1;
// 	}
	
// 	return array('output' =&gt; $output , 'status' =&gt; $return_var);
// }

// $o = terminal('ls');
// if($status == 0)
// {
//     echo $o['output'];
// }
// else
// {
//     //some problem
// }

?>