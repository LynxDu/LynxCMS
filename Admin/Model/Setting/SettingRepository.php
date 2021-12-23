<?php
namespace Admin\Model\Setting;

use Engine\Core\Database\Connection;
use Engine\Core\Database\QueryBuilder;
use Engine\Model;

class SettingRepository extends Model
{
    public function getSettings()
    {
        $queryBuilder = new QueryBuilder();
        $db = new Connection();


        $sql = $queryBuilder->select()
            ->from('setting')
            ->orderBy('id', 'ASC')
            ->sql();

        return $db->query($sql);
    }

    /**
     * @param string $keyField
     * @return null|string
     */
    public function getSettingValue($keyField)
    {
        $queryBuilder = new QueryBuilder();
        $db = new Connection();

        $sql = $queryBuilder->select('value')
            ->from('setting')
            ->where('key_field', $keyField)
            ->sql();

        $query = $db->query($sql, $this->queryBuilder->values);

        return isset($query[0]) ? $query[0]->value : null;
    }

    public function update(array $params)
    {
        $queryBuilder = new QueryBuilder();
        $db = new Connection();

        if (!empty($params)) {
            foreach ($params as $key => $value) {
                $sql = $queryBuilder
                    ->update('setting')
                    ->set(['value' => $value])
                    ->where('id', $key)
                    ->sql();



                print_r($sql);
                print_r($queryBuilder->values);



                $db->execute($sql, $queryBuilder->values);
            }
        }
    }
}