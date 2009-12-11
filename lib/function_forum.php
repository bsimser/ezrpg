<?php
function boardTopics($board, &$db)
{
	/*
	//Too much error checking/queries
	$check = $db->getone("select count(*) as `count` from `forum_boards` where `id`=?", array($board));
	if ($check == 0)
	{
		return false;
	}
	else
	{
		$num = $db->getone("select count(*) as `count` from `forum_posts` where `id`=?", array($board));
	}
	*/
	
	$num = $db->getone("select count(*) as `count` from `forum_posts` where `board`=? and `type`='topic'", array($board));
	return $num;
}

function boardPosts($board, &$db)
{	
	$num = $db->getone("select count(*) as `count` from `forum_posts` where `board`=?", array($board));
	return $num;
}

function topicReplies($topic, &$db)
{	
	$num = $db->getone("select count(*) as `count` from `forum_posts` where `parent`=?", array($topic));
	return $num;
}

function getPost($post, &$db)
{
	$query = $db->execute("select * from `forum_posts` where `id`=?", array($post));
	if ($query->recordcount() == 0)
	{
		$ret = 0;
	}
	else
	{
		$ret = $query->fetchrow();
	}
	return $ret;
}

function getBoard($post, &$db)
{
	$query = $db->execute("select * from `forum_boards` where `id`=?", array($post));
	if ($query->recordcount() == 0)
	{
		$ret = 0;
	}
	else
	{
		$ret = $query->fetchrow();
	}
	return $ret;
}

function lastPost($board, &$db)
{
	if (boardPosts($board, $db) == 0)
	{
		return 0;
	}
	else
	{
		$query = $db->execute("select `id`, `player`, `name`, `msg`, `time`, `parent` from `forum_posts` where `board`=? order by `time` desc limit 1", array($board));
		$post = $query->fetchrow();
		if (empty($post['name']))
		{
			$post2 = getPost($post['parent'], $db);
			$post['name'] = "Re: " . $post2['name'];
		}
		return $post;
	}
}

function lastReply($topic, &$db)
{
	if (topicReplies($topic, $db) == 0)
	{
		return 0;
	}
	else
	{
		$query = $db->execute("select `id`, `player`, `time` from `forum_posts` where `parent`=? order by `time` desc limit 1", array($topic));
		$post = $query->fetchrow();
		return $post;
	}
}

function playerPosts($player, &$db)
{	
	$num = $db->getone("select count(*) as `count` from `forum_posts` where `player`=?", array($player));
	return $num;
}
?>