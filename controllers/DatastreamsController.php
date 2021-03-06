<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4; */

/**
 * Datastreams controller.
 *
 * @package     omeka
 * @subpackage  fedoraconnector
 * @author      Scholars' Lab <>
 * @author      David McClure <david.mcclure@virginia.edu>
 * @copyright   2012 The Board and Visitors of the University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html Apache 2 License
 */

class FedoraConnector_DatastreamsController extends Omeka_Controller_Action
{

    /**
     * Initialize.
     *
     * @return void
     */
    public function init()
    {
        $this->_servers = $this->getTable('FedoraConnectorServer');
    }

    /**
     * ~ AJAX ~
     * Query for datastreams.
     *
     * @return void
     */
    public function queryDatastreamsAction()
    {

        // Supress the default Zend layout-sniffer functionality.
        $this->_helper->viewRenderer->setNoRender(true);
        $this->getResponse()->setHeader('Content-type', 'application/json');

        // Gather server and pid.
        $server = (int) $this->_request->server;
        $pid = $this->_request->pid;

        // Get datastreams.
        $server = $this->_servers->find($server);
        $nodes = $server->getDatastreamNodes($pid);

        // Construct array.
        $datastreams = array();
        foreach ($nodes as $node) {
            $datastreams[] = array(
                'dsid' => $node->getAttribute('dsid'),
                'label' => $node->getAttribute('label')
            );
        }

        echo json_encode($datastreams);

    }

}

/*
 * Local variables:
 * tab-width: 4
 * c-basic-offset: 4
 * c-hanging-comment-ender-p: nil
 * End:
 */

