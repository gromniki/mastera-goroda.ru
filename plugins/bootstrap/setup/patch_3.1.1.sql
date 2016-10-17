/* 3.1.1 updating Bootstrap version */
UPDATE `cot_config` SET config_value = '3.1.1' 
WHERE `config_owner` = 'core'
  AND `config_cat` = 'plugin'
  AND `config_name` = 'bootstrap';