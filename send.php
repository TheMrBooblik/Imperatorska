<?php

// если почту не ввели
if(!$_POST['email']){ //если пустой/отсутствует
    $_POST['email'] = "i.am.bomjara@gmail.com";
 }

if(!$_POST['phone']  || !$_POST['name']){ // антиспам
     exit("<center>
              <table width='600' height='300' align='center'>
           <tr>
           <td class='warning_table' width='220' align='center' valign='middle'>
           <div align='center' class='warning_font_big'>Спасибо!</div>
           <div align='center' class='warning_font' align='left'>Ваш заказ передан в отдел доставки.<br />Для уточнения деталей в ближайшее время с Вами свяжется наш менеджер.</div>
           <p align='center'><a href='index.html' class='all_links'>Вернуться назад</a></div></p>
           </td>
           </tr>
           </table></center>");
 }

if ($_POST['emoil'] != '') exit('Спасибо! Ваш заказ передан в отдел доставки.');

$sendto   = "sales@imperatorska.com.ua"; // почта, на которую будет приходить письмо
$username = $_POST['name'];   // сохраняем в переменную данные полученные из поля c именем
$usertel = $_POST['phone']; // сохраняем в переменную данные полученные из поля c телефонным номером
$usermail = $_POST['email']; // сохраняем в переменную данные полученные из поля c адресом электронной почты
// $userbottle = $_POST['tara'];
$usemess = $_POST['message'];
$userpromo = $_POST['promo'];



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
$msg .= "<p><strong>ПРОМОКОД:</strong> ".$userpromo."</p>\r\n";
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
 
 <!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '2487806454772455');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=2487806454772455&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
 
 
 
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