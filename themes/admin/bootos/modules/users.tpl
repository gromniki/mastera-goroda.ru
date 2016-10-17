<!-- BEGIN: MAIN -->

<div class="container" id="adminmain">

  {USERS_TITLE}

  {FILE "{PHP.cfg.themes_dir}/admin/{PHP.cfg.admintheme}/warnings.tpl"}

  <h3>{PHP.L.Users}</h3>
  <div class="row">
    <div class="span9" style="width:910px;">
      <table class="table table-striped table-condensed">
        <thead>
          <tr>
            <th style="width:175px;">{USERS_TOP_NAME}</th>
            <th>{USERS_TOP_GRPTITLE}</th>
            <th style="width:90px;">{USERS_TOP_GRPLEVEL}</th>
            <th style="width:130px;">{USERS_TOP_COUNTRY}</th>
            <th style="width:180px;">{USERS_TOP_REGDATE}</th>
            <th style="width:120px;">{PHP.L.Action}</th>
          </tr>
        </thead>
        <tbody>
          <!-- BEGIN: USERS_ROW -->
          <tr>
            <td>{USERS_ROW_NAME}&nbsp;{USERS_ROW_TAG}</td>
            <td>{USERS_ROW_MAINGRP}</td>
            <td>{USERS_ROW_MAINGRPSTARS}</td>
            <td>{USERS_ROW_COUNTRYFLAG} {USERS_ROW_COUNTRY}</td>
            <td>{USERS_ROW_REGDATE}</td>
            <td>
              <div class="btn-group">
                <a href="{USERS_ROW_DETAILSLINK}" class="btn btn-mini" title="{PHP.L.Profile}"><i class="icon-share-alt"></i></a>
                <a href="{USERS_ROW_ID|cot_url('users', 'm=edit&id=$this')}" class="btn btn-mini" title="{PHP.L.Edit}"><i class="icon-pencil"></i> {PHP.L.Edit}</a>
                <a href="{USERS_ROW_ID|cot_url('pm', 'm=send&to=$this')}" class="btn btn-mini" title="{PHP.L.pm_sendnew}"><i class="icon-envelope"></i></a>
              </div>
            </td>
          </tr>
          <!-- END: USERS_ROW -->
        </tbody>
      </table>
      <div class="pagination">
        {USERS_TOP_PAGEPREV}{USERS_TOP_PAGNAV}{USERS_TOP_PAGENEXT}
      </div>
      {PHP.L.users_usersperpage}: {USERS_TOP_MAXPERPAGE}
      {PHP.L.users_usersinthissection}: {USERS_TOP_TOTALUSERS}
    </div>
    <div class="span3 filter">
      <h3>{PHP.L.Filters}</h3>
      <form action="{USERS_TOP_FILTER_ACTION}" method="post">
        <div class="line">{USERS_TOP_FILTERS_COUNTRY}</div>
        <div class="line">{USERS_TOP_FILTERS_MAINGROUP}</div>
        <div class="line">{USERS_TOP_FILTERS_GROUP}</div>
        <div><input type="text" name="y" value="" placeholder="{PHP.L.Search}"></div>
        <button type="submit" class="btn btn-primary">{PHP.L.Search}</button>
      </form>
    </div>
  </div>
</div>


<!-- END: MAIN -->