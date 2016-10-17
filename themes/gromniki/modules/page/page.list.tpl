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

                <!-- IF {PHP.usr.auth_write} -->
                <div class="gr-block">
                    <table class="table-subnav">
                        <tr>
                            <th>{PHP.L.Admin}</th>
                        </tr>
                        <!-- IF {PHP.usr.isadmin} -->
                        <tr>
                            <td>
                                <a href="{PHP|cot_url('admin')}">{PHP.L.Adminpanel}</a>

                            </td>
                        </tr>
                        <!-- ENDIF -->
                        <tr>
                            <td>{LIST_SUBMITNEWPAGE}</td>
                        </tr>
                    </table>
                </div>
                    <!-- ENDIF -->
                    <!-- IF {PHP.cot_plugins_active.tags} -->
                    <div class="">
                        <div class="mboxHD tags">{PHP.L.Tags} А это теги в файле page.list.tpl</div>
                        {LIST_TAG_CLOUD}
                    </div>

                <!-- ENDIF -->



                <div class="">
                    <!-- BEGIN: LIST_ROWCAT -->
                    <h3><a href="{LIST_ROWCAT_URL}" title="{LIST_ROWCAT_TITLE}">{LIST_ROWCAT_TITLE}</a> ({LIST_ROWCAT_COUNT})</h3>
                    <!-- IF {LIST_ROWCAT_DESC} -->
                    <p class="small">{LIST_ROWCAT_DESC}</p>
                    <!-- ENDIF -->
                    <!-- END: LIST_ROWCAT -->

                    <!-- BEGIN: LIST_ROW -->
                    <h4><a href="{LIST_ROW_URL}">{LIST_ROW_SHORTTITLE}</a></h4>
                    <p class="small">
                        {LIST_ROW_COMMENTS} | {LIST_ROW_DATE} | {LIST_ROW_CATPATH}
                    </p>
                    <!-- IF {LIST_ROW_DESC} --><p class="small marginbottom10">{LIST_ROW_DESC}</p><!-- ENDIF -->
                    <!-- IF {PHP.usr.isadmin} --><p class="small marginbottom10">{LIST_ROW_ADMIN} ({LIST_ROW_COUNT})</p><!-- ENDIF -->
                    <div>
                        {LIST_ROW_TEXT_CUT}
                        <!-- IF {LIST_ROW_TEXT_IS_CUT} -->{LIST_ROW_MORE}<!-- ENDIF -->
                    </div>
                    <hr class="clear divider" />
                    <!-- END: LIST_ROW -->
                </div>
                <!-- IF {LIST_TOP_PAGINATION} -->
                <div class="pagination">
                    <ul>
                        {LIST_TOP_PAGEPREV}{LIST_TOP_PAGINATION}{LIST_TOP_PAGENEXT}
                    </ul>
                </div>
                <!-- ENDIF -->
            </div>


        </div>
    </div>
</div>
<!-- END: MAIN -->