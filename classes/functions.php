<?php

    // function getCategoryId(PDO $db, string $catName) : int
    // {
        
    //     $query = $db->prepare(
    //     "SELECT post_categories.id FROM post_categories WHERE post_categories.name = ? ");
    //     $query->execute([$catName]);
    //     $catId = $query->fetch(PDO::FETCH_ASSOC);
    //     return $catId['id'];
    // }

    function getUserId (PDO $db, string $username) : int
    {
        $query = $db->prepare(
        "SELECT users.id FROM users WHERE users.username = :username;");
        $parameters = ['username' => $username];
        $query->execute($parameters);
        $userId = $query->fetch(PDO::FETCH_ASSOC);
        return $userId['id'];
    }
    
    function getRoleId (PDO $db, string $role) : int
    {
        $query = $db->prepare(
        "SELECT roles.id FROM roles WHERE roles.name = :role;");
        $parameters = ['role' => $role];
        $query->execute($parameters);
        $roleId = $query->fetch(PDO::FETCH_ASSOC);
        return $roleId['id'];
    }
    
    function addRole(PDO $db, string $user, string $role)
    {
        $query = $db->prepare(
        "INSERT INTO users_roles (user_id, role_id)
        VALUES (:userId, :roleId);");
        $parameters = [
            'userId' => getUserId($db, $user),
            'roleId' => getRoleId($db, $role)];
        $query->execute($parameters);
    }
    
    function removeRole(PDO $db, string $user, string $role)
    {
        $query = $db->prepare(
        "DELETE FROM users_roles WHERE user_id = :userId AND role_id = :roleId;");
        $parameters = [
            'userId' => getUserId($db, $user),
            'roleId' => getRoleId($db, $role)];
        $query->execute($parameters);
    }

?>