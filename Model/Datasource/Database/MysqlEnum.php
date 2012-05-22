<?php
App::uses('DboSource', 'Model/Datasource');
App::uses('Mysql', 'Model/Datasource/Database');

class MysqlEnum extends Mysql
{
    public function __construct($config = null, $autoConnect = true) {
        $this->columns['enum'] = array('name' => 'enum');
        parent::__construct($config, $autoConnect);
    }

    public function describe($model) {
        $fields = parent::describe($model);
        foreach ($fields as $name => $column) {
            if (preg_match('/^enum\((.+)\)/', $column['type'], $m)) {
                $column['type'] = 'enum';
                $column['length'] = preg_replace('/\'/','"',$m[1]);
                $fields[$name] = $column;
            }
        }
        return $fields;
    }
}
