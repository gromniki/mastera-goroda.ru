<!-- BEGIN: FOOTER -->
<?php
// Пользователей: {PHP|get_user_count()}
?>

<div class="uk-block uk-text-contrast gr-footer">
    <div class="uk-container uk-container-center">        
        <div class="footer-column column-1">            
            <div class="uk-hidden-small" <!-- IF {PHP.env.ext} == 'index' --> class="uk-active"<!-- ENDIF -->>
                 <a class="uk-hidden-small" href="{PHP|cot_url('index')}"><img src="themes/gromniki/img/logo/logo2-dark-bg_mini.png" width="50" height="60" alt="Город Мастеров"></a>
            </div>
            <span>© 2016. Город Мастеров</span>
        </div>
        <div class="footer-right-block">
            <div class="footer-column column-2">            
                <span class="footer-title">{PHP.L.How_it_work}</span>
                <ul class="footer-list">
                    <li><a href="{PHP|cot_url('how_it_work/how-work')}">{PHP.L.How_order}</a></li>
                    <li><a href="{PHP|cot_url('how_it_work/how-be-master')}">{PHP.L.How_be_master}</a></li>
                    <li<!-- IF {PHP.env.ext} == 'users' AND ({PHP.group} == {PHP.cot_groups.4.alias} AND {PHP.m} == 'main' --><!-- ENDIF -->><a href="{PHP.cot_groups.4.alias|cot_url('users', 'group='$this)}">{PHP.L.Masters}</a></li>
                </ul>
            </div>            
            <div class="footer-column column-3">
                <span class="footer-title">{PHP.L.About}</span>
                <ul class="footer-list">
                    <li><a href="{PHP|cot_url('about_us/about-prj')}">{PHP.L.About_prj}</a></li>
                    <li><a href="{PHP|cot_url('about_us/garanty')}">{PHP.L.Garanty}</a></li>
                    <li><a href="{PHP|cot_url('articles')}">Статьи</a></li>
                </ul>
            </div>
            <div class="footer-column column-4">
                <span class="footer-title">{PHP.L.Help}</span>
                <ul class="footer-list">
                    <li><a href="{PHP|cot_url('help/rules')}">{PHP.L.Our_rules}</a></li>
                    <li><a href="{PHP|cot_url('help/faq')}">{PHP.L.FAQ}</a></li>
                    <li><a href="{PHP|cot_url('help/contacts')}">{PHP.L.Contacts}</a></li>
                    <li class="work-hours">(Пн-Пт с 10:00 до 18:00 МСК)</li>

                </ul>
            </div>
        </div>
    </div>
</div>

<!--{FOOTER_HOOKS}--> 
{FOOTER_RC}
{FOOTER_BOXES_JS}
<!--<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>-->
</body>
</html>
<!-- END: FOOTER --> 