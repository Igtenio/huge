<div class="container">
    <h1>Admin/userList</h1>
    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <h3>What happens here ?</h3>
        <div>
            This controller/action/view shows a list of all users in the system. You could use the underlying code to
            build things that use profile information of one or multiple/all users.
        </div>
        <div>
          <table class="overview-table">
              <thead>
              <tr>
                  <td>ID</td>
                  <td>First Name</td>
                  <td>Middle Name</td>
                  <td>Last Name</td>
                  <td>Email</td>
                  <td>Phone</td>
                  <td>Username</td>
                  <td>Permission Level</td>
                  <td>DELETE</td>
                  <td>EDIT</td>
              </tr>
              </thead>
              <tbody>
              <?php foreach ($this->users as $user) { ?>
                  <tr>
                      <td><a href="<?= Config::get('URL') . 'profile/showProfile/' . $user->user_id; ?>"><?php if (isset($user->user_id)) echo htmlspecialchars($user->user_id, ENT_QUOTES, 'UTF-8'); ?></a></td>
                      <td><?php if (isset($user->user_fname)) echo htmlspecialchars($user->user_fname, ENT_QUOTES, 'UTF-8'); ?></td>
                      <td><?php if (isset($user->user_mname)) echo htmlspecialchars($user->user_mname, ENT_QUOTES, 'UTF-8'); ?></td>
                      <td><?php if (isset($user->user_lname)) echo htmlspecialchars($user->user_lname, ENT_QUOTES, 'UTF-8'); ?></td>
                      <td><?php if (isset($user->user_email)) echo htmlspecialchars($user->user_email, ENT_QUOTES, 'UTF-8'); ?></td>
                      <td><?php if (isset($user->user_phone)) echo htmlspecialchars($user->user_phone, ENT_QUOTES, 'UTF-8'); ?></td>
                      <td><?php if (isset($user->user_username)) echo htmlspecialchars($user->user_username, ENT_QUOTES, 'UTF-8'); ?></td>
                      <td><?php if (isset($user->user_role)) echo htmlspecialchars($user->user_role, ENT_QUOTES, 'UTF-8'); ?></td>
                      <td></td>
                      <td></td>
                  </tr>
              <?php } ?>
              </tbody>
          </table>
        </div>
    </div>
</div>
