
# Enum Enabled MySQL datasource for CakePHP

## インストール
    cd app/Plugin
    git clone git://github.com/izumiya/cakephp-mysqlenum.git MysqlEnum

## サンプルコード
#### app/Config/database.php


    <?php
	class DATABASE_CONFIG {
	public $default = array(
		'datasource' => 'MysqlEnum.Database/MysqlEnum',
		'host' => 'localhost',
		'login' => 'user',
		'password' => 'password',
		'database' => 'mysqlenum',
		'prefix' => '',
	);
    }


#### app/Config/bootstrap.php

	<?php
        CakePlugin::load('MysqlEnum');

### 実行例

    mysql> create database mysqlenum default character set utf8;
    Query OK, 1 row affected (0.01 sec)
    mysql> use mysqlenum
    Database changed
    mysql> create table enums (`id` int auto_increment, mysqlenum enum('hoge','foo','bar'), primary key (`id`) );
    Query OK, 0 rows affected (0.01 sec)

    $ Console/cake bake model enums
    Welcome to CakePHP v2.1.2 Console
    ---------------------------------------------------------------
    App : app
    Path: app/
    ---------------------------------------------------------------

    Baking model class for Enum...

    Creating file app/Model/Enum.php
    Wrote `app/Model/Enum.php`

    Baking test fixture for Enum...

    Creating file app/Test/Fixture/EnumFixture.php
    Wrote `app/Test/Fixture/EnumFixture.php`
    Bake is detecting possible fixtures...

    Baking test case for Enum Model ...

    Creating file app/Test/Case/Model/EnumTest.php
    Wrote `app/Test/Case/Model/EnumTest.php`


### 作成されるFixtureのサンプル

    <?php
    /**
     * EnumFixture
     *
     */
    class EnumFixture extends CakeTestFixture {

    /**
     * Fields
     *
     * @var array
     */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'mysqlenum' => array('type' => 'enum', 'null' => true, 'default' => NULL, 'length' => '"hoge","foo","bar"', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);
    }
