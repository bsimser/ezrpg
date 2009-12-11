<?php
function getUsername($player, &$db)
{	
	$num = $db->getone("select `username` from `players` where `id`=?", array($player));
	return $num;
}
?>