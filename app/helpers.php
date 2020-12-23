<?php
/** This Method To Get Notification Type  */
if (!function_exists('getNameFromType')) {
    function getNameFromType($type)
    {
        switch ($type) {
            case 'App\Notifications\AssignmentUploadedNotification':
                return "Uploade Assignment";
            case 'App\Notifications\TeamAssignmentNotification':
                return "Assignment Created";
            default:
                return $type;
        }
    }
}
/** This Method To Get User FullName That Passed From Notification Data
 * If And Only If The Notification Type Is [AssignmentUploadedNotification]
 */
if (!function_exists('getFullnameFromID')) {
    function getFullnameFromID($username, $id)
    {
        $user = \App\Models\User::where('username', '=', $username)->first();
        return auth()->id() != $id ? "You Uploaded Assignment" : $user->fullname . " Uploaded Assignment";
    }
}

/** Get Assignment Data From Table
 * If And Only If The Notification Type Is [AssignmentUploadedNotification]
 */
if (!function_exists('getAssignmentNameFromID')) {
    function getAssignmentNameFromID($assignment)
    {
        $name = \App\Models\Assignment::where('name', '=', $assignment)->first();
        return $name->name;
    }
}

/** Filter Notification Type To Be Dynamic And More Efficient */
if (!function_exists('getFunctionTypeByDataPassed')) {
    function getFunctionTypeByDataPassed($type, array $data)
    {
        switch ($type) {
            case 'App\Notifications\AssignmentUploadedNotification' :
                return getAssignmentNameFromID($data['assignment']);
            case 'App\Notifications\TeamAssignmentNotification' :
                return $data['team'];
            default:
                return 'Un Signed';
        }
    }
}

/** Filter Notification Type And Return An Action Happen To Make This Notification */
if (!function_exists('getNotificationActionByDataPassed')) {
    function getNotificationActionByDataPassed($type, array $data, $notifiable_id)
    {
        switch ($type) {
            case 'App\Notifications\AssignmentUploadedNotification' :
                return getFullnameFromID($data['username'], $notifiable_id);
            case 'App\Notifications\TeamAssignmentNotification':
                return $data['team']." Team Created Assignment";
            default:
                return 'Un Signed';
        }
    }
}
