<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

    <head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />

    <title><?php echo Option::get('sitename'); ?></title>

    <meta property="og:title" content="<?php echo Option::get('sitename'); ?>" />



    <style type="text/css">

        .ExternalClass {width:100%;}

        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height:100%;}

        body {-webkit-text-size-adjust:none; -ms-text-size-adjust:none;}

        body {margin:0; padding:0;}

        table {border-spacing:0;}

        table td {border-collapse:collapse;}

        /****** END BUG FIXES ********/





        /****** RESETTING DEFAULTS, IT IS BEST TO OVERWRITE THESE STYLES INLINE ********/

        p {margin:0; padding:0; margin-bottom:0;}

        h1, h2, h3, h4, h5, h6 {color:#333333; line-height:100%;}

        /****** END RESETTING DEFAULTS ********/





        /****** EDITABLE STYLES - FOR YOUR TEMPLATE ********/

        body, #body_style {width:100% !important; color:#333333; background:#FBFBFB; font-family:Arial,Helvetica,sans-serif; font-size:13px; line-height:1.4;}

        a {color:#114eb1; text-decoration:none;}

        a:link    {color:#114eb1; text-decoration:none;}

        a:visited {color:#183082; text-decoration:none;}

        a:focus   {color:#0066ff !important;}

        a:hover   {color:#0066ff !important;}

        a[href^="tel"], a[href^="sms"] {text-decoration:none; color:#333333; pointer-events:none; cursor:default;}

        .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {text-decoration:default; color:#6e5c4f !important; pointer-events:auto; cursor:default;}



        /****** MEDIA QUERIES ********/

        @media only screen and (max-width: 639px) {

            body[yahoo] .hide {display:none !important;}

            body[yahoo] .table {width:320px !important;}

            body[yahoo] .innertable {width:280px !important;}

            body[yahoo] .heroimage {width:280px !important; height:100px !important;}

            body[yahoo] .shadow {width:280px !important; height:4px !important;}

            body[yahoo] .footer-left    {width:320px !important;}

            body[yahoo] .footer-right {width:320px !important;}

            body[yahoo] .footer-right img {float:left !important; margin:0 1em 0 0 !important;}

        }

        @media only screen and (min-width: 640px) and (max-width: 1024px) {}

        /*** END EDITABLE STYLES ***/



        /****** TEMPORARY - THESE SHOULD BE MOVED INLINE AT END OF YOUR DEVELOPMENT PROCESS ********/

        h1 {font-size:26px; line-height:1.2; font-weight:normal; margin-top:0; margin-bottom:0;}

        p {margin-top:0; margin-bottom:0;}

        img {display:block; border:none; outline:none; text-decoration:none;}

        table {border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;}

        /*** END TEMPORARY ***/

    </style>

</head>

<body style="width:100% !important; color:#333333; background:#FBFBFB; font-family:Arial,Helvetica,sans-serif; font-size:13px; line-height:1.4;"

alink="#9d470a" link="#9d470a" bgcolor="#FBFBFB" text="#333333" yahoo="fix">

<!-- PAGE WRAPPER -->

    <div id="body_style">

      <table cellpadding="0" cellspacing="0" border="0" align="center" style="width:100% !important; margin:0; padding:0;">

        <tr bgcolor="#FBFBFB">

          <td style="padding-top:20px;">

            <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="table" style="border:1px solid #ccc;">

              <!-- CONTENT -->

              <tr bgcolor="#ffffff">

                <td style="padding-top:20px;">



                  <!-- article -->

                  <table style="margin-bottom:1em;" width="560" cellpadding="0" cellspacing="0" border="0" align="center" class="innertable">

                    <tr><td>

                    	<table bgcolor="#ffffff" width="100%" cellpadding="10" cellspacing="0" border="0"><tr><td>

                        <?php echo __('New item purchased','minishop');?>

                        <p><b> <?php echo __('Name','minishop'); ?>: </b> <?php echo $name; ?> </p>
                        <p><b> <?php echo __('Email','minishop'); ?>: </b> <?php echo $email; ?> </p>
                        <p><b> <?php echo __('Adress 1','minishop'); ?>: </b> <?php echo $adress1; ?> </p>
                        <p><b> <?php echo __('Adress 2','minishop'); ?>: </b> <?php echo $adress2; ?> </p>
                        <p><b> <?php echo __('Locality','minishop'); ?>: </b> <?php echo $locality; ?> </p>
                        <p><b> <?php echo __('Country','minishop'); ?>: </b> <?php echo $country; ?> </p>
                        <p><b> <?php echo __('Phone','minishop'); ?>: </b> <?php echo $phone; ?> </p>
                        <p><b> <?php echo __('Comments','minishop'); ?>: </b> <?php echo Html::br().$comment; ?> </p>
                        <p><b> <?php echo __('Items purchased','minishop'); ?>: </b> <?php echo $purchased; ?> </p>
                        <p><b> <?php echo __('Total','minishop'); ?>: </b> <?php echo $total; ;?> </p>

                   </td></tr></table></td></tr></table>

                  <!-- /article -->



              </td></tr>

              <!-- /CONTENT -->



              <!-- FOOTER -->

              <tr><td bgcolor="#fdfdfd">

                  <table width="100%" cellpadding="10" cellspacing="0" border="0"><tr>

                  	<td valign="top" style="font-size:11px; border-top:1px dashed #ccc; text-align:right;">







                        <p style="margin-top:0; margin-bottom:0;">© 2012 - 2013

                          <a href="http://monstra.org" style="color:#333; text-decoration:none;">

                            MONSTRA.ORG

                          </a>

                        </p>





       </td></tr> </table></td></tr></table></td></tr></table>

      <!-- End of wrapper table -->

  </div>

</body>

</html>

