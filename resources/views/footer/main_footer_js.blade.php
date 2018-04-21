<?php
if(isset($script_bottom) && is_array($script_bottom))
{
    foreach($script_bottom as $script_bottom_key)
    {
        if(isset($script_bottom_key['src']))
        {
            if(isset($script_bottom_key['type']) && $script_bottom_key['type'] == 'full')
            {
                echo ' <script src="'.$script_bottom_key['src'].'" type="text/javascript"></script>
                     ';
            }
            else
            {
                echo ' <script src="'.URL::asset($script_bottom_key['src']).'" type="text/javascript"></script>
                     ';
            }
        }
    }
}  
?>