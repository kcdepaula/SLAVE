<span id="search-result">
  <h3>System Users</h3>
  <div id="subcontent">
    <table id="data-list">
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Access Level</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Address</th>
      </tr>
      <?php
      
      $count = 1;
      if ($user->list_users() != false) {
        foreach ($user->list_users() as $value) {
          extract($value);
          ?>
          <tr>
            <td><?php echo $count; ?></td>
            <td>
              <?php 
              echo $id;
              $user_access_level = $user->get_user_access($login_id);
              if ($user_access_level == 'Manager') {
                ?>
                <a href="index.php?page=settings&subpage=users&action=profile&id=<?php echo $user_id; ?>">
                  <?php echo $user_lastname . ', ' . $user_firstname; ?>
                </a>
                <?php
              } else {
                echo $user_lastname . ', ' . $user_firstname;
              }
              ?>
            </td>
            <td><?php echo $user_access; ?></td>
            <td><?php echo $user_email; ?></td>
            <td><?php echo $user_phone; ?></td>
            <td><?php echo $user_address; ?></td>
          </tr>
          <?php
          $count++;
        }
      } else {
        echo "No Record Found.";
      }
      ?>
    </table>
  </div>
</span>
