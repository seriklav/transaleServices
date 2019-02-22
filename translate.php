<?php 
	// Translate API
    /*
     * https://multillect.com/apidoc
     * echo "<pre>";print_r(gtranslate("Hello", "en", "ru"));exit;
     */
    function gtranslate($str, $lang_from, $lang_to) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.multillect.com/translate/json/1.0/987?method=translate/api/translate&from=' . urlencode($lang_from) . '&to=' . urlencode($lang_to) . '&text=' . urlencode($str) . '&politeness=&sig=7af031c46b9a323e41301ea2a40d9440');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
        $out = curl_exec($curl);
        curl_close($curl);

        $decode = json_decode($out);

        if (!$decode->error) {
            return $decode->result->translated;
        }

        return false;
    }
    
?>
