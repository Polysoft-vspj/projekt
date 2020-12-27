<?php
include('connect.php');
if(isset($_POST['view'])){
 // $con = mysqli_connect("localhost", "testserverpo", "", "notif");
    if($_POST["view"] != '')
    {
        $update_query = "UPDATE clanky SET comment_status = 1 WHERE comment_status=0";
        mysqli_query($spojeni, $update_query);
    }
    $query = "SELECT * FROM clanky ORDER BY clanky_id DESC LIMIT 5";
    $result = mysqli_query($spojeni, $query);
    $output = '';
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            $output .= '
  <li>
  <a href="#">
  <strong>'.$row["Nazev_clanku"].'</strong><br />
  <small><em>'.$row["Autor_clanku"].'</em></small>
  </a>
  </li>
  ';
        }
    }
    else{
        $output .= '<li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
    }
    $status_query = "SELECT * FROM clanky WHERE comment_status=0";
    $result_query = mysqli_query($spojeni, $status_query);
    $count = mysqli_num_rows($result_query);
    $data = array(
        'notification' => $output,
        'unseen_notification'  => $count
    );
    echo json_encode($data);
}
?>
