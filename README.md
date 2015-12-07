------------------
HTML5摇一摇
------------------
Author: sxfenglei
Email: sxfenglei@vip.qq.com
https://github.com/sxfenglei/HTML5_yaoyiyao.git

移动端摇一摇功能，实现摇红包，摇奖等，兼用android和ios

导入数据表用了记录用户摇奖结果的领奖记录
CREATE TABLE `prize_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `text` varchar(50) NOT NULL COMMENT '中奖信息',
  `num` varchar(20) NOT NULL COMMENT '中奖号',
  `createtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='中奖记录表';


