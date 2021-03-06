<?php
/* ###############################################################################
 *
 * システム名
 *   ラジカルオプティ サロン事業 POSシステム
 *
 * 機能
 *   CahePHP セッション設定 [個人・デフォルト環境]
 *
 * バージョン
 *   0.0.0_0
 *
 * 履歴
 *   2016/02/08 K.Sonohara
 *     新規作成
 *
 * ###############################################################################
 */

// ###############################################################################
//  変数・定義値
// ###############################################################################

/**
 * rdb: モデル及びセッション及び用データベース設定
 * s3: AWS S3設定.
 */
Configure::write('Session', array(
    'defaults' => 'php',
    'cookie' => 'pos',
    'timeout' => 4320, //3 days
));