<?php

require_once('../../inc/autoLoadClasses.inc.php');
require_once('./headerVerifierDashboard.php');
$agentsView->getAllUsers();
?>

<div class="container-dashboard-information">
    <div class="dashboard-title">
        <label>Dashboard</label>
    </div>
    <div class="dashboard-navigation">
        <div class="agent-id">
            <label>Agent ID</label>
        </div>
        <div class="agent-name">
            <label>Name</label>
        </div>
        <div class="forward-count nav-tag">
            <label>Forward Count</label>
        </div>
        <div class="forward-return nav-tag">
            <label>Forward Return</label>
        </div>
        <div class="forward-approve nav-tag">
            <label>Forward Approve</label>
        </div>
        <div class="total-forward nav-tag">
            <label>Total Forward</label>
        </div>
    </div>
    <?php foreach ($agentsView->getAllUsers() as $user) : ?>
        <div class="dashboard-information">
            <div class="agent-id">
                <label><?php echo $user['id'] ?></label>
            </div>
            <div class="agent-name">
                <label><?php echo $user['first_name'] . ' ' . $user['last_name'] ?></label>
            </div>
            <div class="forward-count nav-tag">
                <label>Forward Count</label>
            </div>
            <div class="forward-return nav-tag">
                <label>Forward Return</label>
            </div>
            <div class="forward-approve nav-tag">
                <label>Forward Approve</label>
            </div>
            <div class="total-forward nav-tag">
                <label>Total Forward</label>
            </div>
        </div>

    <?php endforeach; ?>

    <a href="../../login.php">Back</a>
</div>

</body>

</html>