<?php

// если почту не ввели
if(!$_POST['email']){ //если пустой/отсутствует
    $_POST['email'] = "i.am.bomjara@gmail.com";
 }

 if(!$_POST['phone']  || !$_POST['name']){ // антиспам
     die('BOT, FUCK OFF FROM MY SITE!!!');
  }


$sendto   = "sales@imperatorska.com.ua"; // почта, на которую будет приходить письмо
$username = $_POST['name'];   // сохраняем в переменную данные полученные из поля c именем
$usertel = $_POST['phone']; // сохраняем в переменную данные полученные из поля c телефонным номером
$usermail = $_POST['email']; // сохраняем в переменную данные полученные из поля c адресом электронной почты
// $userbottle = $_POST['tara'];
$usemess = $_POST['message'];
// $userpromo = $_POST['promo'];
 
// Формирование заголовка письма
$subject  = "New order for water delivery Imperatorska";
$headers  = "From: " . strip_tags($usermail) . "\r\n";
$headers .= "Reply-To: ". strip_tags($usermail) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html;charset=Windows-1251 \r\n";
 
// Формирование тела письма
$msg  = "<html><body style='font-family:Arial,sans-serif;'>";
$msg .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>Cообщение с сайта</h2>\r\n";
$msg .= "<p><strong>От кого:</strong> ".$username."</p>\r\n";
$msg .= "<p><strong>Телефон:</strong> ".$usertel."</p>\r\n";
// $msg .= "<p><strong>Залоговая тара:</strong> ".$userbottle."</p>\r\n";
$msg .= "<p><strong>Детали заказа:</strong> ".$usemess."</p>\r\n";
// $msg .= "<p><strong>ПРОМОКОД:</strong> ".$userpromo."</p>\r\n";
$msg .= "</body></html>";

// отправка сообщения
if(@mail($sendto, $subject, $msg, $headers)) {
    echo "<center>
    <table width='600' height='300' align='center'>
 <tr>
 <td class='warning_table' width='220' align='center' valign='middle'>
 <div align='center' class='warning_font_big'>Спасибо!</div>
 <div align='center' class='warning_font' align='left'>Ваш заказ передан в отдел доставки.<br />Для уточнения деталей в ближайшее время с Вами свяжется наш менеджер!</div>
 <p align='center'><a href='index.html' class='all_links'>Вернуться назад</a></div></p>
 </td>
 </tr>
 </table></center>";
} else {
    echo "<center><table width='600' height='300' align='center'>
 <tr>
 <td class='warning_table' width='220' align='center' valign='middle'>
 <div align='center' class='warning_font_big'>ОШИБКА!!!</div>
 <div align='center' class='warning_font' align='left'>Ваше письмо не доставлено. Повторите отправку немного позже!</div>
 <p align='center'><a href='index.html' class='all_links'>Вернуться назад</a></div></p>
 
 </td>
 </tr>
 </table></center>";
}
?>