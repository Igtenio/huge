<?php

/**
 * SpecialOrderModel
 * Used for handling Special Orders, Crowdfunded orders, et cetera.
 * Lets users order, and both users and store track special orders.
 */

 /**
  * SpecialOrders database details;
  * Table: specialorders_available
  * Columns:
  * special_order_available_id
  * special_order_available_name
  * special_order_available_description
  * special_order_available_type
  * special_order_available_link
  * special_order_available_open
  * special_order_available_status
  * special_order_available_package_0
  * special_order_available_price_0
  * special_order_available_package_1
  * special_order_available_price_1
  * special_order_available_package_2
  * special_order_available_price_2
  * special_order_available_package_3
  * special_order_available_price_3
  * special_order_available_package_4
  * special_order_available_price_4
  * special_order_available_package_5
  * special_order_available_price_5
  * special_order_available_package_6
  * special_order_available_price_6
  * special_order_available_package_7
  * special_order_available_price_7
  * special_order_available_package_8
  * special_order_available_price_8
  * special_order_available_package_9
  * special_order_available_price_9
  *
  * Table: specialorders_outstanding
  * Columns:
  * special_order_outstanding_id
  * special_order_outstanding_available_id
  * special_order_outstanding_user_id
  * special_order_outstanding_package
  * special_order_outstanding_price
  * special_order_outstanding_status
  */

class SpecialOrderModel
{
    /**
     * Gets an array that contains all the users in the database. The array's keys are the user ids.
     * Each array element is an object, containing a specific user's data.
     * The avatar line is built using Ternary Operators, have a look here for more:
     * @see http://davidwalsh.name/php-shorthand-if-else-ternary-operators
     *
     * @return array The profiles of all users
     */
    public static function getAllOutstandingSpecialOrders()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT special_order_outstanding_id, special_order_outstanding_available_id, special_order_outstanding_user_id, special_order_outstanding_package, special_order_outstanding_price, special_order_outstanding_status FROM specialorders_outstanding";
        $query = $database->prepare($sql);
        $query->execute();

        $all_outstanding_orders = array();

        foreach ($query->fetchAll() as $order) {

            // all elements of array passed to Filter::XSSFilter for XSS sanitation, have a look into
            // application/core/Filter.php for more info on how to use. Removes (possibly bad) JavaScript etc from
            // the user's values
            array_walk_recursive($order, 'Filter::XSSFilter');

            $all_outstanding_orders[$order->user_id] = new stdClass();
            $all_outstanding_orders[$order->user_id]->user_id = $order->user_id;
            $all_outstanding_orders[$order->user_id]->user_username = $order->user_username;
            $all_outstanding_orders[$order->user_id]->user_email = $order->user_email;
            $all_outstanding_orders[$order->user_id]->user_active = $order->user_active;
            $all_outstanding_orders[$order->user_id]->user_deleted = $order->user_deleted;
            $all_outstanding_orders[$order->user_id]->user_phone = $order->user_phone;
            $all_outstanding_orders[$order->user_id]->user_fname = $order->user_fname;
            $all_outstanding_orders[$order->user_id]->user_mname = $order->user_mname;
            $all_outstanding_orders[$order->user_id]->user_lname = $order->user_lname;
            $all_outstanding_orders[$order->user_id]->user_role = $order->user_role;

            //$all_users_profiles[$user->user_id]->user_avatar_link = (Config::get('USE_GRAVATAR') ? AvatarModel::getGravatarLinkByEmail($user->user_email) : AvatarModel::getPublicAvatarFilePathOfUser($user->user_has_avatar, $user->user_id));
        }

        return $all_outstanding_orders;
    }

    /**
     * Gets a user's profile data, according to the given $user_id
     * @param int $user_id The user's id
     * @return mixed The selected user's profile
     */
    public static function getOutstandingSpecialOrderByID($special_order_outstanding_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT special_order_outstanding_id, special_order_outstanding_available_id, special_order_outstanding_user_id, special_order_outstanding_package, special_order_outstanding_price, special_order_outstanding_status
                FROM specialorders_outstanding WHERE special_order_outstanding_id = :special_order_outstanding_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':special_order_outstanding_id' => $special_order_outstanding_id));

        $order = $query->fetch();

        if (!$query->rowCount() == 1) {
          Session::add('feedback_negative', Text::get('FEEDBACK_USER_DOES_NOT_EXIST'));
          return false;
        }

        // all elements of array passed to Filter::XSSFilter for XSS sanitation, have a look into
        // application/core/Filter.php for more info on how to use. Removes (possibly bad) JavaScript etc from
        // the user's values
        array_walk_recursive($order, 'Filter::XSSFilter');

        return $order;
    }
}
