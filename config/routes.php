<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/


$route['default_controller'] 		= 	FURL.'/basic';

$route['assets'] = "assets/$1";

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/earnMoney'] 		= 	$route['default_controller'].'/earnMoney';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/login/(:any)'] 	= 	$route['default_controller'].'/login/$2';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/login/(:any)/(:any)'] 	= 	$route['default_controller'].'/login/$2/$3';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/sair'] 			= 	$route['default_controller'].'/logout';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/basic'] 			= 	FURL.'/basic';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/del_logs'] 			= 	FURL.'/basic/del_logs';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/live_out'] 			= 	FURL.'/basic/live_trade_out';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/live_error'] 	= 	FURL.'/basic/live_trade_error';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/dashboard'] 		= 	FURL.'/dashboard';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/support'] 		= 	FURL.'/support';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/support_form'] 		= 	FURL.'/support/support_form';
$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/support_submit'] 		= 	FURL.'/support/support_submit';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/message'] 			= 	FURL.'/message';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/partners'] 		= 	FURL.'/partners';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/page_list'] 		= 	FURL.'/partners/page_list';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/getUserTreeData'] 		= 	FURL.'/partners/getUserTreeData';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/getUserLevelInfo'] 		= 	FURL.'/partners/getUserLevelInfo';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/uplines'] 			= 	FURL.'/uplines';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/commission'] 			= 	FURL.'/commission';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/referred'] 			= 	FURL.'/referred';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/lostprofits'] 		= 	FURL.'/lostprofits';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/promo'] 			= 	FURL.'/promo';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/faq'] 				= 	FURL.'/FAQ';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/socketTrigger'] 	= 	FURL.'/basic/socketTrigger';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/getUserLevel'] 	= 	FURL.'/ajax/getUserLevel';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/getDataAboutPartner'] 	= 	FURL.'/ajax/getDataAboutPartner';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/updateUplineData'] 	= 	FURL.'/ajax/updateUplineData';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/getUser'] 				= 	FURL.'/ajax/getUser';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/updateLevel'] 		= 	FURL.'/ajax/updateMissingLevel';




$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/refer/(:any)']     =  	$route['default_controller'].'/referuser/$2';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/register'] 		= 	FURL.'/ajax/register';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/updateid'] 		= 	FURL.'/ajax/updateid';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/buyLevel'] 		= 	FURL.'/ajax/buyLevel';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/getUsdValue'] 		= 	FURL.'/ajax/getUsdValue';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/userPartner'] 		= 	FURL.'/ajax/userPartner';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/level_test'] 		= 	FURL.'/dashboard/level_test';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/add_message'] 		= 	FURL.'/message/add_message';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/get_messages'] 		= 	FURL.'/message/get_messages';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/get_message'] 		= 	FURL.'/message/get_message';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/levelPassCheck'] 				= 	FURL.'/ajax/levelPassCheck';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/captchaCheck'] 		= 	FURL.'/ajax/captchaCheck';


$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/email'] 		= 	FURL.'/basic/email';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/renewal'] 		= 	FURL.'/renewal/index';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/placement'] 		= 	FURL.'/placement/index';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/setSponsor'] 		= 	FURL.'/placement/setSponsor';


$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/news'] 		= 	FURL.'/dashboard/news';


$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/referral'] 		= 	FURL.'/Cms/index';
$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/zoom'] 		= 	FURL.'/Cms/zoom';
$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/telegram'] 		= 	FURL.'/Cms/telegram';

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/notification'] 		= 	FURL.'/dashboard/notification';


$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/coinmarketcap'] 		= 	$route['default_controller'].'/coinmarket';


$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/login_manual'] 	= 	$route['default_controller'].'/login_manual';
$route['^(en|es|ru)/updateTrasaction'] 		= 	FURL.'/ajax/updateTrasaction';
$route['^(en|es|ru)/updatetreedetails'] 		= 	FURL.'/ajax/updatetreedetails';





$route['^(en|es|fr|ru|tl|cmn|de|hi|it)/(.+)$'] 			= 	"$2";

$route['^(en|es|fr|ru|tl|cmn|de|hi|it)$'] 				= 	$route['default_controller'];

$route['404_override'] 			= 	'';

$route['translate_uri_dashes'] 	= 	FALSE;




/* Admin Routes Start */

 
$route[ADMINURL] = ADMINURL.'/basic';

$route['authenticate'] = ADMINURL.'/basic/login';

$route['logout'] = ADMINURL.'/basic/logout';

$route['admindashboard'] = ADMINURL.'/basic/manage_sitesettings';

$route['forgot'] = ADMINURL.'/basic';

$route['sitesettings'] = ADMINURL.'/basic/manage_sitesettings';



$route['changepass'] = ADMINURL.'/basic/changepass_admin';

$route['changepattern'] = ADMINURL.'/basic/changepattern_admin';

$route['check_pass'] = ADMINURL.'/basic/check_pass';

$route['profile'] = ADMINURL.'/basic/profile_admin';

$route['forgotpass'] = ADMINURL.'/basic/forgotpass_admin';

$route['resetpass'] = ADMINURL.'/basic/resetpass_admin';

$route['resetpass/(:any)'] =  ADMINURL.'/basic/resetpass_admin/$1';

$route['faq'] = ADMINURL.'/FAQ/faqmanage';

$route['support'] = ADMINURL.'/FAQ/supportmanage';

$route['delete_ticket/(:any)'] = ADMINURL.'/FAQ/delete_ticket/$1';

$route['view_ticket_detail/(:any)'] = ADMINURL.'/FAQ/view_ticket_detail/$1';

$route['faqedit/(:any)'] = ADMINURL.'/FAQ/editfaq/$1';

$route['faqdelete/(:any)'] = ADMINURL.'/FAQ/deletefaq/$1';

$route['faqadd'] = ADMINURL.'/FAQ/addfaq';

$route['emailtemplate'] = ADMINURL.'/Emailtemplate/emailmanage';

$route['emailedit/(:any)'] = ADMINURL.'/Emailtemplate/editemail/$1';

$route['cms'] = ADMINURL.'/CMS/cmsmanage';

$route['cmsedit/(:any)'] = ADMINURL.'/CMS/editcms/$1';

$route['howitwork'] = ADMINURL.'/Howitwork/howitworks';

$route['howitworkedit/(:any)'] = ADMINURL.'/Howitwork/edithowitwork/$1';

$route['homecontent'] = ADMINURL.'/basic/homecontent';

$route['address'] = ADMINURL.'/Address/addressmanage';

$route['addressedit/(:any)'] = ADMINURL.'/Address/editaddress/$1';


$route['presentation'] = ADMINURL.'/Presentation/presen_manage';

$route['presen_edit/(:any)'] = ADMINURL.'/Presentation/editpresen/$1';

$route['presen_delete/(:any)'] = ADMINURL.'/Presentation/deletepresen/$1';

$route['presen_add'] = ADMINURL.'/Presentation/addpresen';


$route['banner'] = ADMINURL.'/Banner/bannermanage';

$route['banneredit/(:any)'] = ADMINURL.'/Banner/editbanner/$1';

$route['bannerdelete/(:any)'] = ADMINURL.'/Banner/deletebanner/$1';

$route['banneradd'] = ADMINURL.'/Banner/addbanner';


$route['video'] = ADMINURL.'/Video/videomanage';

$route['videoedit/(:any)'] = ADMINURL.'/Video/editvideo/$1';

$route['videodelete/(:any)'] = ADMINURL.'/Video/deletevideo/$1';

$route['videoadd'] = ADMINURL.'/Video/addvideo';


$route['text'] = ADMINURL.'/Text/textmanage';

$route['textedit/(:any)'] = ADMINURL.'/Text/edittext/$1';

$route['textdelete/(:any)'] = ADMINURL.'/Text/deletetext/$1';

$route['textadd'] = ADMINURL.'/Text/addtext';


$route['document'] = ADMINURL.'/Document/docmanage';

$route['docedit/(:any)'] = ADMINURL.'/Document/docemail/$1';





$route['user'] = ADMINURL.'/Manageuser/index';
$route['get_users'] = ADMINURL.'/Manageuser/get_users';

$route['levelpassword'] = ADMINURL.'/basic/manageLevelPassword';

$route['newsletter'] = ADMINURL.'/Newsletter/index';
$route['news'] = ADMINURL.'/Managenews/newsmanage';

$route['tfa'] = ADMINURL.'/basic/tfa';

$route['t_f_a'] = ADMINURL.'/basic/t_f_a';

$route['admin_change'] = ADMINURL.'/basic/admin_change';
