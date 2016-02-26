<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>

        <!-- Bootstrap
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        -->
        <link rel="stylesheet" type="text/css" href="<?php echo Url('assets/css/system.css'); ?>">
        
        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="<?php echo Url('assets/bootstrap/css/bootstrap-slate.css'); ?>">
 
        <link rel="stylesheet" type="text/css" href="<?php echo Url('assets/css/card-css/card-css.css'); ?>">
        <link rel="stylesheet" href="<?php echo Url('assets/css/font-awesome/css/font-awesome.css'); ?>">

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?php echo Url('assets/js/jquery.min.js'); ?>"></script>
        <script src="<?php echo Url('assets/bootstrap/js/bootstrap.js'); ?>"></script>

        <!-- Javascript System -->
        <script src="<?php echo Url('assets/js/system.js'); ?>"></script>
        
        <!-- FancyBox -->
        <link rel="stylesheet" type="text/css" href="<?php echo Url('assets/fancyBox/source/jquery.fancybox.css'); ?>">
        <script src="<?php echo Url('assets/fancyBox/source/jquery.fancybox.js'); ?>"></script>
        <?php 
            use App\Type;
        ?>
    </head>
    <body>

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Brand</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo Url('test/index'); ?>">HOME <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">Link</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">จัดการระบบ <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo Url('backend/type/index') ?>">ประภทสินค้า</a></li>
                                <?php 
                                    $TypeModel = new Type();
                                ?>
                                <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">รายการสินค้า</a>
                                    <ul class="dropdown-menu">
                                        <?php $TypeProduct = $TypeModel->GetType(); ?>
                                        @foreach($TypeProduct as $rs)
                                        <li><a href="{{url('backend/product/type/'.$rs->id)}}">{{$rs->type_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                 <li><a href="<?php echo Url('backend/photo/index') ?>">คลังรูปภาพ</a></li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Link</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div class="container-fluid" style="margin-top: 60px;">
            @yield('content')
        </div>

        <!-- Include all compiled plugins (below), or include individual files as needed
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        -->
    </body>
</html>
