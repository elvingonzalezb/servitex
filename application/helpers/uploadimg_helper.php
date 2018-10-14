<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 *
 * @package     CodeIgniter
 * @author      Victor Isaac Molina
 * @copyright       Copyright (c) 2017, Vmolina, Inc.
 * @since       Version 1.0
 * @filesource
 */

/**
 *
 * @param   array,string, array, array, string
 * @return  array    status 200 si lasubida de archivo es correcta con los nombres de cada archivo o status 400 si es incorrecto
 */

if ( ! function_exists('uploadImgMultiple'))
{ 
    function uploadImgMultiple( $files = array(), $file_path = '', $sizes = array(), $mark= array(), $file_name = "" )
    {
        $num_files = count($files['name']);
        $i =0;
        $result = array();

        $result['status'] = 200;
        while ($i < $num_files) {
            if( ! empty($files['name'][$i]) ){
                $file = array();
                $file['name'] = $files['name'][$i];
                $file['type'] = $files['type'][$i];
                $file['tmp_name'] = $files['tmp_name'][$i];
                $file['size'] = $files['size'][$i];
                $file['size'] = $files['size'][$i];
                $file['error'] = $files['error'][$i];

                //print_r($file); die();
               $result['data'][$i] = uploadImg( $file, $file_path, $sizes, $mark , $file_name );
               if( $result['data'][$i]['status'] =! 200){
                    $result['status'] = 400;
                    $result['error'] = 'no se cargo';
               }
               //print_r($result); exit();
            }
            $i++;
        }
        return $result;
    }
}


/**
 *
 * @param   array   $_FILES
 * @param   string  Path --ruta--
 * @param   array   Tamaños x y
 * @param   array   Parametros de marca de agua
 * @return  string  nobre obcional para el archivo
 * @return  array    status 200 si lasubida de archivo es correcta con los nombres de cada archivo o status 400 si es incorrecto
 */
if ( ! function_exists('uploadImg'))
{ 
    function uploadImg( $files = array(), $file_path = '', $sizes = array(), $mark= array(), $file_name = "" )
    {
        $file_path = $file_path.'/';
        $CI =& get_instance();
        $CI->my_upload->upload($files);
        //print_r(); exit();
        $nombre_original = $files['name'];
        $extension = end(explode(".", $nombre_original));
        $nombre_original = explode('.',$nombre_original);
        $countnom = count($nombre_original);
        $countnom = $countnom - 1;
        unset($nombre_original[$countnom]);
        $nombre_original = implode('.',$nombre_original);
        $name_image = ( ! empty($file_name) ? $file_name : date("YmdHis"));
        //$url_pagina = ( ! empty($file_name) ? $file_name : 'http://www.graffixperu.com');

        if ( $CI->my_upload->uploaded == true  )
        {
            
            //Upload thums
            $CI->my_upload->allowed            = array('image/*');
            $CI->my_upload->image_convert      = $extension;
            $CI->my_upload->file_new_name_body = $name_image;
            //hacer configurable el rezise
            $CI->my_upload->image_resize       = true;
            //$CI->my_upload->image_ratio_fill   = true;
            $CI->my_upload->image_x            = $sizes['thumbs_x'];
            $CI->my_upload->image_y            = $sizes['thumbs_y'];
            $CI->my_upload->process('./files/'.$file_path.'thumbs/');
            if( $CI->my_upload->processed ){ 

                $uploaded['thumbs'] = $CI->my_upload->file_dst_name;
                $uploaded['titulo']=$nombre_original; 
                $uploaded['status']=200; 

                    #-------------------
                    #  Aws Storage S3
                    #----
                    $file_uploaded = _UPLOADPATH.$file_path.'thumbs'.DIRECTORY_SEPARATOR.$uploaded['thumbs'];
                    $amazon_path = array();
                        if(_AWS_STORE){
                            $amazon_path = $CI->my_aws->uploadAws($file_uploaded,$file_path.'thumbs/', $uploaded['thumbs']);
                        }

                    $uploaded['amazon_path']['thumbs'] = $amazon_path;
                    #---------
                    #  End Aws
                    #-------------------

            }else{  return ['error'=>$CI->my_upload->error,'status'=>400];};

            //Upload medium
            $CI->my_upload->allowed            = array('image/*');
            $CI->my_upload->image_convert      = $extension;
            $CI->my_upload->file_new_name_body = $name_image;
            $CI->my_upload->image_resize       = true;
            //$CI->my_upload->image_ratio_fill   = true;            
            $CI->my_upload->image_x            = $sizes['medium_x'];
            $CI->my_upload->image_y            = $sizes['medium_y'];
            //watermark
            waterMark( $mark );
            $CI->my_upload->process('./files/'.$file_path.'medianas/');
            if( $CI->my_upload->processed ){ 

                $uploaded['medianas'] = $CI->my_upload->file_dst_name;
                $uploaded['titulo']=$nombre_original;
                $uploaded['status']=200;


                    #-------------------
                    #  Aws Storage S3
                    #----
                    $file_uploaded = _UPLOADPATH.$file_path.'medianas'.DIRECTORY_SEPARATOR.$uploaded['medianas'];
                    $amazon_path = array();
                        if(_AWS_STORE){
                            $amazon_path = $CI->my_aws->uploadAws($file_uploaded, $file_path.'medianas/', $uploaded['medianas']);
                        }

                    $uploaded['amazon_path']['medianas'] = $amazon_path;
                    #---------
                    #  End Aws
                    #-------------------

            }else{  return ['error'=>$CI->my_upload->error,'status'=>400];};

            //Upload principal
            $CI->my_upload->allowed             = array('image/*');
            $CI->my_upload->image_convert       = $extension;
            $CI->my_upload->file_new_name_body  = $name_image;
            $CI->my_upload->image_resize        = true;
            //$CI->my_upload->image_ratio_fill   = true;
            $CI->my_upload->image_x             = $sizes['principal_x'];
            $CI->my_upload->image_y             = $sizes['principal_y'];
            //watermark
            waterMark( $mark );
            $CI->my_upload->process('./files/'.$file_path);
                if( $CI->my_upload->processed ){ 

                    $uploaded['principal']= $CI->my_upload->file_dst_name; 
                    $uploaded['titulo']=$nombre_original;
                    $uploaded['status']=200;

                    #-------------------
                    #  Aws Storage S3
                    #----
                    $file_uploaded = _UPLOADPATH.$file_path.$uploaded['principal'];
                    $amazon_path = array();
                        if(_AWS_STORE){
                            $amazon_path = $CI->my_aws->uploadAws($file_uploaded,$file_path, $uploaded['principal']);
                        }

                    $uploaded['amazon_path']['principal'] = $amazon_path;
                    #---------
                    #  End Aws
                    #-------------------
                    
                }else{  
                    return ['error'=>$CI->my_upload->error,'status'=>400];
                };

            return $uploaded;
        }else{
            return ['error' => $CI->my_upload->error, 'status'=>400];
        }

    }
}


if ( ! function_exists('waterMark'))
{
    function waterMark( $args_mark = array() )
    {
        $CI =& get_instance();

        if( ! empty($args_mark) )
        {
            $textMark   = ( ! empty($args_mark['text_mark']) ? $args_mark['text_mark'] : '');
            $imgMark    = ( ! empty($args_mark['img_mark']) ? $args_mark['img_mark'] : ''); 
            $background = ( ! empty($args_mark['backgroud']) ? $args_mark['backgroud'] : ''); 
            $textColor  = ( ! empty($args_mark['text_color']) ? $args_mark['text_color'] : '' );
            //watermark
            $CI->my_upload->image_text            = $textMark;
            $CI->my_upload->image_text_background = $background;
            $CI->my_upload->image_text_position   = 'B';
            $CI->my_upload->image_text_y          = -15;
            $CI->my_upload->image_text_padding    = 10;
            $CI->my_upload->image_text_alignment  = 'R';
            $CI->my_upload->image_text_font       = 2;
            $CI->my_upload->image_text_color      = $textColor;
            $CI->my_upload->image_watermark       = $imgMark;
            $CI->my_upload->image_watermark_no_zoom_in = false;
        }else{}
    }
}