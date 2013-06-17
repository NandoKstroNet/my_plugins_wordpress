<?php
 
 
//Acrescentado por @author Nanderson Castro
 
//Create a shortcode for phone the function listUsersPromotion
add_shortcode('lista_usuarios_sorteio', 'runListCommentUsersPostEspecific');
 
//Start the function listaUsersPromotion
function runListCommentUsersPostEspecific() 
{
  listCommentUsersPostEspecific('523');
}
 
/**
 * @author Nanderson Sousa de Castro
 * @global $wpdb
 * @version 0.1.0
 * ##### This function get all users comments
 * at a  article determined at wordpress! #####
**/
 
function listCommentUsersPostEspecific($postId) 
{
	global $wpdb;
 
	$result = $wpdb->get_results(
		"SELECT
			comment_ID, comment_post_ID, comment_author, comment_author_email
		 FROM
		 	 $wpdb->comments
		 WHERE 
		 	comment_post_ID = ".$postId."
		 AND 
		 	comment_author_email != 'nandokstro@gmail.com'
		 ORDER BY 
		 	comment_ID DESC"
	);
 
	if($result)
	{
		foreach($result as $res) 
		{
			$data  = '<ol>';
				$data .= '<li>';
					$data .= $res->comment_author . ' || ' . $res->comment_author_email;
				$data .= '</li>';
			$data .= '</ol>';
 
			echo $data;
		}
 
 
	} else {
		echo "Nada encontrado!";
	}
}