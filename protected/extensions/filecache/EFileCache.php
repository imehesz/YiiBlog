<?php
/**
 * EFileCache class file
 *
 * @author Miles <miles8.com@gmail.com>
 * @copyright Copyright &copy; 2008-2009 Miles
 */

/**
 * EFileCache implements a cache application component by storing cached data in a FileSystem.
 *
 * See {@link CCache} manual for common cache operations that are supported by EFileCache.
 *
 * @author Miles <miles8.com@gmail.com>
 */
class EFileCache extends CCache
{
    /**
     * @var string name of the directory to store cache content. Defaults to '{runtime/filecache}'.
     */
	public $cacheDirectory;
	
	/**
	 * @var string cache file suffix
	 */
	public $cacheFileSuffix = '.bin';
	
	/**
	 * @var boolean whether removes expired data items from the cache should be deleted automatically.
	 */
	public $autoCleanExpiredCache = true;

    /**
	 * Destructor.
	 * removes expired data items from the cache.
	 */
	public function __destruct()
	{
	    if($this->autoCleanExpiredCache)
    		$this->cleanCache(0);
	}
    
    /**
     * Clean cache
     *
     * @param integer 0-Clean expire cache, 1-Clean all cache.
     */
    protected function cleanCache($flag)
    {
        if($handle=opendir($this->cacheDirectory)){
            while (false !== ($item = readdir($handle))){
                if ($item != "." && $item != ".." ){
                    $cacheFile = $this->cacheDirectory . DIRECTORY_SEPARATOR . $item;
                    if (is_file($cacheFile)){
                        if($flag === 0){
                            $expire = filemtime($cacheFile);
                            if($expire > 0 && $expire < time())
                                unlink($cacheFile);
                        }
                        else if($flag === 1){
                            unlink($cacheFile);
                        }
                    }
                }
            }
            closedir($handle);
        }
    }
    
    /**
     * get cache filename by key
     *
     * @param string a unique key identifying the cached value
     * @return string cache file path
     */
    protected function keyToCacheFileName($key)
    {
        return $this->cacheDirectory . DIRECTORY_SEPARATOR . md5($key) . $this->cacheFileSuffix;
    }
    
	/**
	 * Initializes this application component.
	 *
	 * This method is required by the {@link IApplicationComponent} interface.
	 * It ensures the existence of the cache file directory.
	 */
	public function init()
	{
		parent::init();

        if($this->cacheDirectory===null)
			$this->cacheDirectory=Yii::app()->getRuntimePath().DIRECTORY_SEPARATOR.'filecache';
		
		if(!file_exists($this->cacheDirectory)){
		    mkdir($this->cacheDirectory);
		    @chmod($this->cacheDirectory, 0777);
		}
		
		if(!is_dir($this->cacheDirectory) || !is_writable($this->cacheDirectory))
			throw new CException('Unable to create file cache directory. Make sure the directory is writable by the Web server process.');
	}
	
	/**
	 * Retrieves a value from cache with a specified key.
	 * This is the implementation of the method declared in the parent class.
	 * @param string a unique key identifying the cached value
	 * @return string the value stored in cache, false if the value is not in the cache or expired.
	 */
	protected function getValue($key)
	{
		$cacheFile = $this->keyToCacheFileName($key);
		
		if(!file_exists($cacheFile))
	        return false;
		
		try{
		    $expire = filemtime($cacheFile);
		    if($expire == 0 || $expire > time())
		        return unserialize(file_get_contents($cacheFile));
		    else{
		        @unlink($cacheFile);
		        return false;
		    }
		}
		catch (Exception $e){
		    return false;
		}
	}

	/**
	 * Stores a value identified by a key in cache.
	 * This is the implementation of the method declared in the parent class.
	 *
	 * @param string the key identifying the value to be cached
	 * @param string the value to be cached
	 * @param integer the number of seconds in which the cached value will expire. 0 means never expire.
	 * @return boolean true if the value is successfully stored into cache, false otherwise
	 */
	protected function setValue($key,$value,$expire)
	{
		$this->deleteValue($key);
		return $this->addValue($key,$value,$expire);
	}

	/**
	 * Stores a value identified by a key into cache if the cache does not contain this key.
	 * This is the implementation of the method declared in the parent class.
	 *
	 * @param string the key identifying the value to be cached
	 * @param string the value to be cached
	 * @param integer the number of seconds in which the cached value will expire. 0 means never expire.
	 * @return boolean true if the value is successfully stored into cache, false otherwise
	 */
	protected function addValue($key,$value,$expire)
	{
		if($expire>0)
			$expire+=time();
		else
			$expire=0;

		$cacheFile = $this->keyToCacheFileName($key);
		try
		{
		    file_put_contents($cacheFile, serialize($value), LOCK_EX);
		    
		    if(!touch($cacheFile, $expire));
		        return false;
		        
			return true;
		}
		catch(Exception $e)
		{
			return false;
		}
	}

	/**
	 * Deletes a value with the specified key from cache
	 * This is the implementation of the method declared in the parent class.
	 * @param string the key of the value to be deleted
	 * @return boolean if no error happens during deletion
	 */
	protected function deleteValue($key)
	{
		$cacheFile = $this->keyToCacheFileName($key);
		return @unlink($cacheFile);
	}

	/**
	 * Deletes all values from cache.
	 * Be careful of performing this operation if the cache is shared by multiple applications.
	 */
	public function flush()
	{
	    $this->cleanCache(1);
		return true;
	}
}
