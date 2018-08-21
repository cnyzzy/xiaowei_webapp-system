<?php
$WxidArray = $Mjw->ReceiveWxid($HWxidNum,6,1,1);
$LogArray = $Log->ReceiveMeLog($_SESSION['admin']['id']);
$Chart=$Admin->RChart(1);
foreach($Chart as $key=>$value){
            $Chart1[$value['time']]=$value['count'];        
        }
$Chart=$Admin->RChart(0);
foreach($Chart as $key=>$value){
            $Chart0[$value['time']]=$value['count'];        
        }		
$datearray=array();
$weekarray=array("日","一","二","三","四","五","六");
$datearray[0]['date']=date('Y-m-d',strtotime('now'));
$datearray[0]['name']="周".$weekarray[date("w")];
for($i=1;$i<=6;$i++)
{
$datearray[$i]['date']=date('Y-m-d',strtotime('-'.$i.' day'));
$datearray[$i]['name']="周".$weekarray[date("w",strtotime('-'.$i.' day'))];

}
sort($datearray);
if(is_file(ZSystem.'/config/Public/Wx.php')){
$arrWx = SetRead('/system/config/Public/Wx.php');
			}