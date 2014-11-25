<?php namespace Pixie\ConnectionAdapters;

class Oracle extends BaseAdapter
{
    /**
     * @param $config
     *
     * @return mixed
     */
    public function connect($config)
    {
        $connectionString = "oci:dbname={$config['database']}";

        if (isset($config['charset'])) {
            $connectionString .= ";charset={$config['charset']}";
        }

        $connection = $this->container->build(
            '\PDO',
            array($connectionString, $config['username'], $config['password'])
        );

        return $connection;
    }
}