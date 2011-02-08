<?php
/**
 * ReklamWidget - helps to get the ads from my
 * home brewed AD server
 **/
class ReklamWidget extends CWidget
{
    /**
     * the domain we are getting the ads for
     */
    public $domain = 'mehesz.net';

    /**
     *
     */
    public $default_img =
        'http://upload.wikimedia.org/wikipedia/commons/b/b0/Qxz-ad39.png';

    /**
     *
     */
    public $default_link = 'http://en.wikipedia.org/wiki/Web_banner';

    /**
     *
     */
    public $default_title = 'The Free Encyclopedia';

    /**
     *
     */
    public function run()
    {
        // code...
        $reklam_link    = 'http://reklam.mehesz.net/?/getreklam/'
            . $this->domain;
        $ch              = curl_init();
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch, CURLOPT_URL, $reklam_link );

        $ad_here = false;

        $result = curl_exec( $ch );
        curl_close( $ch );

        $json = json_decode( $result );
        //$json = json_decode( '{"status":"success","item_count":0}' );

        if( isset( $json->status ) )
        {
            if( $json->status == 'success' && $json->item_count > 0 )
            {
                $items = $json->results;
                if( $json->item_count == 1 )
                {
                    $ad_here = true;
                    $ad = $items[0];
                    $img = CHtml::image( $ad->image );
                    echo CHtml::link( $img, $ad->link, array(
                                'title' => $ad->title, 'target' => '_blank' ) );
                }
                else
                {
                    // TODO write the one with multiple ads
                }
            }
        }

        if( ! $ad_here )
        {
            $img = CHtml::image( $this->default_img );
            echo CHtml::link( $img, $this->default_link, array(
                        'title' => $this->default_title, 'target' => '_blank' ) );
        }
    }
}
