<?php
    $IDemail = Session::get('email','');
?>
<div id="hd">
	<div id="hdInner">
        <div class="header_top">
            <?php
            if(isset($IDemail) && $IDemail != '')
            {
            ?>
              <div class="header_top_left">
                  <div class="logo button_nomal"><a href="/">1 ロゴ</a></div>
                  <div class="how_to_use button_nomal"><a href="/how-to-use-Mansion-value">2 マイページ</a></div>
                  <div class="about_wv button_nomal"><a href="/account-setting">3 アカウント設定</a></div>
              </div>
              <div class="header_top_right">
                  <div class="login button_nomal" ><a href="/account/logout">4 ログイン</a></div>
              </div>
              <?php
              }else{
              ?>
                <div class="header_top_left">
                  <div class="logo button_nomal"><a href="/">1 ロゴ</a></div>
                  <div class="how_to_use button_nomal"><a href="/how-to-use-Mansion-value">2 使い方</a></div>
                  <div class="about_wv button_nomal"><a href="/how-about-mansion-value">3 MVとは</a></div>
              </div>
              <div class="header_top_right">
                  <div class="login button_nomal" ><a href="/account/login">4 ログイン</a></div>
                  <div class="member_registration button_nomal"><a href="/account/register">5 会員登録</a></div>

              </div>
              <?php
              }
              ?>
        </div>
        </div>
    </div><!-- / id="hdInner" -->
</div><!-- / id="hd" -->
