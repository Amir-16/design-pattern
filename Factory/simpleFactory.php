<?php

class  UserFactory
{
    protected  $userType = [];

    public function __construct()
    {
        $this->userType = [
            'Administrator' =>  Administrator::class,
            'user' =>  Customer::class,
        ];
    }

    public function make($userType)
    {
        if (!array_key_exists($userType, $this->userType)) {
            throw new \Exception('Invalid user type');
        }

        return new $this->userType[$userType];
    }
}

interface userInfo
{
    public function name();
    public function actionAccess();
    public function getEmail();
}


class Administrator implements userInfo
{
    public function name()

    {
        return 'Administrator';
    }

    public function actionAccess()
    {
        return  'Admin access';
    }

    public function getEmail()
    {
        return 'admin@example.com';
    }
}

class Customer implements userInfo
{
    public function name()
    {
        return 'Customer';
    }

    public function actionAccess()
    {
        return 'Customer dashboards';
    }

    public function getEmail()
    {
        return 'customer@example.com';
    }
}


$factory = new UserFactory();

$admin = $factory->make('Administrator');

echo $admin->name().PHP_EOL;

echo $admin->actionAccess().PHP_EOL;

echo $admin->getEmail().PHP_EOL;

$user =  $factory->make('user');

echo $user->name().PHP_EOL;

echo $user->actionAccess().PHP_EOL;

echo $user->getEmail().PHP_EOL;

