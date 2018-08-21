<?php
Array
                (
                    'img' => '',
                    'title' => '要坚持无禁区、全覆盖、零容忍，坚持_______，坚持受贿行贿一起查，坚决防止党内形成利益集团。',
                    'score' => 1,
                    'isMultiselect' => '',
                    'answer' => Array
                        (
                            '0' => Array
                                (
                                    'content' => '重遏制、强高压、长震慑',
                                    'isRight' => 1,
                                )
,'1' => Array
                                (
                                    'content' => '重遏制、不减压、长震慑',
                                    'isRight' => '',
                                ),
                            '2' => Array
                                (
                                    'content' => '重遏制、强高压、长威慑',
                                    'isRight' => '',
                                )

                        )

                ),Array
                (
                    'img' => '',
                    'title' => '增强党自我净化能力，根本靠强化____和____。',
                    'score' => 1,
                    'isMultiselect' => '',
                    'answer' => Array
                        (
                            '0' => Array
                                (
                                    'content' => '党的自我监督　群众监督',
                                    'isRight' => 1,
                                )
,'1' => Array
                                (
                                    'content' => '党的自我监督　司法监督',
                                    'isRight' => '',
                                ),
                            '2' => Array
                                (
                                    'content' => '党的自我监督　民主监督',
                                    'isRight' => '',
                                )

                        )

                ),Array
                (
                    'img' => '',
                    'title' => '______是两岸关系的政治基础。',
                    'score' => 1,
                    'isMultiselect' => '',
                    'answer' => Array
                        (
                            '0' => Array
                                (
                                    'content' => '一个中国原则',
                                    'isRight' => 1,
                                )
,'1' => Array
                                (
                                    'content' => '“九二共识”',
                                    'isRight' => '',
                                ),
                            '2' => Array
                                (
                                    'content' => '和平统一',
                                    'isRight' => '',
                                )

                        )

                ),Array
                (
                    'img' => '',
                    'title' => '军队是要准备打仗的，一切工作都必须坚持____标准，向能打仗、打胜仗聚焦。',
                    'score' => 1,
                    'isMultiselect' => '',
                    'answer' => Array
                        (
                            '0' => Array
                                (
                                    'content' => '战斗力',
                                    'isRight' => 1,
                                )
,'1' => Array
                                (
                                    'content' => '斗争力',
                                    'isRight' => '',
                                ),
                            '2' => Array
                                (
                                    'content' => '硬实力',
                                    'isRight' => '',
                                )

                        )

                ),Array
                (
                    'img' => '',
                    'title' => '军队是要准备打仗的，一切工作都必须坚持____标准，向能打仗、打胜仗聚焦。',
                    'score' => 1,
                    'isMultiselect' => '',
                    'answer' => Array
                        (
                            '0' => Array
                                (
                                    'content' => '战斗力',
                                    'isRight' => 1,
                                )
,'1' => Array
                                (
                                    'content' => '斗争力',
                                    'isRight' => '',
                                ),
                            '2' => Array
                                (
                                    'content' => '硬实力',
                                    'isRight' => '',
                                )

                        )

                ),
 if (version_compare(PHP_VERSION, '5.4.0') >= 0) {
function json_encode_ex($var) {
return json_encode($var, JSON_UNESCAPED_UNICODE);
}
} else {
function json_encode_ex($var) {
if ($var === null)
return 'null';
 
if ($var === true)
return 'true';
if ($var === false)
return 'false';
static $reps = array(
array("", "/", "n", "t", "r", "b", "f", '"', ),
array('', '/', 'n', 't', 'r', 'b', 'f', '"', ),
);
if (is_scalar($var))
return '"' . str_replace($reps[0], $reps[1], (string) $var) . '"';
if (!is_array($var))
throw new Exception('JSON encoder error!');
$isMap = false;
$i = 0;
foreach (array_keys($var) as $k) {
if (!is_int($k) || $i++ != $k) {
$isMap = true;
break;
}
}
$s = array();
if ($isMap) {
foreach ($var as $k => $v)
$s[] = '"' . $k . '":' . call_user_func(__FUNCTION__, $v);
return '{' . implode(',', $s) . '}';
} else {
foreach ($var as $v)
$s[] = call_user_func(__FUNCTION__, $v);
return '[' . implode(',', $s) . ']';
}
}
}
$question=
ARRAY(
 Array
  (
                    'title' => '中国共产党第十九次全国代表大会，是在全面建成小康社会决胜阶段、中国特色社会主义进入_____的关键时期召开的一次十分重要的大会。',
                    'img' => '',
                    'score' => 1,
                    'answer' => Array
                        (
                            '0' => Array
                                (
                                    'content' => '新时期',
                                    'isRight' => ''
                                ),

                            '1' => Array
                                (
                                    'content' => '新时代',
                                    'isRight' => 1
                                ),
							 '2' => Array
                                (
                                    'content' => '新阶段',
                                    'isRight' => ''
                                ),	
								'3' => Array
                                (
                                    'content' => '新征程',
                                    'isRight' => ''
                                )

                        ),

                    'id' => '8ySKDGKd',
                    'isMultiselect' => '',
                ),
				Array
                (
                    'img' => '',
                    'title' => '十九大的主题是：不忘初心，____，高举中国特色社会主义伟大旗帜，决胜全面建成小康社会，夺取新时代中国特色社会主义伟大胜利，为实现中华民族伟大复兴的中国梦不懈奋斗。',
                    'score' => 1,
                    'isMultiselect' => '',
                    'answer' => Array
                        (
                            '0' => Array
                                (
                                    'content' => '牢记使命',
                                    'isRight' => 1,
                                ),

                            '1' => Array
                                (
                                    'content' => '砥砺前行',
                                    'isRight' => '',
                                ),
							 '2' => Array
                                (
                                    'content' => '方得始终',
                                    'isRight' => ''
                                ),	
								'3' => Array
                                (
                                    'content' => '继续前行',
                                    'isRight' => ''
                                )

                        ),

                ),Array
                (
                    'img' => '',
                    'title' => '我国社会主要矛盾已经转化为人民日益增长的美好生活需要和（    ）之间的矛盾。',
                    'score' => 1,
                    'isMultiselect' => '',
                    'answer' => Array
                        (
                            '0' => Array
                                (
                                    'content' => '落后的社会生产力',
                                    'isRight' => '',
                                )
,'1' => Array
                                (
                                    'content' => '不充分不平衡的发展',
                                    'isRight' => '',
                                ),
                            '2' => Array
                                (
                                    'content' => '不平衡不充分的发展',
                                    'isRight' => 1,
                                )

                        )

                ),Array
                (
                    'img' => '',
                    'title' => '解决台湾问题、实现祖国完全统一，是全体中华儿女____，是中华民族____所在。',
                    'score' => 1,
                    'isMultiselect' => '',
                    'answer' => Array
                        (
                            '0' => Array
                                (
                                    'content' => '一致愿望　根本利益',
                                    'isRight' => '',
                                ),
'1' => Array
                                (
                                    'content' => '共同愿望　本质利益',
                                    'isRight' => '',
                                ),'2' => Array
                                (
                                    'content' => '一致愿望　本质利益',
                                    'isRight' => '',
                                ),
                            '3' => Array
                                (
                                    'content' => '共同愿望　根本利益',
                                    'isRight' => 1,
                                )

                        ),

                ),Array
                (
                    'img' => '',
                    'title' => '我们要牢固树立社会主义生态文明观，推动形成______现代化建设新格局，为保护生态环境作出我们这代人的努力！',
                    'score' => 1,
                    'isMultiselect' => '',
                    'answer' => Array
                        (
                            '0' => Array
                                (
                                    'content' => '人与自然和谐发展',
                                    'isRight' => 1,
                                ),

                            '1' => Array
                                (
                                    'content' => '人与自然和谐共生',
                                    'isRight' => '',
                                ),
								'2' => Array
                                (
                                    'content' => '人与环境和谐发展',
                                    'isRight' => '',
                                ),
                            '3' => Array
                                (
                                    'content' => '人与环境和谐共生',
                                    'isRight' => 1,
                                )

                        )

                ),Array
                (
                    'img' => '',
                    'title' => '建设______是中华民族伟大复兴的基础工程。',
                    'score' => 1,
                    'isMultiselect' => '',
                    'answer' => Array
                        (
                            '0' => Array
                                (
                                    'content' => '经济强国',
                                    'isRight' => '',
                                ),

                            '1' => Array
                                (
                                    'content' => '教育强国',
                                    'isRight' => 1,
                                ),

                            '2' => Array
                                (
                                    'content' => '文化强国',
                                    'isRight' => '',
                                ),
								'3' => Array
                                (
                                    'content' => '军事强国',
                                    'isRight' => '',
                                )

                        )

                ),Array
                (
                    'img' => '',
                    'title' => '确保到______我国现行标准下农村贫困人口实现脱贫，贫困县全部摘帽，解决区域性整体贫困，做到脱真贫、真脱贫。',
                    'score' => 1,
                    'isMultiselect' => '',
                    'answer' => Array
                        (
                            '0' => Array
                                (
                                    'content' => '二〇二〇年',
                                    'isRight' => 1
                                ),

                            '1' => Array
                                (
                                    'content' => '二〇二五年',
                                    'isRight' => '',
                                ),
 '2' => Array
                                (
                                    'content' => '二〇三〇年',
                                    'isRight' => '',
                                ),
								'3' => Array
                                (
                                    'content' => '二〇三五年',
                                    'isRight' => '',
                                )
                        )

                ),Array
                (
                    'img' => '',
                    'title' => '保持土地承包关系稳定并长久不变，第二轮土地承包到期后再延长_____年。',
                    'score' => 1,
                    'isMultiselect' => '',
                    'answer' => Array
                        (
                            '0' => Array
                                (
                                    'content' => '20',
                                    'isRight' => '',
                                ),

                            '1' => Array
                                (
                                    'content' => '30',
                                    'isRight' => 1
                                ),
 '2' => Array
                                (
                                    'content' => '40',
                                    'isRight' => '',
                                ),
								'3' => Array
                                (
                                    'content' => '50',
                                    'isRight' => '',
                                )

                        )

                ),Array
                (
                    'img' => '',
                    'title' => '贯彻新发展理念，建设现代化经济体系，必须坚持质量第一、效益优先，以_______为主线。',
                    'score' => 1,
                    'isMultiselect' => '',
                    'answer' => Array
                        (
                            '0' => Array
                                (
                                    'content' => '转变发展方式',
                                    'isRight' => '',
                                )
,
                            '1' => Array
                                (
                                    'content' =>'优化经济结构',
                                    'isRight' => '',
                                ),
							'2' => Array
                                (
                                    'content' => '供给侧结构性改革',
                                    'isRight' => 1,
                                )
,
                            '3' => Array
                                (
                                    'content' =>'转换增长动力',
                                    'isRight' => '',
                                )

                        )

                ),Array
                (
                    'img' => '',
                    'title' => '全党必须牢记，（  ）的问题，是检验一个政党、一个政权性质的试金石。',
                    'score' => 1,
                    'isMultiselect' => '',
                    'answer' => Array
                        (
                            '0' => Array
                                (
                                    'content' => '依靠什么人',
                                    'isRight' => '',
                                )
,
                            '1' => Array
                                (
                                    'content' => '执政宗旨',
                                    'isRight' => '',
                                )
							,'2' => Array
                                (
                                    'content' => '阶级属性',
                                    'isRight' => '',
                                )
,
                            '3' => Array
                                (
                                    'content' => '为什么人',
                                    'isRight' => 1
                                )

                        )

                ),Array
                (
                    'img' => '',
                    'title' => '建设现代化经济体系，必须把发展经济的着力点放在（  ）上。',
                    'score' => 1,
                    'isMultiselect' => '',
                    'answer' => Array
                        (
                            '0' => Array
                                (
                                    'content' =>' 实体经济',
                                    'isRight' => 1
                                )
,
                            '1' => Array
                                (
                                    'content' => '虚拟经济',
                                    'isRight' => '',
                                )
								,
								'2' => Array
                                (
                                    'content' =>'国民经济',
                                    'isRight' => ''
                                )
,
                            '3' => Array
                                (
                                    'content' => '共享经济',
                                    'isRight' => '',
                                )

                        )

                ),Array
                (
                    'img' => '',
                    'title' => '第一个阶段，从______到______，在全面建成小康社会的基础上，再奋斗十五年，基本实现社会主义现代化。',
                    'score' => 1,
                    'isMultiselect' => '',
                    'answer' => Array
                        (
                            '0' => Array
                                (
                                    'content' => '二〇二〇年　二〇三五年',
                                 'isRight' => 1,
                                )
,
                            '1' => Array
                                (
                                    'content' => '二〇二五年　二〇四〇年',
                                    'isRight' => ''
                                ),
								'2' => Array
                                (
                                    'content' =>'二〇三〇年　二〇四五年',
                                    'isRight' => ''
                                )
,
                            '3' => Array
                                (
                                    'content' => '二〇三五年　本世纪中叶',
                                    'isRight' => '',
                                )

                        )

                ),Array
                (
                    'img' => '',
                    'title' => '新时代中国特色社会主义思想，明确中国特色社会主义最本质的特征是____。',
                    'score' => 1,
                    'isMultiselect' => '',
                    'answer' => Array
                        (
                            '0' => Array
                                (
                                    'content' => '“五位一体”总体布局',
                                    'isRight' => '',
                                )
,
                            '1' => Array
                                (
                                    'content' => '建设中国特色社会主义法治体系',
                                    'isRight' => '',
                                ) ,'2' => Array
                                (
                                    'content' => '人民利益为根本出发点',
                                    'isRight' => '',
                                )
,
                            '3' => Array
                                (
                                    'content' => '中国共产党领导',
                                    'isRight' => 1,
                                )

                        )

                ),Array
                (
                    'img' => '',
                    'title' => '坚持反腐败无禁区、全覆盖、零容忍，____的目标初步实现，____的笼子越扎越牢，____的堤坝正在构筑。',
                    'score' => 1,
                    'isMultiselect' => '',
                    'answer' => Array
                        (
                            '0' => Array
                                (
                                    'content' => '不能腐 不敢腐 不想腐',
                                    'isRight' => '',
                                )
,
                            '1' => Array
                                (
                                    'content' => '不敢腐 不想腐 不能腐',
                                    'isRight' => '',
                                ) ,'2' => Array
                                (
                                    'content' => '不想腐 不敢腐 不能腐',
                                    'isRight' => '',
                                )
,
                            '3' => Array
                                (
                                    'content' => '不敢腐 不能腐 不想腐',
                                    'isRight' => 1,
                                )

                        )

                ),Array
                (
                    'img' => '',
                    'title' => '脱贫攻坚战取得决定性进展，____贫困人口稳定脱贫，贫困发生率从百分之十点二下降到百分之四以下。',
                    'score' => 1,
                    'isMultiselect' => '',
                    'answer' => Array
                        (
                            '0' => Array
                                (
                                    'content' => '六千多万',
                                    'isRight' => 1
                                )
,
                            '1' => Array
                                (
                                    'content' => '七千多万',
                                   'isRight' => '',
                                ),  '2' => Array
                                (
                                    'content' => '八千多万',
                                    'isRight' => '',
                                ) ,'3' => Array
                                (
                                    'content' => '九千多万',
                                    'isRight' => '',
                                )

                        )

                ),Array
                (
                    'img' => '',
                    'title' => '中国共产党人的初心和使命，就是为中国人民____ ，为中华民族____。这个初心和使命是激励中国共产党人不断前进的根本动力。',
                    'score' => 1,
                    'isMultiselect' => '',
                    'answer' => Array
                        (
                            '0' => Array
                                (
                                    'content' => '谋幸福，谋未来',
                                    'isRight' => ''
                                )
,
                            '1' => Array
                                (
                                    'content' => '谋生活，谋复兴',
                                    'isRight' => '',
                                ),'2' => Array
                                (
                                    'content' => '谋幸福，谋复兴',
                                    'isRight' => 1
                                )
,
                            '3' => Array
                                (
                                    'content' => '谋生活，谋未来',
                                    'isRight' => '',
                                )

                        )

                ),Array
                (
                    'img' => '',
                    'title' => '从____到____，是“两个一百年”奋斗目标的历史交汇期。',
                    'score' => 1,
                    'isMultiselect' => '',
                    'answer' => Array
                        (
                            '0' => Array
                                (
                                    'content' => '二〇二〇年　二〇三五年',
                                    'isRight' => '',
                                )
,
                            '1' => Array
                                (
                                    'content' => '二〇三五年　本世纪中叶',
                                     'isRight' => '',
                                ),'2' => Array
                                (
                                    'content' => '十九大　二十大',
                                    'isRight' => 1
                                )
,
                            '3' => Array
                                (
                                    'content' => '二十大　二十一大',
                                    'isRight' => '',
                                )

                        )

                ),Array
                (
                    'img' => '',
                    'title' => '制定国家监察法，依法赋予监察委员会职责权限和调查手段，用（  ）取代“两规”措施。',
                    'score' => 1,
                    'isMultiselect' => '',
                    'answer' => Array
                        (
                            '0' => Array
                                (
                                    'content' => '留置',
                                    'isRight' => 1
                                )
,
                            '1' => Array
                                (
                                    'content' => '拘留',
                                     'isRight' => '',
                                ), '2' => Array
                                (
                                    'content' => '管制',
                                     'isRight' => '',
                                ), '3' => Array
                                (
                                    'content' => '扣留',
                                     'isRight' => '',
                                )

                        )

                ),Array
                (
                    'img' => '',
                    'title' => '加快建立绿色生产和消费的法律制度和政策导向，建立健全____的经济体系。',
                    'score' => 1,
                    'isMultiselect' => '',
                    'answer' => Array
                        (
                            '0' => Array
                                (
                                    'content' => '绿色节约循环发展',
                                     'isRight' => '',
                                )
,
                            '1' => Array
                                (
                                    'content' => '绿色低碳循环发展',
                                    'isRight' => 1
                                ), '2' => Array
                                (
                                    'content' => '绿色低碳节约发展',
                                     'isRight' => '',
                                ), '3' => Array
                                (
                                    'content' => '节约低碳循环发展',
                                     'isRight' => '',
                                )

                        )

                ),Array
                (
                    'img' => '',
                    'title' => '深化机构和行政体制改革。转变政府职能，深化简政放权，创新监管方式，增强政府公信力和执行力，建设人民满意的______政府。',
                    'score' => 1,
                    'isMultiselect' => '',
                    'answer' => Array
                        (
                            '0' => Array
                                (
                                    'content' => '服务型',
                                    'isRight' => 1
                                )
,
                            '1' => Array
                                (
                                    'content' => '廉洁',
                                     'isRight' => '',
                                ), '2' => Array
                                (
                                    'content' => '创新型',
                                     'isRight' => '',
                                ), '3' => Array
                                (
                                    'content' => '法治',
                                     'isRight' => '',
                                )

                        )

                )
);
shuffle( $question); 
$data=
Array
(
    'question' => $question,
   'theme' => 'DANGJIAN',
   'duration' => 36000,
 'title' => '@全体师生:来自十九大的一份考卷，请查收',
    'wxappid' => 'wx5ec3d35069383211',
    'wxappsecret' => 'd94ea41d9cd2ba03c7cab5fc0e212cec',
    'worksid' => '1359526489',
    'qrcodeurl' => 'http://weixin.yctu.edu.cn/app/sjd/sjd.png',
    'wxauthurl' => 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx5ec3d35069383211&redirect_uri=http%3A%2F%2Fapi.zmiti.com%2Fzmiti_ele%2Fcompany%2Fmafazhan%2Fworks%2F1359526489%2F&response_type=code&scope=snsapi_userinfo&state=state#wechat_redirect',
    'bgSound' => '',
   'questionType' => 'single',
    'totalScore' => 20,
    'level' => Array
        (
            '0' => Array
                (
                    'score' => 20,
                    'name' => '特级'
                ),

            '1' => Array
                (
                    'score' => 15,
                    'name' => '高级'
                ),

            '2' => Array
                (
                    'score' => 10,
                    'name' => '中级'
                ),

            '3' => Array
                (
                   'score' => 5,
                   'name' => '初级'
                ),

        ),

'isMultiselect' => '',
 'showLevel'=> 1,
 'indexPage' => './app/sjd/model/assets/images/index-bg.jpg',
  'loadingImg' => Array
        (
            '0' => './app/sjd/model/assets/images/300.png',
            '1' => './app/sjd/model/assets/images/zmiti.png',
            '2' => './app/sjd/model/assets/images/bg1.jpg',
            '3' => './app/sjd/model/assets/images/header-bg.jpg',
            '4' => './app/sjd/model/assets/images/watch.png',
            '5' => './app/sjd/model/assets/images/logo.png',
            '6' => './app/sjd/model/assets/images/refresh.png',
            '7' => './app/sjd/model/assets/images/share-ico.png',
            '8' => './app/sjd/model/assets/images/arron1.png',
            '9' => 'http://api.zmiti.com/zmiti_ele/company/mafazhan/material/20171019/79c84e85ca257689d0667dd769378b97.png',
        ),

 'shareTitle'=> '您答对了（{score}）道题，获得“{level}”称号',
'shareDesc' => '您答对了（{score}）道题，获得“{level}”称号',
'isUseWx' => '',
'isShowUseTime' => 1,
);

 $data=json_encode_ex($data);
 print_r($data);

?>