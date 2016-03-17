<?php namespace Dtkahl\StringBuilder;

class StringBuilderTest extends \PHPUnit_Framework_TestCase
{
  private $_sb;

  protected function setUp()
  {
    $this->_sb = new StringBuilder();
  }

  public function testStringBuilder()
  {
    $this->assertEquals(get_class($this->_sb), StringBuilder::class);
  }

}