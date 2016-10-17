# Template file for Bootstrap test page frame
<!-- BEGIN: MAIN -->
<!DOCTYPE html>
<html lang="{PHP.usr.lang}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap wrapper test page</title>

    <!-- Bootstrap -->
    <link href="{PHP.cot_bootstrap.css_file}" rel="stylesheet">

<!-- IF {PHP.cfg.plugin.bootstrap.load_theme} -->
		<!-- Optional theme -->
		<link rel="stylesheet" href="{PHP.cot_bootstrap.theme_file}">
<!-- ENDIF -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="padding:20px; margin-bottom:30px;">

<!-- IF {PHP.cfg.bootstrap} -->
<h3>{PHP.L.bsw_testpage}</h3>
<blockquote>
{PHP.L.bsw_version}: {PHP.cfg.bootstrap}<br/>
</blockquote>
<h4>{PHP.L.bsw_settings}</h4>
<dl class="dl-horizontal">
  <dt>{PHP.L.bsw_cfg_autoload}:</dt><dd><!-- IF {PHP.cfg.plugin.bootstrap.autoload} -->{PHP.L.Yes}<!-- ELSE -->{PHP.L.No}<!-- ENDIF --></dd>
  <dt>{PHP.L.bsw_cfg_mode}:</dt><dd><!-- IF {PHP.cfg.plugin.bootstrap.load_mode} -->{PHP.L.cfg_load_mode_params.1}<!-- ELSE -->{PHP.L.cfg_load_mode_params.0}<!-- ENDIF --></dd>
  <dt>{PHP.L.bsw_cfg_min}:</dt><dd><!-- IF {PHP.cfg.plugin.bootstrap.use_minified} -->{PHP.L.Yes}<!-- ELSE -->{PHP.L.No}<!-- ENDIF --></dd>
  <dt>{PHP.L.bsw_cfg_theme}:</dt><dd><!-- IF {PHP.cfg.plugin.bootstrap.load_theme} -->{PHP.L.Yes}<!-- ELSE -->{PHP.L.No}<!-- ENDIF --></dd>
</dl>
<!-- IF {PHP.cfg.debug_mode} -->
<div class="alert alert-info">{PHP.L.bsw_debuginfo}</div>
<!-- ENDIF -->
<!-- BEGIN: ERROR -->
<div class="alert alert-danger">
	<ul class="unstyled list-unstyled">
		<!-- BEGIN: ERROR_ROW -->
		<li>{ERROR_ROW_MSG}</li>
		<!-- END: ERROR_ROW -->
	</ul>
</div>
<!-- END: ERROR -->
<!-- BEGIN: WARNING -->
<div class="alert alert-warning">
	<ul class="unstyled list-unstyled">
		<!-- BEGIN: WARNING_ROW -->
		<li>{WARNING_ROW_MSG}</li>
		<!-- END: WARNING_ROW -->
	</ul>
</div>
<!-- END: WARNING -->

<!-- BEGIN: DONE -->
<div class="alert alert-success">
	<ul class="unstyled list-unstyled">
		<!-- BEGIN: DONE_ROW -->
		<li>{DONE_ROW_MSG}</li>
		<!-- END: DONE_ROW -->
	</ul>
</div>
<!-- END: DONE -->
<h4>{PHP.L.bsw_values}</h4>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped table-condensed">
		<thead>
			<tr>
				<th>{PHP.L.bsw_cms_var}</th>
				<th>{PHP.L.bsw_tpl_tag}</th>
				<th>{PHP.L.bsw_value}</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><code>$cfg['bootstrap']</code></td>
				<td><code class="text-info">&#123;PHP.cfg.bootstrap&#125;</code></td>
				<td>{PHP.cfg.bootstrap}</td>
			</tr>
			<!-- BEGIN: VAR -->
			<tr>
				<td><code>$cot_bootstrap['{var}']</code></td>
				<td><code class="text-info">&#123;PHP.cot_bootstrap.{var}&#125;</code></td>
				<td><!-- IF {value} -->{value}<!-- ELSE -->[{PHP.L.bsw_notdefined}]<!-- ENDIF --></td>
			</tr>
			<!-- END: VAR -->
		</tbody>
	</table>
</div>
<h4>{PHP.L.bsw_usage}</h4>
<p><strong>{PHP.L.bsw_rc_files}:</strong>
<pre>
	global $cot_bootstrap;
	// {PHP.L.bsw_comment1}
	if ($cfg['bootstrap'] && version_compare($cfg['bootstrap'], '3.0.0', '>=')) {
		cot_rc_add_file($cot_bootstrap['css_file']);
		cot_rc_add_file($cot_bootstrap['theme_file']);
		cot_rc_link_footer($cot_bootstrap['js_file']);
	} else {
		// {PHP.L.bsw_comment2}
		// {PHP.L.bsw_comment3}
		cot_rc_add_file('{PHP.cot_bootstrap.base_path}js/bootstrap.min.css');
		cot_rc_link_footer('{PHP.cot_bootstrap.base_path}js/bootstrap.min.js');
	}
</pre>
</p>
<p>{PHP.L.bsw_tpl_files}:
<pre>
	&lt;link rel="canonical" href="{PHP.cot_bootstrap.css_file&thinsp;}?{PHP.cfg.bootstrap&thinsp;}" /&gt;
	&lt;script src="{PHP.cot_bootstrap.js_file&thinsp;}?{PHP.cfg.bootstrap&thinsp;}"&gt;&lt;/script&gt;
</pre>

</p>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="./js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{PHP.cot_bootstrap.js_file}"></script>
  </body>
</html>
<!-- ELSE -->
{PHP.L.bsw_installerror}
<br />
{PHP.L.bsw_checkit}
<!-- ENDIF -->


<!-- END: MAIN -->