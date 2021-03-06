<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * Add server.
 *
 * @package     omeka
 * @subpackage  fedoraconnector
 * @author      Scholars' Lab <>
 * @author      David McClure <david.mcclure@virginia.edu>
 * @copyright   2012 The Board and Visitors of the University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html Apache 2 License
 */
?>

<?php
$title = __('Fedora Connector | Edit Server');
head(array('content_class' => 'fedora', 'title' => $title));
?>

<?php echo $this->partial('servers/_header.php', array(
    'title' => $title,
    'add_button_uri' => 'fedora-connector/servers/add',
    'add_button_text' => __('Add a Server')
)); ?>

<div id="primary">
    <?php echo $form; ?>
</div>

<?php foot(); ?>
