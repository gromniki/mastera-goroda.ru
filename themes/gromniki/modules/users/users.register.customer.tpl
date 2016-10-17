<!-- BEGIN: MAIN -->
<div class="uk-block">
    <div class="uk-container uk-container-center sp-container-form">
        <div class="form-border">
            <div class="uk-container-center">
                {FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
            </div>    
            <div class="uk-container-center">
                <h1 class="h1-forms"><span>{PHP.L.Regcustomer}</span></h1>

                <div class="link-to-customer">
                    <a href="{USERGROUP_ROW_ALIAS|cot_url('users', 'm=register&usergroup=master')}" class=""><p>{PHP.L.Linktomaster}</p></a>
                </div>
                
                <form class="uk-panel uk-form" name="login" action="{PHP.usergroup|cot_url('users', 'm=register&a=add&usergroup='$this)}" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="7" name="ruserusergroup">
                    <div class="uk-form-row">
                        <label class="uk-form-label">{PHP.L.Username}</label>
                        {USERS_REGISTER_USER}
                    </div>
                    <div class="uk-form-row">
                        <label class="uk-form-label">{PHP.L.users_validemail}</label>
                        {USERS_REGISTER_EMAIL}<br />
                        <b class="uk-text-small">{PHP.L.users_validemailhint}</b>
                    </div>
                    <div class="uk-form-row">
                        <label class="uk-form-label">{PHP.L.Password}</label>
                        <input class="uk-width-1-1 uk-form-large" type="password" maxlength="32" size="12" value="" name="rpassword1">
                    </div>
                    <div class="uk-form-row">
                        <label class="uk-form-label">{PHP.L.users_confirmpass}</label>
                        <input class="uk-width-1-1 uk-form-large" type="password" maxlength="32" size="12" value="" name="rpassword2">
                    </div>
                    <!-- IF {USERS_REGISTER_USERAGREEMENT} -->
                    <div class="uk-form-row">
                        <label class="uk-form-label">{USERS_REGISTER_VERIFYIMG}</label>
                        {USERS_REGISTER_VERIFYINPUT}
                    </div>
                    <!-- ENDIF -->
                    <div class="uk-form-row">
                        <!-- IF {PHP.cot_plugins_active.useragreement} -->
                        {USERS_REGISTER_USERAGREEMENT}
                        <!-- ENDIF -->
                        <button class="gr-button-large gr-button-success uk-width-1-1">{PHP.L.Reg}</button>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>
<!-- END: MAIN -->