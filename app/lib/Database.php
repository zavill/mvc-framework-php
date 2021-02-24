<?php


namespace app\lib;

use app\core\Config;

/**
 * Class Database
 *
 * @package app\lib
 */
class Database
{
    /**
     * @var PDO
     */
    protected $db;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $this->db = new \PDO(
            'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME,
            Config::DB_USER,
            Config::DB_PASSWORD
        );
    }

    /**
     * Запрос SQL
     *
     * @param $sql
     * @param array $params
     * @return array
     */
    public function query($sql, $params = []): array
    {
        $preparedQuery = $this->db->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $paramK => $paramV) {
                $preparedQuery->bindValue(':' . $paramK, $paramV);
            }
        }
        $preparedQuery->execute();
        return $preparedQuery->fetchAll(\PDO::FETCH_ASSOC);
    }
}
