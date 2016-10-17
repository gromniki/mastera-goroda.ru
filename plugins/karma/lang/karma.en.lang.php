<?PHP
/**
 * @package Karma
 * @author Dr2005alex
 * @copyright Copyright (c) 2014 Dr2005alex http://mycotonti.ru
 * @license Distributed under BSD license.
 */

$L['karma'] = "REPUTATION";
$L['f_karma'] = "Reputation ";
$L['karma_add'] = "Raise reputation.";
$L['karma_del'] = "Lower reputation.";
$L['karma_addt'] = "Rising";
$L['karma_delt'] = "Decreases";
$L['karma_page'] = "Page";
$L['karma_forums'] = "Post";
$L['karma_com'] = "Comment";
$L['karma_det'] = "Profile";
$L['karma_changed_ok'] = "Changes have been made successfully!";
$L['karma_del_ok'] = "Deleted successfully!";
$L['karma_users'] = " users have left their voice.";
$L['do_1'] = "You";
$L['do_2'] = "the reputation of the user";
$L['do_3'] = "on";
$L['do_pg'] = "For the article:";
$L['do_com'] = "For comment:";
$L['do_frm'] = "For a post on the forum:";

$L['userball'] = "accrued users";
$L['authball'] = "for visiting the site";

$L['comm'] = "Comment compulsory:";
$L['change_later'] = "You can change the karma of that person through";
$L['hrs_left'] = array('hour.','hours.','hours.');
$L['bal_karma'] = array('unit.','units.','units.');
$L['userkarma'] = array('vote.','votes.','votes.');
$L['user_auth_dec'] = array('day','days','days');

/* errors */
$L['no_fp'] = "Unknown main parameter!";
$L['no_karma'] = "No value was specified power";
$L['no_self'] = "You can not change the reputation of Me!";
$L['no_comm'] = "No comment text !!!";
$L['no_recipient'] = "No recipient number !!!";
$L['low_level'] = "You have no rights to moderate reputation!";
$L['no_posts'] = "You can not change the reputation!<br />reason: A small number of posts on the site. need a minimum of ".$cfg['plugin']['karma']['minpost'].". <br />In positions include: comments, the page posts on the forum.";
$L['no_user']="Guests can not change the reputation!";
$L['no_karma_user']="This user has a reputation level 0!";
$L['dbl_rec']="Not allowed to vote more than once in the same message!";

/**
 * Plugin Info
 */
$L['info_name'] = 'Karma';
$L['info_desc'] = 'The implementation of the rating system (power) to the user.';
$L['info_notes'] = 'Important !! Keep in mind that when you remove the plug is removed and the data from the database !!! To upgrade, use the Refresh button.';

 /*Setup*/
$L['cfg_minpost'] = array("Minimum number of posts to change the reputation of other users","In positions include: forum posts, comments, published pages");

$L['cfg_karmatime'] = array("Time interval after which you can change the rating again (anti-flood), hours","A value of 0 - disables this feature!");
$L['cfg_dbl_rec'] = array("Allow to give voice for one message more than once?");
$L['cfg_k_forums'] = array("In some sections may not display reputation?","Hold down CTRL, to select multiple sections.");
$L['cfg_karma_f'] = array("Modifier voice (calculated as [Level Power] * [value is entered])","Example:<br />If reputation = 4 * multiplier = 0.5, then the voice level is = 2 (4 * 0.5 = 2)<br />
If reputation is 0, then it is automatically set to 1<br />
If reputation = 4 * multiplier = 0.1, the voice level is = 0.4 (4 * 0.1 = 0.4), etc.");
$L['cfg_karma_f_max'] = array("The maximum value of voice","If you set the factor, the calculated value of the voice will not exceed this value!");
$L['cfg_karma_f_min'] = array("The minimum value of voice","If you set the factor, the calculated value of the voice will not be less than this value!");

$L['cfg_karma_maxpage'] = array("Max. the number of records per page");
$L['cfg_karma_page_on'] = array("Allow display the pages?");
$L['cfg_karma_com_on'] = array("Allow showing in the comments?");
$L['cfg_karma_frm_on'] = array("Allow display of the forum?");
$L['cfg_close_win'] = array("Close window after the rating change?");
$L['cfg_neg_rec'] = array("Allow lower reputation, users with a negative reputation?");
$L['cfg_karma_auth'] = array("Points awarded for the entrance to the site");
$L['cfg_karma_css'] = array("Css file to use the plugin");
$L['cfg_karma_com'] = array("Comment changing power?","If so, the user is required to leave a comment.");
$L['cfg_karma_profile'] = array("Extra fields to the user?","If yes, then the template will be available to all user profile data. In this implementation, this item includes user avatars.");
$L['cfg_karma_color'] = array("Color thresholds reputation","In the range between, bad reputation and good reputation, the color will be gray.");

$L['karma_color0'] = "The bad reputation (Red) ";
$L['karma_color1'] = "Good reputation (Orange)";
$L['karma_color2'] = "Very good (Green)";
$L['plu_allwork'] ="Without restrictions. (Reputation will work in all sections)";
$L['plu_noforums'] ="Forum module is disabled.";