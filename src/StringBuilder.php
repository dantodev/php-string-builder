<?php namespace Dtkahl\StringBuilder;

class StringBuilder
{

  private $_start = '';
  private $_end = '';
  private $_string = '';

  public function __construct($start = '', $end = '')
  {
    $this->_start = (string) $start;
    $this->_end = (string) $end;
  }

  public function append($part, array $data = [])
  {
    $this->_string = $this->_string . (empty($data) ? (string) $part : $this->_template((string) $part, $data));
  }

  public function prepend($part, array $data = [])
  {
    $this->_string = (empty($data) ? (string) $part : $this->_template((string) $part, $data)) . $this->_string;
  }

  private function _template($string, array $data)
  {
    return call_user_func_array('sprintf', array_merge([$string], $data));
  }

  public function startWith($start)
  {
    $this->_start = $start;
  }

  public function endWith($end)
  {
    $this->_end = $end;
  }

  public function build()
  {
    return $this->_start . $this->_string . $this->_end;
  }

  public function __toString()
  {
    return $this->build();
  }

}