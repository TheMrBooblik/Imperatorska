<?php

// ���������

$message = "test php mail";

// �� ������ ���� �����-�� ������ ������ ������� 70 �������� �� ���������� wordwrap()

$message = wordwrap($message, 70);

// ����������

mail('olga1408032@gmail.com', 'My Subject', $message);

?>