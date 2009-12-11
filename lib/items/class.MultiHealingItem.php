<?php
class MultiHealingItem extends UsableItem
{
	//stat1 - amount to heal for
	//stat2 - times the item may be used
	
	public function useItem()
	{
		if ($this->$item['stat2'] > 0)
		{
			$p = $this->db->execute("select `hp`, `max_hp` where `id`=?", array($this->item['player']));
			$stats = $p->fetchrow();

			$new_health = ($stats['hp'] + $this->item['stat1'] < $stats['max_hp'])?$stats['hp'] + $this->item['stat1']:$stats['max_hp'];

			//Add to player's health
			$query = $this->db->execute("update `players` set `health`=? where `id`=?", array($new_health, $this->item['player']));
			
			//Reduce item usage by 1
			$query = $this->db->execute("update `player_items` set `stat2`=stat2-1 where `id`=?", array($this->item['id']));
		}
		
		if ($item['stat2'] <= 1)
		{
			//No more item uses, delete from database
			$query = $this->db->execute("delete from `player_items` where `id`=?", array($this->item['id']));
		}
		
		return 'You healed yourself for ' . ($new_health - $stats['hp']) . 'HP.';
	}
}
?>