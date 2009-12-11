<?php
class OneHealingItem extends UsableItem
{
	//stat1 - amount to heal for
	
	public function useItem()
	{
		$p = $db->execute("select `hp`, `max_hp` where `id`=?", array($this->item['player']));
		$stats = $p->fetchrow();
		
		$new_health = ($stats['hp'] + $this->item['stat1'] < $stats['max_hp'])?$stats['hp'] + $this->item['stat1']:$stats['max_hp'];
		
		//Add to player's health
		$query = $this->db->execute("update `players` set `health`=? where `id`=?", array($new_health, $this->item['player']));
		
		//Item consumed, delete from database
		$query = $this->db->execute("delete from `player_items` where `id`=?", array($this->item['id']));
		
		return 'You healed yourself for ' . ($new_health - $stats['hp']) . 'HP.';
	}
}
?>