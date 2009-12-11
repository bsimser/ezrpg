<?php
abstract class EquipItem extends Item
{
	abstract public function equip();
	abstract public function unequip();
	
	protected function checkEquipped()
	{
		//Check if another item of the same type is already equipped
		$check = $this->db->getone("select count(*) as `count` from `player_items` where `type`=? and `player`=? and `equipped`=1", array($this->item['type'], $this->item['player']));
		
		if ($check == 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>