<?php

/**
 * User database details;
 * Table: keyholders
 * Columns:
 * keyholder_id
 * keyholder_primary_user_id
 * keyholder_status
 * keyholder_perpetual_status
 * keyholder_type
 * keyholder_interval
 * keyholder_interval_count
 * keyholder_gems
 * keyholder_perpetual_gems
 */

class KeyholderModel
{
  /**
   * Get all users from database
   * TODO Nothing.
   */
  public function getAllKeyholders()
  {
      $sql = "SELECT keyholder_id, keyholder_primary_user_id, keyholder_status, keyholder_perpetual_status, keyholder_type, keyholder_interval, keyholder_interval_count, keyholder_gems, keyholder_perpetual_gems FROM keyholders";
      $query = $database->prepare($sql);
      $query->execute();

      return $query->fetchAll();
  }

  /**
   * Add a user to database
   * TODO Nothing.
   */
  public function addKeyholder($keyholder_id, $keyholder_primary_user_id, $keyholder_status, $keyholder_perpetual_status, $keyholder_type, $keyholder_interval, $keyholder_interval_count, $keyholder_gems, $keyholder_perpetual_gems)
  {
      $sql = "INSERT INTO keyholders (keyholder_id, keyholder_primary_user_id, keyholder_status, keyholder_perpetual_status, keyholder_type, keyholder_interval, keyholder_interval_count, keyholder_gems, keyholder_perpetual_gems) VALUES (:keyholder_id, :keyholder_primary_user_id, :keyholder_status, :keyholder_perpetual_status, :keyholder_type, :keyholder_interval, :keyholder_interval_count, :keyholder_gems, :keyholder_perpetual_gems)";
      $query = $database->prepare($sql);
      $parameters = array(':keyholder_id' => $keyholder_id, ':keyholder_primary_user_id' => $keyholder_primary_user_id, ':keyholder_status' => $keyholder_status, ':keyholder_perpetual_status' => $keyholder_perpetual_status, ':keyholder_type' => $keyholder_type, ':keyholder_interval' => $keyholder_interval, ':keyholder_interval_count' => $keyholder_interval_count, ':keyholder_gems' => $keyholder_gems, ':keyholder_perpetual_gems' => $keyholder_perpetual_gems);

      $query->execute($parameters);
  }

  /**
   * Delete a user in the database
   * TODO Nothing.
   */
  public function deleteKeyholder($keyholder_id)
  {
      $sql = "DELETE FROM keyholders WHERE user_id = :keyholder_id";
      $query = $database->prepare($sql);
      $parameters = array(':keyholder_id' => $keyholder_id);

      $query->execute($parameters);
  }

  /**
   * Get a user from database
   * TODO Nothing.
   */
  public function getKeyholderByKH($keyholder_id)
  {
      $sql = "SELECT keyholder_id, keyholder_primary_user_id, keyholder_status, keyholder_perpetual_status, keyholder_type, keyholder_interval, keyholder_interval_count, keyholder_gems, keyholder_perpetual_gems FROM keyholders WHERE keyholder_id = :keyholder_id LIMIT 1";
      $query = $database->prepare($sql);
      $parameters = array(':keyholder_id' => $keyholder_id);

      $query->execute($parameters);

      return ($query->rowcount() ? $query->fetch() : false);
  }

  public function getKeyholderByUser($user_id)
  {
      $sql = "SELECT keyholder_id, keyholder_primary_user_id, keyholder_status, keyholder_perpetual_status, keyholder_type, keyholder_interval, keyholder_interval_count, keyholder_gems, keyholder_perpetual_gems FROM keyholders WHERE keyholder_primary_user_id = :keyholder_primary_user_id LIMIT 1";
      $query = $database->prepare($sql);
      $parameters = array(':keyholder_primary_user_id' => $user_id);

      $query->execute($parameters);

      return $query->fetchAll();
  }


  // Clean this up.
  public function getKeyholdersByAuthUser($user_id)
  {
      $sql = "SELECT user_kh_auth FROM users WHERE user_kh_auth = :user_id";
      $query = $database->prepare($sql);
      $parameters = array(':user_id' => $user_id);
      $result1 = $query->execute($parameters);
      if ($result1 == null) {
        return null;
        exit;
      }
      $result2 = [];

      foreach ($result1->user_kh_auth as $khaccount) {
        $sql = "SELECT keyholder_id FROM keyholders WHERE keyholder_id = :keyholder_id";
        $query = $database->prepare($sql);
        $parameters = array(':keyholder_id' => $khaccount->user_kh_auth);
        $query->execute($parameters);
        array_push($result2, $query->rowcount() ? $query->fetch() : false);
      }
      return $result2;
  }


  /**
   * Update a user in database
   * TODO Nothing.
   */
  public function updateKeyholder($keyholder_id, $keyholder_primary_user_id, $keyholder_status, $keyholder_perpetual_status, $keyholder_type, $keyholder_interval, $keyholder_interval_count, $keyholder_gems, $keyholder_perpetual_gems)
  {
      $sql = "UPDATE keyholders SET keyholder_id => :keyholder_id, keyholder_primary_user_id => :keyholder_primary_user_id, keyholder_status => :keyholder_status, keyholder_perpetual_status => :keyholder_perpetual_status, keyholder_type => :keyholder_type, keyholder_interval => :keyholder_interval, keyholder_interval_count => :keyholder_interval_count, keyholder_gems => :keyholder_gems, keyholder_perpetual_gems => :keyholder_perpetual_gems WHERE keyholder_id = :keyholder_id";
      $query = $database->prepare($sql);
      $parameters = array(':keyholder_id' => $keyholder_id, ':keyholder_primary_user_id' => $keyholder_primary_user_id, ':keyholder_status' => $keyholder_status, ':keyholder_perpetual_status' => $keyholder_perpetual_status, ':keyholder_type' => $keyholder_type, ':keyholder_interval' => $keyholder_interval, ':keyholder_interval_count' => $keyholder_interval_count, ':keyholder_gems' => $keyholder_gems, ':keyholder_perpetual_gems' => $keyholder_perpetual_gems);

      $query->execute($parameters);
  }

  /**
   * Get simple "stats". This is just a simple demo to show
   * how to use more than one model in a controller (see application/controller/users.php for more)
   */
  public function getAmountOfKeyholders()
  {
      $sql = "SELECT COUNT(keyholder_id) AS amount_of_keyholders FROM keyholders";
      $query = $database->prepare($sql);
      $query->execute();

      return $query->fetch()->amount_of_keyholders;
  }

  public function findAuthUsers($keyholder_id)
  {
      $sql = "SELECT user_id, user_fname, user_mname, user_lname FROM users WHERE user_kh_auth LIKE :keyholder_id";
      $query = $database->prepare($sql);
      $parameters = array(":keyholder_id" => $keyholder_id);
      $query->execute($parameters);

      return $query->fetchAll();
  }

  public function getPriUser($user_id)
  {
      $sql = "SELECT user_id, user_fname, user_mname, user_lname FROM users WHERE user_id = :user_id LIMIT 1";
      $query = $database->prepare($sql);
      $parameters = array(':user_id' => $user_id);

      $query->execute($parameters);

      return ($query->rowcount() ? $query->fetch() : false);
  }
}
