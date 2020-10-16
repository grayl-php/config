<?php

   namespace Grayl\Test\Config;

   use Grayl\Config\ConfigPorter;
   use Grayl\Config\Controller\ConfigController;
   use PHPUnit\Framework\TestCase;

   /**
    * Test class for the Config package.
    *
    * @package Grayl\Config
    */
   class ConfigControllerTest extends TestCase
   {

      /**
       * Tests the creation of a valid ConfigController object from a file.
       *
       * @return ConfigController
       * @throws \Exception
       */
      public function testCreateConfigControllerFromFile (): ConfigController
      {

         // Create a config controller entity from a file
         $config = ConfigPorter::getInstance()
                               ->newConfigControllerFromFile( 'test/config.test.php' );

         // Check the type of object created
         $this->assertInstanceOf( ConfigController::class,
                                  $config );

         // Return it
         return $config;
      }


      /**
       * Tests the data in a ConfigController from a file.
       *
       * @param ConfigController $config A ConfigController to test.
       *
       * @depends testCreateConfigControllerFromFile
       */
      public function testConfigControllerDataFromFile ( ConfigController $config ): void
      {

         // Test a config value
         $this->assertNotEmpty( $config->getConfig( 'string' ) );
         $this->assertIsString( $config->getConfig( 'string' ) );
         $this->assertEquals( 'test',
                              $config->getConfig( 'string' ) );

         // Test a second config
         $this->assertEquals( 10,
                              $config->getConfig( 'int' ) );
      }

   }
