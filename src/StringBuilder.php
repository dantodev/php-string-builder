<?php namespace Dtkahl\StringBuilder;

class StringBuilder
{

  private $_start = '';
  private $_end = '';
  private $_string = '';

  /**
   * StringBuilder constructor.
   * @param string $start
   * @param string $end
   */
  public function __construct($start = '', $end = '')
  {
    $this->_start = (string) $start;
    $this->_end = (string) $end;
  }

  /**
   * @param $part
   * @param array $data
   */
  public function append($part, array $data = [])
  {
    $this->_string = $this->_string . (empty($data) ? (string) $part : $this->_template((string) $part, $data));
  }

  /**
   * @param $part
   * @param array $data
   */
  public function prepend($part, array $data = [])
  {
    $this->_string = (empty($data) ? (string) $part : $this->_template((string) $part, $data)) . $this->_string;
  }

  /**
   * @param $string
   * @param array $data
   * @return mixed
   */
  private function _template($string, array $data)
  {
    return call_user_func_array('sprintf', array_merge([$string], $data));
  }

  /**
   * @param $start
   */
  public function startWith($start)
  {
    $this->_start = (string) $start;
  }

  /**
   * @param $end
   */
  public function endWith($end)
  {
    $this->_end = (string) $end;
  }

  /**
   * @return string
   */
  public function build()
  {
    return $this->_start . $this->_string . $this->_end;
  }

  /**
   * @return string
   */
  public function __toString()
  {
    return $this->build();
  }

}