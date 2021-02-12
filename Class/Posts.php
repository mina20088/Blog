<?php
class Posts
{
    protected int $Id;
    protected string $Title;
    protected string $Seo_Title;
    protected string $Content;
    protected string $Author;
    protected string $Post_Date;
    protected mysqli $DatabaseConnection;

    public function __construct(Database $Connection)
    {
        $this->DatabaseConnection = $Connection->getConnection();
        if(!$Connection->CheckConnection())
        {
            echo $Connection->ConnectionError();
        }
    }

    public function GetAllPosts():array
    {
        $ResultArray = [];
        if($query = $this->DatabaseConnection->query('select * from posts'))
        {
            while ($Result = $query->fetch_assoc())
            {
                $this->Id = $Result['id'];
                $this->Title = $Result['title'];
                $this->Seo_Title = $Result['seo_title'];
                $this->Content = $Result['content'];
                $this->Author = $Result['author'];
                $this->Post_Date = $Result['postDate'];
                array_push
                ($ResultArray,
                    [
                        "id"=>$this->Id,
                        "Title"=>$this->Title,
                        "Seo_Title"=>$this->Seo_Title,
                        "Content"=>$this->Content,
                        "Author"=>$this->Author,
                        "Post_Data"=>$this->Post_Date
                    ]
                );
            }
        }
        return $ResultArray;
    }

    public function insertPost(string $types,string $Title,string $Seo_Title,string $Content,string $Author,array $Category): int
    {
        if($PostInsert = $this->DatabaseConnection->prepare('insert into posts (title, seo_title, content, author) values (?,?,?,?)'))
        {
            if($PostInsert ->bind_param($types,$Title,$Seo_Title,$Content,$Author))
            {
                if($PostInsert->execute())
                {
                    $this->Id = $PostInsert->insert_id;
                    for ($i = 0; $i < count($Category); $i++)
                    {
                        if($HasCategoryInsert = $this->DatabaseConnection->prepare('insert into has_category (category, posts) values(?,?)'))
                        {

                            if($HasCategoryInsert->bind_param("ii",$Category[$i],$this->Id))
                            {
                                if($HasCategoryInsert->execute())
                                {
                                     $PostInsert->insert_id;
                                }
                            }
                        }
                    }
                }
            }

        }
        return $this->Id;
    }


}