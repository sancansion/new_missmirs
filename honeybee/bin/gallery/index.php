<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>セラピスト一覧 | ミスミセス | メンズエステ | 大阪 | 天神橋六丁目 | 扇町 | 南森町 | 長堀橋</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Miss Mrs" />

<meta name="description" content="ミスミセス | メンズエステ | 大阪 | 天神橋六丁目 | 扇町 | 南森町 | 長堀橋" />
<meta name="keywords" content="ミスミセス | メンズエステ | 大阪 | 天神橋六丁目 | 扇町 | 南森町 | 長堀橋" />
<!-- START:SNS meta-->
<?php include("common/sns_meta.html"); ?>
<!-- END:SNS meta-->

<!-- START:SNS meta-->
<?php include("common/css.html"); ?>
<!-- END:SNS meta-->
<link href="style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="js/lightbox/jquery.lightbox-0.5.css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>   
<script type="text/javascript" src="js/lightbox/jquery.lightbox-0.5.min.js"></script>
<script type="text/javascript">


<!--
function openwin(url) {//PC用ポップアップ。ウインドウの幅、高さなど自由に編集できます
 wn = window.open(url, 'win','width=700,height=600,status=no,location=no,scrollbars=yes,directories=no,menubar=no,resizable=no,toolbar=no');wn.focus();
}
-->
</script>

</head>
<body id="index">

	<div class="fh5co-loader"></div>

	<div id="page">
		<!-- START:header -->
		<header id="" class="fh5co-cover" role="banner" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<!-- START:Navigation-->
			<?php include("common/navi.html"); ?>
			<!-- END:Navigation-->
		</header>
		
		
		<!-- END:header -->
		<!-- START:Main -->
		<!-- START: Miss-->
		<div id="fh5co-gallery">
			<div class="container">
				<div class="row row-bottom-padded-md">
					<h1 class="type1-1">
						<span class="icon-heart"> セラピスト紹介</span>
					</h1>
					<h2 class="type2-1">
						<span class="icon-heart"> Miss & Mrs</span>
					</h2>
					<div class="col-md-12">
					
<?php
//設定ファイルインクルード
include_once("config.php");
$lines = newsListSortUser(file($file_path),$copyright);
if(function_exists('')){ echo $warningMesse; exit;}else{
$pager = pagerOut($lines,$pagelength,$pagerDispLength);//ページャーを起動する
?>


<ul id="fh5co-gallery-list">
<?php
for($i = $pager['index']; ($i-$pager['index']) < $pagelength; $i++){
  if(!empty($lines[$i])){
	$lines_array[$i] = explode(",",$lines[$i]);
	$lines_array[$i][1] = ymd2format($lines_array[$i][1]);//日付フォーマットの適用
	$lines_array[$i][3] = rtrim($lines_array[$i][3]);
	$alt_text = str_replace('<br />','',$lines_array[$i][2]);
		
//ギャラリー表示部（HTML部は自由に変更可）※デフォルトはサムネイルを表示。imgタグの「 thumb_ 」を取れば元画像を表示
echo <<<EOF

<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url({$img_updir}/{$lines_array[$i][0]}.{$lines_array[$i][3]});">					
<a class="photo" href="javascript:openwin('popup.php?id={$lines_array[$i][0]}')" title="{$lines_array[$i][2]}">
<div class="case-studies-summary">
<h2>{$lines_array[$i][2]}</h2>
</div>
</a>
</li>
EOF;
  }
}
?>
</ul>

						
					</div>
				</div>
			</div>
		</div>



<div id="gallery_wrap">
<div class="pager_link"><?php echo $pager['pager_res'];?></div>

<div class="pager_link"><?php echo $pager['pager_res'];?></div>
<?php PHPkoubou($encodingType,$copyright,$warningMesse);}//著作権表記削除不可?>
</div>

</div>
			<!-- End: Mrs-->
		
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
	<?php include("common/js.html"); ?>
	<!-- END: Inclide JS -->
</body>
</html>