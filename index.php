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
<title>ミスミセス | メンズエステ | 大阪 | 天神橋六丁目 | 扇町 | 南森町 | 長堀橋</title>
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
</head>
<body>

	<div class="fh5co-loader"></div>
	<!-- START:Facebook js -->
	<?php include("common/facebook_js.html"); ?>
	<!-- END:Facebook js -->
	<div id="page">


		<!-- START:header -->
		<header id="" class="fh5co-cover" role="banner" data-stellar-background-ratio="0.5">
		
			<!-- START:Navigation-->
			<?php include("common/navi.html"); ?>

		</header>
		<!-- END:header -->
		<!-- START:Main -->

		<!-- START:contact -->
		<!-- 		<div id="fh5co-couple" class="sp-display-none">
			<div class="container">
				<div class="row">
					<div class="col-xs-4 text-center fh5co-heading animate-box">
						<a href="system.php">
							<img src="images/menu_system.png" class="image-witdh100">
						</a>
					</div>
					<div class="col-xs-4  text-center fh5co-heading animate-box">
						<a href="http://blog.livedoor.jp/missmrs05/">
							<img src="images/menu_schedule.png" class="image-witdh100">
						</a>
					</div>

					<div class="col-xs-4  text-center fh5co-heading animate-box">
						<a href="therapist.php">
							<img src="images/menu_therapist.png" class="image-witdh100">
						</a>
					</div>
				</div>
			</div>
		</div> -->
		<!-- END:contact -->

		<!-- START:contact -->
		<div id="fh5co-couple">
			<div class="container">
				<div class="row">
					<div class="col-md-12  text-center fh5co-heading animate-box">
						<a href="form.php">
							<img src="images/recruit.png" class="image-witdh100">
						</a>
					</div>
				</div>
			</div>
		</div>
		<!-- END:contact -->

		<!-- START:contact -->
		<div id="fh5co-couple">
			<div class="container">
				<div class="row">
					<div class="col-md-4  text-center fh5co-heading animate-box">
						<a href="tel:090-3053-0184">
							<img src="images/tel.png" class="image-witdh100">
						</a>
					</div>
					<div class="col-md-4  text-center fh5co-heading animate-box">
						<a href="http://line.me/ti/p/LIL-_8S4Qh">
							<img src="images/line.png" class="image-witdh100">
						</a>
					</div>

					<div class="col-md-4  text-center fh5co-heading animate-box">
						<a href="mailto:missmrs@docomo.ne.jp">
							<img src="images/mail.png" class="image-witdh100">
						</a>
					</div>
				</div>
			</div>
		</div>
		<!-- END:contact -->

		<!-- START:blog -->
		<div id="fh5co-couple">
			<div class="container">
				<div class="row">
					<div class="col-md-6  text-center fh5co-heading animate-box blog">
						<h2>Mrs.Miss Blog</h2>
						<div class="text-left">
							<?php
                                // モジュールを読み込む
                                require_once("./magpierss/rss_fetch.inc");

                                // キャッシュディレクトリへのパスを設定
                                // キャッシュディレクトリをchmod 777 (or 707 or 700)
                                define("MAGPIE_CACHE_DIR", "/path/2/cache/");
                                // 日本語バケないためにOUTPUT_ENCODINGをUTF-8にする
                                define("MAGPIE_OUTPUT_ENCODING","UTF-8");
                                // 取得したいRSSのurl
                                $url = "http://blog.livedoor.jp/missmrs02/atom.xml";

                                // ブログのタイトルは$rss->channel['title']という変数、
                                // RSSは$rss->itemという変数に入る。
                                // key値、link/title/descriptionで取得できる。
                                $rss = fetch_rss( $url );
                                //var_dump ($rss);
                                $max_lines = 10;
                                $line = 0;
                                //echo "". mb_convert_encoding($rss->channel['title'],"UTF-8","auto");
                                foreach ($rss->items as $item) {
                                $link = mb_convert_encoding($item['link'],"UTF-8","auto");
                                $title = mb_convert_encoding($item['title'],"UTF-8","auto");
                                $date = date("Y.m.d H:i", strtotime($item['modified']));
                                if (preg_match("/PR$/", $title) != 0) continue;
                                if (preg_match("/^PR:.+$/", $title) != 0) continue;
                                if ($line++ == $max_lines) break;
                                //echo "<a href=$link>$title</a><br />$description";
                                echo "<dl><dt>$date</dt><dd><a href=\"$link\" target=\"_blank\">$title</a></dd></dl>";
                                }
                                 ?>
							<a href="http://blog.livedoor.jp/missmrs02/" target="_blank" class="more">
								Mrs.Miss Blogはこちら
								<span>▲</span>
							</a>
						</div>
					</div>

					<div class="col-md-6  text-center fh5co-heading animate-box blog">
						<h2>Schedule</h2>
						<div class="text-left">
							<?php
                        // モジュールを読み込む
                        require_once("./magpierss/rss_fetch.inc");

                        $url = "http://missmrs05.blog.fc2.com/?xml";

                        // ブログのタイトルは$rss->channel['title']という変数、
                        // RSSは$rss->itemという変数に入る。
                        // key値、link/title/descriptionで取得できる。
                        $rss = fetch_rss( $url );
                        //var_dump ($rss)more;
                        $max_lines = 10;
                        $line = 0;
                        //echo "". mb_convert_encoding($rss->channel['title'],"UTF-8","auto");
                        foreach ($rss->items as $item) {
                        $link = mb_convert_encoding($item['link'],"UTF-8","auto");
                        $title = mb_convert_encoding($item['title'],"UTF-8","auto");
                        $description = mb_convert_encoding($item['description'],"UTF-8","auto");
                        $date = date("Y.m.d H:i", strtotime(substr($item['dc']['date'],0,10)));
                        if (preg_match("/PR$/", $title) != 0) continue;
                        if (preg_match("/^PR:.+$/", $title) != 0) continue;
                        if ($line++ == $max_lines) break;
                        //echo "<a href=$link">$title</a><br />$description";
                        echo "<dl><dt>$date</dt><dd><a href=\"$link\" target=\"_blank\">$title</a></dd></dl>";
                        }
                        ?>

							<a href="http://missmrs05.blog.fc2.com/" target="_blank" class="more">
								出勤情報Blogはこちら
								<span>▲</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END:blog -->

		<!-- START:SNS -->
		<div id="fh5co-couple">
			<div class="container">
				<div class="row">
					<div class="col-md-6  text-center fh5co-heading animate-box">
						<h2>facedbook</h2>

						<div class="fb-page" data-href="https://www.facebook.com/MissMrs-747337258740161/" data-small-header="false"
							data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false">
							<blockquote cite="https://www.facebook.com/MissMrs-747337258740161/" class="fb-xfbml-parse-ignore">
								<a href="https://www.facebook.com/MissMrs-747337258740161/">Miss.Mrs</a>
							</blockquote>
						</div>
					</div>

					<div class="col-md-6  text-center fh5co-heading animate-box">
						<h2>instagram</h2>
						<div style="position: relative; height: 16px; width: 100%; overflow: hidden; padding-top: 100%;">
							<iframe src="//widgets-code.websta.me/w/7001f4603d51?ck=MjAxNi0xMi0wNFQwNzowMTozOS4wMDBa" class="websta-widgets"
								allowtransparency="true" frameborder="0" scrolling="no" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>
							WEBSTA WIDGETS - widgets.websta.me
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END:SNS -->

		<!-- START:About MissMrs -->
		<div id="fh5co-couple">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-left fh5co-heading animate-box">
						<h2>About Miss.Mrs</h2>
						<p>当店Miss.Mrs(ミスミセス)は大阪市北区は南森町.扇町.天六.ミナミ(中央区)には長堀橋にある完全予約制のプライベートメンズエステです。</p>
						<p>営業時間は午前11:00〜翌朝5:00迄(最終受付午前3:00)全室駅から近く各駅から2分以内の綺麗なシャワー完備の完全個室型になっております。</p>
						<p>20代〜40代の愛嬌、品、マナーのある素敵な女性が多数在籍しており各セラピストによる貴方様に合った癒しを提供しています。</p>
						<p>セラピストの技術向上の為、当店では研修も徹底している為、お好みの箇所などお気軽にお申し付け下さい。</p>
						<p>当店は、リピーター様を大事にがコンセプトで受付時には、是非セラピストのタイプをお申し付け下さい。</p>
						<p>新規のお客様に置かれましても、リピーター様になって頂ける様に、お客様に合ったセラピストを御案内致します！</p>
						<p>あそこに行けば間違い無いと言われる様、これからも多数の新人セラピストの導入各セラピストの技術向上、接客スタイルなど誠心誠意向上していく所存です。</p>
						<p>皆様に最高の癒しと安らぎを提供出来ます様、日々努力致しますので、メンズエステMiss.Mrs(ミスミセス)をこれからもよろしくお願い致します！</p>
					</div>
				</div>
			</div>
		</div>
		<!-- END:About MissMrs -->

		<!-- START:Refnavi -->
		<div id="fh5co-couple">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-left fh5co-heading animate-box">
						<a href="http://osaka.refle.info/">
							<img src="http://osaka.refle.info/images/area/bunner200_2.gif" alt="マッサージ店を探すならリフナビ大阪">
						</a>
					</div>
				</div>
			</div>
		</div>
		<!-- END:Refnavi -->


		<!-- END:Main -->

		<!-- START:footer -->
		<?php include("common/footer.html"); ?>
		<!-- END:footer -->

		<!-- START:footer menu -->
		<?php include("common/footer_menu.html"); ?>
		<!-- END:footer menu-->

	</div>


	<!-- START: goto top -->
	<?php include("common/gototop.html"); ?>
	<!-- END: goto top -->

	<!-- START: Inclide JS -->
	<?php include("common/js.html"); ?>
	<!-- END: Inclide JS -->

</body>
</html>