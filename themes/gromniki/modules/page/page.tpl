<!-- BEGIN: MAIN -->
<div class="uk-block">
    <div class="uk-container uk-container-center">
        <ul class="uk-breadcrumb">
            <li><a href="{PHP|cot_url('index')}"><i class="uk-icon-home"></i></a></li>
            <li>{PAGE_SHORTTITLE}</li>
        </ul>

        <h1>{PAGE_SHORTTITLE}</h1>

        <div class="uk-grid">
            <div class="uk-width-1-1">
                <!-- BEGIN: PAGE_ADMIN -->
                <div class="gr-block">                
                    <table class="table-subnav">
                        <tr>
                            <th>{PHP.L.Adminpanel}</th>
                        </tr>
                        <!-- IF {PHP.usr.isadmin} -->
                        <tr>
                            <td><a href="{PHP|cot_url('admin')}">{PHP.L.Adminpanel}</a></td>
                        </tr>
                        <!-- ENDIF -->
                        <tr>
                            <td><a href="{PAGE_CAT|cot_url('page','m=add&c=$this')}">{PHP.L.page_addtitle}</a></td>
                        </tr>
                        <tr>
                            <td>{PAGE_ADMIN_UNVALIDATE}</td>
                        </tr>
                        <tr>
                            <td>{PAGE_ADMIN_EDIT}</td>
                        </tr>
                        <tr>
                            <td>{PAGE_ADMIN_DELETE}</td>
                        </tr>
                    </table>
                </div>
                <!-- END: PAGE_ADMIN -->

                <!-- BEGIN: PAGE_MULTI -->
                <div class="block">
                    <div class="mboxHD info">{PHP.L.Summary}:</div>
                    {PAGE_MULTI_TABTITLES}
                    <p class="paging">{PAGE_MULTI_TABNAV}</p>
                </div>
                <!-- END: PAGE_MULTI -->
                
                <div class="">{PAGE_TEXT}</div>
                {PAGE_COMMENTS_DISPLAY}


            </div>
        </div>
    </div>
</div>

<!-- END: MAIN -->






<!-- BEGIN: MAIN
<div class="uk-block">
    <div class="uk-container uk-container-center">
        <div class="uk-breadcrumb">{PAGE_TITLE}</div>
        <h1>{PAGE_SHORTTITLE}</h1>

        <div class="uk-grid">
            <div class="uk-width-7-10">
                <div class="clear textbox">{PAGE_TEXT}</div>
                {PAGE_COMMENTS_DISPLAY}
            </div>

            <div class="uk-width-3-10">
                BEGIN: PAGE_ADMIN
                <div class="block">
                    <div class="mboxHD admin">{PHP.L.Adminpanel}</div>
                    <ul class="nav nav-tabs nav-stacked">
                        IF {PHP.usr.isadmin}
                        <li><a href="{PHP|cot_url('admin')}">{PHP.L.Adminpanel}</a></li>
                        ENDIF
                        <li><a href="{PAGE_CAT|cot_url('page','m=add&c=$this')}">{PHP.L.page_addtitle}</a></li>
                        <li>{PAGE_ADMIN_UNVALIDATE}</li>
                        <li>{PAGE_ADMIN_EDIT}</li>
                        <li>{PAGE_ADMIN_DELETE}</li>
                    </ul>
                </div>
                END: PAGE_ADMIN
                BEGIN: PAGE_MULTI
                <div class="block">
                    <div class="mboxHD info">{PHP.L.Summary}:</div>
                    {PAGE_MULTI_TABTITLES}
                    <p class="paging">{PAGE_MULTI_TABNAV}</p>
                </div>
                END: PAGE_MULTI
            </div>
        </div>
    </div>
</div>

END: MAIN -->