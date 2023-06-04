<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
$servername = "127.0.0.1";
$username = "tellybloom_tellybloom_wp_oyonp";
$password = "tW7sYL@0azc4qsvr";
$dbname = "tellybloom_wp_3uv3a";
$prefix="5AM26kA4G";
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn,'utf8');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$post_date_gmt=gmdate('Y-m-d');
date_default_timezone_set("Asia/Karachi");
$post_date=date("Y-m-d", time()); 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$word = "<br><i> Uptodate...post...from...admin...<i>";
$post_content="";
function clean($post_content, $value, $replaceWith) {
    return preg_replace("/\S*$post_content\S*/i", "$replaceWith ",trim($value));
}
$sql = "SELECT post_date, post_date_gmt,post_content, post_title FROM ".$prefix."_posts ORDER BY post_date DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $post_content=$row["post_content"];
if(strpos($post_content, $word) !== false){
 $wordlist = array($word);
 $replaceWith  = "";
foreach ($wordlist as $v)
  $post_content = clean($v, $post_content, $replaceWith);
} 

else{
    $post_content .=$word;
}
        $postDate = $row["post_date"];
        $postDateGMT = $row["post_date_gmt"];
       echo$post_title = $row["post_title"];
       echo '<br>'; 
$timesamedatechange = explode(" ", $postDate);
echo$post_date = $post_date.' '.$timesamedatechange[1];
echo '<br>'; 
$timesamedatechangegmt = explode(" ", $postDateGMT);
echo$post_date_gmt = $post_date_gmt.' '.$timesamedatechangegmt[1];    
      echo '<br>';  
      
echo '<hr>';
        
     $sqlw = "UPDATE ".$prefix."_posts SET post_date = '$post_date' , post_date_gmt = '$post_date_gmt'  WHERE post_date = '$postDate' AND post_date_gmt='$postDateGMT'";
     echo '<br>'; 
      $conn->query($sqlw);
     $post_date_gmt=gmdate('Y-m-d');
date_default_timezone_set("Asia/Karachi");
$post_date=date("Y-m-d", time());
        
       
    }
} else {
    echo "No rows found in the table.";
}



// Close the connection
$conn->close();
?>