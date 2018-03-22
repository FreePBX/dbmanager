
<?php
    $dataurl = "ajax.php?module=dbmanager&command=getJSON&jdata=grid";
?>
 <table id="mygrid"
        data-url="<?php echo $dataurl?>"
        data-cache="false"
        data-cookie="true"
        data-cookie-id-table="dbmanager-grid"
        data-toolbar="#toolbar-all"
        data-maintain-selected="true"
        data-show-columns="true"
        data-show-toggle="true"
        data-toggle="table"
        data-pagination="true"
        data-search="true"
        class="table table-striped">
    <thead>
        <tr>
            <th data-field="description"><?php echo _("Database")?></th>
            <th data-field="id" data-formatter="linkFormatter"><?php echo _("Actions")?></th>
        </tr>
    </thead>
</table>