<?php

$host = "db.3wa.io";
$port = "3306";
$dbname = "laurelineagabibrac_modelisation";
$connexionString = "mysql:host=$host;port=$port;dbname=$dbname";

$user = "laurelineagabibrac";
$password = "c8b4d35a0077655c5f327ec2af4c0eac";

$db = new PDO(
    $connexionString,
    $user,
    $password
);

require "User.php";
require "Page.php";
require "Post.php";
require "Role.php";
require "functions.php";


$user = new User("Lau","password","email@test.fr");
echo "<pre>";
print_r($user);
echo "<pre>";

$user->addUser($db, $user);
$user->removeUser($db, $user);

$page = new Page("test", "Test", "Test Lorem Ipsum", "testpage");
echo "<pre>";
print_r($page);
echo "<pre>";
$page->addPage($db, $page);
$page->removePage($db, $page);

$cat = new PostCategory("Test", "Ceci est un test");
echo "<pre>";
print_r($cat);
echo "<pre>";
$cat->addCategory($db, $cat);
$cat->removeCategory($db, $cat);

$post = new Post("Titre", "Blabla de contenu");
echo "<pre>";
print_r($post);
echo "<pre>";
$post->addPost($db, $post, "Gaming");
$post->removePost($db, $post);

$role = new Role("troll","Quelqu'un qui trolle");
echo "<pre>";
print_r($role);
echo "<pre>";
$role->addRole($db, $role);
$role->removeRole($db, $role);

addRole($db,"Test", "Auteur");
removeRole($db, "Test", "Auteur");
?>