概况
核心代码行数:122,385行
代码总计行数:833,194行
代码文件大小:46.42MB
总文件大小:2.16GB(其中缓存量:1.79GB)
数据量:1,486,435行(245.2 MB)

V2.8.29
*新增
1.新增[课程表]一键保存功能 直接保存教务系统原版课程表(8.29)
*修改
1.修改[新生学号查询] 增加[跳转版] 尝试解决极少数手机不能拦截提交表单的问题(8.26)
2.修改[专属头像生成] 添加校庆头像模板(8.24)
3.修改多个应用及核心程序对学号的判断 兼容2018新生的10位学号(8.25)
4.修改[拾集] 拾取动画效果(8.23)
5.修改[性别比查询] 添加预科学院(8.26)
*更新
1.更新[2018新生数据] 学号分班数据 基础信息数据 拓展信息数据(8.25)
*维护
1.清理小薇平台临时文件 清除所有session缓存/3天前的教务系统登录缓存/7天前的小程序API 微博API 性别比查询 普通话查询 电费查询临时文件/1天前的手机验证缓存/120天前的电费数据缓存(8.23)
2.设置自动化维护脚本 每天1:30执行清理任务 2:10执行数据库备份 3:10执行重启 每周不定期执行数据库索引及碎片优化(8.23)

V2.8.12
*新增
1.新增[教务系统照片查看]功能 进行数据更新后在[我]->[个人资料]中可见(8.1)
2.新增[头像刷新]功能 点击[我]页面顶部的头像即可刷新 仅头像无法显示时才需要进行此操作(8.1)
3.新增[拾集] 随机拾取一句话(8.3)
4.新增[专属头像生成] 支持多平台头像自动导入(8.11)
*修改
1.添加[教务密码修改] 密码存档消息发送(8.3)
2.添加[拾集] 菜单按钮 快速返回按钮(8.3) 
*修复
1.修复[校庆栏目-添加祝福]由于新浪IP查询API失效导致加载缓慢的问题(8.1)
2.修复当前使用的UI框架基础件中相册图片不居中的问题(8.1)
3.修复[QQ身份识别模块]未关注用户不显示拦截页面的问题(8.3)
4.修复[未绑定用户评课]等组件偶发性写入数据库用户ID为0的问题(8.4)
*更新
1.更新[校庆栏目]UI框架基础件 同步腾讯7.20发布的新WeUI设计标准(8.1)
*维护
1.腾讯下达[公众平台接口证书更换通知] 已对生产环境的根证书进行测试 BaltimoreCyberTrustRoot.crt[2025/05/13]可以使用(8.1)
2.设置QQ/微博头像CORS跨域CDN加速节点 节点部署于腾讯云(8.12)
*说明
1.[专属头像生成] 在腾讯微校方剑成版本上修改 添加新功能 修复img.js缺少导致无法生成图片保存的问题 修复头像服务器的跨域问题 添加jsonp数据缓存 授权费用已支付 已获得原作者修改授权(8.11)

V2.7.31
*新增
1.新增[更新日志](7.27)
2.新增[教务评课] 能够进行教务系统的课程评价(7.28)
3.新增[未绑定用户教务评课] 能够在未绑定状态下进行教务评价并自动绑定 避免因评课限制导致无法绑定的情况 (7.29)
4.新增[验证码识别功能] 对教务系统验证码进行识别 当前识别率低于90%(7.31)
*修改
1.修改多平台登录公告(7.29)
2.修改验证码获取程序 用于支持识别功能(7.30)
*测试
1.测试教务系统异步通讯方式 当前仅在[教务评课]应用 有助于在网络不稳定时避免页面卡死(7.29)
2.测试验证码识别功能(7.31)

V2.7.26
*新增
1.新增[新生教务默认密码修改]功能 修改后自动绑定(7.25)
2.新增CDN加速功能 当前只在 [新生学号]、[新生默认密码修改] 上生效 只对js、图片文件加速(7.25)
3.新增[教务密码修改功能] 自动调用绑定时的原密码 便于密码重置(7.24)
*修改
1.重构[新生学号查询]功能 ajax方式传输数据 提高查询速度(7.25)
2.修改部分应用独立识别模块代码 增强对微博客户端的识别(7.24)
3.绑定页面添加新生绑定引导(7.25)
4.使用hidpi-canvas.js显著提高了[男女生性别比查询]饼图的清晰度(7.22)
*修复
1.修复微博识别模块首次登陆出现白屏的问题(7.23)
*优化
1.优化生产环境MySQL性能 提高了key_buffer和table_cache数值(7.26)
2.优化生产环境Apache日志策略 清除冗余日志(7.26)
3.清理小薇平台临时文件 包括session缓存、登陆资料缓存(7.23)
#碎碎念
VPN常年不稳定，教务系统好难登上啊(╯‵□′)╯︵┻━┻

V2.7.21
*修改
1.重构[成绩查询]GPA算法(7.19)
2.修改教务系统数据通讯关于成绩部分的解析代码 特别是绩点部分(7.19)
3.修改[校庆专栏-校友栏目]内容(7.13)
*修复
1.修复[数据更新]无法识别不及格科目绩点的问题(7.20)
2.修复[数据更新页面]要求重试的问题(7.21)	
3.修复[数据更新]对教务系统评课感知不稳定的问题(7.20)
4.修复数据库中少量成绩数据紊乱的问题(7.15)
*优化
1.优化成绩查询的速度以及减少数据库查询量

V2.7.8
*新增
1.新增[培养计划]中必修课学分、校选课学分要求(7.8)
*修改
1.修改[数据更新页面]部分判断逻辑(7.7)
*修复
1.修复[教工绑定模块(统一身份认证版本)]对于新增人员无法绑定的问题(6.26)

V2.6.21
*新增
1.新增[校庆栏目-祝福查看]无限下拉加载功能(6.20)
2.新增[校庆栏目-祝福查看]头像刷新功能[注:微信规定头像在用户修改后原数据自动失效](6.19)
3.新增[公告]后台编辑器图片上传功能(6.14)
*修改
1.修改[电费查询]查询逻辑 避免电费服务器故障时反复请求数据的情况(6.13)
2.修改[教师电话]部分数据(6.7)
*修复
1.修复[校庆栏目(z60系列APP)]部分管理授权逻辑未修改到位的问题(6.19)

V2.6.2
*新增
1.新增[书记领读] 包括在线播放领读内容 在线跟读 跟读内容上传并评价 跟读分数排行榜(5.29)
2.新增[校庆栏目(z60系列APP)]后台编辑器图片上传功能(5.23)
3.新增[校庆栏目]征文 活动一览(5.21)
4.新增[校庆栏目] 包括通知、新闻、盐师春秋、纪念品店、捐赠、祝福盐师等(5.15)
*修改
1.修改[书记领读]多个素材资源(6.2)
2.修改[校庆栏目(z60系列APP)]QQ身份识别模块资料更新逻辑(5.12)
3.修改调整[校庆栏目]部分栏目(5.21)
*维护
1.生产环境Apache添加ffmpeg支持 用于对微信语音进行格式转化
#碎碎念
校庆栏目代码行数统计:23000行

V2.5.6
*新增
1.增加函数至基础函数库(GetImageSize等)(5.4)
2.增加识别https状态并全局切换的能力(4.29)
*修改
1.修改部分应用独立识别模块代码 增加资料更新策略(5.5)
2.启用严格的关注检测，未关注微信、QQ公众号用户必须关注才能使用(5.3)
3.修改统计识别代码 增加校庆专栏专业统计(4.29)
*修复
1.修改部分应用查询功能的Header状态 修复部分手机不刷新显示重复内容的问题(4.26)

V.2.4.25
*新增
1.新增[实训助手] 提供教师实训中心在线预订教室、签到、签退、上传作品照片的功能 由于部分设计未完成以及全力开发校庆专栏等原因 当前未上线(4.20)
1.新增[教工绑定模块(统一身份认证版本)](3.27)
*修改
1.修改[健步走]步数上传入口 强制使用小程序上传(4.4)
2.修改用户绑定，教职工用户接入学校同一身份认证系统(3.28)

V2.3.8
*修复
1.修复个别用户显示[管理界面]的问题(3.7)


V2.2.28
*添加
1.正式上线[微博识别]功能 小薇平台支持微博客户端(2.27)
2.添加针对客户端来源的统计代码 启用自定义标注(1.31)
3.新增微博API函数库至系统函数库(1.30)
4.新增微博API操作后台(1.30)
5.新增[绑定管理] 支持微信、微信小程序、QQ的绑定管理(1.28)
*修改
1.修改[绑定管理] 添加对微博的绑定管理(2.11)
2.修改[数据更新页面]错误提示，增添“未评课”提示(2.10)
3.修改小程序对接API 反馈数据的json格式(2.2)
4.修改[教师电话]部分数据
*修复
1.修复由于教务系统入口更新导致通讯失败的问题(2.11)
2.修复由于微信函数库的BOM编码问题导致的数据通讯错误(2.2)
3.更新微信运动的解码函数库(2.1)
*测试
1.[微博识别]功能内测上线(2.11)

V2.1.27
*优化
1.优化生产环境MySQL性能 显著提高了并发数并降低了内存占用率(1.22)
2.优化生产环境Apache性能 显著加快访问速度并提高承载能力(1.22)
*新增
1.正式上线[QQ识别]功能 小薇平台支持QQ/TIM客户端(1.27)
2.新增QQAPI函数库至系统函数库(1.27)
3.新增QQAPI操作后台(1.27)
*修改
1.修改[系统核心文件zid.php] 增加对多客户端的支持(1.25)
2.修改[手机绑定]功能 添加对QQ/微博绑定的区分(1.27)
3.修改[自助解绑]功能 添加对QQ/微博绑定的区分与支持(1.26)
*修复
1.修复手机验证绑定由于严格的逻辑导致绑定被拒绝的问题(1.25)
*记录
1.1/21访问量达13.4万,1/22访问量达20.5万
#碎碎念
祝自己生日快乐

V2.0
*修改
1.修改部分应用excel导出的编码设定(1.5)
2.修改非客户端访问提示页面 添加跳转记录以及二维码(1.23)
#碎碎念
小薇平台进入第2个年头啦 过年前要把多平台支持给搞定

V1.12.29
*新增
1.新增[活动抽奖] 提供大屏幕扫码签到 现场抽奖 后台导出表格的功能(12.28)
2.新增[国家公祭] 为1937.12.13南京大屠杀死难者默哀(12.12)
3.[国家公祭]留存有公共管理学院专版(12.12)
4.新增[自助解绑]功能 帮助更换微信账号的用户释放身份 重新绑定(12.10)
5.新增[活动选票]功能 提供活动座位选择、门票预订等功能(12.9)
*修改
1.修改[手机绑定]功能 支持所有用户使用(12.9)
2.修改核心函数库MySQL 添加数组操作方式(12.8)

V1.11.30
*新增
1.新增[十九大测试] 提供关于十九大知识的测试 并提供奖品(11.5)
*修改
1.修改小薇平台整体UI风格 启用铁军蓝色调(11.29)

V1.10.29
*修改
1.修改办公电话中关于校领导的数据(10.26)
2.修改系统核心文件Router路由 修改伪静态规则(10.3)
3.修改[电费查询] 添加房间号生成以及充值入口(10.28)

V1.9.28
*添加
1.添加微信管理界面(9.23)
2.添加[有缘人] 可以查询相似姓名 同出生日期 同学校等有缘的同学 数据范围为17新生 使用对象限制在学生用户 但由于隐私考虑未开放(9.21)
3.添加[成绩查询-GPA计算](9.13)
4.添加[成绩查询]对两种教务系统界面的识别与支持(9.12)
*修复
1.修复由于教务系统更新了[成绩查询页面]导致数据解析失败的问题(9.13)
*开发
1.[社团报名]因无应用需求 暂停开发(9.28)
*优化
1.生产环境Apache进行升级(9.28)

V1.8.30
*添加
1.添加[新生男女生性别比查询] 提供学院、班级两种查询(8.28)
2.添加[校纪校规测试] 随机抽取20道题作答 满分可进行抽奖 由于当年校规更新以及奖品未到位 未上线(8.23)
3.添加[普通话查询](8.10)
4.添加[OA微信版] 提供对OA系统的查看与附件下载(8.8)
5.添加[新生学号查询] 提供新生班级、学号的查询(8.7)
6.添加后台微信推送自动统计功能(8.4)
7.添加新用户初始化页面(8.4)
8.添加[盐城话测试](8.3)
*修复
1.修复[新生学号查询]部分手机无法跳转的问题(8.10)
*修改
1.修改[课程表]更新程序 自动识别年份学期 并添加教师、教室等查询功能(8.21)
2.修改微信API函数库(8.4)

V1.7.31
*添加
1.添加微信公众号对位置导航的自动回复功能(7.31)
*修改
1.修改微信自动回复功能 添加部分新功能的回复(7.30)

V1.6.31
*添加
1.添加[电费查询]新版本 支持新的电费查询服务器(6.30)
*修改
1.修改微信小程序 部分API(6.5)

V1.5.30
*新增
1.微信小程序 盐城师范学院(5.30)
*优化
1.添加https的支持 启用加密证书 构建符合微信小程序API的生产环境(5.23)

V1.4.10
*新增
1.新增[植树2048]小游戏 提供分数记录功能 用于发放奖品(3.9)
*修改
1.更新教职工数据(4.11)
*优化
1.提高数据库索引效率(4.5)

V1.3.8
*新增
1.新增[手机验证补充程序] 加强教职工用户绑定的安全性(4.11)
2.新增[失物招领]新版本(3.8)
3.新增[教师电话](3.4)
*修改
1.修改多个应用的视觉效果(3.7)

V1.2.22
*运行
今天是2017年2月22日 小薇平台结束试运行 正式上线 

V1.2.21
*修改
1.修改[微主页]兼容性 适配主流手机屏幕(2.19)
2.修改[数据更新]程序
*修复
1.修复多个应用存在的问题

V1.0
*新增
1.新增[微主页](1.10)
2.新增[课程表](2.20)
3.新增[培养计划](2.17)
4.新增[公告](1.27)
5.新增[消息](1.31)
6.新增[个人管理](2.21)
7.新增[课程表](2.19)
8.新增[办公电话](2.23)
9.新增[成绩查询](2.20)
10.新增[等级考试查询](2.18)
11.新增[电费查询](2.13)
12.新增[校历查看](2.11)
13.新增[微信自动回复](1.24)
14.新增后台管理(2.21)
*开发
1.小薇平台核心能力 教务系统通讯 (1.24)
*记录
这是2017年小薇平台的初始版本

V0.11.26
*记录
2016年实验性质的开发
*新增
1.新增[失物招领]独立程序(11.26)
2.新增[用电查询](11.17)

V.0.10.22
*新增
1.新增[健步走]独立程序(10.22)
*开发
1.小薇平台核心能力 微信Token对接(10.20)

V0.8.4
*新增
1.报名系统
*开发
1.阿里大鱼 短信API

V0.0.1
*新增
1.基础MVC框架