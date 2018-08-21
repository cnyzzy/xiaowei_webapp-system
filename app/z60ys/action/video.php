<?php
empty($params[0]) ? $NoticeW = '1' : $NoticeW = $params[0];
$Z60ys = new Z60ys($DB);
$NoticeArray1=$Z60ys->ReceiveGruopListIMG($NoticeW);


