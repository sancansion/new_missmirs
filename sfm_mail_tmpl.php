<?php

// ����������Subject�ʷ�̾��
$mailSubject = '�ڤ����硦�����̳�ǧ�᡼���';

//������å�����
$mailMessage = <<< EOD
�ʲ������Ƥ�ե�������������ޤ�����
��������������������������������
1.��̾��
{$sfm_mail->name}

2.��ǯ����
{$sfm_mail->day1} ǯ {$sfm_mail->day2} �� {$sfm_mail->day3} ��

3.�����ֹ�
{$sfm_mail->tel1} - {$sfm_mail->tel2} - {$sfm_mail->tel3}

4.�᡼�륢�ɥ쥹
{$sfm_mail->email}

5.�����ޤ�
{$sfm_mail->address}

6.�и�
{$sfm_mail->ex}

7.��˾��������
{$sfm_mail->m} �� {$sfm_mail->d} �� {$sfm_mail->t} ����

8.�����䡦����˾�ʤ�
{$sfm_mail->com}
��������������������������������
���桼��������
$sfm_userinfo
EOD;

?>
