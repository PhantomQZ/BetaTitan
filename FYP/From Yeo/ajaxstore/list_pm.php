<?php
session_start();
include('conn.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="default/style.css" rel="stylesheet" title="Style" />
        <title>Personnal Messages</title>
    </head>
    <body>
    	<div class="header">
        	<a href="<?php echo $url_home ?>"><img src="default/images/logo.png" alt="Members Area" /></a>
	    </div>
        <div class="content">
<?php
//We check if the user is logged
if(isset($_SESSION['username']))
{
//We list his messages in a table
//Two queries are executes, one for the unread messages and another for read messages
$uid = $_SESSION['userid'];
//$req1 = mysqli_query($conn, "select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, user.User_ID as userid, user.User_usrname from pm as m1, pm as m2,user where ((m1.user1='$uid' and m1.user1read='no' and user.User_ID=m1.user2) or (m1.user2='$uid' and m1.user2read='no' and user.User_ID=m1.user1)) and m1.id2='1' and m2.id='m1.id' group by m1.id order by m1.id desc");
//$req2 = mysqli_query($conn, "select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, user.User_ID as userid, user.User_usrname from pm as m1, pm as m2,user where ((m1.user1='$uid' and m1.user1read='yes' and user.User_ID=m1.user2) or (m1.user2='$uid' and m1.user2read='yes' and user.User_ID=m1.user1)) and m1.id2='1' and m2.id='m1.id' group by m1.id order by m1.id desc");
//$row1 = mysqli_num_rows($req1);
//$row2 = mysqli_num_rows($req2);
//mysqli_fetch_assoc(mysqli_query($conn,"select User_ID from user where User_usrname like '$user_check'"));
$req1 = mysqli_query($conn, 'select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, user.User_ID as userid, user.User_usrname from pm as m1, pm as m2,user where ((m1.user1="'.$uid.'" and m1.user1read="no" and user.User_ID=m1.user2) or (m1.user2="'.$uid.'" and m1.user2read="no" and user.User_ID=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
$req2 = mysqli_query($conn, 'select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, user.User_ID as userid, user.User_usrname from pm as m1, pm as m2,user where ((m1.user1="'.$uid.'" and m1.user1read="yes" and user.User_ID=m1.user2) or (m1.user2="'.$uid.'" and m1.user2read="yes" and user.User_ID=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
$row1 = mysqli_num_rows($req1);
$row2 = mysqli_num_rows($req2);
$test1 = mysqli_fetch_array($req1);
$test2 = mysqli_fetch_array($req2);
?>
This is the list of your messages:<br />
<a href="new_pm.php" class="link_new_pm">New PM</a><br />
<h3>Unread Messages(<?php echo $row1 ?>):</h3>
<table>
	<tr>
    	<th class="title_cell">Title</th>
        <th>Nb. Replies</th>
        <th>Participant</th>
        <th>Date of creation</th>
    </tr>
<?php
//We display the list of unread messages
while($dn1 = mysqli_fetch_array($req1))
{
$mid = $dn1['m2.id'];
$mti = $dn1['m2.title'];
$mreps = $dn1['reps']-1;
$muid = $dn1['userid'];
$muname = $dn1['User_usrname'];
$mtime = $dn1['timestamp'];
?>
	<tr>
    	<td class="left"><a href="read_pm.php?id=<?php echo $mid ?>"><?php echo htmlentities($mti, ENT_QUOTES, 'UTF-8'); ?></a></td>
    	<td><?php echo $mreps ?></td>
    	<td><a href="profile.php?id=<?php echo $muid ?>"><?php echo htmlentities($muname, ENT_QUOTES, 'UTF-8'); ?></a></td>
    	<td><?php echo date("Y/m/d H:i:s", $mtime )?></td>
    </tr>
<?php
}
//If there is no unread message we notice it
if($row1==0)
{
?>
	<tr>
    	<td colspan="4" class="center">You have no unread message.</td>
    </tr>
<?php
}
?>
</table>
<br />
<h3>Read Messages(<?php echo $row2 ?>):</h3>
<table>
	<tr>
    	<th class="title_cell">Title</th>
        <th>Nb. Replies</th>
        <th>Participant</th>
        <th>Date or creation</th>
    </tr>
<?php
//We display the list of read messages
while($dn2 = mysqli_fetch_array($req2))
{
$mid2 = $dn2['id'];
$mti2 = $dn2['title'];
$mreps2 = $dn2['reps']-1;
$muid2 = $dn2['userid'];
$muname2 = $dn2['User_usrname'];
$mtime2 = $dn2['timestamp'];
?>
	<tr>
    	<td class="left"><a href="read_pm.php?id=<?php echo $mid ?>"><?php echo htmlentities($mti, ENT_QUOTES, 'UTF-8'); ?></a></td>
    	<td><?php echo $mreps ?></td>
    	<td><a href="profile.php?id=<?php echo $muid ?>"><?php echo htmlentities($muname, ENT_QUOTES, 'UTF-8'); ?></a></td>
    	<td><?php echo date("Y/m/d H:i:s", $mtime )?></td>
    </tr>
<?php
}
//If there is no read message we notice it
if($row2==0)
{
?>
	<tr>
    	<td colspan="4" class="center">You have no read message.</td>
    </tr>
<?php
}
?>
</table>
<?php
}
else
{
	echo 'You must be logged to access this page.';
}
?>
		</div>
		<div class="foot"><a href="<?php echo $url_home; ?>">Go Home</a> - <a href="http://www.webestools.com/">Webestools</a></div>
	</body>
</html>