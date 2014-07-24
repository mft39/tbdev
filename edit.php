<?

/*
// +--------------------------------------------------------------------------+
// | Project:    TBDevYSE - TBDev Yuna Scatari Edition                        |
// +--------------------------------------------------------------------------+
// | This file is part of TBDevYSE. TBDevYSE is based on TBDev,               |
// | originally by RedBeard of TorrentBits, extensively modified by           |
// | Gartenzwerg.                                                             |
// |                                                                          |
// | TBDevYSE is free software; you can redistribute it and/or modify         |
// | it under the terms of the GNU General Public License as published by     |
// | the Free Software Foundation; either version 2 of the License, or        |
// | (at your option) any later version.                                      |
// |                                                                          |
// | TBDevYSE is distributed in the hope that it will be useful,              |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of           |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            |
// | GNU General Public License for more details.                             |
// |                                                                          |
// | You should have received a copy of the GNU General Public License        |
// | along with TBDevYSE; if not, write to the Free Software Foundation,      |
// | Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA            |
// +--------------------------------------------------------------------------+
// |                                               Do not remove above lines! |
// +--------------------------------------------------------------------------+
*/

require_once("include/bittorrent.php");

if (!mkglobal("id"))
	die();

$id = intval($id);
if (!$id)
	die();

dbconn();

loggedinorreturn();

$res = sql_query("SELECT * FROM torrents WHERE id = $id");
$row = mysql_fetch_array($res);
if (!$row)
	die();

stdhead("�������������� �������� \"" . $row["name"] . "\"");

if (!isset($CURUSER) || ($CURUSER["id"] != $row["owner"] && get_user_class() < UC_MODERATOR)) {
	stdmsg($tracker_lang['error'],"�� �� ������ ������������� ���� �������.");
} else {
	print("<form name=\"edit\" method=post action=takeedit.php enctype=multipart/form-data>\n");
	print("<input type=\"hidden\" name=\"id\" value=\"$id\">\n");
	if (isset($_GET["returnto"]))
		print("<input type=\"hidden\" name=\"returnto\" value=\"" . htmlspecialchars_uni($_GET["returnto"]) . "\" />\n");
	print("<table border=\"1\" cellspacing=\"0\" cellpadding=\"5\">\n");
	print("<tr><td class=\"colhead\" colspan=\"2\">������������� �������</td></tr>");
	if ($row['multitracker'] == 'no')
		tr($tracker_lang['torrent_file'], "<input type=file name=tfile size=80>\n", 1); // disable torrent update for multitracked ones
	tr($tracker_lang['torrent_name'], "<input type=\"text\" name=\"name\" value=\"" . $row["name"] . "\" size=\"80\" />", 1);
	tr($tracker_lang['img_poster'], "<input type=radio name=img1action value='keep' checked>�������� ������&nbsp&nbsp"."<input type=radio name=img1action value='delete'>������� ������&nbsp&nbsp"."<input type=radio name=img1action value='update'>�������� ������<br /><b>������:</b>&nbsp&nbsp<input type=file name=image0 size=80>", 1);
	tr($tracker_lang['images'],
		"<input type=radio name=img2action value='keep' checked>�������� �������� �1&nbsp&nbsp"."<input type=radio name=img2action value='delete'>������� �������� �1&nbsp&nbsp"."<input type=radio name=img2action value='update'>�������� �������� �1<br /><b>�������� �2:</b>&nbsp&nbsp<input type=file name=image1 size=80><br /><br />".
		"<input type=radio name=img3action value='keep' checked>�������� �������� �2&nbsp&nbsp"."<input type=radio name=img3action value='delete'>������� �������� �2&nbsp&nbsp"."<input type=radio name=img3action value='update'>�������� �������� �2<br /><b>�������� �3:</b>&nbsp&nbsp<input type=file name=image2 size=80><br /><br />".
		"<input type=radio name=img4action value='keep' checked>�������� �������� �3&nbsp&nbsp"."<input type=radio name=img4action value='delete'>������� �������� �3&nbsp&nbsp"."<input type=radio name=img4action value='update'>�������� �������� �3<br /><b>�������� �4:</b>&nbsp&nbsp<input type=file name=image3 size=80><br /><br />".
		"<input type=radio name=img5action value='keep' checked>�������� �������� �4&nbsp&nbsp"."<input type=radio name=img5action value='delete'>������� �������� �4&nbsp&nbsp"."<input type=radio name=img5action value='update'>�������� �������� �4<br /><b>�������� �5:</b>&nbsp&nbsp<input type=file name=image4 size=80>", 1);
if ((strpos($row["ori_descr"], "<") === false) || (strpos($row["ori_descr"], "&lt;") !== false))
  $c = "";
else
  $c = " checked";
	//tr("��������", "<textarea name=\"descr\" rows=\"10\" cols=\"80\">" . htmlspecialchars_uni($row["ori_descr"]) . "</textarea><br />(HTML <b>��</b> ��������. ������� <a href=tags.php>����</a> ��� ��������� ���������� � �����.)", 1);
	print("<tr><td class=rowhead style='padding: 3px'>".$tracker_lang['description']."</td><td>");
	textbbcode("edit","descr",htmlspecialchars_uni($row["ori_descr"]));
	print("</td></tr>\n");

	$s = "<select name=\"type\">\n";

	$cats = genrelist();
	foreach ($cats as $subrow) {
		$s .= "<option value=\"" . $subrow["id"] . "\"";
		if ($subrow["id"] == $row["category"])
			$s .= " selected=\"selected\"";
		$s .= ">" . htmlspecialchars_uni($subrow["name"]) . "</option>\n";
	}

	$s .= "</select>\n";
	tr("���", $s, 1);
	tr("�������", "<input type=\"checkbox\" name=\"visible\"" . (($row["visible"] == "yes") ? " checked=\"checked\"" : "" ) . " value=\"1\" />
					������� � ���������<br /><table border=0 cellspacing=0 cellpadding=0 width=420><tr><td class=embedded>�������� ��������, ��� ������� ������������� ������ ������� ����� ��������� ��������� � ������������� ���������� ���� ������� (������ ���������) ����� �� ����� ���������� ��������� �����.
					����������� ���� ������������� ��� ��������� �������. ����� ������ ��� ��������� �������� (��������) ���-����� ����� ���� ����������� � �������, ��� ������ �� ��-���������.</td></tr></table>", 1);
	if(get_user_class() >= UC_ADMINISTRATOR)
		tr("�������", "<input type=\"checkbox\" name=\"banned\"" . (($row["banned"] == "yes") ? " checked=\"checked\"" : "" ) . " value=\"1\" />", 1);
    if(get_user_class() >= UC_ADMINISTRATOR)
        tr("��� �������",
"<input type=\"radio\" name=\"free\" id=\"gold\" value=\"yes\"" . (($row["free"] == "yes") ? " checked" : "") . " /><label for=\"gold\">������� ������� (���������� ������ �������, ������ �� ������������)</label><br />".
"<input type=\"radio\" name=\"free\" id=\"silver\" value=\"silver\"" . (($row["free"] == "silver") ? " checked" : "") . " /><label for=\"silver\">���������� ������� (������ �� ������������ ������ �� 50%)</label><br />".
"<input type=\"radio\" name=\"free\" id=\"no\" value=\"no\"" . (($row["free"] == "no") ? " checked" : "") . " /><label for=\"no\">������� ������� (������ � ������� ������������ ��� ������)</label><br />"
, 1);
    if(get_user_class() >= UC_ADMINISTRATOR)
        tr("������", "<input type=\"checkbox\" name=\"not_sticky\"" . (($row["not_sticky"] == "no") ? " checked=\"checked\"" : "" ) . " value=\"yes\" /> ���������� ���� ������� (������ �������)", 1);
	print("<tr><td colspan=\"2\" align=\"center\"><input type=\"submit\" value=\"���������������\" style=\"height: 25px; width: 100px\"> <input type=reset value=\"�������� ���������\" style=\"height: 25px; width: 100px\"></td></tr>\n");
	print("</table>\n");
	print("</form>\n");
	print("<p>\n");
	print("<form method=\"post\" action=\"delete.php\">\n");
  print("<table border=\"1\" cellspacing=\"0\" cellpadding=\"5\">\n");
  print("<tr><td class=embedded style='background-color: #F5F4EA;padding-bottom: 5px' colspan=\"2\"><b>������� �������</b> �������:</td></tr>");
  print("<td><input name=\"reasontype\" type=\"radio\" value=\"1\">&nbsp;������� </td><td> 0 ���������, 0 �������� = 0 ����������</td></tr>\n");
  print("<tr><td><input name=\"reasontype\" type=\"radio\" value=\"2\">&nbsp;��������</td><td><input type=\"text\" size=\"40\" name=\"reason[]\"></td></tr>\n");
  print("<tr><td><input name=\"reasontype\" type=\"radio\" value=\"3\">&nbsp;Nuked</td><td><input type=\"text\" size=\"40\" name=\"reason[]\"></td></tr>\n");
  print("<tr><td><input name=\"reasontype\" type=\"radio\" value=\"4\">&nbsp;�������</td><td><input type=\"text\" size=\"40\" name=\"reason[]\">(�����������)</td></tr>");
  print("<tr><td><input name=\"reasontype\" type=\"radio\" value=\"5\" checked>&nbsp;������:</td><td><input type=\"text\" size=\"40\" name=\"reason[]\">(�����������)</td></tr>\n");
	print("<input type=\"hidden\" name=\"id\" value=\"$id\">\n");
	if (isset($_GET["returnto"]))
		print("<input type=\"hidden\" name=\"returnto\" value=\"" . htmlspecialchars_uni($_GET["returnto"]) . "\" />\n");
  print("<td colspan=\"2\" align=\"center\"><input type=submit value='�������' style='height: 25px'></td></tr>\n");
  print("</table>");
	print("</form>\n");
	print("</p>\n");
}

stdfoot();

?>