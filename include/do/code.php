<?php
ob_clean();
session_start();
$_vc = new ValidateCode();  //ʵ����һ������
$_vc->doimg();  
$_SESSION['authnum_session'] = $_vc->getCode();//��֤�뱣�浽SESSION��