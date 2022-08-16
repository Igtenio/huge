<?php

/**
 * NoteModel
 * This is basically a simple CRUD (Create/Read/Update/Delete) demonstration.
 */

 /**
  * User database details;
  * Table: logs
  * Columns:
  * log_id
  * log_time
  * log_users
  * log_type
  * log_text
  */

class LoggingModel
{
    /**
     * Get all notes (notes are just example data that the user has created)
     * @return array an array with several objects (the results)
     */
    public static function getAllLogs()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT * FROM logs";
        $query = $database->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    /**
     * Get a single note
     * @param int $note_id id of the specific note
     * @return object a single object (the result)
     */
    public static function getLog($log_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT log_id, log_time, log_users, log_type, log_text FROM logs WHERE log_id = :log_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':log_id' => $log_id));

        // fetch() is the PDO method that gets a single result
        return $query->fetch();
    }

    /**
     * Set a note (create a new one)
     * @param string $note_text note text that will be created
     * @return bool feedback (was the note created properly ?)
     */
    public static function createLog($log_type, $log_users = "00000000", $log_object = null)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "INSERT INTO logs (log_time, log_users, log_type, log_text) VALUES (:log_time, :log_users, :log_type, :log_text)";
        $query = $database->prepare($sql);

        switch ($log_type) {
          case 'Note Creation - User Account':
            $tempuser = Session::get('user_id') . "," . $log_users;
            $log_text = Session::get('user_id') . ' created a note on the account of ' . $log_users . '.';
            break;
          case 'Note Creation - Personal':
            $tempuser = Session::get('user_id');
            $log_text = Session::get('user_id') . ' created a personal note.';
            break;
          case 'Note Edit':
            $tempuser = Session::get('user_id');
            $log_text = Session::get('user_id') . ' edited note ID ' . $log_object . '.';
            break;
          case 'Note Deletion':
            $tempuser = Session::get('user_id');
            $log_text = Session::get('user_id') . ' deleted note ID ' . $log_object . '.';
            break;
          case 'User Login':
            $tempuser = $log_users;
            $log_text = $log_users . ' has successfully logged in.';
            break;
          case 'xxx':
            $log_text = Session::get('user_id') . ' blah blah blah ';
            break;
          case 'xxx':
            $log_text = Session::get('user_id') . ' blah blah blah ';
            break;
          default:
            $log_text = 'Error creating log.';
            break;
        }
        $query->execute(array(':log_time' => time(), ':log_users' => $tempuser, ':log_type' => $log_type, ':log_text' => $log_text));
    }

}
