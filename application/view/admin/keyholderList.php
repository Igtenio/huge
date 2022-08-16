<div class="container">
    <h1>Admin/keyholderList</h1>
    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <h3>List of Keyholders</h3>
        <div>
          <table class="overview-table">
              <thead>
              <tr>
                <td>ID</td>
                <td>Primary Keyholder</td>
                <td>Authorized Users</td>
                <td>Status</td>
                <td>Evergreen?</td>
                <td>Type</td>
                <td>Interval</td>
                <td>Interval Count</td>
                <td>Current Gems</td>
                <td>Evergreen Gems</td>
                <td>DELETE</td>
                <td>EDIT</td>
              </tr>
              </thead>
              <tbody>
              <?php foreach ($this->keyholders as $keyholder) { ?>
                  <tr>
                    <td><?php if (isset($keyholder->khId)) echo htmlspecialchars($keyholder->khId, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($keyholder->khPriUserId)) {$priUser = KeyholderModel::getPriUser($keyholder->khPriUserId); echo htmlspecialchars($priUser->usersFName, ENT_QUOTES, 'UTF-8'), " ", htmlspecialchars($priUser->usersLName, ENT_QUOTES, 'UTF-8'), " (", htmlspecialchars($priUser->usersId, ENT_QUOTES, 'UTF-8'), ")";} else {echo "User Not Set";} ?></td>
                    <td><?php foreach (KeyholderModel::findAuthUsers($keyholder->khId) as $authUser) {
                      /*echo gettype($authUser);*/
                      /*print_r($authUser);*/
                      $num_of_items = count(KeyholderModel::findAuthUsers($keyholder->khId));
                      /*echo $num_of_items;*/
                      echo htmlspecialchars($authUser->usersFName, ENT_QUOTES, 'UTF-8'), " ", htmlspecialchars($authUser->usersLName, ENT_QUOTES, 'UTF-8'), " (", htmlspecialchars($authUser->usersId, ENT_QUOTES, 'UTF-8'), ")";
                      $num_count = $num_count + 1;
                      if ($num_count < $num_of_items) {
                        echo ", ";
                      } else {
                        $num_count = 0;
                      }
                    } ?></td>
                    <td><?php if (isset($keyholder->khStatus)) echo htmlspecialchars($keyholder->khStatus, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($keyholder->khPerpStatus)) echo htmlspecialchars($keyholder->khPerpStatus, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($keyholder->khType)) echo htmlspecialchars($keyholder->khType, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($keyholder->khInterval)) echo htmlspecialchars($keyholder->khInterval, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($keyholder->khIntervalCount)) echo htmlspecialchars($keyholder->khIntervalCount, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($keyholder->khGems)) echo htmlspecialchars($keyholder->khGems, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($keyholder->khPerpGems)) echo htmlspecialchars($keyholder->khPerpGems, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td></td>
                    <td><a href="<?php echo URL . '/khEdit.php?kh=' . htmlspecialchars($keyholder->khId, ENT_QUOTES, 'UTF-8'); ?>">edit</a></td>
                  </tr>
              <?php } ?>
              </tbody>
          </table>
        </div>
    </div>
</div>
