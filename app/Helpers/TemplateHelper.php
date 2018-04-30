<?php

namespace App\Helpers;
use App\Section;
use App\Section_detail;
use App\Template;
use App\Template_section;
use App\Template_section_detail;
use App\TemplateUri;


use Illuminate\Support\Facades\DB;

class TemplateHelper {
    
    public static function script_top_heredoc($script = array())
    {
        $result = '';
        
        if(is_array($script))
        {
            foreach($script as $key)
            {
                $tag_open = "<script type='text/javascript'>\n/*<![CDATA[*/";
                $tag_close = "/*]]>*/\n</script>";

                $result .= $tag_open.$key.$tag_close;
            }
        }  
        
        return $result;
    }
        
    public static function script_bottom_heredoc($script = array())
    {
        $result = '';
        
        if(is_array($script))
        {
            foreach($script as $key)
            {
                $tag_open = "<script type='text/javascript'>\n/*<![CDATA[*/";
                $tag_close = "/*]]>*/\n</script>";

                $result .= $tag_open.$key.$tag_close;
            }
        }  
        
        return $result;
    }

    
    
    public static function no_script_top_heredoc($script = array())
    {
        $result = '';
        
        if(is_array($script))
        {
            foreach($script as $key)
            {
                $tag_open = "<noscript type='text/javascript'>\n/*<![CDATA[*/";
                $tag_close = "/*]]>*/\n</noscript>";
                $result .= $tag_open.$key.$tag_close;
            }
        }  
        
        return $result;
    }
    
    public static function no_script_bottom_heredoc($script = array())
    {
        $result = '';
        
        if(is_array($script))
        {
            foreach($script as $key)
            {
                $tag_open = "<noscript type='text/javascript'>\n/*<![CDATA[*/";
                $tag_close = "/*]]>*/\n</noscript>";
                $result .= $tag_open.$key.$tag_close;
            }
        }  
        
        return $result;
    }
    
    public static function add_meta_tag($data)
    {
        $result = '';
        
        if(is_array($data))
        {
            foreach($data as $key)
            {
                if ($key['name'] == 'mask-icon' || $key['name'] == 'manifest' || $key['name'] == 'apple-touch-icon' || $key['name'] == 'shortcut' || $key['name'] == 'icon' || $key['name'] == 'canonical' || $key['name'] == 'next' || $key['name'] == 'prev' || $key['name'] == 'publisher') 
                {
                    $val_2 = '';
                    $val_3 = '';
                    if(isset($key['key_2']) && isset($key['value_2']))
                    {
                        $val_2 = '' . $key['key_2'] . '="' . $key['value_2'] . '"';
                    }
                    if(isset($key['key_3']) && isset($key['value_3']))
                    {
                        $val_3 = '' . $key['key_3'] . '="' . $key['value_3'] . '"';
                    }
                    
                    $result .= '<link '.$val_3.' '.$val_2.' rel="'.$key['name'].'" href="' . $key['content'] . '" />
                                ';
                } 
                else {
                    $result .= '<meta ' . $key['key'] . '="' . $key['name'] . '" content="' . $key['content'] . '" />
                                ';
                }
            }
        }  
        
        return $result;
        
    }
    
    public static function css_top_inline($script = array())
    {
        $result = '';
        
        if(is_array($script))
        {
            foreach($script as $key)
            {
                $tag_open = "<style type='text/css'>";
                $tag_close = "</style>";

                $result .= $tag_open.$key.$tag_close;
            }
        }  
        
        return $result;
        
    }
    
    public static function add_meta_description($content = "")
    {
        $meta_tag = '<meta name="description" content="' . $content . '" />';
        return $meta_tag;
    }
    
    public static function add_meta_keywords($content = "")
    {
        $meta_tag = '<meta name="keywords" content="' . $content . '" />';
        return $meta_tag;
    }
}
