<?php

$sendto   = "sales@imperatorska.com.ua"; // �����, �� ������� ����� ��������� ������
$username = $_POST['name'];   // ��������� � ���������� ������ ���������� �� ���� c ������
$usertel = $_POST['phone']; // ��������� � ���������� ������ ���������� �� ���� c ���������� �������
$usermail = $_POST['email']; // ��������� � ���������� ������ ���������� �� ���� c ������� ����������� �����
$userbottle = $_POST['tara'];
$usemess = $_POST['message'];
$userpromo = $_POST['promo'];
 
// ������������ ��������� ������
$subject  = "New order for water delivery Imperatorska";
$headers  = "From: " . strip_tags($usermail) . "\r\n";
$headers .= "Reply-To: ". strip_tags($usermail) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html;charset=Windows-1251 \r\n";
 
// ������������ ���� ������
$msg  = "<html><body style='font-family:Arial,sans-serif;'>";
$msg .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>C�������� � �����</h2>\r\n";
$msg .= "<p><strong>�� ����:</strong> ".$username."</p>\r\n";
$msg .= "<p><strong>�������:</strong> ".$usertel."</p>\r\n";
$msg .= "<p><strong>��������� ����:</strong> ".$userbottle."</p>\r\n";
$msg .= "<p><strong>������ ������:</strong> ".$usemess."</p>\r\n";
$msg .= "<p><strong>��������:</strong> ".$userpromo."</p>\r\n";
$msg .= "</body></html>";
 
// �������� ���������
if(@mail($sendto, $subject, $msg, $headers)) {
    echo "<center>
    <table width='600' height='300' align='center'>
 <tr>
 <td class='warning_table' width='220' align='center' valign='middle'>
 <div align='center' class='warning_font_big'>�������!</div>
 <div align='center' class='warning_font' align='left'>��� ����� ������� � ����� ��������.<br />��� ��������� ������� � ��������� ����� � ���� �������� ��� ��������!</div>
 <p align='center'><a href='index.html' class='all_links'>��������� �����</a></div></p>
 </td>
 </tr>
 </table></center>";
} else {
    echo "<center><table width='600' height='300' align='center'>
 <tr>
 <td class='warning_table' width='220' align='center' valign='middle'>
 <div align='center' class='warning_font_big'>������!!!</div>
 <div align='center' class='warning_font' align='left'>���� ������ �� ����������. ��������� �������� ������� �����!</div>
 <p align='center'><a href='index.html' class='all_links'>��������� �����</a></div></p>
 
 </td>
 </tr>
 </table></center>";
}
?>