<?php

   namespace Grayl\Config\Entity;

   use Grayl\Mixin\Common\Entity\KeyedDataBag;

   /**
    * Class ConfigData.
    * The entity of an individual ConfigData.
    *
    * @package Grayl\Config
    */
   class ConfigData
   {

      /**
       * A unique ID for this config set.
       *
       * @var string
       */
      private string $id;

      /**
       * A KeyedDataBag that holds the configs.
       *
       * @var KeyedDataBag
       */
      private KeyedDataBag $configs;


      /**
       * The class constructor.
       *
       * @param string $id A unique ID for this config set.
       */
      public function __construct ( string $id )
      {

         // Set the class data
         $this->setID( $id );

         // Create the KeyedDataBag
         $this->configs = new KeyedDataBag();
      }


      /**
       * Gets the ID.
       *
       * @return string
       */
      public function getID (): string
      {

         // Return the ID
         return $this->id;
      }


      /**
       * Sets the ID.
       *
       * @param string $id A unique ID for this config set.
       */
      public function setID ( string $id ): void
      {

         // Set the ID
         $this->id = $id;
      }


      /**
       * Retrieves the value of a stored config.
       *
       * @param string $key The key name for the config.
       *
       * @return mixed
       */
      public function getConfig ( string $key )
      {

         // Return the config value
         return $this->configs->getVariable( $key );
      }


      /**
       * Retrieves the entire array of configs.
       *
       * @return array
       */
      public function getConfigs (): array
      {

         // Return all configs
         return $this->configs->getVariables();
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
         $this->configs->setVariable( $key,
                                      $value );
      }


      /**
       * Sets multiple configs using a passed array.
       *
       * @param array $configs The associative array of configs to set ( key => value )
       */
      public function setConfigs ( array $configs ): void
      {

         // Set the configs
         $this->configs->setVariables( $configs );
      }

   }