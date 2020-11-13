<?php

   namespace Grayl\Config;

   use Grayl\Config\Controller\ConfigController;
   use Grayl\Config\Entity\ConfigData;
   use Grayl\File\FilePorter;
   use Grayl\Mixin\Common\Traits\StaticTrait;

   /**
    * Front-end for the Config package.
    *
    * @package Grayl\Config
    */
   class ConfigPorter
   {

      // Use the static instance trait
      use StaticTrait;

      /**
       * The directory path where config files are stored.
       *
       * @var string
       */
      private string $config_dir;


      /**
       * The class constructor.
       */
      public function __construct ()
      {

         // Set the config directory path
         $this->config_dir = dirname( $_SERVER[ 'DOCUMENT_ROOT' ] ) . '/config/';
      }


      /**
       * Creates an empty ConfigController.
       *
       * @param string $id A unique ID for this config set
       *
       * @return ConfigController
       */
      public function newConfigController ( string $id ): ConfigController
      {

         // Return the controller
         return new ConfigController( new ConfigData( $id ) );
      }


      /**
       * Creates a ConfigController from a file.
       *
       * @param string $file The name of the file to load from the config directory
       *
       * @return ConfigController
       * @throws \Exception
       */
      public function newConfigControllerFromFile ( string $file ): ConfigController
      {

         // Get a new FileController for this config file
         $config_file = FilePorter::getInstance()
                                  ->newFileController( $this->config_dir . $file );

         // Request the controller
         $controller = $this->newConfigController( $config_file->getFilename() );

         // Import the file contents into the config itself
         $controller->setConfigs( $config_file->getIncludedFile() );

         // Return the controller
         return $controller;
      }


      /**
       * Returns the included contents of a config file
       *
       * @param string $file The name of the file to load from the config directory
       *
       * @return object
       * @throws \Exception
       */
      public function includeConfigFile ( string $file ): object
      {

         // Get a new FileController for this config file
         $config_file = FilePorter::getInstance()
                                  ->newFileController( $this->config_dir . $file );

         // Return the included file
         return $config_file->getIncludedFile();
      }


      /**
       * Returns the current path of the config directory
       *
       * @return string
       */
      public function getConfigFolderDir (): string
      {

         // Return the config directory path
         return $this->config_dir;
      }

   }