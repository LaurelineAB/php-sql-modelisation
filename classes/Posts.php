<?php

require "PostCategory.php";

class Post {
    
    //ATTRIBUTES
    private int $id;
    private string $title;
    private string $content;
    private int $catId;
    
    //CONSTRUCTOR
    public function __construct(string $title, string $content)
    {
        $this->id = -1;
        $this->title = $title;
        $this->content = $content;
        $this->catId = -1;
    }
    
    //ID
    public function getId() : int
    {
        return $this->id;
    }
    public function setId (int $id) : void
    {
        $this->id = $id;
    }
    
    //TITLE
    public function getTitle() : string
    {
        return $this->title;
    }
    public function setTitle (string $title) : void
    {
        $this->title = $title;
    }
    
    //ID
    public function getContent() : string
    {
        return $this->content;
    }
    public function setContent (string $content) : void
    {
        $this->content = $content;
    }
    
    //ID
    public function getCatId() : int
    {
        return $this->catId;
    }
    public function setCatId (int $catId) : void
    {
        $this->catId = $catId;
    }
    
    //METHODS
    public function addCategory(PDO $db, PostCategory $cat) : void
    {
        $query = $db->prepare(
        "INSERT INTO post_categories (name, description) 
        VALUES (?,?);");
        $query->execute([$cat->getName(), $cat->getDescription()]);
    }
    
    public function removeCategory(PDO $db, PostCategory $cat) : void
    {
        $query = $db->prepare(
        "DELETE FROM post_categories WHERE post_categories.name = :name;");
        $parameters = ['name' => $cat->getName()];
        $query->execute($parameters);
    }
    
    public function getCategoryId(PDO $db, string $catName) : int
    {
        
        $query = $db->prepare(
        "SELECT post_categories.id FROM post_categories WHERE post_categories.name = ? ");
        $query->execute([$catName]);
        $catId = $query->fetch(PDO::FETCH_ASSOC);
        // print_r($catId);
        return $catId['id'];
}

?>