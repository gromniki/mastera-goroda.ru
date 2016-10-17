<!-- BEGIN: MAIN -->
<div class="uk-block">
    <div class="uk-container uk-container-center">
        <ul class="uk-breadcrumb">
            <li><a href="{PHP|cot_url('index')}"><i class="uk-icon-home"></i></a></li>
            <li>{USERS_TITLE}</li>
        </ul>

        <h1>
            <!-- IF {PHP.cat} -->
            {CATTITLE}
            <!-- ELSE -->
            {USERS_TITLE}
            <!-- ENDIF -->
        </h1>
        <div class="uk-grid">
            <div class="uk-width-3-10">
                <div class="well well-small">{USERCATEGORIES_CATALOG}</div>
            </div>
            <div class="uk-width-7-10">

                <!-- BEGIN: USERS_ROW -->
                <div class="uk-grid">
                    <div class="uk-width-1-10">
                        {USERS_ROW_AVATAR}
                    </div>
                    <div class="uk-width-9-10">
                        <div class="pull-right">
                            <span class="uk-badge uk-badge-notification">{USERS_ROW_USERPOINTS}</span>
                        </div>
                        <strong>{USERS_ROW_NAME}</strong><!-- IF {USERS_ROW_ISPRO} --> <span class="label label-important">PRO</span><!-- ENDIF -->
                        <p>{USERS_ROW_COUNTRY} {USERS_ROW_REGION} {USERS_ROW_CITY}</p>
                    </div>
                </div>
                <hr/>
                <!-- END: USERS_ROW -->

                        <!-- IF {USERS_TOP_TOTALUSERS} > 0 -->
                <div class="pagination"><ul>{USERS_TOP_PAGEPREV}{USERS_TOP_PAGNAV}{USERS_TOP_PAGENEXT}</ul></div>
                <!-- ELSE -->
                <div class="alert">{PHP.L.Noitemsfound}</div>
                <!-- ENDIF -->
            </div>
        </div>
    </div>
</div>
<!-- END: MAIN -->

<div class="well">

    <form action="{SEARCH_ACTION_URL}" method="get">
        <input type="hidden" name="f" value="search" />
        <input type="hidden" name="e" value="users" />
        <input type="hidden" name="group" value="{PHP.group}" />
        <input type="hidden" name="cat" value="{PHP.cat}" />
        <input type="hidden" name="l" value="{PHP.lang}" />
        <table width="100%" cellpadding="5" cellspacing="0">
            <tr>
                <td width="100">{PHP.L.Search}:</td>
                <td><input type="text" name="sq" value="{PHP.sq|htmlspecialchars($this)}" class="schstring"/></td>
            </tr>
            <!-- IF {PHP.cot_plugins_active.locationselector} -->
            <tr>
                <td >{PHP.L.Location}:</td>
                <td>{SEARCH_LOCATION}</td>
            </tr>
            <!-- ENDIF -->
            <tr>
                <td >{PHP.L.Category}:</td>
                <td>{SEARCH_CAT}</td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="search" class="btn" value="{PHP.L.Search}" /></td>
            </tr>
        </table>
    </form>
</div>
