#Tables :
    - pages
    - projects
    - categories
    - projects_categories
    - pictures
    
    
#Champs par table

PAGES :
    - home
    - CV
    - projects
    - projects_details
    - contact
    
    - id
    - name
    - title
    - route
    
PROJECTS :
    - id
    - name
    - description
    
CATEGORIES :
    - id
    - name
    - description
    
PROJECTS_CATEGORIES :
    - project_id
    - category_id
    
PICTURES :
    - id
    - url
    - caption
    - project_id
    

#Relations entre les tables
    - projects.id = projects_categories.project_id
    - projects_categories.category_id = categories.id
        Un projet peut avoir plusieurs catégories.
    - pictures.project_id = projects.id
        Plusieurs pictures peuvent être liées à un même project_id.