<script src="<?php echo URL::asset('assets/dist/js/vendor/jquery.min.js'); ?>" type="text/javascript"></script> <script src="<?php echo URL::asset('assets/vendor/jquery-validation-1.14.0/dist/jquery.validate.min.js'); ?>" type="text/javascript"></script> <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> <?php $base_url = URL::to('/');
$heredoc = <<<EOT
var base_url = '{$base_url}';

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
EOT;

echo TemplateHelper::script_top_heredoc(array($heredoc)); ?> <?php if(isset($script_top) && is_array($script_top)) {foreach($script_top as $script_top_key) {if(isset($script_top_key['src'])) {echo ' <script src="'.URL::asset($script_top_key['src']).'" type="text/javascript"></script>'; } } } ?>