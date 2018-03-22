<div class="container-fluid">
    <h1><?php echo _('Database Manager for Backup')?></h1>
    <div class="well well-info">
        <?php echo _('This module manages external databases to be backed up by the Backup module. Backing up databases may increase the file size and speed of the backup.</br> You may wish to run an independent database only backup job.') ?>
    </div>
    <div class = "display full-border">
        <div class="fpbx-container">
            <div class="display full-border">
                <?php echo FreePBX::Dbmanager()->showPage();?>
            </div>
        </div>
    </div>
</div>
</div>

