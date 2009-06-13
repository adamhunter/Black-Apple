<?php 

if (!empty($_SERVER['SCRIPT_FILENAME']) && 'renderer.php' == basename($_SERVER['SCRIPT_FILENAME'])) :
  die('Please do not load this page directly. Thanks!');
endif;

/* rendering system */

class Renderer
{
  
  function __construct()
  {
    $this->start_capture();
    register_shutdown_function(array($this, 'render_layout'));
  }
  
  /* used in view helper */
  function content_for($key, $content)
	{
		$this->$key = $content;
	}
	
	/* used in view helper */
	function render_partial($partial)
	{
	  require THEME_PATH . '/_' . $partial . '.php';
	}
	
	function render_layout($layout = 'layout')
	{
	  $this->end_capture();
	  require THEME_PATH . '/' . $layout . '.php';
	}
	
	function yield($key = 'yield', $echo=true)
  {
    if ($echo) { echo $this->$key; }
    return $this->$key;
  }
  
  function start_capture()
  {
    ob_start();
    $this->yield = '';
  }
  
  function end_capture()
  {
    $this->yield = ob_get_clean();
  }
  
	/* php4 compatability */
	function Renderer()
	{
	  $this->__construct();
	}
  
}

/* view helpers */
function content_for($key, $content)
{
  global $r;
  return $r->content_for($key, $content);
}

function render_partial($partial)
{
  global $r;
  return $r->render_partial($partial);
}

function link_to($anchor, $path, $options=array(), $out=true)
{
  if (empty($options['href'])) { $options['href'] = $path; }
  return content_tag('a', $anchor, $options, $out);
}

function content_tag($tag, $content, $options=array(), $out=true)
{
  foreach ($options as $k => $v) { $attrs .= $k.'="'.wp_specialchars($v).'"'; }
  if (!empty($attrs)) { $attrs = " $attrs"; }
  $tag = "<$tag$attrs>$content</$tag>";
  if ($out) { echo $tag; }
  return $tag;
}

function renderer()
{

}