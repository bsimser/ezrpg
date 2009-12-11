<?php
class Weapon extends EquipItem
{
	//stat1 - damage
	//stat2 - item durability (never shown to player, just a hidden variable to keep track of weapon usage)
	//stat3 - damage upgrade bonus (piercing damage, this is the minimum that the player may hit.)
	
	//piercing damage is usually 0 for most weapons unless upgraded)
	//Each upgrade gives +5 piercing damage, max upgrade to 10 (similar to RO, small chance of being fully upgraded)
	
	public function equip()
	{
		/* Removed checking whether another item of the same type is equipped
		   Instead, any items that are become automatically unequipped
		
		if ($this->checkEquipped())
		{*/
			//Add to the player's damage
			if ($this->item['stat2'] > 0)
			{
				//Unequip other items of the same type
				$query = $this->db->execute("update `player_items` set `equipped`=0 where `type`=? and `player_id`=?", array($this->item['type'], $this->item['player_id']));
				
				//$damage = $this->db->getone("select `damage` from `players` where `id`=?", array($this->item['player_id']));

				$query = $this->db->execute("update `players` set `damage`=damage+? where `id`=?", array($this->item['stat1'], $this->item['player_id']));

				//If the weapon is upgraded and has piercing damage
				if ($this->item['stat3'] > 0)
				{
					//$piercing = $this->db->getone("select `piercing_damage` from `players` where `id`=?", array($this->item['player_id']));

					$query = $this->db->execute("update `players` set `piercing_damage`=piercing_damage+? where `id`=?", array($this->item['stat3'], $this->item['player_id']));
				}

				//Set item status to equipped
				$query = $this->db->execute("update `player_items` set `equipped`=1 where `id`=?", array($this->item['id']));

				return 'You equipped your ' . $this->item['name'] . '.';
			}
			else
			{
				//False to signal weapon has no durability left and is broken
				return 'This weapon is broken! Get it fixed before you equip it!';
			}
		/*}
		else
		{
			return 'You already have another ' . $this->item['type'] . ' equipped.';
		}*/
	}
	
	public function unequip()
	{
		//Remove from the player's damage
		$damage = $this->db->getone("select `damage` from `players` where `id`=?", array($this->item['player_id']));
		
		$new_damage = (($damage - $this->item['stat1']) < 0)?0:($damage - $this->item['stat1']);
		
		$query = $this->db->execute("update `players` set `damage`=? where `id`=?", array($new_damage, $this->item['player_id']));

		//If the weapon is upgraded and has piercing damage
		if ($this->item['stat3'] > 0)
		{
			$piercing = $this->db->getone("select `piercing_damage` from `players` where `id`=?", array($this->item['player_id']));
			
			$new_piercing = (($piercing - $this->item['stat3']) < 0)?0:($piercing - $this->item['stat3']);
			
			$query = $this->db->execute("update `players` set `piercing_damage`=? where `id`=?", array($new_piercing, $this->item['player_id']));
		}

		//Set item status to equipped
		$query = $this->db->execute("update `player_items` set `equipped`=0 where `id`=?", array($this->item['id']));

		return 'You unequipped your ' . $this->item['name'] . '.';
	}
}
?>