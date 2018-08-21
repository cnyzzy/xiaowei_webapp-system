<?php
empty($params[0]) ? $id = '0' : $id = $params[0];
$Z60Love = new Z60Love($DB);
$Array = $Z60Love-> ReceiveZ60LoveAll($id);