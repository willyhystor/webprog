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

    public static function get_template_by_uri($slug, $uri, $status)
    {
        $field = array('template_uri.template_uri_name',
                'template_uri.template_uri_id',
                'template.template_name',
                'template.template_title',
                'template.template_keyword',
                'template.template_description',
                'template.template_slug',
                'template.template_id',
                'template_section.template_section_precedence',
                'template_section.template_section_id',
                'section.section_view_desktop',
                'section.section_view_mobile');
        $result = TemplateUri::select($field);
        $result->join('template', 'template.template_uri_id', '=', 'template_uri.template_uri_id');
        $result->join('template_section', 'template_section.template_id', '=', 'template.template_id');
        $result->join('section', 'section.section_id', '=', 'template_section.section_id');
        $result->where('template.template_slug', '=', $slug);
        $result->where('template_uri.template_uri_name', '=', $uri);
        $result->whereIn('template.template_status', array($status)); // = or IN
        $result->orderBy('template_section.template_section_precedence', 'asc');

        return $result->get()->toArray();
    }

    public static function get_attribute_by_template_section($template_section_id)
    {
        $field = array(
                        'section_detail.section_detail_attribute', 
                        DB::raw('REPLACE(template_section_detail.template_section_detail_value,"assets/","'.config('constants.DESKTOP_SITE_URL').'assets/") AS template_section_detail_value')
                      );

        $result = Template_section_detail::select($field);
        $result->join('section_detail', 'section_detail.section_detail_id', '=', 'template_section_detail.section_detail_id');
        $result->where('template_section_detail.template_section_id', '=', $template_section_id);

        return $result->get()->toArray();
    }

    public static function build_data($array)
    {
        $data = array();
        foreach($array as $row)
        {
            $data[$row['section_detail_attribute']] = $row['template_section_detail_value'];
        }
        
        return $data;
    }
    

}
