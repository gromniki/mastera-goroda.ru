<!-- BEGIN: MAIN -->
<div class="uk-block">
    <div class="uk-container uk-container-center">
        <!--<div class="uk-breadcrumb">{BREADCRUMBS}</div>-->
        <h1 class="gr-h1">
        <!-- IF {PHP.c} -->
        {CATTITLE}
        <!-- ELSE -->
        {PHP.L.projects}
            <!-- ENDIF -->
        </h1>
        <!-- IF {CATDESC} -->
        <div class="">{CATDESC}</div>
        <!-- ENDIF -->
        <div class="uk-grid">
            <div class="uk-width-large-3-10 uk-width-medium-4-10" style="padding-left: 0px;">
                <!-- IF {PAGENAV_COUNT} > 0 -->
                   <ul<!-- IF {LEVEL} == 0 --> class="uk-nav uk-nav-parent-icon gr-nav-caticon gr-nav-category" data-uk-nav<!-- ENDIF -->>{CATALOG}</ul><!-- ENDIF -->

            <!-- IF {PHP.cot_plugins_active.tags} AND {PHP.cot_plugins_active.tagslance} AND {PHP.cfg.plugin.tagslance.projects} -->
                <div class="mboxHD">{PHP.L.Tags}</div>
                {PRJ_TAG_CLOUD}
                <!-- ENDIF -->

            </div>
            <div class="uk-width-large-7-10 uk-width-medium-6-10">
                <!-- IF {PHP.cot_plugins_active.paypro} -->
                        <!-- IF !{PHP|cot_getuserpro()} AND {PHP.cfg.plugin.paypro.projectslimit} > 0 AND {PHP.cfg.plugin.paypro.projectslimit} <= {PHP.usr.id|cot_getcountprjofuser($this)} -->
                <div class="alert alert-warning">{PHP.L.paypro_warning_projectslimit_empty}</div>
                <!-- ENDIF -->
                <!-- IF !{PHP|cot_getuserpro()} AND {PHP.cfg.plugin.paypro.offerslimit} > 0 AND {PHP.cfg.plugin.paypro.offerslimit} <= {PHP.usr.id|cot_getcountoffersofuser($this)} -->
                <div class="alert alert-warning">{PHP.L.paypro_warning_offerslimit_empty}</div>
                <!-- ENDIF -->
                <!-- ENDIF -->

                <div id="listprojects">
                    <!-- BEGIN: PRJ_ROWS -->
                    <div class="media<!-- IF {PRJ_ROW_ISBOLD} --> well prjbold<!-- ENDIF --><!-- IF {PRJ_ROW_ISTOP} --> well prjtop<!-- ENDIF -->">
                        <h4>
                                <!-- IF {PRJ_ROW_COST} > 0 --><div class="pull-right">{PRJ_ROW_COST} {PHP.cfg.payments.valuta}</div><!-- ENDIF -->
                            <a href="{PRJ_ROW_URL}">{PRJ_ROW_SHORTTITLE}</a>
                        </h4>
                        <p class="owner small">{PRJ_ROW_OWNER_NAME} <span class="date">[{PRJ_ROW_DATE}]</span>   <span class="region">{PRJ_ROW_COUNTRY} {PRJ_ROW_REGION} {PRJ_ROW_CITY}</span>   {PRJ_ROW_EDIT_URL}</p>
                        <p class="text">{PRJ_ROW_SHORTTEXT}</p>

                        <!-- IF {PHP.cot_plugins_active.tags} AND {PHP.cot_plugins_active.tagslance} AND {PHP.cfg.plugin.tagslance.projects} -->
                        <p class="small">{PHP.L.Tags}: 
                                <!-- BEGIN: PRJ_ROW_TAGS_ROW --><!-- IF {PHP.tag_i} > 0 -->, <!-- ENDIF --><a href="{PRJ_ROW_TAGS_ROW_URL}" title="{PRJ_ROW_TAGS_ROW_TAG}" rel="nofollow">{PRJ_ROW_TAGS_ROW_TAG}</a><!-- END: PRJ_ROW_TAGS_ROW -->
                            <!-- BEGIN: PRJ_ROW_NO_TAGS -->{PRJ_ROW_NO_TAGS}<!-- END: PRJ_ROW_NO_TAGS -->
                        </p>
                        <!-- ENDIF -->

                        <div class="pull-right offers"><a href="{PRJ_ROW_OFFERS_ADDOFFER_URL}">{PHP.L.offers_add_offer}</a> ({PRJ_ROW_OFFERS_COUNT})</div>
                        <div class="type"><!-- IF {PHP.cot_plugins_active.paypro} AND {PRJ_ROW_FORPRO} --><!-- ENDIF --><!-- IF {PRJ_ROW_TYPE} -->{PRJ_ROW_TYPE} / <!-- ENDIF --><a href="{PRJ_ROW_CATURL}">{PRJ_ROW_CATTITLE}</a></div>
                    </div>
                    <hr/>
                    <!-- END: PRJ_ROWS -->
                </div>
                <!-- IF {PAGENAV_COUNT} > 0 -->	
                <div class="pagination"><ul>{PAGENAV_PAGES}</ul></div>
                <!-- ELSE -->
                <div class="alert">{PHP.L.projects_notfound}</div>
                <!-- ENDIF -->
            </div>
        </div>
    </div>
</div>

    <!-- END: MAIN -->