<?php
$Hdxp = new Hdxp($DB);
empty($params[0]) ? $id = '1' : $id = $params[0];

$Arr = $Hdxp->GetHdxpA($id);
$Arrseat = $Hdxp->ReceiveHdxpSeatMini($id,"1 or 0");
if($Arr){
	$seatnum=1;
		$seatrow=1;
if(empty($Arr['seat'])){$Arr['seat']="[ ]";}ELSE
	{$seat1=json_decode($Arr['seat'],true);
 foreach((array)$seat1 as $key=>$loopChild) {
	 $num=strlen($loopChild);
	 $seatrow++;
	 if($num>$seatnum)$seatnum=$num+1;
	}}
if(!empty($Arrseat)){
$unseat= json_encode($Arrseat);
}
}else{

header("Location:{$arrInfo[url]}/hdxp/main"); 

}
$seatjs=
'
  <script type="text/javascript">

            var price = 0; //电影票价
$(window).load(function() {
                var $cart = $("#seats_chose"), //座位区
$tcart = $("#seats_chose2"),
                        $tickects_num = $("#tickects_num"), //票数

                        $total_price = $("#total_price"); //票价总额



                var sc = $("#seats_chose").seatCharts({

                    map: '.$Arr['seat'].',

                    naming: {//设置行列等信息

                        

                        getLabel: function(character, row, column) { //返回座位信息 

                            return column;

                        }

                    },

                    legend: {//定义图例

                        node: $("#legend"),

                        items: [

                            ["c", "available", "可选座"],

                            ["c", "unavailable", "已售出"]

                        ]

                    },

                    click: function() {

                        if (this.status() == "available") { //若为可选座状态，添加座位




                         
		console.log(sc.find("selected").length);
		if(sc.find("selected").length>0){
			popu("最多只能选择1个座位");
			return "available";
		}else{
			   $tickects_num.text(sc.find("selected").length + 1); //统计选票数量
                            $("<li>" + (this.settings.row + 1) + "排" + this.settings.label + "座</li>")

                                    .attr("id", "cart-item-" + this.settings.id)

                                    .data("seatId", this.settings.id)

                                    .appendTo($tcart);
							 $("#x").attr("value", this.settings.row + 1);		
 $("#y").attr("value", this.settings.label);	

		}
			function popu(content){
		layer.open({
			content: content
			,skin: "msg"
			,time: 3
		});	
	}
                            $total_price.text(getTotalPrice(sc) + price);//计算票价总金额



                            return "selected";

                        } else if (this.status() == "selected") { //若为选中状态



                            $tickects_num.text(sc.find("selected").length - 1);//更新票数量

                            $total_price.text(getTotalPrice(sc) - price);//更新票价总金额

                            $("#cart-item-" + this.settings.id).remove();//删除已预订座位

							 $("#x").attr("value","0");		
 $("#y").attr("value", "0");	

                            return "available";

                        } else if (this.status() == "unavailable") { //若为已售出状态

                            return "unavailable";

                        } else {

                            return this.style();

                        }

                    }

                });

                //设置已售出的座位

'
;
if (!empty($unseat))
{$seatjs.="sc.get($unseat).status('unavailable')  });";}
 ELSE
 { $seatjs.="sc.get([]).status('unavailable')  });";
 }




   $seatjs.='       
   
            $(document).ready(function() {

                var $cart = $("#seats_chose"), //座位区
$tcart = $("#seats_chose2"),
                        $tickects_num = $("#tickects_num"), //票数

                        $total_price = $("#total_price"); //票价总额



                var sc = $("#seats_chose").seatCharts({

                    map: '.$Arr['seat'].',

                    naming: {//设置行列等信息

                        

                        getLabel: function(character, row, column) { //返回座位信息 

                            return column;

                        }

                    },

                    legend: {//定义图例

                        node: $("#legend"),

                        items: [

                            ["c", "available", "可选座"],

                            ["c", "unavailable", "已售出"]

                        ]

                    },

                    click: function() {

                        if (this.status() == "available") { //若为可选座状态，添加座位




                         
		console.log(sc.find("selected").length);
		if(sc.find("selected").length>0){
			popu("最多只能选择1个座位");
			return "available";
		}else{
			   $tickects_num.text(sc.find("selected").length + 1); //统计选票数量
                            $("<li>" + (this.settings.row + 1) + "排" + this.settings.label + "座</li>")

                                    .attr("id", "cart-item-" + this.settings.id)

                                    .data("seatId", this.settings.id)

                                    .appendTo($tcart);
							 $("#x").attr("value", this.settings.row + 1);		
 $("#y").attr("value", this.settings.label);	

		}
			function popu(content){
		layer.open({
			content: content
			,skin: "msg"
			,time: 3
		});	
	}
                            $total_price.text(getTotalPrice(sc) + price);//计算票价总金额



                            return "selected";

                        } else if (this.status() == "selected") { //若为选中状态



                            $tickects_num.text(sc.find("selected").length - 1);//更新票数量

                            $total_price.text(getTotalPrice(sc) - price);//更新票价总金额

                            $("#cart-item-" + this.settings.id).remove();//删除已预订座位

							 $("#x").attr("value","0");		
 $("#y").attr("value", "0");	

                            return "available";

                        } else if (this.status() == "unavailable") { //若为已售出状态

                            return "unavailable";

                        } else {

                            return this.style();

                        }

                    }

                });

                //设置已售出的座位

'
;


