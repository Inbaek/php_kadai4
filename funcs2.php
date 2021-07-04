<?php
//XSS対応（ echoする場所で使用！）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続関数：db_conn() 
//※関数を作成し、内容をreturnさせる。
//※ DBname等、今回の授業に合わせる。
function db_conn(){
    try {
        $db_name = "salmonokapi5_inbaek-ho";    //データベース名
        $db_id   = "salmonokapi5";     //アカウント名
        $db_pw   = "salmonokapi555";      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = "mysql57.salmonokapi5.sakura.ne.jp"; //DBホスト
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo; //1行追記
      } catch (PDOException $e) {
      exit('DBConnectError:'.$e->getMessage());
      }
}

function db_conn2(){
    try {
        $db_name = "salmonokapi5_inbaek-ho";    //データベース
        $db_id   = "salmonokapi5";     //アカウント名
        $db_pw   = "salmonokapi555";      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = "mysql57.salmonokapi5.sakura.ne.jp"; //DBホスト
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo; //1行追記
      } catch (PDOException $e) {
      exit('DBConnectError:'.$e->getMessage());
      }
}

//SQLエラー関数：sql_error($stmt)
function sql_error ($stmt){
    $error = $stmt->errorInfo();
    exit("SQLError:" . print_r($error, true)); 
}

//リダイレクト関数: redirect($file_name)
function redirect($file_name){
    header("Location: ".$file_name);
    exit();
}

//ログインチェック
function loginCheck(){
    if( $_SESSION["chk_ssid"] != session_id() ){
      exit('LOGIN ERROR');
    }else{
      session_regenerate_id(true);
      $_SESSION['chk_ssid'] = session_id();
    }
  }