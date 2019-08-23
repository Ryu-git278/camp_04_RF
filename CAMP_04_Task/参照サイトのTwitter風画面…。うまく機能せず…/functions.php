<?php


function add_post($userid,$body){
    $sql = "insert into posts (user_id, body, stamp) 
            values ($userid, '". mysql_real_escape_string($body). "',now())";
 
    $result = mysql_query($sql);
}


function show_posts($userid){
    $posts = array();
 
    $sql = "select body, stamp from posts
     where user_id = '$userid' order by stamp desc";
    $result = mysql_query($sql);
 
    while($data = mysql_fetch_object($result)){
        $posts[] = array(   'stamp' => $data->stamp, 
                            'userid' => $userid, 
                            'body' => $data->body
                    );
    }
    return $posts;
 
}


?>