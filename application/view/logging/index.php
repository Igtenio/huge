<div class="container">
    <h1>log/index</h1>

    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>
        <div>
            <table class="overview-table">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Users</td>
                    <td>Type</td>
                    <td>Time</td>
                    <td>Text</td>
                </tr>
                </thead>
                <?php foreach ($this->logging as $log) { ?>
                    <tr class="active">
                        <td><?= $log->log_id; ?></td>
                        <td><?= $log->log_users; ?></td>
                        <td><?= $log->log_type; ?></td>
                        <td><?= $log->log_time; ?></td>
                        <td><?= $log->log_text; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
