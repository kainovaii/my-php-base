<?php
namespace tests;

use Core\Http\Security\Permission;
use PHPUnit\Framework\TestCase;
use tests\helpers\AuthorVoter;
use tests\helpers\TestPost;
use tests\helpers\TestUser;
use tests\helpers\VoterAlwaysFalse;
use tests\helpers\VoterAlwaysTrue;
use tests\helpers\VoterRole;

class VoterTest extends TestCase
{
    public function testVoterEmpty()
    {
        $permission = new Permission();
        $user = new TestUser();

        $this->assertFalse($permission->can($user, 'test'));
    }

    public function testVoterAlwaysTrue()
    {
        $permission = new Permission();
        $user = new TestUser();

        $permission->addVoter(new VoterAlwaysTrue());

        $this->assertTrue($permission->can($user, 'test'));
    }

    public function testVoterAsRole()
    {
        $permission = new Permission();
        $user = new TestUser();

        $permission->addVoter(new VoterRole());

        $this->assertTrue($permission->can($user, 'test'));
    }

    public function testVoterMultiVoters()
    {
        $permission = new Permission();
        $user = new TestUser();

        $permission->addVoter(new VoterRole());
        $permission->addVoter(new VoterAlwaysTrue());
        $permission->addVoter(new VoterAlwaysFalse());
        $permission->addVoter(new VoterAlwaysFalse());

        $this->assertTrue($permission->can($user, 'test'));
    }

    public function testWithConditionVoter()
    {
        $permission = new Permission();
        $user = new TestUser();
        $post = new TestPost($user);

        $permission->addVoter(new AuthorVoter());

        $this->assertTrue($permission->can($user, AuthorVoter::EDIT, $post));
    }
}