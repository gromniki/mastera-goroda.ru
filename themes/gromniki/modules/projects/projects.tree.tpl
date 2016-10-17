<!-- BEGIN: MAIN -->

    
<!-- BEGIN: CATS -->
<li class="<!-- IF {ROW_SELECTED} -->uk-active<!-- ENDIF --><!-- IF {ROW_SUBCAT} --> uk-parent<!-- ENDIF -->">
    <a href="<!-- IF {ROW_SUBCAT} -->#<!-- ELSE -->{ROW_HREF}<!-- ENDIF -->">
        <!-- IF !{ROW_LEVEL} --><i class="uk-icon-chevron-right"></i><!-- ENDIF --> 
        <!-- IF {ROW_LEVEL} --><i class="uk-icon-angle-right"></i><!-- ENDIF -->{ROW_TITLE}</a>
    <!-- IF {ROW_SUBCAT} -->
    <ul class="gr-nav-sub">
        {ROW_SUBCAT}
    </ul>
    <!-- ENDIF -->
</li>
<!-- END: CATS -->

<!-- END: MAIN -->


<ul<!-- IF {LEVEL} == 0 --> class="uk-nav uk-nav-parent-icon gr-nav-caticon gr-nav-category" data-uk-nav<!-- ENDIF -->>
    <!-- BEGIN: CATS -->
    <li class="uk-parent">
        <a href="#"><i class="uk-icon-chevron-right"></i> {ROW_TITLE} {ROW_COUNT}</a>
         <ul class="gr-nav-sub">              
       
            <li>
                <a href="{ROW_HREF}"> <i class="uk-icon-angle-right"></i>{ROW_SUBCAT}</a>
            </li>
         </ul>
        
    </li>
    <!-- END: CATS -->
</ul>