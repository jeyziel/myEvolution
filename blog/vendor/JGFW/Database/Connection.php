<?php 

namespace JGFW\Database;

class Connection
{

    public function open()
    {
        if (file_exists("../App/Config/blog.ini"))
        {
            $db = parse_ini_file("../App/Config/blog.ini");
        }
    }
}