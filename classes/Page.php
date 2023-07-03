<?php

class Page {
    //ATTRIBUTES
    private int $id;
    private string $name;
    private string $title;
    private string $content;
    private string $route;
    
    //CONSTRUCTOR
    public function __construct(string $name, string $title, string $content, string $route)
    {
        $this->id = -1;
        $this->name = $name;
        $this->title = $title;
        $this->content = $content;
        $this->route = $route;
    }
    
    //ID
    public function getId() : int
    {
        return $this->id;
    }
    public function setId(int $id) : void
    {
        $this->id = $id;
    }
    
    //NAME
    public function getName() : string
    {
        return $this->name;
    }
    public function setName(string $name) : void
    {
        $this->name = $name;
    }
    
    //TITLE
    public function getTitle() : string
    {
        return $this->title;
    }
    public function setTitle(string $title) : void
    {
        $this->title = $title;
    }
    
    //CONTENT
    public function getContent() : string
    {
        return $this->content;
    }
    public function setContent(string $content) : void
    {
        $this->content = $content;
    }
    
    //ROUTE
    public function getRoute() : string
    {
        return $this->route;
    }
    public function setRoute(string $route) : void
    {
        $this->route = $route;
    }
    
    //METHODS
    public function addPage(PDO $db, Page $page) : void
    {
        $query = $db->prepare(
        "INSERT INTO pages (name, title, content, route) 
        VALUES (?,?,?,?);");
        $query->execute([$page->getName(), $page->getTitle(), $page->getContent(), $page->getRoute()]);
    }
    
    public function removePage(PDO $db, Page $page) : void
    {
        $query = $db->prepare(
        "DELETE FROM pages WHERE pages.route = :route;");
        $parameters = ['route' => $page->getRoute()];
        $query->execute($parameters);
    }
}

?>