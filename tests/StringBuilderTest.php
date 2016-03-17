<?php namespace Dtkahl\StringBuilder;

class StringBuilderTest extends \PHPUnit_Framework_TestCase
{

  public function testConstructToString()
  {
    $sb = new StringBuilder('a1', 'a2');
    $this->assertEquals($sb->__toString(), 'a1a2');
  }

  public function testAppend()
  {
    $sb = new StringBuilder();
    $sb->append('a1');
    $sb->append('a2');
    $this->assertEquals($sb->build(), 'a1a2');
  }

  public function testPrepend()
  {
    $sb = new StringBuilder();
    $sb->append('a1');
    $sb->prepend('a2');
    $this->assertEquals($sb->build(), 'a2a1');
  }

  public function testStartWithEndWith()
  {
    $sb = new StringBuilder();
    $sb->startWith('a1');
    $sb->endWith('a2');
    $this->assertEquals($sb->build(), 'a1a2');
  }

  public function testAppendTemplateString()
  {
    $sb = new StringBuilder();
    $sb->append('a1');
    $sb->append('a2%s', ['a3']);
    $this->assertEquals($sb->build(), 'a1a2a3');
  }

  public function testPrependTemplateString()
  {
    $sb = new StringBuilder();
    $sb->append('a1');
    $sb->prepend('a2%s', ['a3']);
    $this->assertEquals($sb->build(), 'a2a3a1');
  }

  public function testFail()
  {
    $this->assertFalse(true);
  }

}