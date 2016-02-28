<!DOCTYPE html>
<html>
<head>
    <title><?php echo isset($title) ? _h($title) : config('blog.title') ?></title>

    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content="<?php echo config('blog.description') ?>"/>

    <link rel="alternate" type="application/rss+xml" title="<?php echo config('blog.title') ?>  Feed"
          href="<?php echo site_url() ?>rss"/>
    <link rel="stylesheet" href="<?php echo site_url() ?>assets/css/bootstrap.css"/>
    <link href="<?php echo site_url() ?>assets/css/style.css" rel="stylesheet"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700&subset=latin,cyrillic-ext"
          rel="stylesheet"/>

    <script src="<?php echo site_url() ?>assets/js/jquery-1.12.1.min.js"></script>
    <script src="<?php echo site_url() ?>assets/js/bootstrap.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo site_url() ?>"><?php echo config('blog.title') ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <!--<li><a href="#">Home</a></li>-->
                <!--<li><a href="#">About</a></li>-->
                <!--<li><a href="#">Contact</a></li>-->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#">Blog</a></li>
                <li><a href="https://github.com/josephstalin117">GitHub</a></li>
                <li><a href="http://twitter.com/josephstalin117">Twitter</a></li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
</nav>
<div class="container center-block">
    <div class="col-md-2"></div>
    <div class="col-md-8 col-sm-12">
        <?php echo content() ?>
    </div>
</div>
</body>
</html>