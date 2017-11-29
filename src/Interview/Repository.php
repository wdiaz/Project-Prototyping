<?php

namespace App\Interview;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Configuration;

/** This is Placeholder ......
 * Class Repository
 * @package App\Interview
 */
class Repository implements RepositoryInterface
{

    public function __construct()
    {

    }

    /**
     * Never NEVER do this
     * @return array
     */
    public static function all() : array
    {
        $config = new Configuration();
        $connectionParams = array(
            'dbname'    => 'test',
            'user'      => 'root',
            'password'  => 'root',
            'host'      => 'localhost',
            'driver'    => 'pdo_mysql',
        );
        $conn = DriverManager::getConnection($connectionParams, $config);
        $qb = $conn->createQueryBuilder();
        $qb->select('title', 'date')
            ->from('events');
        return $qb->execute()->fetchAll();
    }

    public function byDate($start, $end)
    {
       // similar to above
    }
}