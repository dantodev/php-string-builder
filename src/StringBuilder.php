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
   * @return $this
   */
  public function append($part, array $data = [])
  {
    $this->_string = $this->_string . (empty($data) ? (string) $part : self::template((string) $part, $data));
    return $this;
  }

  /**
   * @param $part
   * @param array $data
   * @return $this
   */
  public function prepend($part, array $data = [])
  {
    $this->_string = (empty($data) ? (string) $part : self::template((string) $part, $data)) . $this->_string;
    return $this;
  }

  /**
   * @param $string
   * @param array $data
   * @return mixed
   */
  public static function template($string, array $data)
  {
    return call_user_func_array('sprintf', array_merge([$string], $data));
  }

  /**
   * @param $start
   * @return $this
   */
  public function startWith($start)
  {
    $this->_start = (string) $start;
    return $this;
  }

  /**
   * @param $end
   * @return $this
   */
  public function endWith($end)
  {
    $this->_end = (string) $end;
    return $this;
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

  /**
   * @param string $part
   * @param string $find
   * @param string $replace
   * @return $this
   */
  public function prependReplace($part, $find, $replace)
  {
    return $this->prepend(str_replace((string) $find, (string) $replace, (string)$part));
  }

  /**
   * @param string $part
   * @param string $find
   * @param string $replace
   * @return $this
   */
  public function appendReplace($part, $find, $replace)
  {
    return $this->append(str_replace((string) $find, (string) $replace, (string) $part));
  }

}