<?php
if (!defined('BLOCK_FILE')) {
 Header("Location: ../index.php");
 exit;
}

global $CURUSER, $use_sessions, $tracker_lang;

$blocktitle = $tracker_lang['whos_online'];

$a = mysql_fetch_array(sql_query("SELECT id, username FROM users WHERE status='confirmed' ORDER BY id DESC LIMIT 1"));

if ($CURUSER)
	$latestuser = "<a href=userdetails.php?id=" . $a["id"] . " class=\"online\">" . $a["username"] . "</a>";
else
	$latestuser = $a['username'];

$title_who = array();

$dt = sqlesc(time() - 300);

if ($use_sessions)
	$result = sql_query("SELECT s.uid, s.username, s.class FROM sessions AS s WHERE s.time > $dt ORDER BY s.class DESC");
else
	$result = sql_query("SELECT u.id, u.username, u.class FROM users AS u WHERE u.last_access > ".sqlesc(get_date_time(time() - 300))." ORDER BY u.class DESC");

$users = $guests = $staff = $total = 0;

$parsed = array();
$parsed_id = array();

while (list($uid, $uname, $class) = mysql_fetch_row($result)) {
    if (!empty($uname) && !in_array($uname, $parsed)) {
    	$parsed[] = $uname;
    	$title_who[] = "<a href=\"userdetails.php?id=".$uid."\" class=\"online\">".get_user_class_color($class, $uname)."</a>";
    }

    if ($class >= UC_MODERATOR && !in_array($uid, $parsed_id)) {
    	$staff++;
	} elseif (empty($uname)) {
    	$guests++;
    } elseif ($class < UC_MODERATOR && !in_array($uid, $parsed_id)) {
    	$users++;
    }

	if (!in_array($uid, $parsed_id))
		$parsed_id[] = $uid;
    $total++;

	/*if (empty($uname))
		continue;
	else
		$who_online .= $title_who;*/

}

/*if ($staff == "") $staff = 0;
if ($guests == "") $guests = 0;
if ($users == "")  $users = 0;
if ($total == "")  $total = 0;*/

$content .= "<table border=\"0\" width=\"100%\"><tr valign=\"middle\"><td align=\"left\" class=\"embedded\"><b>��������� ������������: </b> $latestuser<hr></td></tr></table>\n";

if (count($title_who)) {
	$content .= "<table border=\"0\" width=\"100%\"><tr valign=\"middle\"><td align=\"left\" class=\"embedded\"><b>��� ������: </b><hr></td></tr><tr><td class=\"embedded\">".@implode(", ", $title_who)."<hr></td></tr></table>\n";
} else {
	$content .= "<table border=\"0\" width=\"100%\"><tr valign=\"middle\"><td align=\"left\" class=\"embedded\"><b>��� ������: </b>��� ������������� �� ��������� 10 �����.<hr></td></tr></table>\n";
}
$content .= "<table border=\"0\" width=\"100%\"><tr valign=\"middle\"><td colspan=\"2\" align=\"left\" class=\"embedded\"><b>� ����: </b></td></tr>\n";
$content .= "<tr><td class=\"embedded\"><img src=\"pic/info/admin.gif\"></td><td width=\"90%\" class=\"embedded\">������: $staff</td></tr>\n";
$content .= "<tr><td class=\"embedded\"><img src=\"pic/info/member.gif\"></td><td width=\"90%\" class=\"embedded\">������������: $users</td></tr>\n";
$content .= "<tr><td class=\"embedded\"><img src=\"pic/info/guest.gif\"></td><td width=\"90%\" class=\"embedded\">�����: $guests</td></tr>\n";
$content .= "<tr><td class=\"embedded\"><img src=\"pic/info/group.gif\"></td><td width=\"90%\" class=\"embedded\">�����: $total</td></tr></table>\n";

?>