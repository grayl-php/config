<?php

   namespace Grayl\Config\Controller;

   use Grayl\Config\Entity\ConfigData;

   /**
    * Class ConfigController.
    * The controller for working with a single ConfigData entity.
    *
    * @package Grayl\Config
    */
   class ConfigController
   {

      /**
       * The ConfigData instance to work with.
       *
       * @var ConfigData
       */
      private ConfigData $config_data;


      /**
       * The class constructor.
       *
       * @param ConfigData $config_data The ConfigData instance to work with.
       */
      public function __construct ( ConfigData $config_data )
      {

         // Set the class data
         $this->config_data = $config_data;
      }


      /**
       * Returns a single value from the ConfigData entity.
       *
       * @param string $key The name of the config to return.
       *
       * @return mixed
       */
      public function getConfig ( string $key )
      {

         // Return the value
         return $this->config_data->getConfig( $key );
      }


      /**
       * Returns the whole array of values from the ConfigData entity.
       *
       * @return array
       */
      public function getConfigs (): array
      {

         // Return the entire configs array
         return $this->config_data->getConfigs();
      }


      /**
       * Sets a single config.
       *
       * @param string $key   The key name for the config.
       * @param mixed  $value The value of the config.
       */
      public function setConfig ( string $key,
                                  $value ): void
      {

         // Set the config
         $this->config_data->setConfig( $key,
                                        $value );
      }


      /**
       * Sets multiple configs using a passed array.
       *
       * @param array $configs An associative array of configs to set ( key => value )
       */
      public function setConfigs ( array $configs ): void
      {

         // Set the configs
         $this->config_data->setConfigs( $configs );
      }

   }