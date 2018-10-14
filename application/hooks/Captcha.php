<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Captcha {
    public function getCaptcha(){
        $CI =& get_instance();
        $CI->load->library('session');
        $CI->load->helper('captcha');

        $vals = array(
                    'img_path' => './assets/frontend/captcha/',
                    //'img_url' => 'http://localhost/donverdulero/assets/frontend/captcha/',
                    //'img_url' => 'http://www.inversionesjemal.com/py_donverdulero/assets/frontend/captcha/',
                    'img_url' => 'http://www.irazufresh.com/assets/frontend/captcha/',
                    'font_path' => './assets/frontend/fonts/MyriadPro-Bold.ttf',
                    'img_width' => '130',
                    'img_height' => 40
                   );
                $cap2 = create_captcha($vals);
                $data3 = array(
                   'captcha_time2' => $cap2['time'],
                   'ip_address2' => $CI->input->ip_address(),
                   'word2' => $cap2['word']
                   );
                $CI->session->set_userdata($data3);
                // store image html code in a variable
                $dataPrincipal['cap_img']= $cap2['image'];
                $dataPrincipal['codigo_secreto']= $cap2['word'];
                
                // store the captcha word in a session
                
                $CI->session->set_userdata('word2', $cap2['word']);
                $CI->session->set_userdata('cap_img2', $cap2['image']);
    }
}

