/* 3.2.0 updating Bootstrap version */
UPDATE `cot_config` SET config_value = '3.2.0' 
WHERE `config_owner` = 'core'
  AND `config_cat` = 'plugin'
  AND `config_name` = 'bootstrap';