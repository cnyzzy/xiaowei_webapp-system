<?php
empty($params[0]) ? $id = '0' : $id = $params[0];
$Sxzs = new Sxzs($DB);
$Array = $Sxzs-> GetSxzsCJ($id);