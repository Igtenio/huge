<div class="container">
    <h1>UserController/showProfile</h1>

    <div class="box">
        <h2>Your profile</h2>

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <div>Username: <?= $this->user->user_username; ?> <a href="<?php echo Config::get('URL'); ?>user/changePassword">Change Password</a></div>
        <div>First Name: <?= $this->user->user_fname; ?></div>
        <div>Middle Name: <?= $this->user->user_mname; ?></div>
        <div>Last Name: <?= $this->user->user_lname; ?></div>
        <div>Email: <?= $this->user->user_email; ?> <a href="<?php echo Config::get('URL'); ?>user/edituseremail">Edit my email</a></div>
        <div>Phone: <?= $this->user->user_phone; ?></div>
        <div>Role: <?= $this->user->user_role; ?></div>
    </div>
</div>
