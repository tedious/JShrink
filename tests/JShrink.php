<?php

class JSIterator implements Iterator {
  private $data = array();
  private $key = 0;
  private $test_files = array();

  public function __construct($directory, $expectFiles = TRUE) {
    $root_dir = realpath('tests/'.$directory);
    $test_dir = $root_dir.'/test/';
    if($expectFiles) {
      $expect_dir = $root_dir.'/expect/';
    }

    $test_contents = scandir($test_dir);
    foreach($test_contents as $possible_file) {
      $test_file = $test_dir.$possible_file;
      if($expectFiles) {
        $expect_file = $expect_dir.$possible_file;
        if(is_file($test_file) && is_file($expect_file)) {
          $this->test_files[] = array($test_file, $expect_file);
        }
      } else {
        if(is_file($test_file)) {
          $this->test_files[] = array($test_file);
        }
      }
    }
  }

  public function current() {
    $ret = array();
    foreach($this->test_files[$this->key] as $file) {
      $ret[] = file_get_contents($file);
    }
    return $ret;
  }

  public function key() {
    return $this->key;
  }

  public function rewind() {
    reset($this->test_files);
    $this->data = array();
    $this->key = 0;
  }

  public function valid() {
    return $this->key < count($this->test_files);
  }

  public function next() {
    ++$this->key;
  }
}

class JShrinkTest extends PHPUnit_Framework_TestCase {
  /**
   * @dataProvider JShrinkProvider
   */
  public function testJShrink($unminified, $minified) {
    require_once('src/JShrink/Minifier.php');
    $this->assertEquals(JShrink\Minifier::minify($unminified), $minified);
  }

  public function JShrinkProvider() {
    return new JSIterator('minify/jshrink');
  }
  
  /**
   * @dataProvider uglifyProvider
   */
  public function testUglify($unminified, $minified) {
    require_once('src/JShrink/Minifier.php');
    $this->assertEquals(JShrink\Minifier::minify($unminified), $minified);
  }

  public function uglifyProvider() {
    return new JSIterator('minify/uglify');
  }
}
