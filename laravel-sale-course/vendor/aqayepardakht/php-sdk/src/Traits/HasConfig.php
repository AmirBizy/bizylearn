<?php namespace Aqayepardakht\PhpSdk\Traits;

trait HasConfig {
    /**
     * Payment Configuration.
     *
     * @var array
    */
    protected $config;

    /**
     * Configuration Path
     * 
     * @var string
     */
    protected $configPath;

    protected function getConfigs($config = []) : array {
        $defaultConfig = require($this->getConfigPath());

        if (!empty($config)) {
            $defaultConfig = array_merge($defaultConfig, $config); 
        }

        return $defaultConfig;
    }

    public function getConfigPath() : string {
        if (!$this->configPath) return dirname(__DIR__).'/Configs/payment.php';
        
        return $this->configPath;
    }

    public function setConfigPath($path) : string {
        return $this->configPath = $path;
    }
}