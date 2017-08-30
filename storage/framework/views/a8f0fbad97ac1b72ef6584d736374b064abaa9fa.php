<meta charset="utf-8">
<meta name="_token" content="<?php echo e(csrf_token()); ?>">
<!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?php echo $__env->yieldContent('description'); ?>">

<title><?php echo $__env->yieldContent('title'); ?> - <?php echo e(config('app.name')); ?></title>

<!-- Bootstrap Core CSS -->
<link href="/css/front/bootstrap.min.css" rel="stylesheet">
<link href="/css/front/magnific-popup.css" rel="stylesheet">

<!-- Google Web Fonts -->
<link href="https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">

<!-- CSS Files -->
<link href="/css/front/font-awesome.min.css" rel="stylesheet">
<link href="/js/front/plugin/stepper/jquery.fs.stepper.css" rel="stylesheet">
<link href="/js/front/plugin/remodal/remodal.css" rel="stylesheet">
<link href="/js/front/plugin/remodal/remodal-default-theme.css" rel="stylesheet">
<link href="/js/front/plugin/lobibox/lobibox.min.css" rel="stylesheet">
<link href="/css/front/style.css" rel="stylesheet">
<link href="/css/front/responsive.css" rel="stylesheet">
<?php echo $__env->yieldContent('links'); ?>



<!--[if lt IE 9]>
    <script src="js/ie8-responsive-file-warning.js"></script>
<![endif]-->

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/images/front/fav-144.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/images/front/fav-114.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/images/front/fav-72.png">
<link rel="apple-touch-icon-precomposed" href="/images/front/fav-57.png">
<link rel="shortcut icon" href="/images/front/fav.png">


<link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
<link rel="manifest" href="/images/favicon/manifest.json">
<link rel="mask-icon" href="/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="/images/favicon/favicon.ico">
<meta name="msapplication-config" content="/images/favicon/browserconfig.xml">
<meta name="theme-color" content="#ffffff">

<link href="https://fonts.googleapis.com/css?family=Dosis:300,400,500" rel="stylesheet">

<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-105684207-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments)};
  gtag('js', new Date());

  gtag('config', 'UA-105684207-1');
</script>
