<script>
$(function() {
    $('#town').change(function(){
        $.ajax({
            url: '<?php echo Uri::create("lookup"); ?>',
            //dataType: 'json',
            type: 'POST',
            data: {town:$(this).value},
            success:
                function(data)
                {
                    alert(data);
                    //if(data.response =='true')
                    //{
                        //add(data.message);
                    //}
                }
        });
    });
   //$("#town").autocomplete({
//    minLength: 2,
//                source: function(reqa, add)
//                {
//                    $.ajax({
//                        url: '< ?php echo Uri::create("lookup"); ?>',
//                        dataType: 'json',
//                        type: 'POST',
//                        data: reqa,
//                        success:
//                            function(data)
//                            {
//                                if(data.response =='true')
//                                {
//                                    add(data.message);
//                                }
//                            }
//                    });
//                }
//   });
  });
</script>
<?php echo Form::open(array('action' => '/index/detail', 'method' => 'post')); ?>
<input type="hidden" name="<?php echo Config::get('security.csrf_token_key'); ?>" value="<?php echo Security::fetch_token(); ?>" />

<div class="content_top">
    <div class="content_search">
        <div class="content_search_top">
            <div class="button_nomal"><a href="/">mansion name</a></div>
            <div class="button_nomal"><a href="/how-to-use-Mansion-value">address</a></div>
            <div class="button_nomal"><a href="/how-about-mansion-value">station name</a></div>
            <div class="button_nomal"><a href="/how-about-mansion-value">zip code</a></div>
        </div>
        <div class="content_search_bottom">
            <div><input class="content_search2" width="90" id="town" name="content_search" /></div>
            
            <div><?php echo Form::submit('btnsearch','Search'); ?></div>
        </div>
    </div>
    <div class="content"></div>
<?php echo Form::close(); ?>
<!--?php echo md5("123456");?-->