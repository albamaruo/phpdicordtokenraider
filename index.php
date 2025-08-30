<!DOCTYPE html>
<html lang="ja">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" charset="UTF-8"> 
    <title>おにゃんこ</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body> 
    <script type="text/javascript" src="https://ad.netowl.jp/js/star-php.js"></script>
    
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <a href="" class="inline-flex items-center gap-2.5 text-2xl font-bold text-black md:text-3xl" aria-label="logo">
                <img class="h-10 w-10 text-indigo-500" fill="currentColor" src="https://cdn.discordapp.com/avatars/1268119053914865710/1964d18febe7c9cfd675b96c52a3364d.png" style="border-radius:50%;">
                ARCA
            </a>
            <div class="text-center">
                <p class="text-4xl">ナード専用レイダー</p>
                <a href="https://www.youtube.com/watch?v=baAKcxoGQkg&t=27s">詳しい使い方はここを押せ</a>
            </div>

            <form id="botForm" method="post">
                <div class="sm:col-span-2">
                    <label for="token" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">
    token（カンマ区切りで複数入力可）
</label>
<input type="text" id="token" name="token" value="" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                </div>
                <div class="sm:col-span-2">
                    <label for="chi" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">
    サーバーID
</label>
<input type="text" value="" id="chi" name="chi" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                </div>
                <div class="sm:col-span-2">
                    <label for="msg" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">めせじ</label>
                    <textarea name="msg" value=""class="h-64 w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"></textarea>
                </div>
         
				<div class="sm:col-span-2">
                    <label for="chi" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">送信数</label>
                    <input type="text" value="100"id="kazu" name="kazu" class="mb-2 w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
                </div>
                <div class="flex items-center justify-between sm:col-span-2 mb-2">
                    <button type="submit" class="inline-block rounded-lg bg-red-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-red-300 transition duration-100 hover:bg-red-600 focus-visible:ring active:bg-red-700 md:text-base">FIREEEEEEEEEEEEEEEEEEEEEEEEEEEEE</button>
                </div>

<div class="flex divide-x rounded-lg border bg-gray-50">
      <div class="flex items-center p-2 text-indigo-500 md:p-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
      </div>

   <div class="p-4 md:p-6">
        <h3 class="mb-2 text-lg font-semibold md:text-xl">SIMPLE AND NYANKO&#128574;</h3>
        <p class="text-gray-500">ついにおにゃんこパワーを解き放つ時がきたニャ 質問とか喧嘩売りたい人はdiscord @mimisenairpodsもしくわ、、、、twitter @ctkp_aarr</p>
</div>
            </form>

 <?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tokens = explode(',', $_POST['token']); 
    $kazu = intval($_POST['kazu']);
    $guildIds = explode(',', $_POST['chi']); 
    $message = $_POST['msg'];
    $str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    for ($i = 0; $i < $kazu; $i++) {
        foreach ($tokens as $token) {
            $token = trim($token); 
            if (empty($token)) continue;
            foreach ($guildIds as $guildId) {
                $guildId = trim($guildId);
                if (empty($guildId)) continue;
                $url = "https://discord.com/api/v10/guilds/$guildId/channels";
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Authorization: ' . $token,
                    'Content-Type: application/json'
                ));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch);
                curl_close($ch);

                $channels = json_decode($result, true);
                if (!is_array($channels)) continue;

                foreach ($channels as $channel) {
       
                    if ($channel['type'] != 0) continue;
                    $channelId = $channel['id'];
                    $be = substr(str_shuffle($str), 0, 10);
                    $message2 = $message . " " . $be;
                    $url2 = "https://discord.com/api/v10/channels/$channelId/messages";
                    $data = array('content' => $message2);
                    $ch2 = curl_init($url2);
                    curl_setopt($ch2, CURLOPT_HTTPHEADER, array(
                        'Authorization: ' . $token,
                        'Content-Type: application/json'
                    ));
                    curl_setopt($ch2, CURLOPT_POST, true);
                    curl_setopt($ch2, CURLOPT_POSTFIELDS, json_encode($data));
                    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
                    curl_exec($ch2);
                    curl_close($ch2);
                }
            }
        }
        usleep(100000); 
    }
}
?>