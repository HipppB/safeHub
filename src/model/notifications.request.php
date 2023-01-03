<?php
function getUserNotification($user_id)
{
    global $db;
    $query = $db->prepare("SELECT * 
    FROM notifications 
    WHERE user_id = :user_id");
    $query->execute([
        'user_id' => $user_id,
    ]);
    return $query->fetchAll();
}
function addNotification($user_id, $message)
{
    global $db;
    $query = $db->prepare(
        'INSERT INTO notifications (user_id, message) VALUES (:user_id, :message)'
    );
    $query->execute([
        'user_id' => $user_id,
        'message' => $message,
    ]);
    return $query->rowCount();
}
function setNotificationAsRead($id)
{
    global $db;
    $query = $db->prepare(
        'UPDATE notifications SET is_read = 1 WHERE id = :id'
    );
    $query->execute([
        'id' => $id,
    ]);
    return $query->rowCount();
}
function deleteNotificationById($id)
{
    global $db;
    $query = $db->prepare('DELETE FROM notifications WHERE id = :id');
    $query->execute([
        'id' => $id,
    ]);
    return $query->rowCount();
}
