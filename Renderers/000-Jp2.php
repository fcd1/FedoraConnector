<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4; */

/**
 * JPEG-2000 renderer.
 *
 * @package     omeka
 * @subpackage  fedoraconnector
 * @author      Scholars' Lab <>
 * @author      David McClure <david.mcclure@virginia.edu>
 * @copyright   2012 The Board and Visitors of the University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html Apache 2 License
 */


class Jp2_Renderer extends FedoraConnector_AbstractRenderer
{

    /**
     * Check of the renderer can handle a given mime type.
     *
     * @param string $mimeType The mimeType.
     *
     * @return boolean True if this can display the datastream.
     */
    function canDisplay($mimeType)
    {
        return ($mimeType == 'image/jp2');
    }

    /**
     * This displays an object.
     *
     * @param Omeka_Record $object The Fedora object record.
     *
     * @return string The display HTML for the datastream.
     */
    function display($object, $params = array())
    {
        return $this->_display($object, $params);
    }

    /**
     * Displays the image.
     *
     * @param Omeka_Record $object The Fedora object record.
     * @param string $size The size to scale the image to.
     *
     * @return string The HTML for the image.
     */
    private function _display($object, $params = array())
    {

        if (empty($params)) {
          $params = array(
            'scale' => '400,0'
          );
        }

        // Get server.
        $server = $object->getServer();

        // Construct image URL.
        $url = "{$server->url}/{$server->getService()}/{$object->pid}"
          . "/methods/djatoka:jp2SDef/getRegion?". http_build_query($params);

        // Construct HTML.
        return "<img class='fedora-renderer' alt='image' src='{$url}' />";

    }

}
