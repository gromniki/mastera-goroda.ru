<!-- BEGIN: LIST -->

<h3>{PHP.L.Structure}</h3>
<div class="row">
	<!-- BEGIN: ADMIN_STRUCTURE_EXT -->
	<div class="span3">
		<div class="thumbnail">
			<a href="{ADMIN_STRUCTURE_EXT_URL}">
				<!-- IF {ADMIN_STRUCTURE_EXT_ICO} --> 
				<img src="{ADMIN_STRUCTURE_EXT_ICO}" style="height: 32px!important;"/>
				<!-- ELSE -->
				<img src="{PHP.cfg.system_dir}/admin/img/plugins32.png" style="height: 32px!important;"/>
				<!-- ENDIF -->	
				{ADMIN_STRUCTURE_EXT_NAME}
			</a>
		</div>
		</br>
	</div>
	<!-- END: ADMIN_STRUCTURE_EXT -->
	<!-- BEGIN: ADMIN_STRUCTURE_EMPTY -->
	<div class="alert alert-info">{PHP.L.adm_listisempty}</div>
	<!-- END: ADMIN_STRUCTURE_EMPTY -->
</div>

<!-- END: LIST -->

<!-- BEGIN: MAIN -->

{FILE "{PHP.cfg.themes_dir}/admin/{PHP.cfg.admintheme}/warnings.tpl"}

<!-- BEGIN: DEFAULT -->
<div class="btn-group" style="float:right;">
  <a href="{ADMIN_STRUCTURE_URL_EXTRAFIELDS}" class="btn"><i class="icon-list-alt"></i> {PHP.L.ExtraFields}</a>
  <a href="{ADMIN_PAGE_STRUCTURE_RESYNCALL}" class="btn" title="{PHP.L.adm_tpl_resyncalltitle}"><i class="icon-refresh"></i> {PHP.L.Resync}</a>
</div>

<h3>{PHP.L.Structure}</h3>

<h3>{PHP.L.editdeleteentries}</h3>
<form name="savestructure" id="savestructure" action="{ADMIN_STRUCTURE_UPDATE_FORM_URL}" method="post" class="ajax" enctype="multipart/form-data" >
  <table class="table table-striped table-condensed">
    <thead>
      <tr>
        <th>{PHP.L.Path}:</th>
        <th style="width:230px;">{PHP.L.Code}:</th>
        <th style="width:230px;">{PHP.L.Title}:</th>
        <th>{PHP.L.TPL}:</th>
        <th>{PHP.L.Pages}:</th>
        <th style="width:140px;">{PHP.L.Action}</th>
      </tr>
    </thead>
    <tbody>
      <!-- BEGIN: ROW -->
      <tr>
        <td>
          <!-- IF {PHP.pathfielddep} > 1 -->
          <!-- FOR {I} IN {PHP.pathfielddep|range(2, $this)} -->&nbsp;&nbsp;&nbsp;<!-- END FOR -->
          <!-- ENDIF -->
          {ADMIN_STRUCTURE_PATH}
        </td>
        <td>{ADMIN_STRUCTURE_CODE}</td>
        <td>{ADMIN_STRUCTURE_TITLE}</td>
        <td>{ADMIN_STRUCTURE_TPL_SYM}</td>
        <td>{ADMIN_STRUCTURE_COUNT}</td>
        <td>
          <div class="btn-group">
            <a class="btn btn-mini" href="{ADMIN_STRUCTURE_JUMPTO_URL}" title="{PHP.L.Open}"><i class="icon-share-alt"></i></a>
            <a class="btn btn-mini" href="{ADMIN_STRUCTURE_CONFIG_URL}" title="{PHP.L.Configuration}"><i class="icon-cog"></i></a>
            <a class="btn btn-mini" title="{PHP.L.Rights}" href="{ADMIN_STRUCTURE_RIGHTS_URL}"><i class="icon-eye-open"></i></a>
            <a class="btn btn-mini" title="{PHP.L.Options}" href="{ADMIN_STRUCTURE_OPTIONS_URL}"><i class="icon-wrench"></i></a>
            <!-- IF {PHP.dozvil} -->
            <a class="btn btn-mini btn-danger" title="{PHP.L.Delete}" href="{ADMIN_STRUCTURE_UPDATE_DEL_URL}"><i class="icon-remove icon-white"></i></a>
            <!-- ELSE -->
            <a class="btn btn-mini btn-danger disabled"><i class="icon-remove icon-white"></i></a>
            <!-- ENDIF -->
          </div>
        </td>
      </tr>
      <!-- END: ROW -->
    </tbody>
    <tfoot>
      <tr>
        <td colspan="6">
          <button type="submit" class="btn btn-success" style="margin-top: 5px;">{PHP.L.UpdateEntries}</button>
          <button type="reset" class="btn" style="margin-top: 5px;">{PHP.L.Cancel}</button>
        </td>
      </tr>
    </tfoot>
  </table>
</form>
<!-- IF {PHP.pagenav.total} > 1 -->
<div class="pagination">
	<ul>{ADMIN_STRUCTURE_PAGNAV}</ul>
</div>
<!-- ENDIF -->
<!-- END: DEFAULT -->

<!-- BEGIN: OPTIONS -->
<a href="{PHP|cot_url('admin', 'm=config')}" class="btn" style="float:right;"><i class="icon-cog"></i> {PHP.L.Configuration}</a>
<h3 style="margin:10px 0;">{PHP.L.Update_category} &quot;{PHP.row.structure_title}&quot;</h3>
<form action="{ADMIN_STRUCTURE_UPDATE_FORM_URL}" method="post" enctype="multipart/form-data">
  <div class="row">
    <div class="span4">
      <div class="row">
        <div class="span2">
          <label class="control-label">{PHP.L.Path}:</label>
          <div class="controls"><input type="text" name="rstructurepath[{PHP.id}]" value="{PHP.row.structure_path}" maxlength="255" class="span2"></div>
        </div>
        <div class="span2">
          <label class="control-label">{PHP.L.Code}:</label>
          <div class="controls"><input type="text" name="rstructurecode[{PHP.id}]" value="{PHP.row.structure_code}" maxlength="255" class="span2"></div>
        </div>
      </div>

      <label class="control-label">{PHP.L.Title}:</label>
      <div class="controls"><input type="text" name="rstructuretitle[{PHP.id}]" value="{PHP.row.structure_title}" maxlength="255" class="span4"></div>

      <label class="control-label">{PHP.L.Description}:</label>
      <div class="controls"><input type="text" name="rstructuredesc[{PHP.id}]" value="{PHP.row.structure_code}" maxlength="255" class="span4"></div>

      <label class="control-label">{PHP.L.Icon}:</label>
      <input type="text" name="rstructureicon[{PHP.id}]" value="{PHP.row.structure_icon}" maxlength="255" class="span4">
	
      <label class="checkbox">{ADMIN_STRUCTURE_LOCKED} {PHP.L.Locked}</label>
    </div>
    <div class="span5">
      <div class="control-group form-horizontal">
        <label class="control-label">{PHP.L.adm_tpl_mode}:</label>
        <div class="controls">{ADMIN_STRUCTURE_TPLMODE} {ADMIN_STRUCTURE_SELECT}</div>
		</br>
		<label class="control-label">{PHP.L.adm_tpl_quickcat}:</label>
		<div class="controls"> {ADMIN_STRUCTURE_TPLQUICK}</div>
      </div>
      <!-- BEGIN: EXTRAFLD -->
      <div class="control-group">
        <label class="control-label">{ADMIN_STRUCTURE_EXTRAFLD_TITLE}:</label>
        <div class="controls">{ADMIN_STRUCTURE_EXTRAFLD}</div>
      </div>
      <!-- END: EXTRAFLD -->
    </div>
  </div>
  				<!-- BEGIN: CONFIG -->
				<h3>{PHP.L.Configuration}</h3>{CONFIG_HIDDEN}
				{ADMIN_CONFIG_EDIT_CUSTOM}

				<table class="cells table">
					<tr>
						<td class="coltop width35">{PHP.L.Parameter}</td>
						<td class="coltop width60">{PHP.L.Value}</td>
						<td class="coltop width5">{PHP.L.Reset}</td>
					</tr>
	<!-- BEGIN: ADMIN_CONFIG_ROW -->
	<!-- BEGIN: ADMIN_CONFIG_FIELDSET_BEGIN -->
					<tr>
						<td class="group_begin" colspan="3">
							<h4>{ADMIN_CONFIG_FIELDSET_TITLE}</h4>
						</td>
					</tr>
	<!-- END: ADMIN_CONFIG_FIELDSET_BEGIN -->
	<!-- BEGIN: ADMIN_CONFIG_ROW_OPTION -->
					<tr>
						<td>{ADMIN_CONFIG_ROW_CONFIG_TITLE}:</td>
						<td>
							{ADMIN_CONFIG_ROW_CONFIG}
							<div class="adminconfigmore">{ADMIN_CONFIG_ROW_CONFIG_MORE}</div>
						</td>
						<td class="centerall">
							<a href="{ADMIN_CONFIG_ROW_CONFIG_MORE_URL}" class="ajax btn">
								{PHP.L.Reset}
							</a>
						</td>
					</tr>
	<!-- END: ADMIN_CONFIG_ROW_OPTION -->
	<!-- END: ADMIN_CONFIG_ROW -->

				</table>

<!-- END: CONFIG -->
  <div class="form-actions">
    <button type="submit" class="btn btn-success">{PHP.L.Update}</button>
    <button type="reset" class="btn">{PHP.L.Cancel}</button>
  </div>
</form>
<!-- END: OPTIONS -->

<!-- BEGIN: NEWCAT -->
<h3>{PHP.L.AddEntry}</h3>
<form action="{ADMIN_STRUCTURE_URL_FORM_ADD}" method="post" enctype="multipart/form-data">
  <div class="row">
    <div class="span2">
      <label class="control-label">{PHP.L.Path}:</label>
      <input type="text" name="rstructurepath" value="{PHP.rstructure.structure_path}" maxlength="16" class="span2">
    </div>
    <div class="span2">
      <label class="control-label">{PHP.L.Code}:</label>
      <input type="text" name="rstructurecode" value="{PHP.rstructure.structure_code}" class="span2">
    </div>
  </div>

  <label class="control-label">{PHP.L.Title}:</label>
  <input type="text" name="rstructuretitle" value="{PHP.rstructure.structure_title}" maxlength="100" class="span4">

  <label class="control-label">{PHP.L.Description}:</label>
  <input type="text" name="rstructuredesc" value="{PHP.rstructure.structure_desc}" maxlength="255" class="span4">

  <label class="control-label">{PHP.L.Icon}:</label>
  <input type="text" name="rstructureicon" value="{PHP.rstructure.structure_icon}" maxlength="128" class="span4">

  <label class="checkbox">{ADMIN_STRUCTURE_LOCKED} {PHP.L.Locked}</label>

  <!-- BEGIN: EXTRAFLD -->
  <label>{ADMIN_STRUCTURE_EXTRAFLD_TITLE}:</label>
  {ADMIN_STRUCTURE_EXTRAFLD}
  <!-- END: EXTRAFLD -->
  
  <div class="form-actions">
    <button type="submit" class="btn btn-success">{PHP.L.AddEntry}</button>
    <button type="reset" class="btn">{PHP.L.Cancel}</button>
  </div>
</form>
<!-- END: NEWCAT -->
<!-- END: MAIN -->