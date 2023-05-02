<?php
use PHPUnit\Framework\TestCase;
require_once './DB/Database.class.php';
require_once './class/User.class.php';

class UserTest extends TestCase
{
    public function testDBConn()
    {
        require'./DB/dbConn.php';
        $user = new User;
        $userInsert = $user->insert('Cloe');
        $this->assertIsBool($userInsert);
    }
}