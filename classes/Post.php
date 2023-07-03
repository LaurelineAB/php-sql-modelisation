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
    public function getCategoryId(PDO $db, string $catName) : int
    {
        
        $query = $db->prepare(
        "SELECT post_categories.id FROM post_categories WHERE post_categories.name = ? ");
        $query->execute([$catName]);
        $catId = $query->fetch(PDO::FETCH_ASSOC);
        return $catId['id'];
    }
    
    // public function getPostId(PDO $db, Post $post) : int
    // {
        
    //     $query = $db->prepare(
    //     "SELECT posts.id FROM posts WHERE posts.title = :title AND posts.content = :content ");
    //     $parameters = [
    //         'title' => $post->getTitle(),
    //         'content' => $post->getContent()];
    //     $query->execute($parameters);
    //     $postId = $query->fetch(PDO::FETCH_ASSOC);
    //     return $postId['id'];
    // }
    
    public function addPost(PDO $db, Post $post, string $catName) : void
    {
        $query = $db->prepare(
        "INSERT INTO posts (title, content, category_id) 
        VALUES (:title, :content, :catId);");
        $parameters = [
            'title' => $post->getTitle(),
            'content' => $post->getContent(),
            'catId' => $post->getCategoryId($db, $catName)];
        $query->execute($parameters);
    }
    
    public function removePost(PDO $db, Post $post) : void
    {
        $query = $db->prepare(
        "DELETE FROM posts WHERE posts.title = :title AND posts.content = :content;");
        $parameters = [
            'title' => $post->getTitle(),
            'content' => $post->getContent()];
        $query->execute($parameters);
    }
    
}

?>