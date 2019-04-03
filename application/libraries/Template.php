<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Library Class
 *
 * @category	Library
 * @Developer	Gaurav Deshpande
 * 
 * This class is designed and develop to include the common things
 * like header footer automatically.
 * It is required to load "url" Helper ( of codeigniter ) 
 * in order to use this class and its methods
 *
**/

class Template
{
	public $title = '';
	public $meta_keywords = '';
	public $meta_description = '';
	public $theme = '';
	public $layout = '';
	
	private $theme_url;
	private $content;	
	
	public $breadcrumbs;
	public $page_title;
	public $page_sub_title;
	
	private $contentBuffer = array();
	private $contentBufferPos;
	
	var $ci;
	
	function __construct()
	{
		$this->ci =& get_instance();
	}
	
	function load($view, $data = null, $string = false)
	{



		if ( ! is_null( $view ) )
		{
			//if (file_exists( APPPATH.'views/'.$view) || file_exists( APPPATH.'views/'.$view.'.php'))
			{				
				if($this->title != '')
					$this->title = $this->title;
				else
					$this->title = TITLE;
		
		//	--	Initialize theme url
				$this->theme_url();
				
		//	--	View to be load	as a content for layout
				$data = $this->content_data($data);
				$this->content = $this->ci->load->view($view, $data, TRUE);			
			
				
		//	--  load layout as a content for theme
				$data = $this->content_data($data);
				$this->content = $this->ci->load->view('themes/'.$this->theme.'/'. $this->layout , $data, TRUE); 
		
		//	--  load theme as a view
				$data = $this->pageData($data);

				if(!$string)
					$this->ci->load->view('themes/'.$this->theme.'/index', $data);					
				else
					return $this->ci->load->view('themes/'.$this->theme.'/index', $data, TRUE);
			}
			/* else
			{
				show_error('Unable to load the requested file: ' . $view.'.php');
			} */
		}
	}

	function content_data($data)
	{
		if ( is_null($data) ){
			$data = array(
						'theme_view' => 'themes/'.$this->theme,
						'theme_url' => $this->theme_url,
						'content' => $this->content,
						'breadcrumbs' => $this->breadcrumbs,
						'page_title' => $this->page_title,
						'page_sub_title' => $this->page_sub_title
					);
		}
		else if ( is_array($data) ){
			$data['theme_view'] = 'themes/'.$this->theme;
			$data['theme_url'] = $this->theme_url;
			$data['content'] = $this->content;
			$data['page_title'] = $this->page_title;
			$data['page_sub_title'] = $this->page_sub_title;
		}
		else if ( is_object($data) ){
			$data->theme_view = 'themes/'.$this->theme;
			$data->theme_url = $this->theme_url;
			$data->content = $this->content;
			$data->page_title = $this->page_title;
			$data->page_sub_title = $this->page_sub_title;
		}
		return $data;
	}
	
	function pageData($data = null)
	{
		if ( is_null($data) ){
			$data = array(
				'title' => $this->title,
				'meta_keywords' => $this->meta_keywords,
				'meta_description' => $this->meta_description,
				'content' => $this->content,
				'content_buffer' => $this->contentBuffer,
			);
		}
		else if ( is_array($data) ){
			$data['title'] = $this->title;
			$data['meta_keywords'] = $this->meta_keywords;
			$data['meta_description'] = $this->meta_description;
			$data['theme_url'] = $this->theme_url;
			$data['content'] = $this->content;
			$data['content_buffer'] = $this->contentBuffer;
		}
		else if ( is_object($data) )
		{
			$data->title = $this->title;
			$data->meta_keywords = $this->meta_keywords;
			$data->meta_description = $this->meta_description;
			$data->theme_url = $this->theme_url;
			$data->content = $this->content;
			$data->content_buffer = $this->contentBuffer;
		}
		return $data;
	}
	
	public function theme_url()
	{
		return $this->theme_url = base_url()."themes/".$this->theme;
	}
	
	public function contentBegin($pos)
	{
		$this->contentBufferPos = $pos;
		ob_start();
	}
	
	public function contentEnd()
	{
		$js = ob_get_contents();
		$pos = $this->contentBufferPos;
		$this->contentBuffer[$pos][] = $js;
		//ob_end_flush();
		ob_end_clean ();
	}
}