<?php

class Category
{
    protected int $CategoryID;
    protected string $CategoryName;
    protected string $CategorySeo_title;
    protected array $Categories;
    protected mysqli $DatabaseConnection;


    public function __construct(Database $Connection)
    {
        $this->Categories = [];
        $this->DatabaseConnection = $Connection->getConnection();
        if(!$Connection->CheckConnection()){
            echo $Connection->ConnectionError();
        }
    }
    public function getCategory():array
    {
        if($query = $this->DatabaseConnection->query('select * from category'))
        {
            while ($Result = $query->fetch_assoc())
            {
                $this->CategoryID = $Result['id'];
                $this->CategoryName = $Result['name'];
                $this->CategorySeo_title = $Result['seo_title'];
                array_push($this->Categories,['CategoryID'=>$this->CategoryID,'CategoryName'=>$this->CategoryName,'CategorySeo_title'=>$this->CategorySeo_title]);
            }


        }
        return $this->Categories;
    }
    public function SetCategoryDropdown() : void
    {
            if($query = $this->DatabaseConnection->query('select id,name from category'))
            {
                while($Result = $query->fetch_object()){
                    echo "<option value=$Result->id>$Result->name</option>";
                }
            }
    }
}