<?
$a = [[0, 1, 2], [3, 4, 5]];
echo primeiro_elemento($a)."<br>";
print_r($a); echo"<br><br>";

function apagar_primeiro_elemento(&$vetor_bidimensional) 
	{if ((!is_array($vetor_bidimensional))||empty($vetor_bidimensional)) 
		{echo "Vetor vazio!!"; return false;}
	 foreach($vetor_bidimensional as $key => $value)
		{if (is_array($value)&&(!empty($value))) 
			   {array_shift($vetor_bidimensional[$key]); return true;}
		 }}
function primeiro_elemento($vetor_bidimensional)
	{foreach($vetor_bidimensional as $key => $value)
		{if (is_array($value)&&(!empty($value)))
			{return $value[array_key_first($value)];}}}
	 

apagar_primeiro_elemento($a);
echo primeiro_elemento($a)."<br>";
print_r($a);echo"<br><br>";


apagar_primeiro_elemento($a);
echo primeiro_elemento($a)."<br>";
print_r($a);echo"<br><br>";

apagar_primeiro_elemento($a);
echo primeiro_elemento($a)."<br>";
print_r($a);echo"<br><br>";

apagar_primeiro_elemento($a);
echo primeiro_elemento($a)."<br>";
print_r($a);echo"<br><br>";

apagar_primeiro_elemento($a);
echo primeiro_elemento($a)."<br>";
print_r($a);echo"<br><br>";
apagar_primeiro_elemento($a);
echo primeiro_elemento($a)."<br>";
print_r($a);echo"<br><br>";
apagar_primeiro_elemento($a);
echo primeiro_elemento($a)."<br>";
print_r($a);echo"<br><br>";
	 	 
?>