<?php

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

require "include/bittorrent.php";

dbconn();

//loggedinorreturn();

stdhead("�������");

begin_main_frame();

?>

<? begin_frame("����� ������� - <font color=#004E98>�� ������������ - �������� � �������!</font>"); ?>
<ul>
<li>������ ������� �� �������� ���������� � ����������� ��� ���������� ����� ��� ���������� �������������� ������� ������ �� <i>�������� ������������</i> �� <i>����������</i> (�������������� � �������� - ��� ����, ��� ������� ��������������� - ��������� �� ������ ����������). ���� ��� �� �������� ��� ������� � �� ������ ��� ���� ������ ������� - �� ������ ������ ������� ���� ����������� ���� � ������ ��� ���, ��� ��� ��������.</li>
<li><b>����� ������������� - ����� ��� ������������� �������!</b> � ���� ������� ��� ���������� - <?=$SITENAME?> �������� ������� ���������� ��������, � ��� �������� ������������ ������������� ����������� �������.</li>
<li><a name="warning"></a>�������� ���������� ������ ������� �������� �������������� (<img src="pic/warned.gif"> ). ��� ������, ��� <b>����������</b> �������������� �� �����! ������������ ����� ������ ������ � �������.</li>
<li>� ������ ����������� ��������� ������, ���������� ����� ������� - ������ � ������� � ��� IP ������ ����� ������.</li>
<li>�� ������������� ��� ���� ��������� ��������� - �� ��������� ��������� ���� ���� ������ � ��� ����� ��������� �������� ������ ����.</li>
<li>������� �� ������ � �� <?=$SITENAME?> ������ �� ������������ <b>������� �����</b>. ������ ����� �� ������ ������������ ������ � ������ ������� �������������. � ������ ���������� ������� ��������� ���������, ����������� <i>��������</i> ��� <i>����������� ���������</i>.
<li>�� ���� ����� ������������ � ����������, ������������ �� ��������� ������ ������ �������. �� ����� ������ ��� �������� �������� � ����� ������� � ����������� � ������ �����. ����� ������� ������ ������� �� ������ �������� � �������� ��������� �� <a href=forums.php>������</a>, ��� ������� �������� ������������� ������ � <b>������� ���������</b>, ��������� ������� ������ ���������.
<li>����������� ��� ����������� ������ <b>�������</b> email �����. �� ����� ������ ������ �������� ��� � ����� ������� ������������. �� �� ����������� ��� ���������� �������� ������ <u>Mail.ru</u> ��� <u>hotmail.com</u> ��-�� ������������ �� ��� ����������� �������� ����-�����. ���� �� ����� �� ��������� ������ � �������������� � �����������/���������������, �������� <a href=./faq.php>����</a> ��� ����������� ������ �������� ������. � ���� ������� �� �������� ���, ��� ��� �������� �����, ����� ��� ����� ������ ���� ������������ ����������, �� ����� ������������ �� � ����� ������ ����� � ������� �� ����� �������� ������� �����. �� ����������� ��� ����� ������� �������������� ������ ��� ����� (����� <a href=http://www.icq.com>ICQ</a>, ��� � <a href=http://www.skype.com>Skype</a> ��� � <a href=http://www.msn.com>MSN</a>) � ���� � ��� ������, ���� ��������� ����� �������������. </li>

<? end_frame(); ?>
<? begin_frame("������� ������� - <font color=#004E98>������ �� ������!</font>"); ?>
<ul>
<li>������ � ������ ������ ������� ����� �� ��������� - ��� ������ �������� �� ��������� <i>antileech</i> �������. �� ��� �� ������, ��� �� �� ����� �������� �� �����.</li>
<li>�� ���������, �� ������ ���� <b>����� ������������ �� 4 ��������� ��������</b>. ���� ��� ����� ��������� �������, �� ������ ��������� � ��������������� �������� � ������ �� ���������������.
<li>������������� ����� ��������� � ��������� � ����� ������������� � �� �������� ������������ ����������� ������������ ������ "�� ���������". �� �������� ��� �� ��� �� ������ ��������� � ������ �������������, ��������� � � �������������.</li>
<li>����������� ����������� "������/�����" ����� 1, �� ���� ������� ������ - ������� � �����. ���������� ������������ ���, ���� ������ ������ � ����������� ����� �� ����� �������, ��� ������, � �� ����� ������: �� ���������� ��� ���������� ������ ��� ����� ������! � ������, ���� �� �������� ������������ ����� (���������� ������ �����) �� �������, ���������� ����������� �� �������, ���� ���� ��� ������� ���� 1 - ������� �� ������� ����-��, ������ �� ������� ���.</li>
<li>���� � ��� ��������� ����� �������� �� ����������� (������ ����������� ���������� ���� ����������, �� �� ������ ����������� � �������, �������� ����� ������� ����� ������), �������� ���� <a href=./faq.php>����</a> - �� ������ � ��� ��� ����������� ��� ����������. � ������ ������������� �����-���� �������� �� ���������� �������, ������� ���������� �� � �������������, � � ����������, ��������� ������� ������ ��������� ��� ������������ � �������.</li>
<? end_frame(); ?>
<? begin_frame("������� ��������������� ���������<!-- - <font color=#004E98>Please follow these guidelines or else you might end up with a warning!</font>-->"); ?>
<? begin_frame(); ?>
<b>�����������, ���������� ���������� �������� �/��� ����������������, ���������� � ������� - ������ �� ��������, � �� �� ������ ����!</b>
<? end_frame(); ?>
<ul>
<li>������� ������������ ��������� ������� ��� ���� �����: (1) ��������� ���� <i>��������</i> � <i>�������������</i> ����������, (2) ������ ������������ ��� <i>���������� ����������� ������</i> ������������ ������� ��� ������,(3) �������� <i>���������� ����������</i>, ����������� � �������.
<li>���� �� �� �������� ������������ � �������, �� ������������� ��.
<li>�������� ������� ����� ����� ������������� �������� � ������������.
<li>��������� ����� � ����.
<li>��������� ������ �� �����-�������.
<li>������� �������� �������, ������ � ������ <b>���������</b>.
<li>�������, ������� �� ����� ������� �� � ���� ���� �� ������������� ��� �������������� ����� ������ ��������: ���� ��� �� �������� �������, ���������� �������� ���-���� ���������� ��� � ������ �����.</li>
<? end_frame(); ?>
<? begin_frame("������������ � �������� - <font color=#004E98>������������ ������� ��������� �������������� ��������</font>"); ?>
<ul>
<li>��������� ������� .gif, .jpg � .png.</li>
<li>������������� ���������: <b><?=$avatar_max_width;?> X <?=$avatar_max_height;?> ��������</b> � ������ � �� �������� ����� 150 K�.</li>
<li>�� ����������� �������������� ��������� (� ������: ����������� � ������������ ���������, ���������, ������������ ����������, ������� � �����������). ������������? �������� <a href=staff.php>�������������</a>.</li>
<? end_frame(); ?>

<? if (get_user_class() >= UC_UPLOADER) { ?>

<? begin_frame("������� �������� - <font color=#004E98>Torrents violating these rules may be deleted without notice</font>"); ?>
<ul>
<li>All uploads must include a proper NFO.</li>
<li>Only scene releases. If it's not on <a href=redir.php?url=http://www.nforce.nl class=altlink>NFOrce</a> or <a href=http://www.grokmusiq.com/ class=altlink>grokMusiQ</a> then forget it!</li>
<li>The stuff must not be older than seven (7) days.</li>
<li>All files must be in original format (usually 14.3 MB RARs).</li>
<li>Pre-release stuff should be labeled with an *ALPHA* or *BETA* tag.</li>
<li>Make sure not to include any serial numbers, CD keys or similar in the description (you do <b>not</b> need to edit the NFO!).</li>
<li>Make sure your torrents are well-seeded for at least 24 hours.</li>
<li>Do not include the release date in the torrent name.</li>
<li>Stay active! You risk being demoted if you have no active torrents.</li>
</ul>
<br />
<ul>
If you have something interesting that somehow violate these rules (e.g. not ISO format), ask a mod and we might make an exception.

<? end_frame(); ?>

<? } if (get_user_class() >= UC_MODERATOR) { ?>

<? begin_frame("������ �� $SITENAME - <font color=#004E98>���������� � �����������</font>"); ?>
<br />
<table border=0 cellspacing=3 cellpadding=0>
<tr>
	<td class=embedded bgcolor="#F5F4EA" valign=top>&nbsp; <b><font color="black">������������</font></b></td>
	<td class=embedded width=5>&nbsp;</td>
	<td class=embedded>�������, ���������� ������������ �������</td></tr>
<tr>
	<td class=embedded bgcolor="#F5F4EA" valign=top>&nbsp; &nbsp;&nbsp;<b><font color="#D21E36">�������&nbsp;������������</font></b></td>
	<td class=embedded width=5>&nbsp;</td>
	<td class=embedded>������ ������������� ����������� (� ��������) ��� ������ � �������������, ��� ������� ������� �� ����� 4 ������, ��� ����� ����� 25 GB � ����� ������� 1.05. ��������� ����� ������� ��������� ���� ������ �� ���������� ��������������� ���������� �������.</td>
</tr>
<!--<tr>
	<td class=embedded bgcolor="#F5F4EA" valign=top>&nbsp; <b><img src="pic/star.gif"></b></td>
	<td class=embedded width=5>&nbsp;</td>
	<td class=embedded>This status is given ONLY by Redbeard since he is the only one who can verify that they actually donated something.</td>
</tr>-->
<tr>
	<td class=embedded bgcolor="#F5F4EA" valign=top>&nbsp; <b><font color="#9C2FE0">VIP</font></b></td>
	<td class=embedded width=5>&nbsp;</td>
	<td class=embedded>�������, ����������� ���������� ��� ������ ������ �����</td>
</tr>
<!--<tr>
	<td class=embedded bgcolor="#F5F4EA" valign=top>&nbsp; <b>Other</b></td>
	<td class=embedded width=5>&nbsp;</td>
	<td class=embedded>����������� ������ ��� ������ � ������ �������� <?=$SITENAME?>.</td>
</tr>-->
<tr>
	<td class=embedded bgcolor="#F5F4EA" valign=top>&nbsp; <b><font color="orange">����������</font></b></td>
	<td class=embedded width=5>&nbsp;</td>
	<td class=embedded>������������ � ������ ��������� �� <?=$SITENAME?>. ������������� ����������������. ���� ���������� ���������? ������ � ������, �� �����������.</td>
</tr>
<tr>
	<td class=embedded bgcolor="#F5F4EA" valign=top>&nbsp; <b><font color="red">���������</font></b></td>
	<td class=embedded width=5>&nbsp;</td>
	<td class=embedded>����������� �������������� � ����� ������� �����������.</td>
</tr>
<tr>
	<td class=embedded bgcolor="#F5F4EA" valign=top>&nbsp; <b><font color="green">�������������</font></b></td>
	<td class=embedded width=5>&nbsp;</td>
	<td class=embedded>���� ���������������� ����������.</td>
</tr>
</table>
<br />
<?
	end_frame();
	begin_frame("������� ������������� - <font color=#004E98>Use your better judgement!</font>");
?>
<ul>
<!--<li>The most important rule: Use your better judgment!</li>-->
<li>�� ������� ������� <b>���</b>! (a.k.a. "Helshad's rule".)
<!--<li>Don't defy another mod in public, instead send a PM or through IM.</li>-->
<li>������ ������������! ����� ������������(��) ���� �� ������������.</li>
<!--<li>Don't act prematurely, let the users make their mistakes and THEN correct them.</li>-->
<li>���������� ��������� ����� "��� �����" ������ ���������� ����.</li>
<li>����������� ���� ������ ���� ���-�� ���������.</li>
<!--<li>Be tolerant when moderating the Chit-chat section (give them some slack).</li>-->
<li>���� �� ������� ����, �������� �������� ���������� ������ �� �� �������.</li>
<li>������ ��� ��������� �������, �������� ���/�� �� � ���� ��� �������, ���������� �� ������������� ���� �� 2 ������.</li>
<li>�� ���������� ������� ������������ ���� �� ��� ��� �� ���� ������ ����-�� 4 ������.</li>
<li><b>������</b> ���������� ������� (� ���� �����������) ������ �� �������� / ������������ ������������.</li>
<br />

<?
	end_frame();
	begin_frame("����������� ����������� - <font color=#004E98>����� ��� ���������� ��� ����������?</font>");
?>
<ul>
<li>�� ������ ������� � ������������� ����� � ������.</li>
<li>�� ������ ������� � ������������� ��������.</li>
<li>�� ������ ������� � ������������� ������� �������������.</li>
<li>�� ������ ��������� �������������.</li>
<li>�� ������ ������������� ������ VIP'��.</li>
<li>�� ������ ������ ������ ���������� � �������������.</li>
<li>�� ������ ��������� ���������� � ������������� (��� ������ ����������� � ���������������).</li>
<li>�� ������ ��������� ������ ������-��� �� ��� ������ ��� ��� �����������. ;)</li>
<li>� ����� ������ ���������� ��������� <a href=staff.php class=altlink>�������������</a> (������ ������� ����).</li>

<? end_frame(); ?>

<p align=right><font size=1 color=#004E98><b>������� ��������������� 30.07.2006 (03:41 GMT+2)</b></font></p>

<? }
end_main_frame();
stdfoot(); ?>