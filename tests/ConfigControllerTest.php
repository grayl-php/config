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
                               ->newConfigControllerFromFile( 'test/config.file.test.php' );

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


      /**
       * Tests the creation of a valid ConfigController object from an include.
       *
       * @return \StdClass
       * @throws \Exception
       */
      public function testIncludeConfigFile (): \StdClass
      {

         // Create a config controller entity from an include
         /** @var \StdClass $config */
         $config = ConfigPorter::getInstance()
                               ->includeConfigFile( 'test/config.include.test.php' );

         // Check the type of object created
         $this->assertInstanceOf( \StdClass::class,
                                  $config );

         // Return it
         return $config;
      }


      /**
       * Tests the data in a ConfigController from an include.
       *
       * @param \StdClass $config An included \StdClass to test.
       *
       * @depends testIncludeConfigFile
       */
      public function testDataFromIncludeConfigFile ( \StdClass $config ): void
      {

         // Test a config value
         $this->assertTrue( $config->is_included );

         // Test a second config
         $this->assertNotEmpty( $config->string );
         $this->assertIsString( $config->string );
         $this->assertEquals( 'hello',
                              $config->string );
      }

   }