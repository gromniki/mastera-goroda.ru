<?php

/* ====================
  [BEGIN_COT_EXT]
  Hooks=rc
  Order=9999
  [END_COT_EXT]
  ==================== */

defined('COT_CODE') or die('Wrong URL');


#if ($_SERVER["SCRIPT_NAME"] != "/admin.php") {
    if (file_exists(cot_incfile("uikit", "plug")))
        include_once cot_incfile("uikit", "plug");
    uk_com("uikit", "core", "", true);
#}