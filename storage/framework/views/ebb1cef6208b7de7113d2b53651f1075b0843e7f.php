<html>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>
    <title>Resto | Koki</title>
  </head>
  <link rel="stylesheet" href="<?php echo asset('css/public.css'); ?>">
  <link rel="stylesheet" href="<?php echo asset('css/koki.css'); ?>">
  <link rel="stylesheet" href="<?php echo asset('css/sweetalert.css'); ?>">
  <script type="text/javascript" src="<?php echo asset('js/public.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo asset('js/koki.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo asset('js/jquery.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo asset('js/sweetalert.min.js'); ?>"></script>

  <link rel="stylesheet" href="<?php echo asset('css/croppie.css'); ?>" />
  <script src="<?php echo asset('js/croppie.js'); ?>"></script>
  <body>
    <center><div id="load"></div></center>
    <?php $__env->startSection('popup'); ?>
      <?php echo $__env->yieldSection(); ?>
    <header>
      <aside>
        <label class="judul">My Resto</label>
      </aside>
      <aside>
          <button class="brick sign animasi" id="out" onclick="log_out()" name="out" type="button">LOG OUT</button>
      </aside>
    </header>
    
    <div class="wrapcontent">
      <div id="leftsb_menu">
        <div class="list-akun">
          <table class="log-akun">
            <tr>
              <td rowspan=2 width=30%>
                <img src="/gambar/home.png" width=60px height=60px alt="">
              </td>
              <td>116001</td>
            </tr>
            <tr><td>Zah</td></tr>
          </table>
        </div>
        <?php $__env->startSection('child'); ?>
        <?php echo $__env->yieldSection(); ?>

      </div>
      
      
      <div id="content">
        <?php $__env->startSection('content'); ?>

          <?php echo $__env->yieldSection(); ?>
      </div>
    </div>
    <footer>
      <div class="share-medsos">
        <div id="infofb" class="hide animasi">Resto.mania</div>
        <div id="infotw" class="hide animasi">@resto</div>
        <div id="infoig" class="hide animasi">@restomania</div>
        <div id="infogm" class="hide animasi">resto@gmail.com</div>
        <a id="fb" target="_blank" onmouseover="disp('#infofb')" onmouseout="disp('#infofb')" title="Resto" href="//www.facebook.com"></a>
        <a id="tw" target="_blank" onmouseover="disp('#infotw')" onmouseout="disp('#infotw')" title="@resto" href="//www.twitter.com"></a>
        <a id="ig" target="_blank" onmouseover="disp('#infoig')" onmouseout="disp('#infoig')" title="@restomania" href="//www.instagram.com"></a>
        <a id="gm" target="_blank" onmouseover="disp('#infogm')" onmouseout="disp('#infogm')" title="resto@gmail.com" href="//www.gmail.com"></a>
    </div>
    </footer>
  </body>
</html>
