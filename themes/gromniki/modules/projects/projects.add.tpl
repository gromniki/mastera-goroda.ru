<!-- BEGIN: MAIN -->
<div class="uk-block">
    <section class="uk-container uk-container-center sp-container">
        <ul class="uk-breadcrumb">
            <li><a href="{PHP|cot_url('index')}"><i class="uk-icon-home"></i></a></li>
            <li>{PHP.L.projects_add_project_title}</li>
        </ul>

        {FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
        <div class="customform">
            <form action="{PRJADD_FORM_SEND}" method="post" name="newadv" enctype="multipart/form-data">
                <table class="table">
                    <!-- IF {PHP.projects_types} -->
                    <tr>
                        <td>{PHP.L.Type}:</td>
                        <td>{PRJADD_FORM_TYPE}</td>
                    </tr>
                    <!-- ENDIF -->
                    <tr>
                        <td width="150">{PHP.L.Category}:</td>
                        <td>{PHP.c|catselector_selectbox('projects', $this, 'rcat', '', 'W')}</td>
                    </tr>			
                    <tr>
                        <td>{PHP.L.Location}:</td>
                        <td>{PRJADD_FORM_LOCATION}</td>
                    </tr>			
                    <tr>
                        <td>{PHP.L.Title}:</td>
                        <td>{PRJADD_FORM_TITLE}</td>
                    </tr>                    
                    <tr>
                        <td class="top">{PHP.L.Descript}:</td>
                        <td>{PRJADD_FORM_TEXT}</td>
                    </tr>
                    <!-- BEGIN: TAGS -->
                    <tr>
                        <td>{PRJADD_FORM_TAGS_TITLE}:</td>
                        <td>{PRJADD_FORM_TAGS} ({PRJADD_FORM_TAGS_HINT})</td>
                    </tr>
                    <!-- END: TAGS -->
                    <tr>
                        <td>{PHP.L.projects_price}:</td>
                        <td><div class="input-prjadd"><span>{PRJADD_FORM_COST}</span>
                                <span>{PHP.cfg.payments.valuta}</span></div></td>
                    </tr>
                    <!-- IF {PHP.cot_plugins_active.mavatars} -->
                    <tr>
                        <td>{PHP.L.Files}:</td>
                        <td>
                            {PRJADD_FORM_MAVATAR}
                        </td>
                    </tr>
                    <!-- ENDIF -->
                    <!-- IF {PHP.cot_plugins_active.paypro} -->
                    <!--<tr>
                        <td>{PHP.L.paypro_forpro}:</td>
                        <td>
                            {PRJADD_FORM_FORPRO}
                        </td>
                    </tr>
                    -->
                    <!-- ENDIF -->
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" class="gr-button-main gr-button-form" value="{PHP.L.projects_next}" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </section>
</div>
<!-- END: MAIN -->