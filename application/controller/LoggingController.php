<?php

class LoggingController extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    public function __construct()
    {
        parent::__construct();

        // special authentication check for the entire controller: Note the check-ADMIN-authentication!
        // All methods inside this controller are only accessible for admins (= users that have role type 7)
        Auth::checkAdminAuthentication();
    }

    /**
     * This method controls what happens when you move to /logging or /logging/index in your app.
     */
    public function index()
    {
        $this->View->render('logging/index', array(
                'logging' => LoggingModel::getAllLogs())
        );
    }
}
