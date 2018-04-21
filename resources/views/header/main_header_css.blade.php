<!-- default css top -->
<link rel="stylesheet" href="<?php echo URL::asset('assets/vendor/bootstrap/css/bootstrap.css'); ?>" type="text/css" />
<!-- <link rel="stylesheet" href="<?php echo URL::asset('assets/css/main.css'); ?>" type="text/css" /> -->

<?php
if(isset($css_top) && is_array($css_top))
{
    foreach($css_top as $css_top_key)
    {
        $css_top_rel = 'rel="stylesheet"';
        if(isset($css_top_key['rel']))
        {
            $css_top_rel = 'rel="'.$css_top_key['rel'].'"';
        }
        if(isset($css_top_key['href']) && $css_top_key['href'] != '')
        {
            $css_top_href = 'href="'.URL::to($css_top_key['href']).'"';
            echo '<link '.$css_top_rel.' '.$css_top_href.' type="text/css" />
                  ';
            
        }
    }
}  
?>