<?php
/*
function paginate($page, $limit, $total, $url)
{
	$pagination = "";
	
	//Display 'Previous' link
	$pagination .= ($page != 1)?"<a href=\"" . $url . "limit=" . $limit . "&page=" . ($page-1) . "\">Previous</a> | ":"Previous | ";
	
	$numpages = $total / $limit;
	for ($i = 1; $i <= $numpages; $i++)
	{
		//Display page numbers
		$pagination .= ($i == $page)?$i . " | ":"<a href=\"" . $url . "limit=" . $limit . "&page=" . $i . "\">" . $i . "</a> | ";
	}
	
	if (($total % $limit) != 0)
	{
		//Display last page number if there are left-over users in the query
		$pagination .= ($i == $page)?$i . " | ":"<a href=\"" . $url . "limit=" . $limit . "&page=" . $i . "\">" . $i . "</a> | ";
	}
	
	//Display the 'Next' link
	$pagination .= (($total - ($limit * $page)) > 0)?"<a href=\"" . $url . "limit=" . $limit . "&page=" . ($page+1) . "\">Next</a> ":"Next";
	
	return $pagination;
}
*/

function paginate($page, $limit, $total, $url)
{
	$pagination = '';
	
	//Display 'Previous' link
	$pagination .= ($page != 1)?'<a href="' . $url . 'limit=' . $limit . '&page=' . ($page-1) . '">Previous</a> | ':'Previous | ';
	
	$numpages = $total / $limit;
	for ($i = 1; $i <= $numpages; $i++)
	{
		//Display page numbers
		$pagination .= ($i == $page)?$i . ' | ':'<a href="' . $url . 'limit=' . $limit . '&page=' . $i . '">' . $i . '</a> | ';
	}
	
	//Display last page number if there are left-over users in the query
	$pagination .= (($total % $limit) != 0)?($i == $page)?$i . ' | ':'<a href="' . $url . 'limit=' . $limit . '&page=' . $i . '">' . $i . '</a> | ':'';
	
	//Display the 'Next' link
	$pagination .= (($total - ($limit * $page)) > 0)?'<a href="' . $url . 'limit=' . $limit . '&page=' . ($page+1) . '">Next</a> ':'Next';
	
	return $pagination;
}
?>