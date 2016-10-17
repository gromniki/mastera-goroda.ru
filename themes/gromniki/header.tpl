<!-- BEGIN: HEADER -->
<!DOCTYPE HTML>
<html lang="ru">
    <head>
        <meta charset="utf-8" />
        <title>{HEADER_TITLE}</title>
        <link rel="shortcut icon" href="favicon.ico" />
        <!-- IF {HEADER_META_DESCRIPTION} -->
        <meta name="description" content="{HEADER_META_DESCRIPTION}" />
        <!-- ENDIF -->
        <!-- IF {HEADER_META_KEYWORDS} -->
        <meta name="keywords" content="{HEADER_META_KEYWORDS}" />
        <!-- ENDIF -->
        <link rel="canonical" href="{HEADER_CANONICAL_URL}" />
        {HEADER_BASEHREF}{HEADER_BOXES_CSSLINK}{HEADER_HEAD}{HEADER_BOXES_CSS}{HEADER_BOXES_EXTERNAL_JSCSS}
        <!--<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>-->
        <script src="http://code.jquery.com/jquery-2.2.0.min.js"></script>
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/uikit.min.js"></script>-->
    </head>
    <body>
        <!--Мобильное меню-Старт-->
        <div id="offcanvas" class="uk-offcanvas">
            <div class="uk-offcanvas-bar">
                <ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav>
                    <!-- IF {PHP.usr.id} > 0 -->
                    <li class="uk-parent">
                        <a href="#"><i class="uk-icon-user uk-icon-small uk-icon-justify"></i> {PHP.L.Hello}, {PHP.usr.name}</a>
                            <li><a href="{PHP.usr.name|cot_url('users', 'm=details&u='$this)}"><i class="uk-icon-user uk-icon-justify"></i> {PHP.usr.name}</a></li>
                            <!-- IF {PHP.cot_plugins_active.sbr} -->
                            <li><a href="{PHP|cot_url('sbr')}">{PHP.L.sbr_mydeals}</a></li>
                            <!-- ENDIF -->
                            <!-- IF {PHP|cot_auth('projects', 'any', '1')} -->
                            <li><a href="{PHP|cot_url('projects', 'm=useroffers')}">{PHP.L.offers_useroffers}</a></li>
                            <!-- ENDIF -->
                            <!-- IF {HEADER_USER_PROEXPIRE} -->
                            <li><a class="uk-text-success" href="{PHP|cot_url('plug', 'e=paypro')}" title="{PHP.L.paypro_header_extend}">{PHP.L.paypro_header_expire_short} {HEADER_USER_PROEXPIRE|cot_date('d.m.Y', $this)}</a></li>
                            <!-- ELSE -->
                            <li><a class="uk-text-danger"  href="{PHP|cot_url('plug', 'e=paypro')}" title="{PHP.L.paypro_header_buy}">{PHP.L.paypro_header_buy}</a></li>
                            <!-- ENDIF -->
                            <!-- IF {HEADER_USER_PMREMINDER} -->
                            <li>{HEADER_USER_PMREMINDER}</li>
                            <!-- ENDIF -->
                            <li><a href="{PHP|cot_url('users', 'm=profile')}"><i class="uk-icon-cog uk-icon-justify"></i> {PHP.L.Profile}</a></li>
                            <li><a href="{PHP.usr.id|cot_url('users', 'm=details&id='$this'&tab=projects')}"><i class="uk-icon-briefcase uk-icon-justify"></i> {PHP.L.projects_myprojects}</a></li>
                            <li>{HEADER_USER_ADMINPANEL}</li>
                            <li>{HEADER_USER_LOGINOUT}</li>
                        </ul>
                    </li>
                    <!-- ENDIF -->
                    <li class="uk-nav-divider"></li>
                    <li><a href="{PHP|cot_url('projects')}" class="">Все проекты</a></li>
                    <li><a href="{PHP.cot_groups.4.alias|cot_url('users', 'group='$this)}" class="">{PHP.cot_groups.4.name}</a></li>
                    <li<!-- IF {PHP.env.ext} == 'users' AND ({PHP.group} == {PHP.cot_groups.4.alias} AND {PHP.m} == 'main' --><!-- ENDIF -->><a href="{PHP|cot_url('projects','m=add')}" class="addbtn">Добавить задание</a>
                    <li class="uk-nav-divider"></li>
                    <!--Авторизация-Начало-->
                    <!-- IF {PHP.usr.id} == 0 -->
                    <li class="uk-parent">
                        <a href="#"><i class="uk-icon-sign-in uk-icon-justify"></i> {PHP.L.Login}</a>
                        <ul class="uk-nav-sub">
                            <li>
                                <form class="uk-form" action="{HEADER_GUEST_SEND}" method="post">
                                    <fieldset>
                                        <div class="uk-form-row">                                  
                                            <input class="uk-form-small" type="text" name="rusername" id="inputEmail" placeholder="Введите имя или e-mail" />
                                        </div>
                                        <div class="uk-form-row">                                  
                                            <input class="uk-form-small" type="password" name="rpassword" id="inputPassword" placeholder="Введите пароль" /><br>              
                                            <label class="uk-form-label">{HEADER_GUEST_COOKIETTL} {PHP.L.users_rememberme}</label><br>
                                            <a rel="nofollow" class="uk-link" href="{PHP|cot_url('users','m=passrecover')}">{PHP.L.users_lostpass}</a>
                                        </div>
                                        <div class="uk-form-row">              
                                            <button type="submit" class="gr-button-success">{PHP.L.Login}</button>
                                        </div>
                                    </fieldset>            
                                </form>
                            </li>
                        </ul>
                    </li>

                    <li><a href="{PHP|cot_url('users','m=register&usergroup=customer')}"><i class="uk-icon-user-plus uk-icon-justify"></i> {PHP.L.Registration}</a></li>
                    <!-- ENDIF -->
                    <!--Авторизация-Конец-->
                </ul>
                <div class="uk-panel">
                    Тест. Можно вывести любую инфу.
                </div>
            </div>
        </div>
        <!--Мобильное меню-Конец-->

        <!--Модальное окно-Старт-->
        <!-- IF {PHP.usr.id} == 0 -->
        <div id="Log" class="uk-modal uk-open">
            <div class="uk-modal-header">
                <div class="uk-modal-dialog">
                    <button class="uk-modal-close uk-close" type="button"></button>
                    <form class="gr-form" action="{HEADER_GUEST_SEND}" method="post">                        
                            <div class="gr-modal-header">
                                {PHP.L.Login}
                            </div>
                            <span class="icon-1"><i class="uk-icon-user-secret"></i></span>
                            <input class="uk-width-1-1 gr-input rusername-icon" type="text" name="rusername" placeholder="Введите имя или e-mail" />
                            <span class="icon-2"><i class="uk-icon-lock"></i></span>
                            <input class="uk-width-1-1 gr-input" type="password" name="rpassword" placeholder="Введите пароль" /><br>              
                            <label class="uk-form-label gr-checkbox">{HEADER_GUEST_COOKIETTL} {PHP.L.users_rememberme}</label><br>
                            <button type="submit" class="gr-button-form gr-button-success uk-width-1-1">{PHP.L.Login}</button>                                
                            
                            <a rel="nofollow" class="uk-link link-passrec" href="{PHP|cot_url('users','m=passrecover')}">{PHP.L.users_lostpass}</a>
                            <p>Ещё не зарегистрированы? <a rel="nofollow" href="{PHP|cot_url('users','m=register&usergroup=customer')}">{PHP.L.Reg}.</a></p>                       
                    </form>
                </div>
            </div>      
        </div>	
        <!-- ENDIF -->
        <!--Модальное окно-Конец-->

        <!--Верхняя навигация-Старт-->
        <nav class="tm-navbar tm-navbar-small" data-uk-sticky="{top:-250, animation: 'uk-animation-slide-top'}">
            <div class="uk-container uk-container-center">
                <div class="uk-grid uk-grid-small" data-uk-grid-margin>
                    <!--Логотип-Старт-->
                    <div class="tm-nav-logo uk-hidden-small" <!-- IF {PHP.env.ext} == 'index' --> class="uk-active"<!-- ENDIF -->>
                         <a class="uk-hidden-small" href="{PHP|cot_url('index')}"><img src="themes/gromniki/img/logo/logo2-dark-bg_mini.png" alt="Город Мастеров"></a>
                    </div>
                    <!--Логотип-Конец-->
                    <!--Основное меню-Старт-->
                    <div class="uk-navbar uk-hidden-small uk-width-1-2">
                        <ul class="uk-navbar-nav">
                            <!--Все проекты-Старт-->
                            <li class="uk-parent uk-active" data-uk-dropdown<!-- IF {PHP.env.ext} == 'projects' --> class="uk-active"<!-- ENDIF -->>
                                <a href="{PHP|cot_url('projects')}" class="" id="#dropjust"><i class="uk-icon-database"></i> Все проекты <i class="uk-icon-angle-down"></i></a>
                                <div class="uk-dropdown uk-dropdown-small" data-uk-dropdown="{justify:'#dropjust'}">
                                    <div class="uk-grid uk-dropdown-grid">
                                        <div class="uk-width-1-1">
                                            <ul class="uk-nav uk-nav-navbar">
                                                <li><a href="{PHP|cot_url('projects','c=pchelp')}"><i class="uk-icon-desktop uk-icon-justify"></i> <span>Компьютерная помощь</span></a></li>
                                                <li><a href="{PHP|cot_url('projects','c=clerical')}"><i class="uk-icon-cube uk-icon-justify"></i> <span>Бытовой ремонт</span></a></li>
                                                <li><a href="{PHP|cot_url('projects','c=courier')}"><i class="uk-icon-space-shuttle uk-icon-justify"></i> <span>Курьерские услуги</span></a></li>
                                                <li><a href="{PHP|cot_url('projects','c=trucking')}"><i class="uk-icon-truck uk-icon-justify"></i> <span>Грузоперевозки</span></a></li>
                                                <li><a href="{PHP|cot_url('projects','c=freelancer')}"><i class="uk-icon-search-plus uk-icon-justify"></i> <span>Поиск фрилансера</span></a></li>
                                                <li><a href="{PHP|cot_url('projects','c=homepersonal')}"><i class="uk-icon-male uk-icon-justify"></i> <span>Домашний персонал</span></a></li>
                                                <li><a href="{PHP|cot_url('projects','c=techset')}"><i class="uk-icon-plug uk-icon-justify"></i> <span>Установка бытовой техники</span></a></li>
                                                <li><a href="{PHP|cot_url('projects','c=techrepair')}"><i class="uk-icon-desktop uk-icon-justify"></i> <span>Ремонт бытовой техники</span></a></li>
                                                <li><a href="{PHP|cot_url('projects','c=cleaning')}"><i class="uk-icon-smile-o uk-icon-justify"></i> <span>Клининг</span></a></li>
                                                <li><a href="{PHP|cot_url('projects','c=massage')}"><i class="uk-icon-bed uk-icon-justify"></i> <span>Услуги массажистов</span></a></li>
                                                <li><a href="{PHP|cot_url('projects','c=kosmetolog')}"><i class="uk-icon-female uk-icon-justify"></i> <span>Услуги косметолога</span></a></li>
                                                <li><a href="{PHP|cot_url('projects','c=law')}"><i class="uk-icon-gavel uk-icon-justify"></i> <span>Юридические услуги</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!--Все проекты-Конец-->

                            <!--Мастера-Старт-->
                            <li<!-- IF {PHP.env.ext} == 'users' AND ({PHP.group} == {PHP.cot_groups.4.alias} AND {PHP.m} == 'main' --><!-- ENDIF -->><a href="{PHP.cot_groups.4.alias|cot_url('users', 'group='$this)}" class="uk-hidden-medium">{PHP.L.Masters}</a>
                            </li>
                            <!--Мастера-Конец-->

                            <!--Кнопка Добавить проект-Старт-->
                            <!-- IF {PHP.usr.id} == 0 -->
                            <li<!-- IF {PHP.env.ext} == 'users' AND ({PHP.group} == {PHP.cot_groups.4.alias} AND {PHP.m} == 'main' --><!-- ENDIF -->><a class="addbtn" href="{PHP|cot_url('login')}" data-uk-modal="{target:'#Log'}">{PHP.L.Addbtn}</a>
                            </li>
                            <!-- ELSE -->
                            <li<!-- IF {PHP.env.ext} == 'users' AND ({PHP.group} == {PHP.cot_groups.4.alias} AND {PHP.m} == 'main' --><!-- ENDIF -->><a href="{PHP|cot_url('projects','m=add')}" class="addbtn">{PHP.L.Addbtn}</a>
                            </li>
                            <!-- ENDIF -->
                            <!--Кнопка Добавить проект-Конец-->
                        </ul>
                    </div>

                    <!--Меню Регистрации-Старт-->
                    <!-- BEGIN: GUEST -->
                    <div class="uk-hidden-small uk-width-1-2">
                        <ul class="uk-navbar-nav uk-navbar-flip">
                            <li><a href="{PHP|cot_url('login')}" data-uk-modal="{target:'#Log'}"><i class="uk-icon-sign-in"></i> {PHP.L.Login}</a></li>
                            <li><a href="{PHP|cot_url('users','m=register&usergroup=customer')}"><i class="uk-icon-user-plus"></i> {PHP.L.Registration}</a></li>
                        </ul>
                    </div>
                    <!-- END: GUEST -->
                    <!--Меню Регистрации-Конец-->

                    <!-- BEGIN: USER -->
                    <div class="uk-hidden-small uk-width-1-2">
                        <ul class="uk-navbar-nav uk-navbar-flip">
                            <li class="uk-hidden-small uk-hidden-medium">
                                <!-- IF {HEADER_USER_PROEXPIRE} -->
                                <a class="uk-text-success" href="{PHP|cot_url('plug', 'e=paypro')}" title="{PHP.L.paypro_header_extend}">{PHP.L.paypro_header_expire_short} {HEADER_USER_PROEXPIRE|cot_date('d.m.Y', $this)}</a>
                                <!-- ELSE -->
                                <a class="uk-text-danger" href="{PHP|cot_url('plug', 'e=paypro')}" title="{PHP.L.paypro_header_buy}">{PHP.L.paypro_header_buy}</a>
                                <!-- ENDIF -->
                            </li>
                            <!-- IF {PHP.cfg.payments.balance_enabled} -->
                            <li class="uk-hidden-small"><a class="tp-cursor" href="{HEADER_USER_BALANCE_URL}">{HEADER_USER_BALANCE|number_format($this, '2', '.', ' ')} {PHP.cfg.payments.valuta}</a></li>
                            <!-- ENDIF -->

                            <!-- IF {PHP.cot_modules.pm} -->
                            <!-- IF {PHP.usr.messages} -->
                            <li><a href="{PHP|cot_url('pm')}"><i class="uk-icon-envelope uk-text-success"></i> {PHP.usr.messages}</a></li>
                            <!-- ELSE -->
                            <li><a href="{PHP|cot_url('pm')}"><i class="uk-icon-envelope uk-text-muted"></i> {PHP.usr.messages}</a></li>
                            <!-- ENDIF -->
                            <!-- ENDIF -->

                            <li data-uk-dropdown>
                                <a class="tp-cursor" href="#">
                                    <i class="uk-icon-user uk-icon-small uk-icon-justify"></i> {PHP.usr.name} <i class="uk-icon-angle-down"></i>
                                </a>
                                <div class="uk-dropdown uk-dropdown-small">
                                    <ul class="uk-nav uk-nav-dropdown">
                                        <li><a href="{PHP.usr.name|cot_url('users', 'm=details&u='$this)}"><i class="uk-icon-user uk-icon-justify"></i> {PHP.usr.name}</a></li>
                                        <li><a href="{PHP|cot_url('users', 'm=profile')}"><i class="uk-icon-cog uk-icon-justify"></i> {PHP.L.Profile}</a></li>
                                        <li><a href="{PHP.usr.id|cot_url('users', 'm=details&id='$this'&tab=projects')}"><i class="uk-icon-briefcase uk-icon-justify"></i> {PHP.L.projects_myprojects}</a></li>
                                        <li>{HEADER_USER_ADMINPANEL}</li>
                                        <li><a href="{HEADER_USER_LOGINOUT_URL}"><i class="uk-icon-sign-out uk-icon-justify"></i> {PHP.L.Logout}</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- END: USER -->
                    <!--Основное меню-Конец-->

                    <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small uk-vertical-align-middle" data-uk-offcanvas></a>
                    <div class="uk-navbar-content uk-navbar-center uk-visible-small">
                        <a class="tm-logo-small" href="#"><img src="themes/gromniki/img/logo/logo2-dark-bg_mini.png" alt="Город Мастеров" class="uk-responsive-height"></a>
                    </div>
                </div>
            </div>
        </nav>
        <!--ВЕРХНЯЯ НАВИГАЦИЯ-КОНЕЦ-->

        <!--СЛАЙДЕР-НАЧАЛО-->
        <!-- IF {PHP.env.ext} == "index" -->
        <div class="uk-block">
            <div class="uk-slidenav-position uk-hidden-small" data-uk-slideshow="{animation: 'swipe', autoplay:true}">
                <ul class="uk-slideshow">
                    <li><img src="themes/{PHP.theme}/img/slider/Slide-01.jpg" alt=""></li>
                    <li><img src="themes/{PHP.theme}/img/slider/Slide-02.jpg" alt=""></li>
                </ul>
                <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
                <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
                <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
                    <li data-uk-slideshow-item="0" class="uk-active"><a href="#">Item 1</a></li>
                    <li data-uk-slideshow-item="1"><a href="#">Item 2</a></li>
                </ul>
            </div>
        </div>
        <!-- ENDIF -->
        <!--СЛАЙДЕР-КОНЕЦ-->

        <!-- END: HEADER -->