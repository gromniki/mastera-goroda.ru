<!-- BEGIN: MAIN -->

{FILE "{PHP.cfg.themes_dir}/admin/{PHP.cfg.admintheme}/warnings.tpl"}
<div class="btn-group" style="float:right;">
	<a href="{ADMIN_DISKCACHE_URL_REFRESH}" class="btn"><i class="icon-refresh"></i> {PHP.L.Refresh}</a>
	<a href="{ADMIN_DISKCACHE_URL_PURGE}" class="btn btn-danger"><i class="icon-trash icon-white"></i> {PHP.L.adm_purgeall}</a>
</div>
<h3>{PHP.L.Disc_cache}</h3>
<hr>
<div class="row-fluid">
	<div class="block">
		<div class="navbar navbar-inner block-header">
			<div class="muted pull-left">{PHP.L.System_cache}</div>
		</div>
		<div class="block-content collapse in">
			<div class="span12">
				<table class="table table-bordered table-striped textcenter">
					<thead>
					<tr>
					<th class="width25">{PHP.L.Item}</th>
					<th class="width25">{PHP.L.Files}</th>
					<th class="width25">{PHP.L.Size}</th>
					<th class="width10">{PHP.L.Delete}</th>
					</tr>
					</thead>
					<tbody>
						<!-- BEGIN: ADMIN_DISKCACHE_ROW -->
					<tr>
					<td class="all_center">{ADMIN_DISKCACHE_ITEM_NAME}</td>
					<td class="all_center">{ADMIN_DISKCACHE_FILES}</td>
					<td class="all_center">{ADMIN_DISKCACHE_SIZE}</td>
					<td class="all_center"><a title="{PHP.L.Delete}" href="{ADMIN_DISKCACHE_ITEM_DEL_URL}" class="btn btn-mini btn-danger"><i class="icon-remove icon-white"></i> {PHP.L.Delete}</a></td>
					</tr>
						<!-- END: ADMIN_DISKCACHE_ROW -->
					<tr class="strong">
					<td>{PHP.L.Total}:</td>
					<td class="all_center">{ADMIN_DISKCACHE_CACHEFILES}</td>
					<td class="all_center">{ADMIN_DISKCACHE_CACHESIZE}</td>
					<td class="all_center">&nbsp;</td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- END: MAIN -->