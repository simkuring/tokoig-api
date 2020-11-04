<?php declare(strict_types=1);

namespace Tokoig\Test;

use PHPUnit\Framework\TestCase;
use Tokoig\User;

class UserTest extends TestCase {
    
    public function testGetAllUsers() : void
    {
        $users = new User();
        $result = $users->all();
        $this->assertIsArray($result);
    }
     
    public function testGetUser() : void
    {
        $users = new User();
        $result = $users->get(1);
        $this->assertIsArray($result);
    }
    
    public function testGetNonExistUser() : void
    {
        $users = new User();
        $result = $users->get(99999);
        $this->assertFalse($result);
    }
}