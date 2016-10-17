/* Drops all plugin data completely */

DELETE
  FROM `cot_config`
WHERE `config_owner` = 'core'
  AND `config_cat` = 'plugin'
  AND `config_name` = 'bootstrap';
  
