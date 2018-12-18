/*
 Navicat Premium Data Transfer

 Source Server         : localhost-mysql5.7
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : lafa

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 18/12/2018 22:20:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for lf_article_category
-- ----------------------------
DROP TABLE IF EXISTS `lf_article_category`;
CREATE TABLE `lf_article_category` (
  `article_id` int(10) unsigned NOT NULL COMMENT '文章ID',
  `category_id` int(10) unsigned NOT NULL COMMENT '分类ID',
  UNIQUE KEY `article_id_and_category_id_unique` (`article_id`,`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of lf_article_category
-- ----------------------------
BEGIN;
INSERT INTO `lf_article_category` VALUES (1, 1);
INSERT INTO `lf_article_category` VALUES (2, 1);
INSERT INTO `lf_article_category` VALUES (3, 1);
INSERT INTO `lf_article_category` VALUES (4, 1);
INSERT INTO `lf_article_category` VALUES (5, 2);
INSERT INTO `lf_article_category` VALUES (5, 3);
INSERT INTO `lf_article_category` VALUES (6, 2);
INSERT INTO `lf_article_category` VALUES (6, 3);
INSERT INTO `lf_article_category` VALUES (7, 2);
INSERT INTO `lf_article_category` VALUES (7, 3);
INSERT INTO `lf_article_category` VALUES (8, 2);
INSERT INTO `lf_article_category` VALUES (8, 3);
INSERT INTO `lf_article_category` VALUES (9, 4);
INSERT INTO `lf_article_category` VALUES (10, 4);
INSERT INTO `lf_article_category` VALUES (11, 4);
INSERT INTO `lf_article_category` VALUES (12, 4);
COMMIT;

-- ----------------------------
-- Table structure for lf_articles
-- ----------------------------
DROP TABLE IF EXISTS `lf_articles`;
CREATE TABLE `lf_articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `object_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'objectId',
  `alias` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '别名',
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文章标题',
  `subtitle` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '副标题',
  `keywords` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '关键字',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '文章描述',
  `author` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '文章作者',
  `source` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '文章来源',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文章内容',
  `attribute` json DEFAULT NULL COMMENT '附加属性',
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '封面',
  `is_link` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT 'isLink',
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Link',
  `type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '类型',
  `reply_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '回复量',
  `views` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览数',
  `order` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `weight` int(11) NOT NULL DEFAULT '0' COMMENT '权重',
  `template` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '模板',
  `css` text COLLATE utf8mb4_unicode_ci COMMENT 'style',
  `js` text COLLATE utf8mb4_unicode_ci COMMENT 'javascript',
  `top` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '置顶',
  `status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '状态',
  `created_op` int(11) NOT NULL DEFAULT '0' COMMENT '创建人',
  `updated_op` int(11) NOT NULL DEFAULT '0' COMMENT '更新人',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `object_id_unique` (`object_id`),
  KEY `order_index` (`order`),
  KEY `views_index` (`views`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of lf_articles
-- ----------------------------
BEGIN;
INSERT INTO `lf_articles` VALUES (1, '1593889566486881', NULL, '享受购置税减半的B级车推荐', NULL, NULL, NULL, '管理员', NULL, '<p><span style=\"color:rgb(85,85,85);font-size:15px;\">前不久，一则重磅新闻引爆国内汽车市场，那就是国务院总理李克强9月29日主持召开国务院常务会议中决定，从2015年10月1日到2016年12月31日，对购买1.6升及以下排量乘用车实施减半征收车辆购置税的优惠政策。这便意味着市场上那些符合这一标准的车型，在消费者交全款买车前，就已经有了几千元甚至上万元的优惠！应该说此项举措对于目前比较消沉的车市以及不少持币观望合适买车的消费者来说，能起不少推动和促进的效果。</span></p>\n\n<p><span style=\"color:rgb(85,85,85);font-size:15px;\">但在不少消费者心中，总是认为符合这一标准的车型基本都集中在了紧凑级以及微型车，对于那些想买级别再高车型的朋友来说有点不沾边。其实有这种想法的朋友大可不必担心，因为在目前的市场上，配有小排量涡轮增压发动机的B级车有很多，完全满足市场的要求。今天，我们特意选出了4款在这个级别比较有特点的车型，希望能对您有些帮助。</span></p>', '{}', NULL, '0', NULL, 'article', 0, 0, 9999, 0, NULL, NULL, NULL, '0', '1', 1, 1, '2018-12-18 22:19:45', '2018-12-18 22:19:45', NULL);
INSERT INTO `lf_articles` VALUES (2, '1593889630591207', NULL, '荷兰人测试无人驾驶大巴笑哭了 车只跑了200米', NULL, NULL, NULL, '管理员', NULL, '<p>2月1日消息，上个星期，6 名居住在瓦格宁根的荷兰人，度过难忘的旅程。——他们坐上了全荷兰首次公开驾驶的无人驾驶汽车，尽管车速只有 8 km/h 的速度，行驶了 200 米的距离。</p>\n\n<p>这个无人驾驶汽车由 The WePod 公司制造，它的最高行驶速度当然不止 8km/h，不过为了公开测试的安全性，所以特意降低了行驶的速度。要知道，除了车上的 6 个人，路边还有很多好奇宝宝观摩。</p>', '{}', NULL, '0', NULL, 'article', 0, 0, 9999, 0, NULL, NULL, NULL, '0', '1', 1, 1, '2018-12-18 22:19:45', '2018-12-18 22:19:45', NULL);
INSERT INTO `lf_articles` VALUES (3, '1593889676648976', NULL, '任天堂或重返VR市场：一别已过二十一年', NULL, NULL, NULL, '管理员', NULL, '<p><span style=\"font-size:15px;\">2月3日消息，据外媒报道称，最近日本任天堂社长君岛达己日前在盈余电话会议上也将</span><a href=\"http://www.kejixun.com/special/xunixianshi/\">虚拟现实</a><span style=\"font-size:15px;\">称作是“有趣的技术”。这一表述和之前苹果公司库克的表述极其类似。据报道，以</span><a href=\"http://www.kejixun.com/game/\">游戏</a><span style=\"font-size:15px;\">机和马里奥知名的任天堂表示他们正在</span><a href=\"http://tansuo.kejixun.com/\">探索</a><span style=\"font-size:15px;\">虚拟现实技术，但目前还没有发布任何产品的具体计划。</span></p>\n\n<p>实际上，任天堂早在1995年就率先推出了市面上最早的虚拟现实设备之一Virtual Boy，但由于高售价、黑白屏幕和易引发头晕恶心等问题，这款设备最终惨遭失败。当然，如今的虚拟现实已经成为业界新宠，也吸引到各大巨头涉足其中，为消费者越来越频繁地带来自己的虚拟现实设备。</p>', '{}', NULL, '0', NULL, 'article', 0, 0, 9999, 0, NULL, NULL, NULL, '0', '1', 1, 1, '2018-12-18 22:19:45', '2018-12-18 22:19:45', NULL);
INSERT INTO `lf_articles` VALUES (4, '1593889730658221', NULL, '阿里巴巴投资VR创业公司Magic Leap', NULL, NULL, NULL, '管理员', NULL, '<p>高盛日前发布的一份报告显示，过去两年中<a href=\"http://www.kejixun.com/special/xunixianshi/\">VR</a>/AR领域共进行225笔风险投资，投资额达35亿美元。与90年代的失败相比，当前的VR热有什么不同?答案在于技术。</p>', '{}', NULL, '0', NULL, 'article', 0, 0, 9999, 0, NULL, NULL, NULL, '0', '1', 1, 1, '2018-12-18 22:19:45', '2018-12-18 22:19:45', NULL);
INSERT INTO `lf_articles` VALUES (5, '1593889782101318', NULL, '全能跨界SUV推荐 个性与实用也能兼得', NULL, NULL, NULL, '管理员', NULL, '<p>国产车型的样子与进口车型基本保持一致，这点非常值得称赞。相比同级别的X1和Q3，GLA级显然要更精致、更好看，对于不少外貌协会的朋友来说，十分符合他们的心意。车身尺寸方面，它的车身高度不占任何优势，而离地间隙却是最高的。</p>', '{}', NULL, '0', NULL, 'article', 0, 0, 9999, 0, NULL, NULL, NULL, '0', '1', 1, 1, '2018-12-18 22:19:45', '2018-12-18 22:19:45', NULL);
INSERT INTO `lf_articles` VALUES (6, '1593889837701212', NULL, '非日系合资轿车推荐 均为细分市场标杆', NULL, NULL, NULL, '管理员', NULL, '<p><span style=\"font-size:16px;\">凤凰汽车·多车导购 很多国内消费者在选购车辆时都比较倾向于合资车型，原因大多是感觉合资车型在质量、工艺等方面更为可靠。而这其中，以经济实用见长的日系车型在近年来表现强势，销量表现也是节节高升。但不可否认，历史遗留问题还是限制了很大一部分消费者购买日系车型。今天的文章，我们就为大家在轿车类别各细分市场精选了4款标杆级车型，如果您在近期有购车计划，那么希望今天的文章能够对您有所帮助。</span></p>\n\n<p><span style=\"font-size:16px;\">级别：小型车</span></p>\n\n<p><span style=\"font-size:16px;\">推荐车型：雪佛兰赛欧</span></p>\n\n<p><span style=\"font-size:16px;\">官方指导价：5.99-7.99</span></p>\n\n<p><span style=\"font-size:16px;\">新赛欧采用新一代雪佛兰设计语言，新车配备了雪佛兰全球最新家族式双格栅，进气口边缘的角度与老款赛欧的盾牌型进气口比较相似。尾部方面，新赛欧在尾灯造型与保险杠处均经过了全新设计，蝶形双尾灯以及层次丰富的尾部设计，使得整车看上去更为动感。</span></p>', '{}', NULL, '0', NULL, 'article', 0, 0, 9999, 0, NULL, NULL, NULL, '0', '1', 1, 1, '2018-12-18 22:19:46', '2018-12-18 22:19:46', NULL);
INSERT INTO `lf_articles` VALUES (7, '1593889884583943', NULL, '汽车圈的技术宅又发大招了', NULL, NULL, NULL, '管理员', NULL, '<p><span style=\"color:rgb(85,85,85);font-size:16px;\">2015年度Honda中国媒体大会在深圳召开，这次媒体大会上本田技研介绍了即将在中国市场投放的两项新技术和新技术的搭载计划，并公布了部分未来车型的发表计划，一向被人称为汽车圈里“技术宅”的本田技研，这次给中国市场带来了什么新鲜玩意儿呢？</span></p>\n\n<p><span style=\"color:rgb(85,85,85);font-size:16px;\">安全驾驶辅助系统Honda SENSING（安全超感）</span></p>\n\n<p><span style=\"color:rgb(85,85,85);font-size:16px;\">Honda SENSING（安全超感）系统是在以往车辆主/被动安全经验的基础上，面向未来自动驾驶需求开发的全方位安全驾驶辅助系统。</span></p>', '{}', NULL, '0', NULL, 'article', 0, 0, 9999, 0, NULL, NULL, NULL, '0', '1', 1, 1, '2018-12-18 22:19:46', '2018-12-18 22:19:46', NULL);
INSERT INTO `lf_articles` VALUES (8, '1593889903760156', NULL, '中型SUV安全性能大比拼', NULL, NULL, NULL, '管理员', NULL, '<p>凤凰汽车•多车导购 对于中型SUV而言，除了大多数消费者都会关心的乘坐舒适性以及储物空间大小，在安全性方面我们也同样不能忽视。<br />我们通过《购车消费评价》的实测数据为大家带来各个级别车型在某一方面的横向对比，不吹不黑，完全用事实说话，来为大家的选车提供最准确的参考。</p>\n\n<p>本期我们锁定的对比对象是中型SUV，由于一款车的安全性会涉及到十分多的方面，因此我们仅通过车辆在100公里每小时的紧急制动表现、主被动安全性配置来了解一款车辆在这两方的安全性，来为大家选车提供一些参考。</p>', '{}', NULL, '0', NULL, 'article', 0, 0, 9999, 0, NULL, NULL, NULL, '0', '1', 1, 1, '2018-12-18 22:19:46', '2018-12-18 22:19:46', NULL);
INSERT INTO `lf_articles` VALUES (9, '1593889942778211', NULL, '大型招聘会现场', NULL, NULL, NULL, '管理员', NULL, '<p><span style=\"font-size:15px;\">增强现实(AR)正在成为下一个热门的投资领域。就在昨日，增强现实(AR)创业公司Magic Leap今日宣布，在新一轮融资中获得7.935亿美元的投资，本轮融资由</span><a href=\"http://www.kejixun.com/special/Alibaba/\">阿里巴巴</a><span style=\"font-size:15px;\">领投。</span></p>\n\n<p>其他新投资者还包括华纳兄弟、富达管理研究公司、摩根大通和摩根士丹利投资管理公司。此外，当前股东谷歌和高通风投(Qualcomm Ventures)也参与了本轮融资。</p>\n\n<p>高盛日前发布的一份报告显示，过去两年中<a href=\"http://www.kejixun.com/special/xunixianshi/\">VR</a>/AR领域共进行225笔风险投资，投资额达35亿美元。与90年代的失败相比，当前的VR热有什么不同?答案在于技术。</p>', '{}', NULL, '0', NULL, 'article', 0, 0, 9999, 0, NULL, NULL, NULL, '0', '1', 1, 1, '2018-12-18 22:19:46', '2018-12-18 22:19:46', NULL);
INSERT INTO `lf_articles` VALUES (10, '1593890202413795', NULL, '快快加入我们', NULL, NULL, NULL, '管理员', NULL, '<p><span style=\"color:rgb(51,51,51);font-size:14px;\">增强现实(AR)正在成为下一个热门的投资领域。就在昨日，增强现实(AR)创业公司Magic Leap今日宣布，在新一轮融资中获得7 935亿美元的投资，本轮融资由阿里巴巴领投。</span><br /></p>', '{}', NULL, '0', NULL, 'article', 0, 0, 9999, 0, NULL, NULL, NULL, '0', '1', 1, 1, '2018-12-18 22:19:46', '2018-12-18 22:19:46', NULL);
INSERT INTO `lf_articles` VALUES (11, '1593890267967061', NULL, '招产品经理一位', NULL, NULL, NULL, '管理员', NULL, '<h4>岗位职责：</h4>\n\n<ol><li>完成需求分析，并完成产品策划.原型设计</li><li>负责跟踪管理完成产品的界面.功能.流程设计</li><li>监控产品运行效果，收集用户反馈，分析用户行为统计数据，挖掘并发现用户需求，并根对产品进行持续改进</li><li>制定明确的产品功能规划，以及产品项目计划，为开发团队提供明确的产品资料文档</li><li>负责用户研究，把握用户需求和行为特点，实现用户需求</li><li>提升整体产品用户满意度</li><li>对线上产品持续进行数据分析与挖掘，根据数据提出产品改进和新产品的具体思路</li></ol>\n\n<h4>岗位要求：</h4>\n\n<ol><li><p>3年以上互联网产品工作经验，有平台类产品设计工作经验者优先</p></li><li><p>表达能力强，能够与开发和设计同事进行良好的沟通</p></li><li><p>了解互联网产品整体实现过程，包括从需求分析到产品发布</p></li><li><p>良好的逻辑思维能力，分析问题、解决问题的能力和执行力</p></li><li><p>充满责任心、服务和敬业精神</p></li></ol>', '{}', NULL, '0', NULL, 'article', 0, 0, 9999, 0, NULL, NULL, NULL, '0', '1', 1, 1, '2018-12-18 22:19:46', '2018-12-18 22:19:46', NULL);
INSERT INTO `lf_articles` VALUES (12, '1593890292139934', NULL, '招聘结算主管', NULL, NULL, NULL, '管理员', NULL, '<ol><li><p>3年以上互联网金融或第三方支付公司结算管理工作者优先</p></li><li><p>熟悉清结算各项实务的操作流程，熟悉国家结算法规政策，并能实际操作运用</p></li><li><p>有较强的亲和力和表达能力良好的沟通组织协调能力.优秀的解决复杂问题的能力</p></li><li><p>能在一定的压力下开展工作，并能够快速持续的学习</p></li></ol>', '{}', NULL, '0', NULL, 'article', 0, 0, 9999, 0, NULL, NULL, NULL, '0', '1', 1, 1, '2018-12-18 22:19:46', '2018-12-18 22:19:46', NULL);
INSERT INTO `lf_articles` VALUES (13, '1620199642055124', NULL, '联系我们', NULL, NULL, NULL, '管理员', NULL, '<h4>公司地址</h4>\n\n<p>中国 青岛 开发区 武夷山路888号</p>\n\n<h4>联系电话</h4>\n\n<p>400-8888-6666</p>\n\n<h4>人才招聘</h4>\n\n<p>HR@163.com</p>\n\n<h4>业务合作</h4>\n\n<p>yewu@163.com</p>\n\n<h4>媒体合作</h4>\n\n<p>meiti@163.com</p>', NULL, NULL, '0', NULL, 'page', 0, 0, 999, 0, NULL, NULL, NULL, '0', '1', 1, 1, '2018-12-18 22:19:46', '2018-12-18 22:19:46', NULL);
COMMIT;

-- ----------------------------
-- Table structure for lf_blocks
-- ----------------------------
DROP TABLE IF EXISTS `lf_blocks`;
CREATE TABLE `lf_blocks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `object_id` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'objectId',
  `group` int(11) NOT NULL DEFAULT '0' COMMENT '分组',
  `type` enum('latestArticle','hotArticle','latestProduct','hotProduct','slide','articleTree','productTree','blogTree','pageList','contact','about','links','header','followUs','html','htmlcode','phpcode','recommend') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '类型',
  `template` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default' COMMENT '模板',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '标题',
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '图标',
  `more_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '更多链接名称',
  `more_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '更多链接',
  `content` text COLLATE utf8mb4_unicode_ci COMMENT '内容',
  `created_op` int(11) NOT NULL DEFAULT '0' COMMENT '创建人',
  `updated_op` int(11) NOT NULL DEFAULT '0' COMMENT '更新人',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `object_id_unique` (`object_id`),
  KEY `type_index` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of lf_blocks
-- ----------------------------
BEGIN;
INSERT INTO `lf_blocks` VALUES (1, '2018_03_04_224524_index_slide_block', 0, 'slide', 'default', '首页幻灯', NULL, NULL, NULL, '{\"mark\":\"1\"}', 1, 1, '2018-12-18 22:19:46', '2018-12-18 22:19:46');
INSERT INTO `lf_blocks` VALUES (2, '2018_03_04_234810_index_enterprise_news_block', 0, 'hotArticle', 'default', '企业新闻', NULL, '更多', '/article/list_2_1.html', '{\"category_id\":\"1\",\"display\":\"4\"}', 1, 1, '2018-12-18 22:19:46', '2018-12-18 22:19:46');
INSERT INTO `lf_blocks` VALUES (3, '2018_03_04_235036_index_case_news_block', 0, 'hotArticle', 'default', '成功案例', NULL, '更多', '/article/list_3_2.html', '{\"category_id\":\"2\",\"display\":\"4\"}', 1, 1, '2018-12-18 22:19:46', '2018-12-18 22:19:46');
INSERT INTO `lf_blocks` VALUES (4, '2018_03_04_235540_index_hot_news_block', 0, 'hotArticle', 'default', '本周热议', NULL, NULL, NULL, '{\"category_id\":\"3\",\"display\":\"10\"}', 1, 1, '2018-12-18 22:19:46', '2018-12-18 22:19:46');
COMMIT;

-- ----------------------------
-- Table structure for lf_categorys
-- ----------------------------
DROP TABLE IF EXISTS `lf_categorys`;
CREATE TABLE `lf_categorys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '分类名称',
  `keywords` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '关键字',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '描述',
  `parent` int(11) NOT NULL COMMENT '父id',
  `order` int(11) NOT NULL COMMENT '排序',
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '路径',
  `type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '类型',
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '链接',
  `template` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '模板',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `type_index` (`type`),
  KEY `parent_index` (`parent`),
  KEY `path_index` (`path`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of lf_categorys
-- ----------------------------
BEGIN;
INSERT INTO `lf_categorys` VALUES (1, '企业新闻', NULL, NULL, 0, 0, '0', 'article', NULL, NULL, '2018-12-18 22:19:45', '2018-12-18 22:19:45', NULL);
INSERT INTO `lf_categorys` VALUES (2, '成功案例', NULL, NULL, 0, 1, '0', 'article', NULL, NULL, '2018-12-18 22:19:45', '2018-12-18 22:19:45', NULL);
INSERT INTO `lf_categorys` VALUES (3, '产品活动', NULL, NULL, 0, 2, '0', 'article', NULL, NULL, '2018-12-18 22:19:45', '2018-12-18 22:19:45', NULL);
INSERT INTO `lf_categorys` VALUES (4, '人才招聘', NULL, NULL, 0, 3, '0', 'article', NULL, NULL, '2018-12-18 22:19:45', '2018-12-18 22:19:45', NULL);
COMMIT;

-- ----------------------------
-- Table structure for lf_failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `lf_failed_jobs`;
CREATE TABLE `lf_failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for lf_files
-- ----------------------------
DROP TABLE IF EXISTS `lf_files`;
CREATE TABLE `lf_files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('image','voice','video','annex','file') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文件类型',
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文件路径',
  `mime_type` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文件mimeType',
  `md5` char(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Md5',
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文件标题',
  `folder` char(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文件对象类型',
  `object_id` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文件对象ID',
  `size` int(11) NOT NULL DEFAULT '0' COMMENT '文件大小',
  `width` smallint(6) NOT NULL DEFAULT '0' COMMENT '宽度',
  `height` smallint(6) NOT NULL DEFAULT '0' COMMENT '高度',
  `downloads` mediumint(9) NOT NULL DEFAULT '0' COMMENT '下载次数',
  `public` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '是否公开',
  `editor` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '富编辑器图片',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '附件状态',
  `created_op` int(11) NOT NULL DEFAULT '0' COMMENT '创建人',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `md5_type_folder_unique` (`md5`,`type`,`folder`),
  KEY `type_index` (`type`),
  KEY `folder_index` (`folder`),
  KEY `object_id_index` (`object_id`),
  KEY `public_index` (`public`),
  KEY `status_index` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of lf_files
-- ----------------------------
BEGIN;
INSERT INTO `lf_files` VALUES (1, 'image', 'images/slide/201803/03/538aFhREvHFKgq5AkWRSvNyFzT3FzgvVemW6yXkD.jpeg', 'image/jpeg', '9d9ce9a512a9555f386e0a0f40a30fa0', '222.jpg', 'slide', '1', 116659, 1000, 332, 0, '1', '0', '0', 1, '2018-12-18 22:19:46', '2018-12-18 22:19:46', NULL);
INSERT INTO `lf_files` VALUES (2, 'image', 'images/slide/201803/03/jKwPxbEU4lo5ZySz887QOSZCzu4P3OKPNM9TZ4X2.jpeg', 'image/jpeg', 'cb3519d3b1b16415ac167e3b3df6426c', '333.jpg', 'slide', '1', 105233, 1000, 332, 0, '1', '0', '0', 1, '2018-12-18 22:19:46', '2018-12-18 22:19:46', NULL);
INSERT INTO `lf_files` VALUES (3, 'image', 'images/slide/201803/03/GrEN5y7OH8Ps1FM3lDzGFMe2P1aP5pMgPRnd62aT.jpeg', 'image/jpeg', 'b843de23efe8a64b6c6a643174632413', '555.jpg', 'slide', '1', 94325, 1000, 332, 0, '1', '0', '0', 1, '2018-12-18 22:19:46', '2018-12-18 22:19:46', NULL);
INSERT INTO `lf_files` VALUES (4, 'image', 'images/slide/201803/03/yq9VLRIKJty8orH8Vq7CO8D5WhRZx1h6OJqVDyPb.jpeg', 'image/jpeg', 'a7016cb9c662784e86428bd1ebc79172', '444.jpg', 'slide', '1', 81432, 1000, 332, 0, '1', '0', '0', 1, '2018-12-18 22:19:46', '2018-12-18 22:19:46', NULL);
INSERT INTO `lf_files` VALUES (5, 'image', 'images/avatar/201803/04/9CT3XvX0Jcv8QEEzPCzgg8k0NXJVwrMsaKKf1iN9.jpeg', 'image/jpeg', '21463f816eb9b8595bfec72d720b6823', '20180106112335.jpg', 'avatar', '1', 14353, 300, 330, 0, '1', '0', '0', 1, '2018-12-18 22:19:46', '2018-12-18 22:19:46', NULL);
COMMIT;

-- ----------------------------
-- Table structure for lf_forms
-- ----------------------------
DROP TABLE IF EXISTS `lf_forms`;
CREATE TABLE `lf_forms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `object_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'objectId',
  `form` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '所属表单',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'IP',
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '最后一次登录地址',
  `data` json NOT NULL COMMENT '数据',
  `status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '状态',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `form_index` (`form`),
  KEY `object_id_index` (`object_id`),
  KEY `user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for lf_links
-- ----------------------------
DROP TABLE IF EXISTS `lf_links`;
CREATE TABLE `lf_links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '友情链接名称',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '友情链接描述',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '友情链接地址',
  `rating` int(11) NOT NULL DEFAULT '0' COMMENT '友情链接评级',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '友情链接图标',
  `target` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '友情链接打开方式',
  `rel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '链接与网站的关系',
  `order` int(11) NOT NULL DEFAULT '999' COMMENT '排序',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '状态:1显示;0不显示',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_index` (`order`),
  KEY `status_index` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for lf_logs
-- ----------------------------
DROP TABLE IF EXISTS `lf_logs`;
CREATE TABLE `lf_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `group` enum('laravel','jobs','queue','behavior','business') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '分组',
  `type` char(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '类型',
  `account` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '用户名',
  `browser` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '浏览器',
  `host` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Host',
  `uri` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Uri',
  `method` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Method',
  `model` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'IP',
  `location` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '地址',
  `user_agent` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'UserAgent',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '操作内容',
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '数据',
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `group_index` (`group`),
  KEY `type_index` (`type`),
  KEY `account_index` (`account`),
  KEY `user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for lf_migrations
-- ----------------------------
DROP TABLE IF EXISTS `lf_migrations`;
CREATE TABLE `lf_migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of lf_migrations
-- ----------------------------
BEGIN;
INSERT INTO `lf_migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `lf_migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `lf_migrations` VALUES (3, '2017_03_16_195041_create_articles_table', 1);
INSERT INTO `lf_migrations` VALUES (4, '2017_03_16_195113_create_categorys_table', 1);
INSERT INTO `lf_migrations` VALUES (5, '2017_03_16_195459_create_forms_table', 1);
INSERT INTO `lf_migrations` VALUES (6, '2017_03_16_195722_create_settings_table', 1);
INSERT INTO `lf_migrations` VALUES (7, '2017_03_17_202713_create_files_table', 1);
INSERT INTO `lf_migrations` VALUES (8, '2017_03_17_203024_create_navigations_table', 1);
INSERT INTO `lf_migrations` VALUES (9, '2017_04_22_193637_create_slides_table', 1);
INSERT INTO `lf_migrations` VALUES (10, '2017_05_10_083723_create_blocks_table', 1);
INSERT INTO `lf_migrations` VALUES (11, '2018_01_31_221753_add_avatar_and_introduction_to_users_table', 1);
INSERT INTO `lf_migrations` VALUES (12, '2018_02_01_003843_create_projects_table', 1);
INSERT INTO `lf_migrations` VALUES (13, '2018_02_01_163230_create_failed_jobs_table', 1);
INSERT INTO `lf_migrations` VALUES (14, '2018_02_01_170327_create_permission_tables', 1);
INSERT INTO `lf_migrations` VALUES (15, '2018_02_06_223204_add_remarks_to_roles_and_permissions_table', 1);
INSERT INTO `lf_migrations` VALUES (16, '2018_02_07_142436_create_links_table', 1);
INSERT INTO `lf_migrations` VALUES (17, '2018_02_18_055948_create_articles_categorys', 1);
INSERT INTO `lf_migrations` VALUES (18, '2018_02_18_065948_create_model_has_category', 1);
INSERT INTO `lf_migrations` VALUES (19, '2018_02_25_170926_seed_roles_and_permissions_data', 1);
INSERT INTO `lf_migrations` VALUES (20, '2018_02_28_090351_seed_settings_data', 1);
INSERT INTO `lf_migrations` VALUES (21, '2018_03_03_134004_seed_category_and_article_data', 1);
INSERT INTO `lf_migrations` VALUES (22, '2018_03_04_174004_seed_slide_and_block_and_files_data', 1);
INSERT INTO `lf_migrations` VALUES (23, '2018_03_08_223444_add_phone_to_users_table', 1);
INSERT INTO `lf_migrations` VALUES (24, '2018_03_08_234924_add_weixin_openid_to_users_table', 1);
INSERT INTO `lf_migrations` VALUES (25, '2018_03_10_182450_create_wechat_table', 1);
INSERT INTO `lf_migrations` VALUES (26, '2018_04_09_144343_create_notifications_table', 1);
INSERT INTO `lf_migrations` VALUES (27, '2018_04_09_144526_add_notification_count_to_users_table', 1);
INSERT INTO `lf_migrations` VALUES (28, '2018_04_09_152233_create_replies_table', 1);
INSERT INTO `lf_migrations` VALUES (29, '2018_04_12_091549_create_log_table', 1);
INSERT INTO `lf_migrations` VALUES (30, '2018_04_12_091934_add_last_ip_and_last_date_to_users_table', 1);
INSERT INTO `lf_migrations` VALUES (31, '2018_04_13_173717_add_weibo_id_and_qq_id_to_users_table', 1);
INSERT INTO `lf_migrations` VALUES (32, '2018_04_14_100631_add_is_email_is_activated_and_email_activated_time_to_users_table', 1);
INSERT INTO `lf_migrations` VALUES (33, '2018_04_20_160751_add_github_id_to_users_table', 1);
INSERT INTO `lf_migrations` VALUES (34, '2018_06_23_221222_create_multiple_files_table', 1);
COMMIT;

-- ----------------------------
-- Table structure for lf_model_has_category
-- ----------------------------
DROP TABLE IF EXISTS `lf_model_has_category`;
CREATE TABLE `lf_model_has_category` (
  `category_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`category_id`,`model_id`,`model_type`),
  KEY `lf_model_has_category_model_type_model_id_index` (`model_type`,`model_id`),
  CONSTRAINT `lf_model_has_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `lf_categorys` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for lf_model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `lf_model_has_roles`;
CREATE TABLE `lf_model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `lf_model_has_roles_model_type_model_id_index` (`model_type`,`model_id`),
  CONSTRAINT `lf_model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `lf_roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for lf_model_permissions
-- ----------------------------
DROP TABLE IF EXISTS `lf_model_permissions`;
CREATE TABLE `lf_model_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `lf_model_permissions_model_type_model_id_index` (`model_type`,`model_id`),
  CONSTRAINT `lf_model_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `lf_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for lf_multiple_files
-- ----------------------------
DROP TABLE IF EXISTS `lf_multiple_files`;
CREATE TABLE `lf_multiple_files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `multiple_file_table_id` int(10) unsigned NOT NULL,
  `multiple_file_table_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '路径',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `multiple_file_table_type_index` (`multiple_file_table_type`),
  KEY `multiple_file_table_id_index` (`multiple_file_table_id`),
  KEY `field_index` (`field`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for lf_navigations
-- ----------------------------
DROP TABLE IF EXISTS `lf_navigations`;
CREATE TABLE `lf_navigations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` enum('desktop','footer','mobile') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '导航分类',
  `type` enum('action','link','article','page','category','navigation') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '类型',
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '标题',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '描述',
  `target` enum('_self','_blank') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self' COMMENT '是否新建标签',
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'URL',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '图片',
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '图标',
  `parent` int(11) NOT NULL COMMENT '父id',
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '路径',
  `params` json NOT NULL COMMENT '参数',
  `is_show` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '是否显示',
  `order` int(11) NOT NULL COMMENT '排序',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_index` (`category`),
  KEY `type_index` (`type`),
  KEY `order_index` (`order`),
  KEY `is_show_index` (`is_show`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of lf_navigations
-- ----------------------------
BEGIN;
INSERT INTO `lf_navigations` VALUES (1, 'desktop', 'action', '关于我们', NULL, '_self', '/company/show_1.html', NULL, NULL, 0, '0', '{\"route\": \"company.index\", \"params\": \"{}\"}', '1', 0, '2018-12-18 22:19:46', '2018-12-18 22:19:46', NULL);
INSERT INTO `lf_navigations` VALUES (2, 'desktop', 'article', '企业新闻', NULL, '_self', '/article/list_2_1.html', NULL, NULL, 0, '0', '{\"category_id\": \"1\"}', '1', 1, '2018-12-18 22:19:46', '2018-12-18 22:19:46', NULL);
INSERT INTO `lf_navigations` VALUES (3, 'desktop', 'article', '成功案例', NULL, '_self', '/article/list_3_2.html', NULL, NULL, 0, '0', '{\"category_id\": \"2\"}', '1', 2, '2018-12-18 22:19:46', '2018-12-18 22:19:46', NULL);
INSERT INTO `lf_navigations` VALUES (4, 'desktop', 'article', '产品活动', NULL, '_self', '/article/list_4_3.html', NULL, NULL, 0, '0', '{\"category_id\": \"3\"}', '1', 3, '2018-12-18 22:19:46', '2018-12-18 22:19:46', NULL);
INSERT INTO `lf_navigations` VALUES (5, 'desktop', 'article', '人才招聘', NULL, '_self', '/article/list_5_4.html', NULL, NULL, 0, '0', '{\"category_id\": \"4\"}', '1', 4, '2018-12-18 22:19:46', '2018-12-18 22:19:46', NULL);
INSERT INTO `lf_navigations` VALUES (6, 'desktop', 'page', '联系我们', NULL, '_self', '/page/show_6_13.html', NULL, NULL, 0, '0', '{\"page_id\": \"13\"}', '1', 5, '2018-12-18 22:19:46', '2018-12-18 22:19:46', NULL);
COMMIT;

-- ----------------------------
-- Table structure for lf_notifications
-- ----------------------------
DROP TABLE IF EXISTS `lf_notifications`;
CREATE TABLE `lf_notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lf_notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for lf_password_resets
-- ----------------------------
DROP TABLE IF EXISTS `lf_password_resets`;
CREATE TABLE `lf_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `lf_password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for lf_permissions
-- ----------------------------
DROP TABLE IF EXISTS `lf_permissions`;
CREATE TABLE `lf_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of lf_permissions
-- ----------------------------
BEGIN;
INSERT INTO `lf_permissions` VALUES (1, 'manage_develop', 'web', '2018-12-18 22:19:45', '2018-12-18 22:19:45', '系统开发');
INSERT INTO `lf_permissions` VALUES (2, 'manage_log', 'web', '2018-12-18 22:19:45', '2018-12-18 22:19:45', '操作日志');
INSERT INTO `lf_permissions` VALUES (3, 'manage_system', 'web', '2018-12-18 22:19:45', '2018-12-18 22:19:45', '系统管理');
INSERT INTO `lf_permissions` VALUES (4, 'manage_users', 'web', '2018-12-18 22:19:45', '2018-12-18 22:19:45', '用户管理');
INSERT INTO `lf_permissions` VALUES (5, 'manage_permissions', 'web', '2018-12-18 22:19:45', '2018-12-18 22:19:45', '权限管理');
INSERT INTO `lf_permissions` VALUES (6, 'manage_roles', 'web', '2018-12-18 22:19:45', '2018-12-18 22:19:45', '角色管理');
INSERT INTO `lf_permissions` VALUES (7, 'manage_setting', 'web', '2018-12-18 22:19:45', '2018-12-18 22:19:45', '系统设置');
INSERT INTO `lf_permissions` VALUES (8, 'manage_site_basic', 'web', '2018-12-18 22:19:45', '2018-12-18 22:19:45', '站点信息');
INSERT INTO `lf_permissions` VALUES (9, 'manage_site_company', 'web', '2018-12-18 22:19:45', '2018-12-18 22:19:45', '公司信息');
INSERT INTO `lf_permissions` VALUES (10, 'manage_site_contact', 'web', '2018-12-18 22:19:45', '2018-12-18 22:19:45', '联系方式');
INSERT INTO `lf_permissions` VALUES (11, 'manage_links', 'web', '2018-12-18 22:19:45', '2018-12-18 22:19:45', '友情链接');
INSERT INTO `lf_permissions` VALUES (12, 'manage_navigation', 'web', '2018-12-18 22:19:45', '2018-12-18 22:19:45', '栏目导航');
INSERT INTO `lf_permissions` VALUES (13, 'manage_wechat', 'web', '2018-12-18 22:19:45', '2018-12-18 22:19:45', '微信管理');
INSERT INTO `lf_permissions` VALUES (14, 'manage_content', 'web', '2018-12-18 22:19:45', '2018-12-18 22:19:45', '内容管理');
INSERT INTO `lf_permissions` VALUES (15, 'manage_category', 'web', '2018-12-18 22:19:45', '2018-12-18 22:19:45', '分类管理');
INSERT INTO `lf_permissions` VALUES (16, 'manage_article', 'web', '2018-12-18 22:19:45', '2018-12-18 22:19:45', '文章管理');
INSERT INTO `lf_permissions` VALUES (17, 'manage_page', 'web', '2018-12-18 22:19:45', '2018-12-18 22:19:45', '页面管理');
INSERT INTO `lf_permissions` VALUES (18, 'manage_images', 'web', '2018-12-18 22:19:45', '2018-12-18 22:19:45', '图片管理');
INSERT INTO `lf_permissions` VALUES (19, 'manage_slide', 'web', '2018-12-18 22:19:45', '2018-12-18 22:19:45', '幻灯管理');
INSERT INTO `lf_permissions` VALUES (20, 'manage_block', 'web', '2018-12-18 22:19:45', '2018-12-18 22:19:45', '区块管理');
INSERT INTO `lf_permissions` VALUES (21, 'manage_annex', 'web', '2018-12-18 22:19:45', '2018-12-18 22:19:45', '附件管理');
INSERT INTO `lf_permissions` VALUES (22, 'manage_xcx', 'web', '2018-12-18 22:19:45', '2018-12-18 22:19:45', '小程序管理');
INSERT INTO `lf_permissions` VALUES (23, 'manage_media', 'web', '2018-12-18 22:19:45', '2018-12-18 22:19:45', '媒体管理');
INSERT INTO `lf_permissions` VALUES (24, 'manage_form', 'web', '2018-12-18 22:19:45', '2018-12-18 22:19:45', '表单管理');
COMMIT;

-- ----------------------------
-- Table structure for lf_projects
-- ----------------------------
DROP TABLE IF EXISTS `lf_projects`;
CREATE TABLE `lf_projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `subscriber_count` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lf_projects_name_index` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for lf_replies
-- ----------------------------
DROP TABLE IF EXISTS `lf_replies`;
CREATE TABLE `lf_replies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lf_replies_article_id_index` (`article_id`),
  KEY `lf_replies_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for lf_role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `lf_role_has_permissions`;
CREATE TABLE `lf_role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `lf_role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `lf_role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `lf_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `lf_role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `lf_roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of lf_role_has_permissions
-- ----------------------------
BEGIN;
INSERT INTO `lf_role_has_permissions` VALUES (1, 1);
INSERT INTO `lf_role_has_permissions` VALUES (2, 1);
INSERT INTO `lf_role_has_permissions` VALUES (3, 1);
INSERT INTO `lf_role_has_permissions` VALUES (4, 1);
INSERT INTO `lf_role_has_permissions` VALUES (5, 1);
INSERT INTO `lf_role_has_permissions` VALUES (6, 1);
INSERT INTO `lf_role_has_permissions` VALUES (7, 1);
INSERT INTO `lf_role_has_permissions` VALUES (8, 1);
INSERT INTO `lf_role_has_permissions` VALUES (9, 1);
INSERT INTO `lf_role_has_permissions` VALUES (10, 1);
INSERT INTO `lf_role_has_permissions` VALUES (11, 1);
INSERT INTO `lf_role_has_permissions` VALUES (12, 1);
INSERT INTO `lf_role_has_permissions` VALUES (13, 1);
INSERT INTO `lf_role_has_permissions` VALUES (14, 1);
INSERT INTO `lf_role_has_permissions` VALUES (15, 1);
INSERT INTO `lf_role_has_permissions` VALUES (16, 1);
INSERT INTO `lf_role_has_permissions` VALUES (17, 1);
INSERT INTO `lf_role_has_permissions` VALUES (18, 1);
INSERT INTO `lf_role_has_permissions` VALUES (19, 1);
INSERT INTO `lf_role_has_permissions` VALUES (20, 1);
INSERT INTO `lf_role_has_permissions` VALUES (21, 1);
INSERT INTO `lf_role_has_permissions` VALUES (22, 1);
INSERT INTO `lf_role_has_permissions` VALUES (23, 1);
INSERT INTO `lf_role_has_permissions` VALUES (24, 1);
INSERT INTO `lf_role_has_permissions` VALUES (2, 2);
INSERT INTO `lf_role_has_permissions` VALUES (3, 2);
INSERT INTO `lf_role_has_permissions` VALUES (4, 2);
INSERT INTO `lf_role_has_permissions` VALUES (5, 2);
INSERT INTO `lf_role_has_permissions` VALUES (7, 2);
INSERT INTO `lf_role_has_permissions` VALUES (13, 2);
INSERT INTO `lf_role_has_permissions` VALUES (16, 2);
INSERT INTO `lf_role_has_permissions` VALUES (17, 2);
INSERT INTO `lf_role_has_permissions` VALUES (19, 2);
INSERT INTO `lf_role_has_permissions` VALUES (20, 2);
INSERT INTO `lf_role_has_permissions` VALUES (21, 2);
INSERT INTO `lf_role_has_permissions` VALUES (22, 2);
INSERT INTO `lf_role_has_permissions` VALUES (23, 2);
INSERT INTO `lf_role_has_permissions` VALUES (24, 2);
INSERT INTO `lf_role_has_permissions` VALUES (3, 3);
INSERT INTO `lf_role_has_permissions` VALUES (4, 3);
INSERT INTO `lf_role_has_permissions` VALUES (7, 3);
INSERT INTO `lf_role_has_permissions` VALUES (16, 3);
INSERT INTO `lf_role_has_permissions` VALUES (17, 3);
INSERT INTO `lf_role_has_permissions` VALUES (19, 3);
INSERT INTO `lf_role_has_permissions` VALUES (20, 3);
INSERT INTO `lf_role_has_permissions` VALUES (21, 3);
INSERT INTO `lf_role_has_permissions` VALUES (24, 3);
COMMIT;

-- ----------------------------
-- Table structure for lf_roles
-- ----------------------------
DROP TABLE IF EXISTS `lf_roles`;
CREATE TABLE `lf_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of lf_roles
-- ----------------------------
BEGIN;
INSERT INTO `lf_roles` VALUES (1, 'Administrator', 'web', '2018-12-18 22:19:45', '2018-12-18 22:19:45', '超级管理员');
INSERT INTO `lf_roles` VALUES (2, 'Founder', 'web', '2018-12-18 22:19:45', '2018-12-18 22:19:45', '创始人');
INSERT INTO `lf_roles` VALUES (3, 'Maintainer', 'web', '2018-12-18 22:19:45', '2018-12-18 22:19:45', '站长');
COMMIT;

-- ----------------------------
-- Table structure for lf_settings
-- ----------------------------
DROP TABLE IF EXISTS `lf_settings`;
CREATE TABLE `lf_settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `owner` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '所属',
  `module` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '模块',
  `section` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '部分',
  `key` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '键',
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '值',
  PRIMARY KEY (`id`),
  UNIQUE KEY `owner_and_module_and_section_unique` (`owner`,`module`,`section`,`key`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of lf_settings
-- ----------------------------
BEGIN;
INSERT INTO `lf_settings` VALUES (1, 'system', 'common', 'basic', 'name', 'Laravel');
INSERT INTO `lf_settings` VALUES (2, 'system', 'common', 'basic', 'copyright', 'Lafa');
INSERT INTO `lf_settings` VALUES (3, 'system', 'common', 'basic', 'create_year', '2018');
INSERT INTO `lf_settings` VALUES (4, 'system', 'common', 'basic', 'keywords', 'Lafa');
INSERT INTO `lf_settings` VALUES (5, 'system', 'common', 'basic', 'index_keywords', '');
INSERT INTO `lf_settings` VALUES (6, 'system', 'common', 'basic', 'slogan', '');
INSERT INTO `lf_settings` VALUES (7, 'system', 'common', 'basic', 'icp', '');
INSERT INTO `lf_settings` VALUES (8, 'system', 'common', 'basic', 'icp_link', '');
INSERT INTO `lf_settings` VALUES (9, 'system', 'common', 'basic', 'meta', '');
INSERT INTO `lf_settings` VALUES (10, 'system', 'common', 'basic', 'description', '');
INSERT INTO `lf_settings` VALUES (11, 'system', 'common', 'basic', 'statistics', '');
INSERT INTO `lf_settings` VALUES (12, 'system', 'common', 'company', 'name', '');
INSERT INTO `lf_settings` VALUES (13, 'system', 'common', 'company', 'description', '');
INSERT INTO `lf_settings` VALUES (14, 'system', 'common', 'company', 'content', '');
INSERT INTO `lf_settings` VALUES (15, 'system', 'common', 'contact', 'contacts', '莫非');
INSERT INTO `lf_settings` VALUES (16, 'system', 'common', 'contact', 'phone', '13800138000');
INSERT INTO `lf_settings` VALUES (17, 'system', 'common', 'contact', 'fax', '');
INSERT INTO `lf_settings` VALUES (18, 'system', 'common', 'contact', 'email', 'root@mofei.org');
INSERT INTO `lf_settings` VALUES (19, 'system', 'common', 'contact', 'qq', '81846173');
INSERT INTO `lf_settings` VALUES (20, 'system', 'common', 'contact', 'weixin', '');
INSERT INTO `lf_settings` VALUES (21, 'system', 'common', 'contact', 'weibo', '');
INSERT INTO `lf_settings` VALUES (22, 'system', 'common', 'contact', 'wangwang', '');
INSERT INTO `lf_settings` VALUES (23, 'system', 'common', 'contact', 'site', 'https://www.mofei.org/');
INSERT INTO `lf_settings` VALUES (24, 'system', 'common', 'contact', 'address', 'Beijing');
COMMIT;

-- ----------------------------
-- Table structure for lf_slides
-- ----------------------------
DROP TABLE IF EXISTS `lf_slides`;
CREATE TABLE `lf_slides` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `object_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'objectId',
  `group` smallint(6) NOT NULL DEFAULT '0' COMMENT '分组',
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '标题',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '描述',
  `target` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self' COMMENT '是否新建标签',
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'URL',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '图片',
  `order` int(11) NOT NULL COMMENT '排序',
  `status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '状态',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `group_index` (`group`),
  KEY `order_index` (`order`),
  KEY `status_index` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of lf_slides
-- ----------------------------
BEGIN;
INSERT INTO `lf_slides` VALUES (1, '1620199642088308', 1, '1111', '', '_self', 'https://www.baidu.com/', 'images/slide/201803/03/538aFhREvHFKgq5AkWRSvNyFzT3FzgvVemW6yXkD.jpeg', 9999, '1', '2018-12-18 22:19:46', '2018-12-18 22:19:46', NULL);
INSERT INTO `lf_slides` VALUES (2, '1620199642089522', 1, '2222', '', '_self', 'https://www.baidu.com/', 'images/slide/201803/03/jKwPxbEU4lo5ZySz887QOSZCzu4P3OKPNM9TZ4X2.jpeg', 9999, '1', '2018-12-18 22:19:46', '2018-12-18 22:19:46', NULL);
INSERT INTO `lf_slides` VALUES (3, '1620199642090872', 1, '3333', '', '_self', 'https://www.baidu.com/', 'images/slide/201803/03/GrEN5y7OH8Ps1FM3lDzGFMe2P1aP5pMgPRnd62aT.jpeg', 9999, '1', '2018-12-18 22:19:46', '2018-12-18 22:19:46', NULL);
INSERT INTO `lf_slides` VALUES (4, '1620199642092366', 1, '4444', '', '_self', 'https://www.baidu.com/', 'images/slide/201803/03/yq9VLRIKJty8orH8Vq7CO8D5WhRZx1h6OJqVDyPb.jpeg', 9999, '1', '2018-12-18 22:19:46', '2018-12-18 22:19:46', NULL);
COMMIT;

-- ----------------------------
-- Table structure for lf_users
-- ----------------------------
DROP TABLE IF EXISTS `lf_users`;
CREATE TABLE `lf_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_is_activated` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email_activated_time` timestamp NULL DEFAULT NULL,
  `sex` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weixin_openid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weixin_unionid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weibo_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '微博openid',
  `qq_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'QQopenid',
  `github_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Github openid',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `introduction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '状态',
  `notification_count` int(10) unsigned NOT NULL DEFAULT '0',
  `last_ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '最后一次登录IP',
  `last_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '最后一次登录地址',
  `last_at` timestamp NULL DEFAULT NULL COMMENT '最后一次登录时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `lf_users_email_unique` (`email`),
  UNIQUE KEY `lf_users_phone_unique` (`phone`),
  UNIQUE KEY `lf_users_weixin_openid_unique` (`weixin_openid`),
  UNIQUE KEY `lf_users_weixin_unionid_unique` (`weixin_unionid`),
  UNIQUE KEY `lf_users_weibo_id_unique` (`weibo_id`),
  UNIQUE KEY `lf_users_qq_id_unique` (`qq_id`),
  UNIQUE KEY `lf_users_github_id_unique` (`github_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for lf_wechat
-- ----------------------------
DROP TABLE IF EXISTS `lf_wechat`;
CREATE TABLE `lf_wechat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `object_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'objectId',
  `type` enum('subscribe','service') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '公共号类型:subscribe订阅号;service服务号',
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '公众号名称',
  `account` char(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '原始ID',
  `app_id` char(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'appID',
  `app_secret` char(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'appSecret',
  `url` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'url',
  `token` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Token',
  `qrcode` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '二维码Code',
  `primary` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '默认公众号:0未认证;1已认证',
  `certified` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '认证类型:0未认证;1已认证',
  `status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '状态',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `object_id_unique_index` (`object_id`),
  KEY `app_id_index` (`app_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for lf_wechat_menu
-- ----------------------------
DROP TABLE IF EXISTS `lf_wechat_menu`;
CREATE TABLE `lf_wechat_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group` int(10) unsigned NOT NULL COMMENT '公众号ID',
  `parent` int(11) NOT NULL DEFAULT '0' COMMENT '父id',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '菜单名称',
  `type` enum('click','view','media_id','view_limited','text','event','content') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '类型',
  `data` text COLLATE utf8mb4_unicode_ci COMMENT '附加内容',
  `order` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `group_index` (`group`),
  CONSTRAINT `lf_wechat_menu_group_foreign` FOREIGN KEY (`group`) REFERENCES `lf_wechat` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for lf_wechat_message
-- ----------------------------
DROP TABLE IF EXISTS `lf_wechat_message`;
CREATE TABLE `lf_wechat_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `wechat_id` int(10) unsigned NOT NULL COMMENT '公众号ID',
  `public` smallint(6) NOT NULL DEFAULT '0' COMMENT 'public',
  `wid` char(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '微信ID',
  `to` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '微信号',
  `from` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '发送方帐号',
  `response` mediumint(8) unsigned NOT NULL COMMENT '发送方帐号',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '消息内容',
  `type` char(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '类型',
  `replied` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '回复ID',
  `time` datetime NOT NULL COMMENT '消息时间',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wechat_id_index` (`wechat_id`),
  KEY `wid_index` (`wid`),
  KEY `to_index` (`to`),
  KEY `from_index` (`from`),
  KEY `response_index` (`response`),
  KEY `time_index` (`time`),
  KEY `replied_index` (`replied`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for lf_wechat_response
-- ----------------------------
DROP TABLE IF EXISTS `lf_wechat_response`;
CREATE TABLE `lf_wechat_response` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `wechat_id` int(10) unsigned NOT NULL COMMENT '公众号ID',
  `key` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Key',
  `group` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '分组',
  `type` enum('text','news','link') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '类型',
  `source` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '来源',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '消息内容',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wechat_id_index` (`wechat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;
