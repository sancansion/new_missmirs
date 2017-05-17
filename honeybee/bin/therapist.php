<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>セラピスト一覧 | Mitsubachi | みつばち | メンズエステ | 大阪 | 天神橋六丁目 | 扇町 </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Mitsubachi" />

<meta name="description" content="Mitsubachi | ミツバチ | メンズエステ | 大阪 | 天神橋六丁目 | 扇町" />
<meta name="keywords" content="Mitsubachi | ミツバチ | メンズエステ | 大阪 | 天神橋六丁目 | 扇町" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- START:SNS meta-->
<?php include("common/css.html"); ?>
<!-- END:SNS meta-->

<link rel="stylesheet" type="text/css" href="lightbox/jquery.lightbox-0.5.css" />
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="lightbox/jquery.lightbox-0.5.min.js"></script>
<script type="text/javascript">

</script>


<link type="text/css" href="css/photoswipe.css" rel="stylesheet" media="all" />
<link type="text/css" href="css/default-skin.css" rel="stylesheet" media="all" />
 
<script type="text/javascript" src="js/photoswipe.min.js"></script>
<script type="text/javascript" src="js/photoswipe-ui-default.js"></script>
<script type="text/javascript" src="js/swipe.js"></script>
</head>
<body>
	<div class="fh5co-loader"></div>
	<?php include("common/pswp.html"); ?>

	<div id="page">
		<!-- START:header -->
		<header id="" class="fh5co-cover" role="banner" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<!-- START:Navigation-->
			<?php include("common/navi.html"); ?>
			<!-- END:Navigation-->
		</header>
		<!-- END:header -->
		<div id="page-top"></div>
		<!-- START:Main -->
		<!-- START: Miss-->
		<div id="fh5co-gallery">
			<div class="container">
				<div class="row row-bottom-padded-md">

					<h1 class="type1-1">
						<span class=""> セラピスト紹介</span>
					</h1>
					<h2 class="type2-1">
						<span class=""> Miss</span>
					</h2>
					<div class="col-md-12">
						<?php
//----------------------------------------------------------------------
// 設定ファイルの読み込みとページ独自設定　※必要に応じて変更下さい(START)
//----------------------------------------------------------------------
include_once("gallery/config.php");//設定ファイルインクルード
$img_updir = "gallery/upimg";//画像の保存先相対パス

//埋め込み設置するページの文字コード
//Shift-jisは「SJIS」、EUC-JPは「EUC-JP」と指定してください。デフォルトはUTF-8。
$encodingType = 'UTF-8';
//----------------------------------------------------------------------
// 設定ファイルの読み込みとページ独自設定　※必要に応じて変更下さい(END)
//----------------------------------------------------------------------
	$lines = newsListSortUser(file($file_path),$copyright);//ファイル内容を取得
	if(!function_exists('PHPkoubou')){ echo $warningMesse; exit;}else{
	$pager = pagerOut($lines,$pagelength,$pagerDispLength);//ページャーを起動する
?>

						<div class="pager_link">
							<?php echo $pager['pager_res'];?>
						</div>






<div class="my-gallery">
<ul id="fh5co-gallery-list">

							<?php
for($i = $pager['index']; ($i-$pager['index']) < $pagelength; $i++){
  if(!empty($lines[$i])){
	$lines_array[$i] = explode(",",$lines[$i]);
	$lines_array[$i][3] = rtrim($lines_array[$i][3]);
	$lines_array[$i][1] = ymd2format($lines_array[$i][1]);//日付フォーマットの適用
	if($encodingType!='UTF-8') $lines_array[$i][1]=mb_convert_encoding($lines_array[$i][1],"$encodingType",'UTF-8');
	if($encodingType!='UTF-8') $lines_array[$i][2]=mb_convert_encoding($lines_array[$i][2],"$encodingType",'UTF-8');
	$name = str_replace('<br />','',$lines_array[$i][2]);


	if($lines_array[$i][6] == 1){
		$experience = "あり";
	} else {
		$experience = "なし";
	}
	
	if($lines_array[$i][7] == 1){
		$looking = "スレンダー";
	}else if($lines_array[$i][7] == 2){
		$looking = "普通";
	} else {
		$looking = "むっちり";
	}
	
	


//ギャラリー表示部（HTML部は自由に変更可）※デフォルトはサムネイルを表示。imgタグの「 thumb_ 」を取れば元画像を表示
echo <<<EOF


<li class="one-third  text-left fh5co-heading animate-box">

	<figure class="therapist-img" data-animate-effect="fadeIn" style="background-image: url({$img_updir}/thumb_{$lines_array[$i][0]}.{$lines_array[$i][3]});">
		<a href="{$img_updir}/{$lines_array[$i][0]}.{$lines_array[$i][3]}" data-size="1000x665">
			<img src="{$img_updir}/thumb_{$lines_array[$i][0]}.{$lines_array[$i][3]}" alt="" style="display:none" />
			<span class="case-studies-summary"> {$lines_array[$i][2]} ({$lines_array[$i][5]})</span>
		</a>
		<figcaption style="display:none;"> {$lines_array[$i][2]} 年齢：{$lines_array[$i][5]} / セラピスト経験：$experience / 体型： $looking</figcaption>
	</figure>
	</li>

EOF;
  }

}
?>
</ul>
</div>

						<div class="pager_link">
							<?php echo $pager['pager_res'];?>
						</div>
						<?php PHPkoubou($encodingType,$copyright,$warningMesse);}//著作権表記削除不可?>
					</div>





				</div>
			</div>
		</div>
		<!-- End: Mrs-->
	</div>
	<!-- END:Main -->

	<!-- START:footer -->
	<?php include("common/footer.html"); ?>
	<!-- END:footer -->

	<!-- START:footer menu -->
	<?php include("common/footer_menu.html"); ?>
	<!-- END:footer menu-->




	<!-- START: goto top -->
	<?php include("common/gototop.html"); ?>
	<!-- END: goto top -->

	<!-- START: Inclide JS -->

	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>

	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>

	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>

	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>

	<!-- // <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.js"></script> -->
	<script src="js/simplyCountdown.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>
	<!-- END: Inclide JS -->
</body>
</html>
