<?php
if (!defined('CIVI_SETUP')) {
  exit("Installation plugins must only be loaded by the installer.\n");
}

\Civi\Setup::dispatcher()
  ->addListener('civi.setup.runController', function (\Civi\Setup\Event\RunControllerEvent $e) {
    \Civi\Setup::log()->info(sprintf('[%s] Register blocks', basename(__FILE__)));

    /**
     * @var \Civi\Setup\SetupController $ctrl
     */
    $ctrl = $e->getCtrl();

    $ctrl->blocks['cvs-l10n'] = array(
      'is_active' => TRUE,
      'file' => __DIR__ . DIRECTORY_SEPARATOR . 'l10n.tpl.php',
      'class' => 'if-no-errors',
      'weight' => 30,
    );
  }, \Civi\Setup::PRIORITY_PREPARE);