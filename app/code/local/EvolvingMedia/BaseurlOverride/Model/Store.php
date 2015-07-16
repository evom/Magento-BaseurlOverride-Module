<?php
/**
 * This module allows for using remote database with a local Magento installation.
 * Since the baseurl/secureurl config is stored in DB, you normally get redirected
 * when running a local install against remote db.
 * Add this configuration (changing the hostname:port as appropriate into
 * `app/etc/local.xml, within the <global/> section.
 *  ------------------------------------
      <dev_url>
        <url>http://127.0.0.1:8080/</url>
      </dev_url>
 *  ------------------------------------
 *
 * adapted from:
 *  http://jwills.co.uk/2009/03/magento-base-urls-and-devstaging-installations/
 */

class EvolvingMedia_BaseurlOverride_Model_Store extends Mage_Core_Model_Store
{

    public function getBaseUrl($type=self::URL_TYPE_LINK, $secure=null)
    {

        $store_code = $this->getCode();
        $url = parent::getBaseUrl($type, $secure);

        $local_host = Mage::getConfig()->getNode('global/dev_url/url');

        if( $local_host === false ){
          // no override in app/etc/local.xml
          return $url;
        }

        $db_host = parse_url($url, PHP_URL_HOST);
        $local_url = parse_url((string)$local_host);
        $new_host = $local_url['host'] . (isset($local_url['port']) ? ':' . $local_url['port'] : '');

        $url = str_replace('://'.$db_host.'/', '://'.$new_host.'/', $url);

        return $url;
    }

}
