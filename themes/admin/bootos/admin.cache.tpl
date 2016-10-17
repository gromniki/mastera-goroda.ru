<!-- BEGIN: MAIN -->

{FILE "{PHP.cfg.themes_dir}/admin/{PHP.cfg.admintheme}/warnings.tpl"}

<div class="btn-group pull-right">
	<a href="{ADMIN_CACHE_URL_REFRESH}" class="btn"><i class="icon-refresh"></i> {PHP.L.Refresh}</a>
	<!-- IF {PHP.a} == 'showall' -->
	<a href="{ADMIN_CACHE_URL_REFRESH}" class="btn"><i class="icon-zoom-out"></i> {PHP.L.ShowLess}</a>
	<!-- ELSE -->
	<a href="{ADMIN_CACHE_URL_SHOWALL}" class="btn"><i class="icon-zoom-in"></i> {PHP.L.ShowMore}</a>
	<!-- ENDIF -->
	<a href="{ADMIN_CACHE_URL_PURGE}" class="btn btn-danger"><i class="icon-trash icon-white"></i> {PHP.L.adm_purgeall}</a>
</div>

<h3>{PHP.L.adm_internalcache}</h3>

<!-- BEGIN: ADMIN_CACHE_MEMORY -->
<hr>
<div class="block">
<h3>{ADMIN_CACHE_MEMORY_DRIVER}</h3>
<div class="progress">
	<div class="bar" style="width:{ADMIN_CACHE_MEMORY_PERCENTBAR}%;"></div>
</div>
{PHP.L.Available}: {ADMIN_CACHE_MEMORY_AVAILABLE} / {ADMIN_CACHE_MEMORY_MAX} {PHP.L.bytes}
<!-- END: ADMIN_CACHE_MEMORY -->
<hr>
<div class="row-fluid">
<div class="block">
<div class="navbar navbar-inner block-header">
<div class="muted pull-left">{PHP.L.Database}</div>
</div>
<div class="block-content collapse in">
<div class="span12">
<table class="table table-bordered table-striped textcenter">
	<thead>
		<tr>
			<th>{PHP.L.Item}</th>
			<th>{PHP.L.Expire}</th>
			<th>{PHP.L.Size}</th>
			<!-- IF {PHP.a} != 'showall' --><th>{PHP.L.Value}</th><!-- ENDIF -->
			<th>{PHP.L.Delete}</th>
		</tr>
	</thead>
	<tbody>
	<!-- BEGIN: ADMIN_CACHE_ROW -->
		<tr>
			<td><b>{ADMIN_CACHE_ITEM_NAME}</b></td>
			<td class="all_center">{ADMIN_CACHE_EXPIRE}</td>
			<td class="all_center">{ADMIN_CACHE_SIZE}</td>
		<!-- IF {PHP.a} != 'showall' -->
			<td>{ADMIN_CACHE_VALUE}</td>
			<td class="all_center"><a title="{PHP.L.Delete}" href="{ADMIN_CACHE_ITEM_DEL_URL}" class="btn btn-mini btn-danger"><i class="icon-remove icon-white"></i> {PHP.L.Delete}</a></td>
		</tr>
		<!-- ELSE -->
		<td class="all_center"><a title="{PHP.L.Delete}" href="{ADMIN_CACHE_ITEM_DEL_URL}" class="btn btn-mini btn-danger"><i class="icon-remove icon-white"></i> {PHP.L.Delete}</a></td>
		<tr>
			<td colspan="4">
      <div style="width:1120px; overflow:auto; font-size:0.8em; line-height:1.3em;">{ADMIN_CACHE_VALUE}</div>
    </td>
		</tr>
	<!-- ENDIF -->
	<!-- END: ADMIN_CACHE_ROW -->
</tbody>
<tfoot>
	<tr>
		<td colspan="2">{PHP.L.Total}:</td>
		<td class="all_center"><b>{ADMIN_CACHE_CACHESIZE} {PHP.L.bytes}</b></td>
		<td colspan="2"></td>
	</tr>
</tfoot>
</table>
</div></div></div></div>
<!-- END: MAIN -->