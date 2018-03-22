<form method="POST" action="?display=dbmanager" class="fpbx-submit" id="dbform">
    <!--Description-->
    <div class="element-container">
        <div class="row">
            <div class="form-group">
                <div class="col-md-3">
                    <label class="control-label" for="description"><?php echo _("Description") ?></label>
                        <i class="fa fa-question-circle fpbx-help-icon" data-for="description"></i>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="description" name="description" value="<?php echo $description?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <span id="description-help" class="help-block fpbx-help-block"><?php echo _("A user friendly description")?></span>
                </div>
            </div>
    </div>
    <!--Description-->
    <input type="hidden" name = 'id' id='id' value='<?php echo isset($id)?$id:'new'?>'>
    <!--Host-->
    <div class="element-container">
        <div class="row">
            <div class="form-group">
                <div class="col-md-3">
                    <label class="control-label" for="host"><?php echo _("Host") ?></label>
                        <i class="fa fa-question-circle fpbx-help-icon" data-for="host"></i>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="host" name="host" value="<?php echo $host?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <span id="host-help" class="help-block fpbx-help-block"><?php echo _("Database host, this defaults to 127.0.0.1")?></span>
                </div>
            </div>
    </div>
    <!--Host-->
    <!--User-->
    <div class="element-container">
        <div class="row">
            <div class="form-group">
                <div class="col-md-3">
                    <label class="control-label" for="user"><?php echo _("User") ?></label>
                        <i class="fa fa-question-circle fpbx-help-icon" data-for="user"></i>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="user" name="user" value="<?php echo $user?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <span id="user-help" class="help-block fpbx-help-block"><?php echo _("MySQL user")?></span>
                </div>
            </div>
    </div>
    <!--User-->
    <!--Password-->
    <div class="element-container">
        <div class="row">
            <div class="form-group">
                <div class="col-md-3">
                    <label class="control-label" for="password"><?php echo _("Password") ?></label>
                        <i class="fa fa-question-circle fpbx-help-icon" data-for="password"></i>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="password" name="password" value="<?php echo $password?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <span id="password-help" class="help-block fpbx-help-block"><?php echo _("Database Password")?></span>
                </div>
            </div>
    </div>
    <!--Password-->
    <!--Table-->
    <div class="element-container">
        <div class="row">
            <div class="form-group">
                <div class="col-md-3">
                    <label class="control-label" for="table"><?php echo _("Table") ?></label>
                        <i class="fa fa-question-circle fpbx-help-icon" data-for="table"></i>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="table" name="table" value="<?php echo $table?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <span id="table-help" class="help-block fpbx-help-block"><?php echo _("Defaults to all")?></span>
                </div>
            </div>
    </div>
    <!--Table-->
    <!--Backups-->
    <div class="element-container">
        <div class="row">
            <div class="form-group">
                <div class="col-md-3">
                    <label class="control-label" for="backups"><?php echo _("Backups") ?></label>
                        <i class="fa fa-question-circle fpbx-help-icon" data-for="backups"></i>
                    </div>
                    <div class="col-md-9">
                        <select class="form-control" id="backups" name="backups[]" multiple="multiple">
                            <?php 
                                foreach($backuplist as $option){
                                    echo sprintf('<option value = "%s" %s>%s</option>',$option['value'],$option['selected'],$option['text']);
                                }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <span id="backups-help" class="help-block fpbx-help-block"><?php echo _("Which Backup Jobs.")?></span>
                </div>
            </div>
    </div>
    <!--Backups-->
</form>
