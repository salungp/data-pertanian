<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Model
{
  public $open_tag;

  public function alert($status, $msg)
  {
    switch ($status) {
      case 'success':
        $icon = 'check';
        break;

      case 'danger':
        $icon = 'ban';
        break;
    }
    $open = '<div class="alert alert-'.$status.' alert-dismissible">';
    $addition = '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-'.$icon.'"></i> '.ucfirst($status).'!</h4>';
    $close = '</div>';
    $template = $this->build($open, $addition.$msg, $close);
  }

  public function build($tag_open, $value, $tag_close)
  {
    $msg = $tag_open.$value.$tag_close;
    $this->session->set_flashdata('message', $msg);
  }
}
