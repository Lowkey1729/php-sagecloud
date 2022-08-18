<?php

namespace Capiflex\SageCloud\Cache;

use Capiflex\SageCloud\Core\SageCloudConfigManager;
use Capiflex\SageCloud\Validators\JsonValidator;
use Exception;

abstract class AuthorizationCache
{
    public static string $CACHE_PATH = '/../../../var/sage_auth.cache';

    /**
     * A pull method which would read the persisted data based on clientEmail.
     * If clientEmail is not provided, an array with all the tokens would be passed.
     *
     * @param string|null $config
     * @param string|null $clientEmail
     * @return mixed|null
     */
    public static function pull(string $clientEmail = null, string $config = null): mixed
    {
        $tokens = null;
        $cachePath = self::cachePath($config);
        if (file_exists($cachePath)) {
            // Read from the file
            $cachedToken = file_get_contents($cachePath);
            if ($cachedToken && JsonValidator::validate($cachedToken, true)) {
                $tokens = json_decode($cachedToken, true);
                if ($clientEmail && is_array($tokens) && array_key_exists($clientEmail, $tokens)) {
                    // If client email is found, just send in that data only
                    return $tokens[$clientEmail];
                } elseif ($clientEmail) {
                    // If client email is provided, but no key in persisted data found matching it.
                    return null;
                }
            }
        }
        return $tokens;
    }

    /**
     * Persists the data into a cache file provided in $CACHE_PATH
     *
     * @param string|null $config
     * @param      $clientEmail
     * @param      $accessToken
     * @param      $tokenExpiresIn
     * @throws Exception
     */
    public static function push($clientEmail, $accessToken, $tokenExpiresIn, string $config = null): void
    {

        $cachePath = self::cachePath($config);
        if (!is_dir(dirname($cachePath))) {
            if (!mkdir(dirname($cachePath), 0755, true)) {
                throw new \Exception("Failed to create directory at $cachePath");
            }
        }

        // Reads all the existing persisted data
        $tokens = self::pull();
        $tokens = $tokens ? $tokens : array();
        if (is_array($tokens)) {
            $tokens[$clientEmail] = array(
                'clientEmail' => $clientEmail,
                'accessToken' => $accessToken,
                'expiresAt' => $tokenExpiresIn
            );
        }
        if (!file_put_contents($cachePath, json_encode($tokens))) {
            throw new \Exception("Failed to write cache");
        };
    }

    /**
     * Determines from the Configuration if caching is currently enabled/disabled
     *
     * @param $config
     * @return bool
     */
    public static function isEnabled($config): bool
    {
        $value = self::getConfigValue('cache.enabled', $config);
        return !empty($value) && (((trim($value) == true || trim($value) == 'true')));
    }

    /**
     * Returns the cache file path
     *
     * @param $config
     * @return string
     */
    public static function cachePath($config): string
    {
        $cachePath = self::getConfigValue('cache.FileName', $config);
        return empty($cachePath) ? __DIR__ . self::$CACHE_PATH : $cachePath;
    }

    /**
     * Returns the Value of the key if found in given config, or from PayPal Config Manager
     * Returns null if not found
     *
     * @param $key
     * @param $config
     * @return null|string
     */
    private static function getConfigValue($key, $config): ?string
    {
        $config = ($config && is_array($config)) ? $config : SageCloudConfigManager::getInstance()->getConfigHashmap();
        return (array_key_exists($key, $config)) ? trim($config[$key]) : null;
    }
}