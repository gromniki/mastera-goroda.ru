<!-- BEGIN: HEADER -->
<!DOCTYPE html>
<html lang="ru">
<head>
<title>{HEADER_TITLE}</title> 
<!-- IF {HEADER_META_DESCRIPTION} --><meta name="description" content="{HEADER_META_DESCRIPTION}" /><!-- ENDIF -->
<!-- IF {HEADER_META_KEYWORDS} --><meta name="keywords" content="{HEADER_META_KEYWORDS}" /><!-- ENDIF -->
<meta http-equiv="content-type" content="{HEADER_META_CONTENTTYPE}; charset=UTF-8" />
<meta name="generator" content="Cotonti http://www.cotonti.com" />
<link rel="canonical" href="{HEADER_CANONICAL_URL}" />
{HEADER_BASEHREF}
{HEADER_HEAD}
<link rel="shortcut icon" href="favicon.ico" />
<link rel="apple-touch-icon" href="apple-touch-icon.png" />
</head>

<body>

        <!--header-start-->
        <div class="header">
    	    <div class="container">
        	    <figure class="logo animated fadeInDown delay-07s">
            	    <a href="#"><img src="themes/bootlance/img/Logo-01.png" alt=""></a>	
                </figure>	
                <h1 class="animated fadeInDown delay-07s">Мы поможем найти Вам достойного мастера</h1>
                <ul class="we-create animated fadeInUp delay-1s">
            	    <li>Мы любим помогать людям.</li>
                </ul>
                <a class="link animated fadeInUp delay-1s" href="#">Начнем!</a>
            </div>
            </div>
        </div>
        <!--header-end-->
    
    <!--Авторизация пользователя-Модальное окно-Старт-->
	<!-- IF {PHP.usr.id} == 0 -->
	<div id="AuthModal" class="modal hide fade">
		<div class="modal-header">
			<h3 id="myModalLabel">{PHP.L.Login}</h3>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="{HEADER_GUEST_SEND}" method="post">
					<div class="control-group">
						<label class="control-label" for="inputEmail">{PHP.L.users_nameormail}</label>
						<div class="controls">
							<input type="text" name="rusername" id="inputEmail" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputPassword">{PHP.L.Password}</label>
						<div class="controls">
							<input type="password" name="rpassword" id="inputPassword" /><br/>
							<a rel="nofollow" class="link small" href="{PHP|cot_url('users','m=passrecover')}">{PHP.L.users_lostpass}</a>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<label class="checkbox">
							{HEADER_GUEST_COOKIETTL} {PHP.L.users_rememberme}
							</label><br/>
							<button type="submit" class="btn btn-primary btn-large">{PHP.L.Login}</button>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">{PHP.L.Close}</button>
		</div>
	</div>	
	<!-- ENDIF -->
    <!--Авторизация пользователя-Модальное окно-Конец-->	
	
	<div id="wrapper" class="container">
	
        <!--Панель навигации-Старт-->	
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
				        
				        <!--<div class="navbar-header">
                        <a href="#" class="navbar-brand">Город Мастеров Лого</a>                        
                        </div>-->
                        
                        <ul class="nav">
        					<li<!-- IF {PHP.env.ext} == 'index' --> class="active"<!-- ENDIF -->><a href="{PHP|cot_url('index')}">Лого</a></li>
        					<li class="divider"></li>
        					<li<!-- IF {PHP.env.ext} == 'projects' --> class="active"<!-- ENDIF -->><a href="{PHP|cot_url('projects')}">{PHP.L.projects_projects}</a></li>
        					<li<!-- IF {PHP.env.ext} == 'users' AND ({PHP.group} == {PHP.cot_groups.4.alias} AND {PHP.m} == 'main' --> class="active"<!-- ENDIF -->><a href="{PHP.cot_groups.4.alias|cot_url('users', 'group='$this)}">{PHP.cot_groups.4.name}</a></li>
        					<li<!-- IF {PHP.env.ext} == 'users' AND ({PHP.group} == {PHP.cot_groups.7.alias} AND {PHP.m} == 'main' --> class="active"<!-- ENDIF -->><a href="{PHP.cot_groups.7.alias|cot_url('users', 'group='$this)}">{PHP.cot_groups.7.name}</a></li>
        					<li<!-- IF {PHP.env.ext} == 'market' AND !{PHP.type} --> class="active"<!-- ENDIF -->><a href="{PHP|cot_url('market')}">{PHP.L.market}</a></li>
        					<li><a href="#"><i class="fa fa-sign-in"></i> Тестовая</a></li>
				        </ul>
				        
						<ul class="nav pull-right">
							<!-- BEGIN: GUEST -->
							<li><a href="{PHP|cot_url('login')}" data-toggle="modal" onClick="$('#AuthModal').modal(); return false;"><i class="fa fa-sign-in"></i> {PHP.L.Login}</a></li>
							<li><a href="{PHP|cot_url('users','m=register')}"><i class="fa fa-user-plus"></i> {PHP.L.Register}</a></li>
							<!-- END: GUEST -->
							
							<!-- BEGIN: USER -->
							<li><a href="{PHP.usr.name|cot_url('users', 'm=details&u='$this)}">{PHP.usr.name}</a></li>
							<li><a href="{PHP|cot_url('users', 'm=profile')}">{PHP.L.Profile}</a></li>
							<!-- IF {PHP.cfg.payments.balance_enabled} -->
							<li><a href="{HEADER_USER_BALANCE_URL}">{PHP.L.payments_mybalance}: {HEADER_USER_BALANCE|number_format($this, '2', '.', ' ')} {PHP.cfg.payments.valuta}</a></li>
							<!-- ENDIF -->
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">{PHP.L.projects_projects}<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="{PHP.usr.id|cot_url('users', 'm=details&id='$this'&tab=projects')}">{PHP.L.projects_myprojects}</a></li>
									<!-- IF {PHP.cot_plugins_active.sbr} -->
									<li><a href="{PHP|cot_url('sbr')}">{PHP.L.sbr_mydeals}</a></li>
									<!-- ENDIF -->
									<!-- IF {PHP|cot_auth('projects', 'any', '1')} -->
									<li><a href="{PHP|cot_url('projects', 'm=useroffers')}">{PHP.L.offers_useroffers}</a></li>
									<!-- ENDIF --> 
								</ul>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">{PHP.L.market}<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="{PHP.usr.id|cot_url('users', 'm=details&id='$this'&tab=market')}">{PHP.L.market_myproducts}</a></li>
									<!-- IF {PHP.cot_plugins_active.marketorders} -->
									<li><a href="{PHP|cot_url('marketorders', 'm=sales')}">{PHP.L.marketorders_mysales}</a></li>
									<li><a href="{PHP|cot_url('marketorders', 'm=purchases')}">{PHP.L.marketorders_mypurchases}</a></li>
									<!-- ENDIF --> 
								</ul>
							</li>
							<li>
								<!-- IF {HEADER_USER_PROEXPIRE} -->
								<a href="{PHP|cot_url('plug', 'e=paypro')}" title="{PHP.L.paypro_header_extend}">{PHP.L.paypro_header_expire_short} {HEADER_USER_PROEXPIRE|cot_date('d.m.Y', $this)}</a>
								<!-- ELSE -->
								<a href="{PHP|cot_url('plug', 'e=paypro')}" title="{PHP.L.paypro_header_buy}">{PHP.L.paypro_header_buy}</a>
								<!-- ENDIF -->
							</li>
							<!-- IF {HEADER_USER_PMREMINDER} --><li>{HEADER_USER_PMREMINDER}</li><!-- ENDIF -->
							<li>{HEADER_USER_ADMINPANEL}</li>
							<li>{HEADER_USER_LOGINOUT}</li>
							<!-- END: USER -->
						</ul>
				</div>
			</div>
		</div>
        <!--Панель навигации-Конец-->
        

		
<!-- END: HEADER -->