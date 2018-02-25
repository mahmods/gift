<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $sname = "Gift";
        $key = "test";
        $desc = "test";
        $semail = "admin@admin.com";
        \App\Config::insert(['id' => 1,'registration' => 1,'theme' => 'mahacode','lang' => 'en','translations' => 1,'views' => 1,'name' => $sname,'email' => $semail,'desc' => $desc,'key' => $key,'logo' => 'assets/logo.png','floating_cart' => 1,'tumblr' => 'http://tumblr.com','youtube' => 'http://youtube.com','facebook' => 'http://facebook.com','instagram' => 'http://instagram.com','twitter' => 'http://twitter.com','phone' => '+1 55 5555 555','address' => 'Example Street Ex. City', 'blocs_types' => 'categoriesSlider|category|ads']);

        \App\Administrator::insert([
            'name' => 'admin',
            'password' => md5("admin"),
            'email' => "admin@admin.com"
        ]);
        DB::statement(DB::raw('INSERT INTO `countries` (`id`, `iso`, `nicename`, `phonecode`, `visitors`, `orders`) VALUES
            (1, \'AF\', \'Afghanistan\', 93, 0, 0),
			(2, \'AL\', \'Albania\', 355, 0, 0),
			(3, \'DZ\', \'Algeria\', 213, 0, 0),
			(4, \'AS\', \'American Samoa\', 1684, 0, 0),
			(5, \'AD\', \'Andorra\', 376, 0, 0),
			(6, \'AO\', \'Angola\', 244, 0, 0),
			(7, \'AI\', \'Anguilla\', 1264, 0, 0),
			(8, \'AQ\', \'Antarctica\', 0, 0, 0),
			(9, \'AG\', \'Antigua and Barbuda\', 1268, 0, 0),
			(10, \'AR\', \'Argentina\', 54, 0, 0),
			(11, \'AM\', \'Armenia\', 374, 0, 0),
			(12, \'AW\', \'Aruba\', 297, 0, 0),
			(13, \'AU\', \'Australia\', 61, 0, 0),
			(14, \'AT\', \'Austria\', 43, 0, 0),
			(15, \'AZ\', \'Azerbaijan\', 994, 0, 0),
			(16, \'BS\', \'Bahamas\', 1242, 0, 0),
			(17, \'BH\', \'Bahrain\', 973, 0, 0),
			(18, \'BD\', \'Bangladesh\', 880, 0, 0),
			(19, \'BB\', \'Barbados\', 1246, 0, 0),
			(20, \'BY\', \'Belarus\', 375, 0, 0),
			(21, \'BE\', \'Belgium\', 32, 0, 0),
			(22, \'BZ\', \'Belize\', 501, 0, 0),
			(23, \'BJ\', \'Benin\', 229, 0, 0),
			(24, \'BM\', \'Bermuda\', 1441, 0, 0),
			(25, \'BT\', \'Bhutan\', 975, 0, 0),
			(26, \'BO\', \'Bolivia\', 591, 0, 0),
			(27, \'BA\', \'Bosnia\', 387, 0, 0),
			(28, \'BW\', \'Botswana\', 267, 0, 0),
			(29, \'BV\', \'Bouvet Island\', 0, 0, 0),
			(30, \'BR\', \'Brazil\', 55, 0, 0),
			(31, \'IO\', \'Indian Ocean\', 246, 0, 0),
			(32, \'BN\', \'Brunei Darussalam\', 673, 0, 0),
			(33, \'BG\', \'Bulgaria\', 359, 0, 0),
			(34, \'BF\', \'Burkina Faso\', 226, 0, 0),
			(35, \'BI\', \'Burundi\', 257, 0, 0),
			(36, \'KH\', \'Cambodia\', 855, 0, 0),
			(37, \'CM\', \'Cameroon\', 237, 0, 0),
			(38, \'CA\', \'Canada\', 1, 0, 0),
			(39, \'CV\', \'Cape Verde\', 238, 0, 0),
			(40, \'KY\', \'Cayman Islands\', 1345, 0, 0),
			(41, \'CF\', \'Central African Republic\', 236, 0, 0),
			(42, \'TD\', \'Chad\', 235, 0, 0),
			(43, \'CL\', \'Chile\', 56, 0, 0),
			(44, \'CN\', \'China\', 86, 0, 0),
			(45, \'CX\', \'Christmas Island\', 61, 0, 0),
			(46, \'CC\', \'Cocos Islands\', 672, 0, 0),
			(47, \'CO\', \'Colombia\', 57, 0, 0),
			(48, \'KM\', \'Comoros\', 269, 0, 0),
			(49, \'CG\', \'Congo\', 242, 0, 0),
			(51, \'CK\', \'Cook Islands\', 682, 0, 0),
			(52, \'CR\', \'Costa Rica\', 506, 0, 0),
			(53, \'CI\', \'Cote D\'\'Ivoire\', 225, 0, 0),
			(54, \'HR\', \'Croatia\', 385, 0, 0),
			(55, \'CU\', \'Cuba\', 53, 0, 0),
			(56, \'CY\', \'Cyprus\', 357, 0, 0),
			(57, \'CZ\', \'Czech Republic\', 420, 0, 0),
			(58, \'DK\', \'Denmark\', 45, 0, 0),
			(59, \'DJ\', \'Djibouti\', 253, 0, 0),
			(60, \'DM\', \'Dominica\', 1767, 0, 0),
			(61, \'DO\', \'Dominican Republic\', 1809, 0, 0),
			(62, \'EC\', \'Ecuador\', 593, 0, 0),
			(63, \'EG\', \'Egypt\', 20, 0, 0),
			(64, \'SV\', \'El Salvador\', 503, 0, 0),
			(65, \'GQ\', \'Equatorial Guinea\', 240, 0, 0),
			(66, \'ER\', \'Eritrea\', 291, 0, 0),
			(67, \'EE\', \'Estonia\', 372, 0, 0),
			(68, \'ET\', \'Ethiopia\', 251, 0, 0),
			(69, \'FK\', \'Falkland Islands\', 500, 0, 0),
			(70, \'FO\', \'Faroe Islands\', 298, 0, 0),
			(71, \'FJ\', \'Fiji\', 679, 0, 0),
			(72, \'FI\', \'Finland\', 358, 0, 0),
			(73, \'FR\', \'France\', 33, 0, 0),
			(74, \'GF\', \'French Guiana\', 594, 0, 0),
			(75, \'PF\', \'French Polynesia\', 689, 0, 0),
			(77, \'GA\', \'Gabon\', 241, 0, 0),
			(78, \'GM\', \'Gambia\', 220, 0, 0),
			(79, \'GE\', \'Georgia\', 995, 0, 0),
			(80, \'DE\', \'Germany\', 49, 0, 0),
			(81, \'GH\', \'Ghana\', 233, 0, 0),
			(82, \'GI\', \'Gibraltar\', 350, 0, 0),
			(83, \'GR\', \'Greece\', 30, 0, 0),
			(84, \'GL\', \'Greenland\', 299, 0, 0),
			(85, \'GD\', \'Grenada\', 1473, 0, 0),
			(86, \'GP\', \'Guadeloupe\', 590, 0, 0),
			(87, \'GU\', \'Guam\', 1671, 0, 0),
			(88, \'GT\', \'Guatemala\', 502, 0, 0),
			(89, \'GN\', \'Guinea\', 224, 0, 0),
			(90, \'GW\', \'Guinea-Bissau\', 245, 0, 0),
			(91, \'GY\', \'Guyana\', 592, 0, 0),
			(92, \'HT\', \'Haiti\', 509, 0, 0),
			(95, \'HN\', \'Honduras\', 504, 0, 0),
			(96, \'HK\', \'Hong Kong\', 852, 0, 0),
			(97, \'HU\', \'Hungary\', 36, 0, 0),
			(98, \'IS\', \'Iceland\', 354, 0, 0),
			(99, \'IN\', \'India\', 91, 0, 0),
			(100, \'ID\', \'Indonesia\', 62, 0, 0),
			(101, \'IR\', \'Iran\', 98, 0, 0),
			(102, \'IQ\', \'Iraq\', 964, 0, 0),
			(103, \'IE\', \'Ireland\', 353, 0, 0),
			(104, \'IL\', \'Israel\', 972, 0, 0),
			(105, \'IT\', \'Italy\', 39, 0, 0),
			(106, \'JM\', \'Jamaica\', 1876, 0, 0),
			(107, \'JP\', \'Japan\', 81, 0, 0),
			(108, \'JO\', \'Jordan\', 962, 0, 0),
			(109, \'KZ\', \'Kazakhstan\', 7, 0, 0),
			(110, \'KE\', \'Kenya\', 254, 0, 0),
			(111, \'KI\', \'Kiribati\', 686, 0, 0),
			(112, \'KP\', \'Korea\', 850, 0, 0),
			(114, \'KW\', \'Kuwait\', 965, 0, 0),
			(115, \'KG\', \'Kyrgyzstan\', 996, 0, 0),
			(116, \'LA\', \'Lao\', 856, 0, 0),
			(117, \'LV\', \'Latvia\', 371, 0, 0),
			(118, \'LB\', \'Lebanon\', 961, 0, 0),
			(119, \'LS\', \'Lesotho\', 266, 0, 0),
			(120, \'LR\', \'Liberia\', 231, 0, 0),
			(121, \'LY\', \'Libya\', 218, 0, 0),
			(122, \'LI\', \'Liechtenstein\', 423, 0, 0),
			(123, \'LT\', \'Lithuania\', 370, 0, 0),
			(124, \'LU\', \'Luxembourg\', 352, 0, 0),
			(125, \'MO\', \'Macao\', 853, 0, 0),
			(126, \'MK\', \'Macedonia\', 389, 0, 0),
			(127, \'MG\', \'Madagascar\', 261, 0, 0),
			(128, \'MW\', \'Malawi\', 265, 0, 0),
			(129, \'MY\', \'Malaysia\', 60, 0, 0),
			(130, \'MV\', \'Maldives\', 960, 0, 0),
			(131, \'ML\', \'Mali\', 223, 0, 0),
			(132, \'MT\', \'Malta\', 356, 0, 0),
			(133, \'MH\', \'Marshall Islands\', 692, 0, 0),
			(134, \'MQ\', \'Martinique\', 596, 0, 0),
			(135, \'MR\', \'Mauritania\', 222, 0, 0),
			(136, \'MU\', \'Mauritius\', 230, 0, 0),
			(137, \'YT\', \'Mayotte\', 269, 0, 0),
			(138, \'MX\', \'Mexico\', 52, 0, 0),
			(139, \'FM\', \'Micronesia\', 691, 0, 0),
			(140, \'MD\', \'Moldova\', 373, 0, 0),
			(141, \'MC\', \'Monaco\', 377, 0, 0),
			(142, \'MN\', \'Mongolia\', 976, 0, 0),
			(143, \'MS\', \'Montserrat\', 1664, 0, 0),
			(144, \'MA\', \'Morocco\', 212, 0, 0),
			(145, \'MZ\', \'Mozambique\', 258, 0, 0),
			(146, \'MM\', \'Myanmar\', 95, 0, 0),
			(147, \'NA\', \'Namibia\', 264, 0, 0),
			(148, \'NR\', \'Nauru\', 674, 0, 0),
			(149, \'NP\', \'Nepal\', 977, 0, 0),
			(150, \'NL\', \'Netherlands\', 31, 0, 0),
			(151, \'AN\', \'Netherlands Antilles\', 599, 0, 0),
			(152, \'NC\', \'New Caledonia\', 687, 0, 0),
			(153, \'NZ\', \'New Zealand\', 64, 0, 0),
			(154, \'NI\', \'Nicaragua\', 505, 0, 0),
			(155, \'NE\', \'Niger\', 227, 0, 0),
			(156, \'NG\', \'Nigeria\', 234, 0, 0),
			(157, \'NU\', \'Niue\', 683, 0, 0),
			(158, \'NF\', \'Norfolk Island\', 672, 0, 0),
			(159, \'MP\', \'Northern Mariana Islands\', 1670, 0, 0),
			(160, \'NO\', \'Norway\', 47, 0, 0),
			(161, \'OM\', \'Oman\', 968, 0, 0),
			(162, \'PK\', \'Pakistan\', 92, 0, 0),
			(163, \'PW\', \'Palau\', 680, 0, 0),
			(164, \'PS\', \'Palestin\', 970, 0, 0),
			(165, \'PA\', \'Panama\', 507, 0, 0),
			(166, \'PG\', \'Papua New Guinea\', 675, 0, 0),
			(167, \'PY\', \'Paraguay\', 595, 0, 0),
			(168, \'PE\', \'Peru\', 51, 0, 0),
			(169, \'PH\', \'Philippines\', 63, 0, 0),
			(170, \'PN\', \'Pitcairn\', 0, 0, 0),
			(171, \'PL\', \'Poland\', 48, 0, 0),
			(172, \'PT\', \'Portugal\', 351, 0, 0),
			(173, \'PR\', \'Puerto Rico\', 1787, 0, 0),
			(174, \'QA\', \'Qatar\', 974, 0, 0),
			(175, \'RE\', \'Reunion\', 262, 0, 0),
			(176, \'RO\', \'Romania\', 40, 0, 0),
			(177, \'RU\', \'Russian Federation\', 70, 0, 0),
			(178, \'RW\', \'Rwanda\', 250, 0, 0),
			(179, \'SH\', \'Saint Helena\', 290, 0, 0),
			(180, \'KN\', \'Saint Kitts and Nevis\', 1869, 0, 0),
			(181, \'LC\', \'Saint Lucia\', 1758, 0, 0),
			(182, \'PM\', \'Saint Pierre\', 508, 0, 0),
			(183, \'VC\', \'Saint Vincent\', 1784, 0, 0),
			(184, \'WS\', \'Samoa\', 684, 0, 0),
			(185, \'SM\', \'San Marino\', 378, 0, 0),
			(186, \'ST\', \'Sao Tome\', 239, 0, 0),
			(187, \'SA\', \'Saudi Arabia\', 966, 0, 0),
			(188, \'SN\', \'Senegal\', 221, 0, 0),
			(189, \'CS\', \'Serbia\', 381, 0, 0),
			(190, \'SC\', \'Seychelles\', 248, 0, 0),
			(191, \'SL\', \'Sierra Leone\', 232, 0, 0),
			(192, \'SG\', \'Singapore\', 65, 0, 0),
			(193, \'SK\', \'Slovakia\', 421, 0, 0),
			(194, \'SI\', \'Slovenia\', 386, 0, 0),
			(195, \'SB\', \'Solomon Islands\', 677, 0, 0),
			(196, \'SO\', \'Somalia\', 252, 0, 0),
			(197, \'ZA\', \'South Africa\', 27, 0, 0),
			(198, \'GS\', \'South Georgia\', 0, 0, 0),
			(199, \'ES\', \'Spain\', 34, 0, 0),
			(200, \'LK\', \'Sri Lanka\', 94, 0, 0),
			(201, \'SD\', \'Sudan\', 249, 0, 0),
			(202, \'SR\', \'Suriname\', 597, 0, 0),
			(203, \'SJ\', \'Svalbard and Jan Mayen\', 47, 0, 0),
			(204, \'SZ\', \'Swaziland\', 268, 0, 0),
			(205, \'SE\', \'Sweden\', 46, 0, 0),
			(206, \'CH\', \'Switzerland\', 41, 0, 0),
			(207, \'SY\', \'Syrian Arab Republic\', 963, 0, 0),
			(208, \'TW\', \'Taiwan\', 886, 0, 0),
			(209, \'TJ\', \'Tajikistan\', 992, 0, 0),
			(210, \'TZ\', \'Tanzania\', 255, 0, 0),
			(211, \'TH\', \'Thailand\', 66, 0, 0),
			(212, \'TL\', \'Timor-Leste\', 670, 0, 0),
			(213, \'TG\', \'Togo\', 228, 0, 0),
			(214, \'TK\', \'Tokelau\', 690, 0, 0),
			(215, \'TO\', \'Tonga\', 676, 0, 0),
			(216, \'TT\', \'Trinidad and Tobago\', 1868, 0, 0),
			(217, \'TN\', \'Tunisia\', 216, 0, 0),
			(218, \'TR\', \'Turkey\', 90, 0, 0),
			(219, \'TM\', \'Turkmenistan\', 7370, 0, 0),
			(220, \'TC\', \'Turks and Caicos Islands\', 1649, 0, 0),
			(221, \'TV\', \'Tuvalu\', 688, 0, 0),
			(222, \'UG\', \'Uganda\', 256, 0, 0),
			(223, \'UA\', \'Ukraine\', 380, 0, 0),
			(224, \'AE\', \'United Arab Emirates\', 971, 0, 0),
			(225, \'GB\', \'United Kingdom\', 44, 0, 0),
			(226, \'US\', \'United States\', 1, 0, 0),
			(228, \'UY\', \'Uruguay\', 598, 0, 0),
			(229, \'UZ\', \'Uzbekistan\', 998, 0, 0),
			(230, \'VU\', \'Vanuatu\', 678, 0, 0),
			(231, \'VE\', \'Venezuela\', 58, 0, 0),
			(232, \'VN\', \'Viet Nam\', 84, 0, 0),
			(233, \'VG\', \'Virgin Islands, British\', 1284, 0, 0),
			(234, \'VI\', \'Virgin Islands, U.s.\', 1340, 0, 0),
			(235, \'WF\', \'Wallis and Futuna\', 681, 0, 0),
			(236, \'EH\', \'Western Sahara\', 212, 0, 0),
			(237, \'YE\', \'Yemen\', 967, 0, 0),
			(238, \'ZM\', \'Zambia\', 260, 0, 0),
            (239, \'ZW\', \'Zimbabwe\', 263, 0, 0);'));
            
            DB::statement(DB::raw('INSERT INTO `categories` (`id`, `path`, `parent`) VALUES
			(2, \'men\', \'0\'),
			(3, \'women\', \'0\'),
            (4, \'kids\', \'0\');'));

            DB::statement(DB::raw('INSERT INTO `categories_translations` (`category_id`, `name`, `locale`) VALUES
			(2, \'Men\', \'en\'),
			(3, \'Women\', \'en\'),
            (4, \'Kids\', \'en\');'));

            DB::statement(DB::raw('INSERT INTO `categories_translations` (`category_id`, `name`, `locale`) VALUES
			(2, \'ملابس رجالية\', \'ar\'),
			(3, \'ملابس نسائية\', \'ar\'),
            (4, \'ملابس أطفال\', \'ar\');'));
            
            DB::statement(DB::raw('INSERT INTO `fields` (`id`, `name`, `code`) VALUES
			(1, \'First name\', \'first_name\'),
			(2, \'Last name\', \'last_name\'),
			(3, \'region\', \'region\'),
			(4, \'City\', \'city\'),
			(5, \'Phone\', \'phone\'),
            (6, \'address_details\', \'address_details\');'));
            
            DB::statement(DB::raw('INSERT INTO `footer` (`id`, `link`, `title`, `o`) VALUES
			(1, \'page/about\', \'About us\', 1),
			(2, \'404\', \'404\', 5),
			(7, \'support\', \'Support\', 6),
			(8, \'page/faq\', \'FAQ\', 4),
			(9, \'blog\', \'Blog\', 3),
            (10, \'products\', \'Products\', 2);'));
            
            DB::statement(DB::raw('INSERT INTO `languages` (`id`, `name`, `code`) VALUES
			(1, \'Arabic\', \'ar\'),
            (2, \'English\', \'en\');'));
            
            DB::statement(DB::raw('INSERT INTO `menu` (`id`, `link`, `title`, `parent`, `o`) VALUES
			(1, \'page/about\', \'About us\',0, 5),
			(2, \'404\', \'404\',0, 7),
			(3, \'\', \'Home\',0, 1),
			(4, \'products/men\', \'Men\',0, 2),
			(5, \'products/women\', \'Women\',0, 3),
			(6, \'products/kids\', \'kids\',0, 4),
			(7, \'support\', \'Support\',0, 8),
            (8, \'page/faq\', \'FAQ\',0, 6);'));
            
            DB::statement(DB::raw('INSERT INTO `pages` (`id`, `path`, `title`, `content`) VALUES
			(1, \'about\', \'About us\', \'<h3>About us</h3>\\r\\n<p>About Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur</p>\\r\\n<div class=\"clo-md-6\">\\r\\n<div class=\"list-group\">\\r\\n  <a href=\"#\" class=\"list-group-item\">\\r\\n    <h4 class=\"list-group-item-heading\">Our Vision</h4>\\r\\n    <p class=\"list-group-item-text\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.</p>\\r\\n  </a>\\r\\n  <a href=\"#\" class=\"list-group-item\">\\r\\n    <h4 class=\"list-group-item-heading\">Our Mission</h4>\\r\\n    <p class=\"list-group-item-text\">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas.</p>\\r\\n  </a>\\r\\n  <a href=\"#\" class=\"list-group-item\">\\r\\n    <h4 class=\"list-group-item-heading\">Our Values</h4>\\r\\n    <p class=\"list-group-item-text\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\\r\\n  </a>\\r\\n</div></div>\'),
            (2, \'faq\', \'FAQ\', \'<h5>A question ?</h5>\\r\\n<h6>Example answer</h6>\\r\\n<h5>Another question ?</h5>\\r\\n<h6>Example of a long answer !</h6>\');'));
            
            DB::statement(DB::raw('INSERT INTO `currencies` (`id`, `name`, `code`, `rate`, `default`) VALUES
            (1, \'Dollar\', \'$\', \'1.00\', 1);'));
            
            DB::statement(DB::raw('INSERT INTO `payments` (`id`, `title`, `code`, `options`, `active`) VALUES
			(1, \'PayPal\', \'paypal\', \'{\"email\":\"payments@shop.com\"}\', 1);'));
			
			/* (2, \'Credit Card\', \'stripe\', \'{\"key\":\"YOUR_KEY_HERE\",\"secret\":\"YOUR_SECRET_HERE\"}\', 1),
			(3, \'Cash on delivery\', \'cash\', \'{}\', 1),
            (4, \'Bank transfer\', \'bank\', \'{\"AccountName\":\"Name\",\"AccountNumber\":\"123456\",\"BankName\":\"Bank\",\"RoutingNumber\":\"123456\",\"IBAN\":\"123456\",\"SWIFT\":\"123456\"}\', 1);')); */
            
            DB::statement(DB::raw('INSERT INTO `products` (`id`, `category`, `price`, `images`, `quantity`, `download`, `options`) VALUES
			(29, 2, 13.00, \'29-0.png,29-1.png,29-2.png\', \'100\',\'\',\'[]\'),
			(30, 2, 8.00, \'30-0.png,30-1.png,30-2.png\', \'100\',\'\',\'[]\'),
			(31, 3, 25.00, \'31-0.png,31-1.png\', \'200\',\'\',\'[]\'),
            (32, 4, 20.00, \'32-0.png,32-1.png,32-2.png\', \'100\',\'\',\'[]\');'));

            DB::statement(DB::raw('INSERT INTO `products_translations` (`product_id`, `title`, `text`, `locale`) VALUES
			(29, \'T-Shirt\', \'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor imperdiet porttitor. Pellentesque id consectetur massa.\', \'en\'),
			(30, \'Jeans\', \'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor imperdiet porttitor. Pellentesque id consectetur massa.\',\'en\'),
			(31, \'Dress\', \'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor imperdiet porttitor. Pellentesque id consectetur massa.\',\'en\'),
            (32, \'Sneakers\', \'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor imperdiet porttitor. Pellentesque id consectetur massa.\',\'en\');'));

            DB::statement(DB::raw('INSERT INTO `products_translations` (`product_id`, `title`, `text`, `locale`) VALUES
			(29, \'تي شيرت\', \'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.\', \'ar\'),
			(30, \'بنطلون جينز\', \'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.\',\'ar\'),
			(31, \'فستان\', \'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.\',\'ar\'),
            (32, \'أحذية رياضية\', \'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.\',\'ar\');'));
            
            DB::statement(DB::raw('INSERT INTO `style` (`slogan`, `desc`, `background`, `button`, `media`, `css`, `js`) VALUES
            (\'New arrivals\', \'New products with great discounts from the most luxurious brand in the world !\', \'#4c77c6,#649bf2\', \'Shop now,products\', \'https://www.youtube.com/watch?v=Z0FETzb32Hs\', \'\', \'\');'));
            
            DB::statement(DB::raw('INSERT INTO `templates` (`id`, `title`, `code`, `template`) VALUES (1, \'Order Email\', \'order\', \'<!DOCTYPE html>\\r\\n<html lang=\"en\">\\r\\n<head>\\r\\n <meta charset=\"utf-8\">\\r\\n <meta name=\"viewport\" content=\"width=device-width\"> \\r\\n <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\\r\\n <meta name=\"x-apple-disable-message-reformatting\">\\r\\n <title></title> \\r\\n <!--[if mso]-->\\r\\n <style>\\r\\n * {\\r\\n font-family: sans-serif !important;\\r\\n }\\r\\n </style>\\r\\n <!--[endif]-->\\r\\n <!--[if !mso]-->\\r\\n <link href=\'\'https://fonts.googleapis.com/css?family=Roboto:400,700\'\' rel=\'\'stylesheet\'\' type=\'\'text/css\'\'>\\r\\n <!--[endif]-->\\r\\n <style>\\r\\n /* CSS resets */\\r\\n html,\\r\\n body {\\r\\n margin: 0 auto !important;\\r\\n padding: 0 !important;\\r\\n height: 100% !important;\\r\\n width: 100% !important;\\r\\n }\\r\\n * {\\r\\n -ms-text-size-adjust: 100%;\\r\\n -webkit-text-size-adjust: 100%;\\r\\n }\\r\\n div[style*=\"margin: 16px 0\"] {\\r\\n margin:0 !important;\\r\\n }\\r\\n table,\\r\\n td {\\r\\n mso-table-lspace: 0pt !important;\\r\\n mso-table-rspace: 0pt !important;\\r\\n }\\r\\n img {\\r\\n -ms-interpolation-mode:bicubic;\\r\\n }\\r\\n\\r\\n *[x-apple-data-detectors] {\\r\\n color: inherit !important;\\r\\n text-decoration: none !important;\\r\\n }\\r\\n\\r\\n .x-gmail-data-detectors,\\r\\n .x-gmail-data-detectors *,\\r\\n .aBn {\\r\\n border-bottom: 0 !important;\\r\\n cursor: default !important;\\r\\n }\\r\\n .a6S {\\r\\n display: none !important;\\r\\n opacity: 0.01 !important;\\r\\n }\\r\\n img.g-img + div {\\r\\n display:none !important;\\r\\n }\\r\\n\\r\\n .button-link {\\r\\n text-decoration: none !important;\\r\\n }\\r\\n @media only screen and (min-device-width: 375px) and (max-device-width: 413px) { /* iPhone 6 and 6+ */\\r\\n .email-container {\\r\\n min-width: 375px !important;\\r\\n }\\r\\n }\\r\\n </style>\\r\\n <!--[if gte mso 9]>\\r\\n <xml>\\r\\n <o:OfficeDocumentSettings>\\r\\n <o:AllowPNG/>\\r\\n <o:PixelsPerInch>96</o:PixelsPerInch>\\r\\n </o:OfficeDocumentSettings>\\r\\n </xml>\\r\\n <![endif]-->\\r\\n <style>\\r\\n\\r\\n /* Custom style */\\r\\n .button-td,\\r\\n .button-a {\\r\\n transition: all 100ms ease-in;\\r\\n }\\r\\n .button-td:hover,\\r\\n .button-a:hover {\\r\\n background: #555555 !important;\\r\\n border-color: #555555 !important;\\r\\n }\\r\\n /* Media Queries */\\r\\n @media screen and (max-width: 480px) {\\r\\n .fluid {\\r\\n width: 100% !important;\\r\\n max-width: 100% !important;\\r\\n height: auto !important;\\r\\n margin-left: auto !important;\\r\\n margin-right: auto !important;\\r\\n }\\r\\n\\r\\n /* What it does: Forces table cells into full-width rows. */\\r\\n .stack-column,\\r\\n .stack-column-center {\\r\\n display: block !important;\\r\\n width: 100% !important;\\r\\n max-width: 100% !important;\\r\\n direction: ltr !important;\\r\\n }\\r\\n /* And center justify these ones. */\\r\\n .stack-column-center {\\r\\n text-align: center !important;\\r\\n }\\r\\n\\r\\n /* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */\\r\\n .center-on-narrow {\\r\\n text-align: center !important;\\r\\n display: block !important;\\r\\n margin-left: auto !important;\\r\\n margin-right: auto !important;\\r\\n float: none !important;\\r\\n }\\r\\n table.center-on-narrow {\\r\\n display: inline-block !important;\\r\\n }\\r\\n }\\r\\n\\r\\n </style>\\r\\n\\r\\n</head>\\r\\n<body width=\"100%\" bgcolor=\"#ffffff\" style=\"margin: 0; mso-line-height-rule: exactly;\">\\r\\n <center style=\"width: 100%; background: rgb(250, 250, 250); text-align: left;\">\\r\\n <div style=\"max-width: 680px; margin: auto;\" class=\"email-container\">\\r\\n <!--[if mso]>\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"680\" align=\"center\">\\r\\n <tr>\\r\\n <td>\\r\\n <![endif]-->\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\" width=\"100%\" style=\"max-width: 680px;\">\\r\\n <tr>\\r\\n <td style=\"padding: 20px 0; text-align: center\">\\r\\n <img src=\"{url}/images/logo.png\" aria-hidden=\"true\" width=\"200\" height=\"50\" alt=\"{name}\" border=\"0\" style=\"height: auto; font-family: sans-serif; font-size: 20px; line-height: 40px; color: #555555;\">\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\" width=\"100%\" style=\"max-width: 680px;\">\\r\\n <tr>\\r\\n <td style=\"background:rgb(134, 153, 160);border-top-left-radius: 6px;border-top-right-radius: 6px;\">\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\">\\r\\n <tr>\\r\\n <td style=\"padding: 40px; text-align: center; font-family: sans-serif; font-size: 15px; line-height: 20px; color: rgb(249, 250, 252);\">\\r\\n <h2>Order confirmation</h2>\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n </td>\\r\\n </tr>\\r\\n <tr>\\r\\n <td bgcolor=\"#ffffff\" style=\"border-bottom-left-radius: 6px;border-bottom-right-radius: 6px;\" align=\"center\" height=\"100%\" valign=\"top\" width=\"100%\">\\r\\n <!--[if mso]>\\r\\n <table role=\"presentation\" aria-hidden=\"true\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" width=\"660\">\\r\\n <tr>\\r\\n <td align=\"center\" valign=\"top\" width=\"660\">\\r\\n <![endif]-->\\r\\n <table role=\"presentation\" aria-hidden=\"true\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" width=\"100%\" style=\"max-width:660px;\">\\r\\n <tr>\\r\\n <td align=\"center\" valign=\"top\" style=\"font-size:0; padding: 10px 0;\">\\r\\n <!--[if mso]>\\r\\n <table role=\"presentation\" aria-hidden=\"true\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" width=\"660\">\\r\\n <tr>\\r\\n <td align=\"left\" valign=\"top\" width=\"330\">\\r\\n <![endif]-->\\r\\n <div style=\"display:inline-block; margin: 0 -2px; width:100%; min-width:200px; max-width:330px; vertical-align:top;\" class=\"stack-column\">\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\">\\r\\n <tr>\\r\\n <td style=\"padding: 10px 10px;\">\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\" style=\"font-size: 14px;text-align: left;\">\\r\\n <tr>\\r\\n <td style=\"font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; padding-top: 0px;\" class=\"stack-column-center\"><h4>Buyer details</h4><br />{buyer_fields}</td>\\r\\n </tr>\\r\\n </table>\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n </div>\\r\\n <!--[if mso]>\\r\\n </td>\\r\\n <td align=\"left\" valign=\"top\" width=\"330\">\\r\\n <![endif]-->\\r\\n <div style=\"display:inline-block; margin: 0 -2px; width:100%; min-width:200px; max-width:330px; vertical-align:top;\" class=\"stack-column\">\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\">\\r\\n <tr>\\r\\n <td style=\"padding: 10px 10px;\">\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\" style=\"font-size: 14px;text-align: left;\">\\r\\n <tr>\\r\\n <td style=\"font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; padding-top: 0px;\" class=\"stack-column-center\">\\r\\n <h4>Seller details</h4><br />\\r\\n {name}<br />\\r\\n {address}<br />\\r\\n {phone}\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n </div>\\r\\n <hr style=\"color: white;margin: 30px 10px;\" />\\r\\n <div style=\"display:inline-block; margin: 0 -2px; width:100%; min-width:200px; vertical-align:top;\">\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\">\\r\\n <tr>\\r\\n <td style=\"padding: 10px 10px;\">\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\" style=\"font-size: 14px;text-align: left;\">\\r\\n <tr>\\r\\n <td style=\"font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; padding-top: 0px;\">\\r\\n {products}\\r\\n <b style=\"display: block;text-align: right;\">Total : {total}</b>\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n </div>\\r\\n <!--[if mso]>\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n <![endif]-->\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n <!--[if mso]>\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n <![endif]-->\\r\\n </td>\\r\\n </tr>\\r\\n <!-- 2 Even Columns : END -->\\r\\n <tr>\\r\\n <td height=\"40\" style=\"font-size: 0; line-height: 0;\">\\r\\n \\r\\n </td>\\r\\n </tr>\\r\\n <tr>\\r\\n <td bgcolor=\"#ffffff\" style=\"border-radius: 6px;\">\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\">\\r\\n <tr>\\r\\n <td style=\"padding: 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;\">\\r\\n <h3 style=\"float: left;margin: 10px 0px;\">Have a question ?</h3><a style=\"float: right;background: rgb(134, 153, 160);text-decoration: transparent;color: white;padding: 10px 25px;border-radius: 50px;\" href=\"{url}/support\">Contact us</a>\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\" width=\"100%\" style=\"max-width: 680px;\">\\r\\n <tr>\\r\\n <td style=\"padding: 40px 10px;width: 100%;font-size: 12px; font-family: sans-serif; line-height:18px; text-align: center; color: #888888;\" class=\"x-gmail-data-detectors\">\\r\\n {address}<br>{phone}\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n <!--[if mso]>\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n <![endif]-->\\r\\n </div>\\r\\n </center>\\r\\n</body>\\r\\n</html>\\r\\n\'), (2, \'Support reply\', \'reply\', \'<!DOCTYPE html>\\r\\n<html lang=\"en\">\\r\\n<head>\\r\\n <meta charset=\"utf-8\">\\r\\n <meta name=\"viewport\" content=\"width=device-width\"> \\r\\n <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\\r\\n <meta name=\"x-apple-disable-message-reformatting\">\\r\\n <title></title> \\r\\n <!--[if mso]-->\\r\\n <style>\\r\\n * {\\r\\n font-family: sans-serif !important;\\r\\n }\\r\\n </style>\\r\\n <!--[endif]-->\\r\\n <!--[if !mso]-->\\r\\n <link href=\'\'https://fonts.googleapis.com/css?family=Roboto:400,700\'\' rel=\'\'stylesheet\'\' type=\'\'text/css\'\'>\\r\\n <!--[endif]-->\\r\\n <style>\\r\\n /* CSS resets */\\r\\n html,\\r\\n body {\\r\\n margin: 0 auto !important;\\r\\n padding: 0 !important;\\r\\n height: 100% !important;\\r\\n width: 100% !important;\\r\\n }\\r\\n * {\\r\\n -ms-text-size-adjust: 100%;\\r\\n -webkit-text-size-adjust: 100%;\\r\\n }\\r\\n div[style*=\"margin: 16px 0\"] {\\r\\n margin:0 !important;\\r\\n }\\r\\n table,\\r\\n td {\\r\\n mso-table-lspace: 0pt !important;\\r\\n mso-table-rspace: 0pt !important;\\r\\n }\\r\\n img {\\r\\n -ms-interpolation-mode:bicubic;\\r\\n }\\r\\n\\r\\n *[x-apple-data-detectors] {\\r\\n color: inherit !important;\\r\\n text-decoration: none !important;\\r\\n }\\r\\n\\r\\n .x-gmail-data-detectors,\\r\\n .x-gmail-data-detectors *,\\r\\n .aBn {\\r\\n border-bottom: 0 !important;\\r\\n cursor: default !important;\\r\\n }\\r\\n .a6S {\\r\\n display: none !important;\\r\\n opacity: 0.01 !important;\\r\\n }\\r\\n img.g-img + div {\\r\\n display:none !important;\\r\\n }\\r\\n\\r\\n .button-link {\\r\\n text-decoration: none !important;\\r\\n }\\r\\n @media only screen and (min-device-width: 375px) and (max-device-width: 413px) { /* iPhone 6 and 6+ */\\r\\n .email-container {\\r\\n min-width: 375px !important;\\r\\n }\\r\\n }\\r\\n </style>\\r\\n <!--[if gte mso 9]>\\r\\n <xml>\\r\\n <o:OfficeDocumentSettings>\\r\\n <o:AllowPNG/>\\r\\n <o:PixelsPerInch>96</o:PixelsPerInch>\\r\\n </o:OfficeDocumentSettings>\\r\\n </xml>\\r\\n <![endif]-->\\r\\n <style>\\r\\n\\r\\n /* Custom style */\\r\\n .button-td,\\r\\n .button-a {\\r\\n transition: all 100ms ease-in;\\r\\n }\\r\\n .button-td:hover,\\r\\n .button-a:hover {\\r\\n background: #555555 !important;\\r\\n border-color: #555555 !important;\\r\\n }\\r\\n /* Media Queries */\\r\\n @media screen and (max-width: 480px) {\\r\\n .fluid {\\r\\n width: 100% !important;\\r\\n max-width: 100% !important;\\r\\n height: auto !important;\\r\\n margin-left: auto !important;\\r\\n margin-right: auto !important;\\r\\n }\\r\\n\\r\\n /* What it does: Forces table cells into full-width rows. */\\r\\n .stack-column,\\r\\n .stack-column-center {\\r\\n display: block !important;\\r\\n width: 100% !important;\\r\\n max-width: 100% !important;\\r\\n direction: ltr !important;\\r\\n }\\r\\n /* And center justify these ones. */\\r\\n .stack-column-center {\\r\\n text-align: center !important;\\r\\n }\\r\\n\\r\\n /* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */\\r\\n .center-on-narrow {\\r\\n text-align: center !important;\\r\\n display: block !important;\\r\\n margin-left: auto !important;\\r\\n margin-right: auto !important;\\r\\n float: none !important;\\r\\n }\\r\\n table.center-on-narrow {\\r\\n display: inline-block !important;\\r\\n }\\r\\n }\\r\\n\\r\\n </style>\\r\\n\\r\\n</head>\\r\\n<body width=\"100%\" bgcolor=\"#ffffff\" style=\"margin: 0; mso-line-height-rule: exactly;\">\\r\\n <center style=\"width: 100%; background: rgb(250, 250, 250); text-align: left;\">\\r\\n <div style=\"max-width: 680px; margin: auto;\" class=\"email-container\">\\r\\n <!--[if mso]>\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"680\" align=\"center\">\\r\\n <tr>\\r\\n <td>\\r\\n <![endif]-->\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\" width=\"100%\" style=\"max-width: 680px;\">\\r\\n <tr>\\r\\n <td style=\"padding: 20px 0; text-align: center\">\\r\\n <img src=\"{url}/images/logo.png\" aria-hidden=\"true\" width=\"200\" height=\"50\" alt=\"{name}\" border=\"0\" style=\"height: auto; font-family: sans-serif; font-size: 20px; line-height: 40px; color: #555555;\">\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\" width=\"100%\" style=\"max-width: 680px;\">\\r\\n <tr>\\r\\n <td style=\"background:rgb(134, 153, 160);border-top-left-radius: 6px;border-top-right-radius: 6px;\">\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\">\\r\\n <tr>\\r\\n <td style=\"padding: 40px; text-align: center; font-family: sans-serif; font-size: 15px; line-height: 20px; color: rgb(249, 250, 252);\">\\r\\n <h2>{title}</h2>\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n </td>\\r\\n </tr>\\r\\n <tr>\\r\\n <td bgcolor=\"#ffffff\" style=\"border-bottom-left-radius: 6px;border-bottom-right-radius: 6px;\" align=\"center\" height=\"100%\" valign=\"top\" width=\"100%\">\\r\\n <table role=\"presentation\" aria-hidden=\"true\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" width=\"100%\" style=\"max-width:660px;\">\\r\\n <tr>\\r\\n <td valign=\"top\" style=\" padding: 10px 0;\">\\r\\n {reply}\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n </td>\\r\\n </tr><br/>\\r\\n <tr>\\r\\n <td bgcolor=\"#ffffff\" style=\"border-radius: 6px;\">\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\">\\r\\n <tr>\\r\\n <td style=\"padding: 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;\">\\r\\n <h3 style=\"float: left;margin: 10px 0px;\">Have a question ?</h3><a style=\"float: right;background: rgb(134, 153, 160);text-decoration: transparent;color: white;padding: 10px 25px;border-radius: 50px;\" href=\"{url}/support\">Contact us</a>\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\" width=\"100%\" style=\"max-width: 680px;\">\\r\\n <tr>\\r\\n <td style=\"padding: 40px 10px;width: 100%;font-size: 12px; font-family: sans-serif; line-height:18px; text-align: center; color: #888888;\" class=\"x-gmail-data-detectors\">\\r\\n {address}<br>{phone}\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n <!--[if mso]>\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n <![endif]-->\\r\\n </div>\\r\\n </center>\\r\\n</body>\\r\\n</html>\'), (3, \'Newsletter email\', \'newsletter\', \'<!DOCTYPE html>\\r\\n<html lang=\"en\">\\r\\n<head>\\r\\n <meta charset=\"utf-8\">\\r\\n <meta name=\"viewport\" content=\"width=device-width\"> \\r\\n <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\\r\\n <meta name=\"x-apple-disable-message-reformatting\">\\r\\n <title></title> \\r\\n <!--[if mso]-->\\r\\n <style>\\r\\n * {\\r\\n font-family: sans-serif !important;\\r\\n }\\r\\n </style>\\r\\n <!--[endif]-->\\r\\n <!--[if !mso]-->\\r\\n <link href=\'\'https://fonts.googleapis.com/css?family=Roboto:400,700\'\' rel=\'\'stylesheet\'\' type=\'\'text/css\'\'>\\r\\n <!--[endif]-->\\r\\n <style>\\r\\n /* CSS resets */\\r\\n html,\\r\\n body {\\r\\n margin: 0 auto !important;\\r\\n padding: 0 !important;\\r\\n height: 100% !important;\\r\\n width: 100% !important;\\r\\n }\\r\\n * {\\r\\n -ms-text-size-adjust: 100%;\\r\\n -webkit-text-size-adjust: 100%;\\r\\n }\\r\\n div[style*=\"margin: 16px 0\"] {\\r\\n margin:0 !important;\\r\\n }\\r\\n table,\\r\\n td {\\r\\n mso-table-lspace: 0pt !important;\\r\\n mso-table-rspace: 0pt !important;\\r\\n }\\r\\n img {\\r\\n -ms-interpolation-mode:bicubic;\\r\\n }\\r\\n\\r\\n *[x-apple-data-detectors] {\\r\\n color: inherit !important;\\r\\n text-decoration: none !important;\\r\\n }\\r\\n\\r\\n .x-gmail-data-detectors,\\r\\n .x-gmail-data-detectors *,\\r\\n .aBn {\\r\\n border-bottom: 0 !important;\\r\\n cursor: default !important;\\r\\n }\\r\\n .a6S {\\r\\n display: none !important;\\r\\n opacity: 0.01 !important;\\r\\n }\\r\\n img.g-img + div {\\r\\n display:none !important;\\r\\n }\\r\\n\\r\\n .button-link {\\r\\n text-decoration: none !important;\\r\\n }\\r\\n @media only screen and (min-device-width: 375px) and (max-device-width: 413px) { /* iPhone 6 and 6+ */\\r\\n .email-container {\\r\\n min-width: 375px !important;\\r\\n }\\r\\n }\\r\\n </style>\\r\\n <!--[if gte mso 9]>\\r\\n <xml>\\r\\n <o:OfficeDocumentSettings>\\r\\n <o:AllowPNG/>\\r\\n <o:PixelsPerInch>96</o:PixelsPerInch>\\r\\n </o:OfficeDocumentSettings>\\r\\n </xml>\\r\\n <![endif]-->\\r\\n <style>\\r\\n\\r\\n /* Custom style */\\r\\n .button-td,\\r\\n .button-a {\\r\\n transition: all 100ms ease-in;\\r\\n }\\r\\n .button-td:hover,\\r\\n .button-a:hover {\\r\\n background: #555555 !important;\\r\\n border-color: #555555 !important;\\r\\n }\\r\\n /* Media Queries */\\r\\n @media screen and (max-width: 480px) {\\r\\n .fluid {\\r\\n width: 100% !important;\\r\\n max-width: 100% !important;\\r\\n height: auto !important;\\r\\n margin-left: auto !important;\\r\\n margin-right: auto !important;\\r\\n }\\r\\n\\r\\n /* What it does: Forces table cells into full-width rows. */\\r\\n .stack-column,\\r\\n .stack-column-center {\\r\\n display: block !important;\\r\\n width: 100% !important;\\r\\n max-width: 100% !important;\\r\\n direction: ltr !important;\\r\\n }\\r\\n /* And center justify these ones. */\\r\\n .stack-column-center {\\r\\n text-align: center !important;\\r\\n }\\r\\n\\r\\n /* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */\\r\\n .center-on-narrow {\\r\\n text-align: center !important;\\r\\n display: block !important;\\r\\n margin-left: auto !important;\\r\\n margin-right: auto !important;\\r\\n float: none !important;\\r\\n }\\r\\n table.center-on-narrow {\\r\\n display: inline-block !important;\\r\\n }\\r\\n }\\r\\n\\r\\n </style>\\r\\n\\r\\n</head>\\r\\n<body width=\"100%\" bgcolor=\"#ffffff\" style=\"margin: 0; mso-line-height-rule: exactly;\">\\r\\n <center style=\"width: 100%; background: rgb(250, 250, 250); text-align: left;\">\\r\\n <div style=\"max-width: 680px; margin: auto;\" class=\"email-container\">\\r\\n <!--[if mso]>\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"680\" align=\"center\">\\r\\n <tr>\\r\\n <td>\\r\\n <![endif]-->\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\" width=\"100%\" style=\"max-width: 680px;\">\\r\\n <tr>\\r\\n <td style=\"padding: 20px 0; text-align: center\">\\r\\n <img src=\"{url}/images/logo.png\" aria-hidden=\"true\" width=\"200\" height=\"50\" alt=\"{name}\" border=\"0\" style=\"height: auto; font-family: sans-serif; font-size: 20px; line-height: 40px; color: #555555;\">\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\" width=\"100%\" style=\"max-width: 680px;\">\\r\\n <tr>\\r\\n <td style=\"background:rgb(134, 153, 160);border-top-left-radius: 6px;border-top-right-radius: 6px;\">\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\">\\r\\n <tr>\\r\\n <td style=\"padding: 40px; text-align: center; font-family: sans-serif; font-size: 15px; line-height: 20px; color: rgb(249, 250, 252);\">\\r\\n <h2>{title}</h2>\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n </td>\\r\\n </tr>\\r\\n <tr>\\r\\n <td bgcolor=\"#ffffff\" style=\"border-bottom-left-radius: 6px;border-bottom-right-radius: 6px;\" align=\"center\" height=\"100%\" valign=\"top\" width=\"100%\">\\r\\n <table role=\"presentation\" aria-hidden=\"true\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" width=\"100%\" style=\"max-width:660px;\">\\r\\n <tr>\\r\\n <td valign=\"top\" style=\" padding: 10px 0;\">\\r\\n {content}\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n </td>\\r\\n </tr><br/>\\r\\n <tr>\\r\\n <td bgcolor=\"#ffffff\" style=\"border-radius: 6px;\">\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\">\\r\\n <tr>\\r\\n <td style=\"padding: 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;\">\\r\\n <h3 style=\"float: left;margin: 10px 0px;\">Have a question ?</h3><a style=\"float: right;background: rgb(134, 153, 160);text-decoration: transparent;color: white;padding: 10px 25px;border-radius: 50px;\" href=\"{url}/support\">Contact us</a>\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\" width=\"100%\" style=\"max-width: 680px;\">\\r\\n <tr>\\r\\n <td style=\"padding: 40px 10px;width: 100%;font-size: 12px; font-family: sans-serif; line-height:18px; text-align: center; color: #888888;\" class=\"x-gmail-data-detectors\">\\r\\n {address}<br>{phone}\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n <!--[if mso]>\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n <![endif]-->\\r\\n </div>\\r\\n </center>\\r\\n</body>\\r\\n</html>\'), (4, \'Product download\', \'download\', \'<!DOCTYPE html>\\r\\n<html lang=\"en\">\\r\\n<head>\\r\\n <meta charset=\"utf-8\">\\r\\n <meta name=\"viewport\" content=\"width=device-width\"> \\r\\n <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\\r\\n <meta name=\"x-apple-disable-message-reformatting\">\\r\\n <title></title> \\r\\n <!--[if mso]-->\\r\\n <style>\\r\\n * {\\r\\n font-family: sans-serif !important;\\r\\n }\\r\\n </style>\\r\\n <!--[endif]-->\\r\\n <!--[if !mso]-->\\r\\n <link href=\'\'https://fonts.googleapis.com/css?family=Roboto:400,700\'\' rel=\'\'stylesheet\'\' type=\'\'text/css\'\'>\\r\\n <!--[endif]-->\\r\\n <style>\\r\\n /* CSS resets */\\r\\n html,\\r\\n body {\\r\\n margin: 0 auto !important;\\r\\n padding: 0 !important;\\r\\n height: 100% !important;\\r\\n width: 100% !important;\\r\\n }\\r\\n * {\\r\\n -ms-text-size-adjust: 100%;\\r\\n -webkit-text-size-adjust: 100%;\\r\\n }\\r\\n div[style*=\"margin: 16px 0\"] {\\r\\n margin:0 !important;\\r\\n }\\r\\n table,\\r\\n td {\\r\\n mso-table-lspace: 0pt !important;\\r\\n mso-table-rspace: 0pt !important;\\r\\n }\\r\\n img {\\r\\n -ms-interpolation-mode:bicubic;\\r\\n }\\r\\n\\r\\n *[x-apple-data-detectors] {\\r\\n color: inherit !important;\\r\\n text-decoration: none !important;\\r\\n }\\r\\n\\r\\n .x-gmail-data-detectors,\\r\\n .x-gmail-data-detectors *,\\r\\n .aBn {\\r\\n border-bottom: 0 !important;\\r\\n cursor: default !important;\\r\\n }\\r\\n .a6S {\\r\\n display: none !important;\\r\\n opacity: 0.01 !important;\\r\\n }\\r\\n img.g-img + div {\\r\\n display:none !important;\\r\\n }\\r\\n\\r\\n .button-link {\\r\\n text-decoration: none !important;\\r\\n }\\r\\n @media only screen and (min-device-width: 375px) and (max-device-width: 413px) { /* iPhone 6 and 6+ */\\r\\n .email-container {\\r\\n min-width: 375px !important;\\r\\n }\\r\\n }\\r\\n </style>\\r\\n <!--[if gte mso 9]>\\r\\n <xml>\\r\\n <o:OfficeDocumentSettings>\\r\\n <o:AllowPNG/>\\r\\n <o:PixelsPerInch>96</o:PixelsPerInch>\\r\\n </o:OfficeDocumentSettings>\\r\\n </xml>\\r\\n <![endif]-->\\r\\n <style>\\r\\n\\r\\n /* Custom style */\\r\\n .button-td,\\r\\n .button-a {\\r\\n transition: all 100ms ease-in;\\r\\n }\\r\\n .button-td:hover,\\r\\n .button-a:hover {\\r\\n background: #555555 !important;\\r\\n border-color: #555555 !important;\\r\\n }\\r\\n /* Media Queries */\\r\\n @media screen and (max-width: 480px) {\\r\\n .fluid {\\r\\n width: 100% !important;\\r\\n max-width: 100% !important;\\r\\n height: auto !important;\\r\\n margin-left: auto !important;\\r\\n margin-right: auto !important;\\r\\n }\\r\\n\\r\\n /* What it does: Forces table cells into full-width rows. */\\r\\n .stack-column,\\r\\n .stack-column-center {\\r\\n display: block !important;\\r\\n width: 100% !important;\\r\\n max-width: 100% !important;\\r\\n direction: ltr !important;\\r\\n }\\r\\n /* And center justify these ones. */\\r\\n .stack-column-center {\\r\\n text-align: center !important;\\r\\n }\\r\\n\\r\\n /* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */\\r\\n .center-on-narrow {\\r\\n text-align: center !important;\\r\\n display: block !important;\\r\\n margin-left: auto !important;\\r\\n margin-right: auto !important;\\r\\n float: none !important;\\r\\n }\\r\\n table.center-on-narrow {\\r\\n display: inline-block !important;\\r\\n }\\r\\n }\\r\\n\\r\\n </style>\\r\\n\\r\\n</head>\\r\\n<body width=\"100%\" bgcolor=\"#ffffff\" style=\"margin: 0; mso-line-height-rule: exactly;\">\\r\\n <center style=\"width: 100%; background: rgb(250, 250, 250); text-align: left;\">\\r\\n <div style=\"max-width: 680px; margin: auto;\" class=\"email-container\">\\r\\n <!--[if mso]>\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"680\" align=\"center\">\\r\\n <tr>\\r\\n <td>\\r\\n <![endif]-->\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\" width=\"100%\" style=\"max-width: 680px;\">\\r\\n <tr>\\r\\n <td style=\"padding: 20px 0; text-align: center\">\\r\\n <img src=\"{url}/images/logo.png\" aria-hidden=\"true\" width=\"200\" height=\"50\" alt=\"{name}\" border=\"0\" style=\"height: auto; font-family: sans-serif; font-size: 20px; line-height: 40px; color: #555555;\">\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\" width=\"100%\" style=\"max-width: 680px;\">\\r\\n <tr>\\r\\n <td style=\"background:rgb(134, 153, 160);border-top-left-radius: 6px;border-top-right-radius: 6px;\">\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\">\\r\\n <tr>\\r\\n <td style=\"padding: 40px; text-align: center; font-family: sans-serif; font-size: 15px; line-height: 20px; color: rgb(249, 250, 252);\">\\r\\n <h2>Order Downloads</h2>\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n </td>\\r\\n </tr>\\r\\n <tr>\\r\\n <td bgcolor=\"#ffffff\" style=\"border-bottom-left-radius: 6px;border-bottom-right-radius: 6px;\" align=\"center\" height=\"100%\" valign=\"top\" width=\"100%\">\\r\\n <table role=\"presentation\" aria-hidden=\"true\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" width=\"100%\" style=\"max-width:660px;\">\\r\\n <tr>\\r\\n <td valign=\"top\" style=\" padding: 10px 0;\">\\r\\n {downloads}\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n </td>\\r\\n </tr><br/>\\r\\n <tr>\\r\\n <td bgcolor=\"#ffffff\" style=\"border-radius: 6px;\">\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\">\\r\\n <tr>\\r\\n <td style=\"padding: 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;\">\\r\\n <h3 style=\"float: left;margin: 10px 0px;\">Have a question ?</h3><a style=\"float: right;background: rgb(134, 153, 160);text-decoration: transparent;color: white;padding: 10px 25px;border-radius: 50px;\" href=\"{url}/support\">Contact us</a>\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\" width=\"100%\" style=\"max-width: 680px;\">\\r\\n <tr>\\r\\n <td style=\"padding: 40px 10px;width: 100%;font-size: 12px; font-family: sans-serif; line-height:18px; text-align: center; color: #888888;\" class=\"x-gmail-data-detectors\">\\r\\n {address}<br>{phone}\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n <!--[if mso]>\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n <![endif]-->\\r\\n </div>\\r\\n </center>\\r\\n</body>\\r\\n</html>\'), (5, \'Password reset\', \'reset-password\', \'<!DOCTYPE html>\\r\\n<html lang=\"en\">\\r\\n<head>\\r\\n <meta charset=\"utf-8\">\\r\\n <meta name=\"viewport\" content=\"width=device-width\"> \\r\\n <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\\r\\n <meta name=\"x-apple-disable-message-reformatting\">\\r\\n <title></title> \\r\\n <!--[if mso]-->\\r\\n <style>\\r\\n * {\\r\\n font-family: sans-serif !important;\\r\\n }\\r\\n </style>\\r\\n <!--[endif]-->\\r\\n <!--[if !mso]-->\\r\\n <link href=\'\'https://fonts.googleapis.com/css?family=Roboto:400,700\'\' rel=\'\'stylesheet\'\' type=\'\'text/css\'\'>\\r\\n <!--[endif]-->\\r\\n <style>\\r\\n /* CSS resets */\\r\\n html,\\r\\n body {\\r\\n margin: 0 auto !important;\\r\\n padding: 0 !important;\\r\\n height: 100% !important;\\r\\n width: 100% !important;\\r\\n }\\r\\n * {\\r\\n -ms-text-size-adjust: 100%;\\r\\n -webkit-text-size-adjust: 100%;\\r\\n }\\r\\n div[style*=\"margin: 16px 0\"] {\\r\\n margin:0 !important;\\r\\n }\\r\\n table,\\r\\n td {\\r\\n mso-table-lspace: 0pt !important;\\r\\n mso-table-rspace: 0pt !important;\\r\\n }\\r\\n img {\\r\\n -ms-interpolation-mode:bicubic;\\r\\n }\\r\\n\\r\\n *[x-apple-data-detectors] {\\r\\n color: inherit !important;\\r\\n text-decoration: none !important;\\r\\n }\\r\\n\\r\\n .x-gmail-data-detectors,\\r\\n .x-gmail-data-detectors *,\\r\\n .aBn {\\r\\n border-bottom: 0 !important;\\r\\n cursor: default !important;\\r\\n }\\r\\n .a6S {\\r\\n display: none !important;\\r\\n opacity: 0.01 !important;\\r\\n }\\r\\n img.g-img + div {\\r\\n display:none !important;\\r\\n }\\r\\n\\r\\n .button-link {\\r\\n text-decoration: none !important;\\r\\n }\\r\\n @media only screen and (min-device-width: 375px) and (max-device-width: 413px) { /* iPhone 6 and 6+ */\\r\\n .email-container {\\r\\n min-width: 375px !important;\\r\\n }\\r\\n }\\r\\n </style>\\r\\n <!--[if gte mso 9]>\\r\\n <xml>\\r\\n <o:OfficeDocumentSettings>\\r\\n <o:AllowPNG/>\\r\\n <o:PixelsPerInch>96</o:PixelsPerInch>\\r\\n </o:OfficeDocumentSettings>\\r\\n </xml>\\r\\n <![endif]-->\\r\\n <style>\\r\\n\\r\\n /* Custom style */\\r\\n .button-td,\\r\\n .button-a {\\r\\n transition: all 100ms ease-in;\\r\\n }\\r\\n .button-td:hover,\\r\\n .button-a:hover {\\r\\n background: #555555 !important;\\r\\n border-color: #555555 !important;\\r\\n }\\r\\n /* Media Queries */\\r\\n @media screen and (max-width: 480px) {\\r\\n .fluid {\\r\\n width: 100% !important;\\r\\n max-width: 100% !important;\\r\\n height: auto !important;\\r\\n margin-left: auto !important;\\r\\n margin-right: auto !important;\\r\\n }\\r\\n\\r\\n /* What it does: Forces table cells into full-width rows. */\\r\\n .stack-column,\\r\\n .stack-column-center {\\r\\n display: block !important;\\r\\n width: 100% !important;\\r\\n max-width: 100% !important;\\r\\n direction: ltr !important;\\r\\n }\\r\\n /* And center justify these ones. */\\r\\n .stack-column-center {\\r\\n text-align: center !important;\\r\\n }\\r\\n\\r\\n /* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */\\r\\n .center-on-narrow {\\r\\n text-align: center !important;\\r\\n display: block !important;\\r\\n margin-left: auto !important;\\r\\n margin-right: auto !important;\\r\\n float: none !important;\\r\\n }\\r\\n table.center-on-narrow {\\r\\n display: inline-block !important;\\r\\n }\\r\\n }\\r\\n\\r\\n </style>\\r\\n\\r\\n</head>\\r\\n<body width=\"100%\" bgcolor=\"#ffffff\" style=\"margin: 0; mso-line-height-rule: exactly;\">\\r\\n <center style=\"width: 100%; background: rgb(250, 250, 250); text-align: left;\">\\r\\n <div style=\"max-width: 680px; margin: auto;\" class=\"email-container\">\\r\\n <!--[if mso]>\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"680\" align=\"center\">\\r\\n <tr>\\r\\n <td>\\r\\n <![endif]-->\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\" width=\"100%\" style=\"max-width: 680px;\">\\r\\n <tr>\\r\\n <td style=\"padding: 20px 0; text-align: center\">\\r\\n <img src=\"{url}/images/logo.png\" aria-hidden=\"true\" width=\"200\" height=\"50\" alt=\"{name}\" border=\"0\" style=\"height: auto; font-family: sans-serif; font-size: 20px; line-height: 40px; color: #555555;\">\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\" width=\"100%\" style=\"max-width: 680px;\">\\r\\n <tr>\\r\\n <td style=\"background:rgb(134, 153, 160);border-top-left-radius: 6px;border-top-right-radius: 6px;\">\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\">\\r\\n <tr>\\r\\n <td style=\"padding: 40px; text-align: center; font-family: sans-serif; font-size: 15px; line-height: 20px; color: rgb(249, 250, 252);\">\\r\\n <h2>Reset your password</h2>\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n </td>\\r\\n </tr>\\r\\n <tr>\\r\\n <td bgcolor=\"#ffffff\" style=\"border-bottom-left-radius: 6px;border-bottom-right-radius: 6px;\" align=\"center\" height=\"100%\" valign=\"top\" width=\"100%\">\\r\\n <table role=\"presentation\" aria-hidden=\"true\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" width=\"100%\" style=\"max-width:660px;\">\\r\\n <tr>\\r\\n <td valign=\"top\" style=\" padding: 10px 0;\">\\r\\n Someone (presumably you) has requested that the password be reset for your account.\r\n\r\n<br/>Please <a href="{link}">click here</a> to reset your password.\r\n\r\nIf you did not request your password to be reset, please ignore this email, and no changes will be made.<br/>\r\n\r\nThanks!\r\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n </td>\\r\\n </tr><br/>\\r\\n <tr>\\r\\n <td bgcolor=\"#ffffff\" style=\"border-radius: 6px;\">\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\">\\r\\n <tr>\\r\\n <td style=\"padding: 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;\">\\r\\n <h3 style=\"float: left;margin: 10px 0px;\">Have a question ?</h3><a style=\"float: right;background: rgb(134, 153, 160);text-decoration: transparent;color: white;padding: 10px 25px;border-radius: 50px;\" href=\"{url}/support\">Contact us</a>\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n <table role=\"presentation\" aria-hidden=\"true\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\" width=\"100%\" style=\"max-width: 680px;\">\\r\\n <tr>\\r\\n <td style=\"padding: 40px 10px;width: 100%;font-size: 12px; font-family: sans-serif; line-height:18px; text-align: center; color: #888888;\" class=\"x-gmail-data-detectors\">\\r\\n {address}<br>{phone}\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n <!--[if mso]>\\r\\n </td>\\r\\n </tr>\\r\\n </table>\\r\\n <![endif]-->\\r\\n </div>\\r\\n </center>\\r\\n</body>\\r\\n</html>\');'));

            DB::statement(DB::raw('INSERT INTO `tracking` (`id`, `clicks`, `code`, `name`) VALUES
			(1, 0, \'fb\', \'Facebook Campaign\');'));

			DB::statement(DB::raw("INSERT INTO `ads` (`id`, `name`) VALUES
			(3, 'Home slider'),
			(5, 'top ads'),
			(6, 'Ads block 1'),
			(12, 'Ads block 2'),
			(13, 'Ads block 3');"));

			DB::statement(DB::raw("INSERT INTO `ad_items` (`id`, `ad_id`, `image`, `url`, `o`) VALUES
			(6, 3, '3-0.png', 'https://www.google.com.eg', 1),
			(7, 3, '3-1.png', 'https://www.google.com.eg', 1),
			(8, 3, '3-2.png', 'https://www.google.com.eg', 1),
			(9, 5, '5-0.png', 'https://www.google.com.eg', 1),
			(10, 5, '5-1.png', 'https://www.google.com.eg', 1),
			(11, 5, '5-2.png', 'https://www.google.com.eg', 1),
			(12, 6, '6-0.png', 'https://www.google.com.eg', 1),
			(13, 6, '6-1.png', 'https://www.google.com.eg', 1),
			(14, 6, '6-2.png', 'https://www.google.com.eg', 1),
			(25, 12, '12-0.png', 'https://www.google.com.eg', 1),
			(26, 12, '12-1.png', 'https://www.google.com.eg', 1),
			(27, 12, NULL, NULL, 1),
			(28, 13, '13-0.png', 'https://www.google.com.eg', 1),
			(29, 13, '13-1.png', 'https://www.google.com.eg', 1),
			(30, 13, '13-2.png', NULL, 1);"));

			DB::statement(DB::raw("INSERT INTO `blocs` (`id`, `area`, `type`, `o`) VALUES
			(6, 'home', 'ads', 1),
			(7, 'home', 'categoriesSlider', 1),
			(8, 'home', 'ads', 1),
			(9, 'home', 'category', 1),
			(10, 'home', 'category', 1),
			(11, 'home', 'ads', 1),
			(12, 'home', 'category', 1);
			"));

			DB::statement(DB::raw("INSERT INTO `blocsmeta` (`id`, `bloc_id`, `meta_key`, `meta_value`) VALUES
			(1, 6, 'action_id', '6'),
			(2, 8, 'action_id', '12'),
			(3, 9, 'action_id', '2'),
			(4, 10, 'action_id', '3'),
			(5, 11, 'action_id', '13'),
			(6, 12, 'action_id', '4');
			"));
    }
}
