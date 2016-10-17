<!-- BEGIN: MAIN -->
<div class="uk-block">
    <div class="uk-container uk-container-center">
        <!-- <div class="uk-breadcrumb"><a href="{USERS_DETAILS_USERSELECTED_GROUP_URL}">{USERS_DETAILS_USERSELECTED_GROUP_NAME}</a> / {USERS_DETAILS_NICKNAME}BEGIN: USERS_DETAILS_ADMIN &nbsp; [ {USERS_DETAILS_ADMIN_EDIT} ]END: USERS_DETAILS_ADMIN</div> -->

<!-- Здесь надо будет поставить условие, чтобы блок исчезал, как мастер стал верифицированным -->
        <div class="uk-grid">
            <div class="uk-width-1-1 info-block">
                <p>Преимущества статуса "Проверенный мастер"</p>
                <p>1. Больше доверия = Больше заданий. Заказчики значительно больше доверяют проверенным мастерам, поэтому рекомендуем пройти процедуру проверки прямо сейчас.</p>
                <button type="button" class="gr-btn"><a href="{PHP|cot_url('verification/anketa')}">{PHP.L.Test_begin}</a></button>
            </div>
        </div>
        

        <div class="uk-grid">
            <div class="uk-width-3-10">
                <div class="avatar-container">{USERS_DETAILS_AVATAR}</div>
                <!-- IF {PHP.cot_plugins_active.paypro} && {PHP.usr.id} > 0 -->
                <a href="<!-- IF {PHP.usr.isadmin} -->{USERS_DETAILS_ID|cot_url('admin', 'm=other&p=paypro&id='$this)}<!-- ELSE -->{USERS_DETAILS_ID|cot_url('paypro', 'id='$this)}<!-- ENDIF -->">{PHP.L.paypro_giftpro}</a>
                <br/>
                <!-- ENDIF -->
                <br/>
                {USERS_DETAILS_CATS|cot_usercategories_tree($this, '', 'list')}
                <!-- IF {PHP.usr.id} == {PHP.urr.user_id} -->
                <br/>
                <a href="{PHP|cot_url('users', 'm=profile')}" class="btn btn-info btn-block">{PHP.L.Edit}</a>
                <!-- ENDIF -->
            </div>

            <div class="uk-width-7-10">
                <div class="pull-right">
                    <!-- IF {USERS_DETAILS_ISPRO} -->
                    <span class="uk-badge uk-badge-success">PRO</span> 
                    <!-- ENDIF -->
                    <span class="uk-badge uk-badge-notification">{USERS_DETAILS_USERPOINTS}</span>
                </div>

                <ul class="uk-tab" data-uk-tab="{connect:'#tab-content'}">
                    <li<!-- IF !{PHP.tab} --> class="uk-active"<!-- ENDIF -->><a href="{USERS_DETAILS_DETAILSLINK}">{PHP.L.Main}</a></li>

                    <!-- IF {PHP.cot_modules.folio} -->
                    <li<!-- IF {PHP.tab} == 'portfolio' --><!-- ENDIF -->><a href="{USERS_DETAILS_FOLIO_URL}">{PHP.L.folio} {USERS_DETAILS_FOLIO_COUNT}</a></li>
                    <!-- ENDIF -->



                    <!-- IF {PHP.cot_modules.projects} -->
                    <li<!-- IF {PHP.tab} == 'projects' --><!-- ENDIF -->><a href="{USERS_DETAILS_PROJECTS_URL}">{PHP.L.projects_projects} {USERS_DETAILS_PROJECTS_COUNT}</a></li>
                    <!-- ENDIF -->

                    <!-- IF {PHP.cot_plugins_active.reviews} -->
                    <li<!-- IF {PHP.tab} == 'reviews' --><!-- ENDIF -->><a href="{USERS_DETAILS_REVIEWS_URL}">{PHP.L.reviews_reviews} {USERS_DETAILS_REVIEWS_COUNT}</a></li>
                    <!-- ENDIF -->
                </ul>

                <ul id="tab-content" class="uk-switcher">
                    <li class="<!-- IF !{PHP.tab} -->uk-active<!-- ENDIF -->">
                        <table class="table-user-details">
                            <!-- IF {PHP.cot_modules.pm} -->
                            <tr>
                                <td>{PHP.L.users_sendpm}:</td>
                                <td>{USERS_DETAILS_PM}</td>
                            </tr>
                            <!-- ENDIF -->
                            <!-- IF {PHP.usr.id} > 0 -->
                            <tr>
                                <td>{USERS_DETAILS_MOBILE_TITLE}:</td>
                                <td>{USERS_DETAILS_MOBILE}</td>
                            </tr>
                            <!-- ENDIF -->
                            <tr>
                                <td width="270">{PHP.L.Country}:</td>
                                <td>{USERS_DETAILS_COUNTRYFLAG} {USERS_DETAILS_COUNTRY}</td>
                            </tr>
                            <tr>
                                <td>{PHP.L.Location}:</td>
                                <td>{USERS_DETAILS_REGION} {USERS_DETAILS_CITY}</td>
                            </tr>
                            <tr>
                                <td>{PHP.L.Timezone}:</td>
                                <td>{USERS_DETAILS_TIMEZONE}</td>
                            </tr>
                            <tr>
                                <td>{PHP.L.Birthdate}:</td>
                                <td>{USERS_DETAILS_BIRTHDATE}</td>
                            </tr>
                            <tr>
                                <td>{PHP.L.Age}:</td>
                                <td>{USERS_DETAILS_AGE}</td>
                            </tr>
                            <tr>
                                <td>{PHP.L.Gender}:</td>
                                <td>{USERS_DETAILS_GENDER}</td>
                            </tr>
                            <tr>
                                <td>{PHP.L.Registered}:</td>
                                <td>{USERS_DETAILS_REGDATE}</td>
                            </tr>
                        </table>
                    </li>
                    <li<!-- IF {PHP.tab} == 'portfolio' --><!-- ENDIF -->>{PORTFOLIO}</li>

                    <li<!-- IF {PHP.tab} == 'projects' --><!-- ENDIF -->>{PROJECTS}</li>
                    <li<!-- IF {PHP.tab} == 'reviews' --><!-- ENDIF -->>{REVIEWS}</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- END: MAIN -->

<!-- IF {PHP.cot_modules.market} -->
<li<!-- IF {PHP.tab} == 'market' --><!-- ENDIF -->><a href="{USERS_DETAILS_MARKET_URL}">{PHP.L.market} {USERS_DETAILS_MARKET_COUNT}</a></li>
<!-- ENDIF -->

<li<!-- IF {PHP.tab} == 'market' --><!-- ENDIF -->>{MARKET}</li>