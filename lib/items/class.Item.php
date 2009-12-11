<?php
abstract class Item
{
	public $item;
	protected $db;
	
	public function __construct($item_id, &$db)
	{
		$this->db = $db;
		
		if (!$this->selectItem($item_id))
		{
			return 'Item could not be found.';
		}
		else
		{
			return true;
		}
	}
	
	protected function selectItem($item_id)
	{
		$id = @intval($item_id);
		
		$query = $this->db->execute("select player_items.*, items.description, items.class, items.type, items.image, items.weight, items.value, items.min_level, items.min_strength, items.min_vitality, items.min_agility, items.min_dexterity, items.min_spirit from `player_items`, `items` where player_items.id=? and items.id=player_items.item_id", array($id));
		if ($query->recordcount() == 0)
		{
			return false;
		}
		else
		{
			$this->item = $query->fetchrow();
			return true;
		}
	}
	
	public function checkRequirements()
	{
		//Compare stats with the minimum values of the items
		$query = $this->db->execute("select `job_id`, `level`, `strength`, `vitality`, `agility`, `dexterity`, `spirit` from `players` where `id`=?", array($this->item['player_id']));
		$p = $query->fetchrow();
		
		if ($this->item['min_level'] != 0 && $p['level'] < $this->item['min_level'])
		{
			return false;
		}
		
		if ($this->item['min_strength'] != 0 && $p['strength'] < $this->item['min_strength'])
		{
			return false;
		}
		
		if ($this->item['min_vitality'] != 0 && $p['vitality'] < $this->item['min_vitality'])
		{
			return false;
		}
		
		if ($this->item['min_agility'] != 0 && $p['agility'] < $this->item['min_agility'])
		{
			return false;
		}
		
		if ($this->item['min_dexterity'] != 0 && $p['dexterity'] < $this->item['min_dexterity'])
		{
			return false;
		}
		
		//All requirements are met, return true
		return true;
	}
}
?>