<!-- BEGIN: MAIN -->

{FILE "{PHP.cfg.themes_dir}/admin/{PHP.cfg.admintheme}/warnings.tpl"}

<h3>{PHP.L.Configuration}</h3>

<!-- BEGIN: EDIT -->
<div class="row">
  <div class="span3">
    <!-- BEGIN: ADMIN_CONFIG_SIBLINGS -->
    <div class="well" style="padding:8px 0;">
      <ul class="nav nav-list">
        <li class="nav-header"><i class="icon-cog"></i>{ADMIN_CONFIG_OWNER}</li>
        <!-- BEGIN: ADMIN_CONFIG_SIBLINGS_ROW -->
        <li<!-- IF {ADMIN_CONFIG_SIBLING_ACTIVE} --> class="active"<!-- ENDIF -->>
			<a href="{ADMIN_CONFIG_SIBLING_URL}">
                  <!-- IF {ADMIN_CONFIG_SIBLINGS_ICO} -->
                  <img src="{ADMIN_CONFIG_SIBLINGS_ICO}" width="20" height="20" class="iconspaced">
                  <!-- ELSE -->
                  <img src="{PHP.cfg.system_dir}/admin/img/plugins32.png" width="20" height="20" class="iconspaced">
                  <!-- ENDIF -->
                  {ADMIN_CONFIG_SIBLING_NAME}
            </a>
		</li>
        <!-- END: ADMIN_CONFIG_SIBLINGS_ROW -->
      </ul>
    </div>
    <!-- END: ADMIN_CONFIG_SIBLINGS -->
  </div>
  <div class="span9">
    <form name="saveconfig" id="saveconfig" action="{ADMIN_CONFIG_FORM_URL}" method="post">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th style="width:40%;">{PHP.L.Key}</th>
            <th>{PHP.L.Value}</th>
            <th style="width:5%;">{PHP.L.Reset}</th>
          </tr>
        </thead>
        <tbody>
          <!-- BEGIN: ADMIN_CONFIG_ROW -->

          <!-- BEGIN: ADMIN_CONFIG_FIELDSET_BEGIN -->
          <tr>
            <th colspan="3" style="text-align:center;">
        <big>{ADMIN_CONFIG_FIELDSET_TITLE}</big>
        </th>
        </tr>
        <!-- END: ADMIN_CONFIG_FIELDSET_BEGIN -->

        <!-- BEGIN: ADMIN_CONFIG_ROW_OPTION -->
        <tr>
          <td>{ADMIN_CONFIG_ROW_CONFIG_TITLE}:
            <!-- IF {ADMIN_CONFIG_ROW_CONFIG_MORE} -->
            <div style="font-size: 0.85em; opacity: 0.6;">{ADMIN_CONFIG_ROW_CONFIG_MORE}</div>
            <!-- ENDIF -->
          </td>
          <td>
            {ADMIN_CONFIG_ROW_CONFIG}
          </td>
          <td>
            <a href="{ADMIN_CONFIG_ROW_CONFIG_MORE_URL}" class="btn btn-mini">
              {PHP.L.Reset}
            </a>
          </td>
        </tr>
        <!-- END: ADMIN_CONFIG_ROW_OPTION -->

        <!-- BEGIN: ADMIN_CONFIG_FIELDSET_END -->
        <!-- END: ADMIN_CONFIG_FIELDSET_END -->

        <!-- END: ADMIN_CONFIG_ROW -->
        </tbody>
        <tfoot>
          <tr>
            <td colspan="3">
              <button type="submit" class="btn btn-success">{PHP.L.Update}</button>
            </td>
          </tr>
        </tfoot>
      </table>
    </form>
  </div>
</div>
<!-- END: EDIT -->

<!-- BEGIN: DEFAULT -->

<!-- BEGIN: ADMIN_CONFIG_COL -->

<h3>{ADMIN_CONFIG_COL_CAPTION}:</h3>
<div class="row">
<!-- BEGIN: ADMIN_CONFIG_ROW -->
	<div class="span3">
		<div class="thumbnail">
			<a href="{ADMIN_CONFIG_ROW_URL}">
				<!-- IF {ADMIN_CONFIG_ROW_ICO} --> 
				<img src="{ADMIN_CONFIG_ROW_ICO}" style="height: 32px!important;">
				<!-- ELSE -->
				<img src="{PHP.cfg.system_dir}/admin/img/plugins32.png" style="height: 32px!important;">
				<!-- ENDIF -->
				{ADMIN_CONFIG_ROW_NAME}
			</a>
		</div>
		<p></p>
	</div>
<!-- END: ADMIN_CONFIG_ROW -->
</div>
<div class="clear"></div>

<!-- END: ADMIN_CONFIG_COL -->

<!-- END: DEFAULT -->

<!-- END: MAIN -->