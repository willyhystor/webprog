<?php
if(isset($meta_tag) && is_array($meta_tag))
{
    $result = '';

    foreach($meta_tag as $key)
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
        else 
        {
            $result .= '<meta ' . $key['key'] . '="' . $key['name'] . '" content="' . $key['content'] . '" />
                        ';
        }
    }

    echo $result;
}
?>