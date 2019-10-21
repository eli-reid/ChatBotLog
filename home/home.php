<?php 
declare(strict_types=1);
$page_title="Chat";
include_once '../Inc/Loggedin.php';
include_once '../Inc/DBConnect.php';
include_once '../models/User.php';
include_once '../templates/header.php';
include_once '../models/Chatline.php';
$database = new Database();
$db = $database->getConnection();
$lines=isset($_GET['lines'])?(int)$_GET['lines']:25;
$page=isset($_GET['page'])?(int)$_GET['page']:1;
$limit = (($page-1) * $lines) . "  , " .  $lines;
$query = "(SELECT `ID`, `ChatRoom`, `MsgType`, `User`, `ChatMsg`, `TimeStamp` FROM `ChatLog` ORDER BY `ChatLog`.`ID` DESC LIMIT " . $limit .")  ORDER BY `ID` ASC ";
?>
<div class="card " style="background-color: #333333; width: 1200px">
<h6 class="card-header" style=" text-align:  center;">
<nav aria-label="...">
<ul class="pagination  justify-content-center ">
<?php
if($page == 1){ ?>
    <li class="page-item disabled"><a class="page-link bg-dark" href=""> Next Messages</a></li>
    <li class="page-item active"><span class="page-link bg-dark"><?php echo $page?></span></li>
    <li class="page-item"><a class="page-link bg-dark" href="" onclick="$('#next2').attr('href', '?page=<?php echo $page+1 ;?>&lines=' + $('#lines').val());" name="next2" id="next2"><?php echo $page + 1?></a></li>
    <li class="page-item"><a class="page-link bg-dark" href="" onclick="$('#prev2').attr('href', '?page=<?php echo $page + 2;?>&lines=' + $('#lines').val());" name="prev2" id="prev2"><?php echo $page + 2?></a></li>
    <li class="page-item"><a class="page-link bg-dark" href="" onclick="$('#prev1').attr('href', '?page=<?php echo $page + 1;?>&lines=' + $('#lines').val());" name="prev1" id="prev1">Prev Messages</a></li>
<?php } 
else { ?>
    <li class="page-item"><a class="page-link bg-dark" href="" onclick="$('#next1').attr('href', '?page=<?php echo $page - 1;?>&lines=' + $('#lines').val());" name="next1" id="next1">Next Messages</a></li>
    <li class="page-item"><a class="page-link bg-dark" href="" onclick="$('#next2').attr('href', '?page=<?php echo $page-1 ;?>&lines=' + $('#lines').val());" name="next2" id="next2"><?php echo $page-1?></a></li>
    <li class="page-item active"><span class="page-link bg-dark"><?php echo $page?></span></li>
    <li class="page-item"><a class="page-link bg-dark" href="" onclick="$('#prev2').attr('href', '?page=<?php echo $page + 1;?>&lines=' + $('#lines').val());" name="prev2" id="prev2"> <?php echo $page + 1?></a></li>
    <li class="page-item"><a class="page-link bg-dark" href="" onclick="$('#prev1').attr('href', '?page=<?php echo $page + 1;?>&lines=' + $('#lines').val());" name="prev1" id="prev1">Prev Messages</a></li>
<?php } ?>
</ul>
</nav>
<div style="color: black">Chat Messages Per page: <input type="number" name="lines" id="lines" value="<?php echo $lines?>" style="width: 60px; background-color: #333333; border-width:1px; border-color:  #666">
<a href="" onclick="$('#update').attr('href', '?page=<?php echo $page;?>&lines=' + $('#lines').val());" name="update" id="update"> [Update]</a></div>
</h6>
<?php
if ($result = mysqli_query($db, $query)) {
    while ($chatline = mysqli_fetch_object($result, 'Chatline')) {
        echo $chatline->printline();
    }
}?>
</div>
<?php
$database->closeConnection();
include_once '../templates/footer.php';
