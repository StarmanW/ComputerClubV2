<?php
/**
 * User: StarmanW
 * Date: 15-Jan-18
 * Time: 9:25 PM
 */
require $_SERVER['DOCUMENT_ROOT'] . '/ComputerClubV2/vendor/autoload.php';
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class DB {

    //Data fields
    const paths = array("C:/xampp/htdocs/ComputerClubV2/application/includes/entity/");
    const isDevMode = true;
    protected $em;

    protected function __construct() {
        try {
            //Get DB config data and perform setup
            $dbConfig = $this->getDBConnData();
            $config = Setup::createAnnotationMetadataConfiguration(DB::paths, DB::isDevMode, null, null, false);

            //Get Entity Manager instance
            $this->em = EntityManager::create($dbConfig, $config);
        } catch (Exception $e) {

        }
    }

    //Method to read DB connection data from file
    private function getDBConnData() {
        //Read data from config file
        $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/ComputerClubV2/config.ini');

        //Return the DB config data
        return $dbParams = array(
            'driver' => 'pdo_mysql',
            'user' => $config['DBUSER'],
            'password' => $config['DBPASS'],
            'dbname' => $config['DBNAME']
        );
    }

    //Method to get Entity Manager
    protected function getEntityManager() {
        return $this->em;
    }
}