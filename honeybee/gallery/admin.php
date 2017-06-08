<?php 

header("Content-Type: text/html;charset=UTF-8");
header("Expires: Thu, 01 Dec 1994 16:00:00 GMT");
header("Last-Modified: ". gmdate("D, d M Y H:i:s"). " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

#設定ファイルインクルード
require_once('./config.php');
//----------------------------------------------------------------------
//  ログイン処理 (START)
//----------------------------------------------------------------------
session_start();
authAdmin($userid,$password);
//----------------------------------------------------------------------
//  ログイン処理 (END)
//----------------------------------------------------------------------

//----------------------------------------------------------------------
//  データ保存用ファイル、画像保存ディレクトリのパーミッションチェック (START)
//----------------------------------------------------------------------
$messe = permissionCheck($file_path,$img_updir,$perm_check01,$perm_check02,$perm_check03);
//----------------------------------------------------------------------
//  データ保存用ファイルのパーミッションチェック (END)
//----------------------------------------------------------------------

//モードを取得
$mode = '';
if(!empty($_GET['mode'])){
	$mode = h($_GET['mode']);
}
//ページャーセット
$pager = pagerOut(file($file_path),$pagelengthAdmin,$pagerDispLength);

//----------------------------------------------------------------------
//  書き込み・編集処理 (START)
//----------------------------------------------------------------------

if ( (isset($_POST['submit']) || isset($_POST['edit_submit']) ) && !isset($_POST['del'])){
	
	//トークンチェック（CSRF対策）
	if(empty($_SESSION['token']) || ($_SESSION['token'] !== $_POST['token'])){
		exit('ページ遷移エラー');
	}
	//トークン破棄
	$_SESSION['token'] = '';
	  
	//各記事にユニークなIDを付与　uniqid（PHP3以下）が無ければ年月日時分秒
	$id = generateID();
		

	//----------------------------------------------------------------------
	//  画像縮小保存処理 GD必須 (END)
	//----------------------------------------------------------------------
	  
		$up_ymd=mb_convert_kana($_POST['year'], 'n',"UTF-8")."/".mb_convert_kana($_POST['month'], 'n',"UTF-8")."/".mb_convert_kana($_POST['day'], 'n',"UTF-8");
		$up_ymd = str_replace(",","",$up_ymd);
		if(isset($_POST['title'])){
		  $title = replace_func($_POST['title']);
		}

		if(isset($_POST['desc'])){
		  $desc = replace_func($_POST['desc']);
		}
		
		
		//並び順。デフォルトは空にする
		$dspno = "1";
		if(isset($_POST['dspno'])){
		  $dspno = $_POST['dspno'];
		}


		$age = "";
		if(isset($_POST['age'])){
		  $age = replace_func($_POST['age']);
		}
		
		$experience = 1;
		if(isset($_POST['experience'])){
		  $experience = replace_func($_POST['experience']);
		}

		$looking = 2;
		if(isset($_POST['looking'])){
			$looking = replace_func($_POST['looking']);
		}

		$rank = 1;
		if(isset($_POST['rank'])){
			$rank = replace_func($_POST['rank']);
		}
		
		$lines = file($file_path);
		
		$fp = @fopen($file_path, "r+b") or die("fopen Error!!DESUYO--!!!");
		//$writeData = $id  . "," .$up_ymd. "," .$title. "," .$extension. ",".$dspno.",". "\n";
//		$writeData = $id  . "," .$up_ymd. "," .$title. "," .$extension. ",".$dspno."," .$age."," .$experience. "," .$looking. ",". "\n";
		$writeData = $id  . "," .$up_ymd. "," .$title. "," .$desc. ",".$dspno."," .$age."," .$experience. "," .$looking. "," .$rank. ",". "\n";

		 // 俳他的ロック
		if(flock($fp, LOCK_EX)){
			ftruncate($fp,0);
			rewind($fp);
			// 書き込み
			if (isset($_POST['submit'])){
				fwrite($fp, $writeData);
				if($max_line!='') $max_line --;
			}
			if ($max_line!='' and count($lines) > $max_line) {
				$max_i = $max_line;
			} else {
				$max_i = count($lines);
			}
			for ($i = 0; $i < $max_i; $i++) {
				if (isset($_POST['edit_submit'])){
					$lines_array[$i] = explode(",",$lines[$i]);
					if($lines_array[$i][0] != $id){
						 fwrite($fp, $lines[$i]);
					}else{
						fwrite($fp, $writeData);
					}
				}else{			
					fwrite($fp, $lines[$i]);
				}
			}
		}
	fclose($fp);
	//再送信防止リダイレクト
	if(isset($_POST['submit'])) header("Location: ./complete.php?mode=registComp&page={$pager['pageid']}");
	if(isset($_POST['edit_submit'])) header("Location: ./complete.php?mode=editComp&page={$pager['pageid']}");
	exit();
//----------------------------------------------------------------------
//  書き込み・編集処理 (END)
//----------------------------------------------------------------------
}

//----------------------------------------------------------------------
//  データ削除処理 (START)
//----------------------------------------------------------------------
if(isset($_POST['del'])){
	$messe = delDetaToImg($file_path,$max_line,$img_updir);
}
//----------------------------------------------------------------------
//  データ削除処理 (END)
//----------------------------------------------------------------------

//----------------------------------------------------------------------
//  再表示処理 非表示処理 (START)
//----------------------------------------------------------------------
if($mode == 'disp' or $mode == 'no_disp'){
	$messe = dispModeChange($mode,$file_path,$max_line);
}
//----------------------------------------------------------------------
//  再表示処理 非表示処理 (END)
//----------------------------------------------------------------------

//----------------------------------------------------------------------
//  並び順変更処理 (START)
//----------------------------------------------------------------------
if(isset($_POST['order_submit'])){
	$messe = orderChange($file_path);
}
//----------------------------------------------------------------------
//  並び順変更処理 (END)
//----------------------------------------------------------------------

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex,nofollow" />
<title>セラピスト管理画面</title>
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<link href="style.css" rel="stylesheet" type="text/css" media="all" />
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Expires" content="Thu, 01 Dec 1994 16:00:00 GMT">
<link rel="stylesheet" type="text/css" href="js/lightbox/jquery.lightbox-0.5.css"/>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>   
<script type="text/javascript" src="//code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/lightbox/jquery.lightbox-0.5.min.js"></script>
<link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body id="admin">
<div id="wrapper">
<?php if(!$copyright){ echo $warningMesse; exit;}else{
if(!empty($messe)) echo '<p class="fc_red message_com">'.$messe.'</p>';
$compMesse = compMesse($mode);
if(!empty($compMesse)) echo '<p class="fc_red message_com">'.$compMesse.'</p>';
?>
<div class="logout_btn"><a href="?logout=true">ログアウト</a></div>
<h1>セラピスト管理画面</h1>
<h2>画像登録・編集フォーム</h2>
<form method="post" action="admin.php<?php echo "?page={$pager['pageid']}";?>" enctype="multipart/form-data" name="form">

<?php
//トークンセット
//openssl_random_pseudo_bytesは重いため却下
//if(function_exists('openssl_random_pseudo_bytes')){
//	$token = openssl_random_pseudo_bytes(16);
//	$token = bin2hex($token);
//}
//else{
//	$token = sha1(uniqid(mt_rand(), true));
//}

$token = sha1(uniqid(mt_rand(), true));
$_SESSION['token'] = $token;
?>
<input type="hidden" name="token" value="<?php echo h($_SESSION['token']);//トークン発行?>" />

<?php
//----------------------------------------------------------------------
// 　編集フォーム表示処理 (START)
//----------------------------------------------------------------------
if($mode == 'edit'){
	$id = h($_GET['id']);
    $lines = file($file_path);
	foreach($lines as $linesVal){
		$lines_array = explode(",",$linesVal);
		if($lines_array[0] == $id){
			break; 
		}
	}
	$lines_array[3] = rtrim($lines_array[3]);
	$lines_array[2] = str_replace(array("<br>","<br>"),"\n",$lines_array[2]);//改行（<br>）を改行コードに変換
$lines_array[3] = str_replace(array("<br />","<br />"),"\n",$lines_array[3]);//改行（<br>）を改行コードに変換
?>
<p style="color:red;font-size:16px;">下記内容を編集後「変更」ボタンを押してください。<a href="admin.php<?php echo "?page={$pager['pageid']}";?>">編集をキャンセル⇒</a></p>

<input type="hidden" name="id" value="<?php echo $id;?>" />
<input type="hidden" name="extension_type" value="<?php echo $lines_array[3];?>" />
<input type="hidden" name="dspno" value="<?php if(!empty($lines_array[4])) echo $lines_array[4];?>" />
<?php if(strpos($id,'no_disp') !== false) $id = str_replace('no_disp','',$id); ?>
<?php $up_ymd_array = explode("/",$lines_array[1]);?>

<p>日付：<input type="text" name="year" size="5" maxlength="4" value="<?php echo $up_ymd_array[0];?>" /> 年 <input type="text" name="month" size="2" maxlength="2" value="<?php echo $up_ymd_array[1];?>" /> 月 <input type="text" name="day" size="2" maxlength="2" value="<?php echo $up_ymd_array[2];?>" /> 日　※半角数字のみ</p>

<h3>セラピスト名</h3>
<input type="text" name="title" value="<?php echo $lines_array[2];?>">
<br>
<h3>セラピストランク</h3>
	<input type="radio" name="rank" value="1" <?php if($lines_array[8] == 1){ print "checked";}?>> レギュラー
	<input type="radio" name="rank" value="2" <?php if($lines_array[8] == 2){ print "checked";}?>> プレミアム


<br>
<h3>セラピスト説明</h3>
<textarea name="desc" cols="60" rows="3"><?php echo $lines_array[3];?></textarea>
<br><br>
<h3>年齢：</h3><input type="text" name="age" size="2" maxlength="2" value="<?php echo $lines_array[5]?>" /> 
<br>

<h3>経験有無</h3>
	<input type="radio" name="experience" value="1" <?php if($lines_array[6] == 1){ print "checked";}?>> あり
	<input type="radio" name="experience" value="2" <?php if($lines_array[6] == 2){ print "checked";}?>> なし
<br>

<h3>経験有無</h3>
	<input type="radio" name="looking" value="1" <?php if($lines_array[7] == 1){ print "checked";}?>> スレンダー
	<input type="radio" name="looking" value="2" <?php if($lines_array[7] == 2){ print "checked";}?>> 普通
	<input type="radio" name="looking" value="3" <?php if($lines_array[7] == 3){ print "checked";}?>> むっちり
<br>	

<p>■削除チェック　<input type="checkbox" name="del" value="true" /> <span style="font-size:13px;color:#666">※削除する場合はこちらにチェックを入れて「変更」ボタンを押してください。データ（画像データ含む）は完全に削除されます。</span></p>

<br>
<br></p>
<p align="center"><input type="submit" class="submit_btn" name="edit_submit" value="　変更、または削除実行　" /></p>
<?php
//----------------------------------------------------------------------
// 　編集フォーム表示処理 (END)
//----------------------------------------------------------------------
}else{
//----------------------------------------------------------------------
// 　新規登録フォーム表示処理 (START)
//----------------------------------------------------------------------
?>
<p>日付：<input type="text" name="year" size="5" maxlength="4" value="<?php echo @date("Y",time());?>" /> 年 <input type="text" name="month" size="2" maxlength="2" value="<?php echo @date("n",time());?>" /> 月 <input type="text" name="day" size="2" maxlength="2" value="<?php echo @date("j",time());?>" /> 日　※半角数字のみ</p>
<h3>セラピスト名</h3>
<input type="text" name="title" cols="60" rows="3"></textarea>
<br><br>

<h3>セラピストランク</h3>
	<input type="radio" name="rank" value="1" /> レギュラー
	<input type="radio" name="rank" value="2" /> プレミアム
<br><br>

<h3>セラピスト説明</h3>

<textarea name="desc" cols="60" rows="3"></textarea>
<br><br>

<h3>年齢：</h3><input type="text" name="age" size="2" maxlength="2" value="" /> 
<br><br>

<h3>経験有無</h3>
	<input type="radio" name="experience" value="1" /> あり
	<input type="radio" name="experience" value="2" /> なし
<br><br>

<h3>体型</h3>
	<input type="radio" name="looking" value="1" /> スレンダー
	<input type="radio" name="looking" value="2" /> 普通
	<input type="radio" name="looking" value="3" /> むっちり
<br><br>


<p align="center"><input type="submit" class="submit_btn" name="submit" value="　新規登録　" onclick="return check()"/></p>
<?php
//----------------------------------------------------------------------
// 　新規登録フォーム表示処理 (END)
//----------------------------------------------------------------------
}
?>
</form>
<div class="positionBase">
<h2>登録画像一覧　<?php if($mode == 'img_order') echo '【並び替えモード】';?></h2>


<?php if($mode == 'img_order'){//並び替えモード時?>
<div class="orderButton"><a href="?">通常モードへ</a></div>
<?php }else{ ?>
<div class="orderButton"><a href="?mode=img_order">並び替えモードへ</a></div>
<?php } ?>
</div><!-- /positionBase -->
<?php 
$lines = newsListSort(file($file_path));
$max_i = count($lines);
?>
<p class="taR pr10 pt10">[ 登録数：<?php echo $max_i;?> ]</p>
<div id="gallery_wrap">
<?php if($mode != 'img_order') echo '<div class="pager_link">'.$pager['pager_res'].'</div>';//ページャー表示?>

<?php if($mode == 'img_order'){//並び替えモード時?>
<form method="post" action="admin.php?mode=img_order" enctype="multipart/form-data">
<ul id="gallery_list" class="clearfix gallery_list_order">
<?php }else{ ?>
<ul id="gallery_list" class="clearfix">
<?php } ?>

<?php
//----------------------------------------------------------------------
//  リスト表示処理 (START)
//----------------------------------------------------------------------

//並び替えモード時全表示
if($mode == 'img_order'){
	$pager['index'] = 0;
	$pagelengthAdmin = $max_i;
}

for($i = $pager['index']; ($i-$pager['index']) < $pagelengthAdmin; $i++){
	if(!empty($lines[$i])){
		$lines_array[$i] = explode(",",$lines[$i]);
		$id=$lines_array[$i][0];
		$lines_array[$i][3] = rtrim($lines_array[$i][3]);
		$lines_array[$i][1] = ymd2format($lines_array[$i][1]);//日付フォーマットの適用
		$alt_text = str_replace('<br>','',$lines_array[$i][2]);

		if($lines_array[$i][6] == 1){
			$experience = "あり";
		} else {
			$experience = "なし";
		}


		if($lines_array[$i][7] == 1){
			$looking = "スレンダー";
		} else if ($lines_array[$i][7] == 2){
			$looking = "普通";
		} else {
			$looking = "むっちり";
		}

		if($lines_array[$i][8] == 1){
			$rank = "レギュラー";
		} else {
			$rank = "プレミアム";
		}


		if(strpos($lines_array[$i][0], 'no_disp') !== false){
			$img_id = str_replace('no_disp','',$lines_array[$i][0]);

echo <<<EOF

<li class="no_disp"> 
{$lines_array[$i][1]} 
<a class="photo" href="{$img_updir}/{$img_id}.{$lines_array[$i][3]}" 
	title="
  {$lines_array[$i][2]} ({$lines_array[$i][5]})
	<br>
	セラピスト経験：$experience / 体型：$looking
	">
</a>
<a class="button" href="?mode=disp&id={$id}&page={$pager['pageid']}">表示する</a>
<a class="button" href="?mode=edit&id={$id}&page={$pager['pageid']}">[編集・削除]</a>
<div class="hidden_text">非表示中</div>
<input type="hidden" name="sort[]" value="{$id}" />
</li>

EOF;
		}else{
echo <<<EOF

<li>
【セラピスト名】<br>
{$lines_array[$i][2]}
<br><br>

 【セラピストランク】<br>
$rank
<br><br>

【セラピスト説明】<br>
{$lines_array[$i][3]}
<br><br>

【年齢】<br>
{$lines_array[$i][5]}
<br><br>

【セラピスト経験】<br>
$experience 
<br><br>
 【体型】<br>
$looking

<a class="button" href="?mode=no_disp&id={$id}&page={$pager['pageid']}">非表示にする</a>
<a class="button" href="?mode=edit&id={$id}&page={$pager['pageid']}">編集・削除</a>
<input type="hidden" name="sort[]" value="{$id}" /></li>

EOF;
		}
	}
}
//----------------------------------------------------------------------
//  リスト表示処理 (END)
//----------------------------------------------------------------------
?>
</ul>
<?php if($mode == 'img_order'){//並び替えモード時 ?>
<div class="taC mt10"><input type="submit" class="submit_btn" name="order_submit" value="　並び替え反映　" /></div>
</form>
<?php }else{ ?>
<div class="taC mt10"><input type="button" disabled="disabled"  value="並び替えは「並び替えモード」に切り替えて下さい" /></div>
<?php } ?>
<?php if($mode != 'img_order') echo '<div class="pager_link">'.$pager['pager_res'].'</div>';//ページャー表示?>

</div>
<br>
<br>
<?php echo $copyright;}//著作権表記リンク無断削除禁止?>
</div>
</body>
</html>