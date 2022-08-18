<?php

namespace SageCloud\SageCloud\SageCloud\Core;

class SageCloudConfigManager
{
    /**
     * Configuration Options
     *
     * @var array
     */
    private array $configs = [];

    /**
     * Singleton Object
     *
     * @var self
     */
    private static SageCloudConfigManager $instance;

    /**
     * Private Constructor
     */
    private function __construct()
    {
        if (defined('PP_CONFIG_PATH')) {
            $configFile = constant('PP_CONFIG_PATH') . '/sdk_config.ini';
        } else {
            $configFile = implode(DIRECTORY_SEPARATOR,
                array(dirname(__FILE__), "..", "config", "sdk_config.ini"));
        }
        if (file_exists($configFile)) {
            $this->addConfigFromIni($configFile);
        }
    }

    /**
     * Returns the singleton object
     *
     * @return $this
     */
    public static function getInstance(): static
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Add Configuration from configuration.ini files
     *
     * @param string $fileName
     * @return $this
     */
    public function addConfigFromIni(string $fileName): static
    {
        if ($configs = parse_ini_file($fileName)) {
            $this->addConfigs($configs);
        }
        return $this;
    }

    /**
     * If a configuration exists in both arrays,
     * then the element from the first array will be used and
     * the matching key's element from the second array will be ignored.
     *
     * @param array $configs
     * @return $this
     */
    public function addConfigs(array $configs = array()): static
    {
        $this->configs = $configs + $this->configs;
        return $this;
    }

    /**
     * Simple getter for configuration params
     * If an exact match for key is not found,
     * does a "contains" search on the key
     *
     * @param string $searchKey
     * @return array
     */
    public function get( string $searchKey): array
    {
        if (array_key_exists($searchKey, $this->configs)) {
            return $this->configs[$searchKey];
        } else {
            $arr = array();
            if ($searchKey !== '') {
                foreach ($this->configs as $k => $v) {
                    if (strstr($k, $searchKey)) {
                        $arr[$k] = $v;
                    }
                }
            }

            return $arr;
        }
    }

    /**
     * Utility method for handling account configuration
     * return config key corresponding to the API userId passed in
     *
     * If $userId is null, returns config keys corresponding to
     * all configured accounts
     *
     * @param string|null $userId
     * @return array|string
     */
    public function getIniPrefix(string $userId = null): array|string
    {
        if ($userId == null) {
            $arr = array();
            foreach ($this->configs as $key => $value) {
                $pos = strpos($key, '.');
                if (str_contains($key, "acct")) {
                    $arr[] = substr($key, 0, $pos);
                }
            }
            return array_unique($arr);
        } else {
            $iniPrefix = array_search($userId, $this->configs);
            $pos = strpos($iniPrefix, '.');
            return substr($iniPrefix, 0, $pos);
        }
    }

    /**
     * returns the config file hashmap
     */
    public function getConfigHashmap(): array
    {
        return $this->configs;
    }

    /**
     * Disabling __clone call
     */
    public function __clone()
    {
        trigger_error('Clone is not allowed.', E_USER_ERROR);
    }
}