<?php
//CONVERT UTF8 TO LATIN
function SEO_URL($text)
{
    $text = str_replace(
        [' ', '&quot;', '%', "/", " - ", ":", '<', '>', '?', "#", "^", "`", "'", "=", "!", ":", ".", "..", "*", "&", "__", "- ", " -", "  ", ',', '`', '“', '”', '"', '(', ')'],
        [' ', '', '', '', " ", " ", " ", "", "", "", "", " ", "", " ", " ", " ", "", "", "", "", "", " ", " ", " ", '', '', '', '', '', '', ''],
        $text);

    $chars = ["a", "A", "e", "E", "o", "O", "u", "U", "i", "I", "d", "D", "y", "Y"];

    $uni[0] = ["á", "à", "ạ", "ả", "ã", "â", "ấ", "ầ", "ậ", "ẩ", "ẫ", "ă", "ắ", "ằ", "ặ", "ẳ", "ẵ"];
    $uni[1] = ["Á", "À", "Ạ", "Ả", "Ã", "Â", "Ấ", "Ầ", "Ậ", "Ẩ", "Ẫ", "Ă", "Ắ", "Ằ", "Ặ", "Ẳ", "Ẵ"];
    $uni[2] = ["é", "è", "ẹ", "ẻ", "ẽ", "ê", "ế", "ề", "ệ", "ể", "ễ"];
    $uni[3] = ["É", "È", "Ẹ", "Ẻ", "Ẽ", "Ê", "Ế", "Ề", "Ệ", "Ể", "Ễ"];
    $uni[4] = ["ó", "ò", "ọ", "ỏ", "õ", "ô", "ố", "ồ", "ộ", "ổ", "ỗ", "ơ", "ớ", "ờ", "ợ", "ở", "ỡ"];
    $uni[5] = ["Ó", "Ò", "Ọ", "Ỏ", "Õ", "Ô", "Ố", "Ồ", "Ộ", "Ổ", "Ỗ", "Ơ", "Ớ", "Ờ", "Ợ", "Ở", "Ỡ"];
    $uni[6] = ["ú", "ù", "ụ", "ủ", "ũ", "ư", "ứ", "ừ", "ự", "ử", "ữ"];
    $uni[7] = ["Ú", "Ù", "Ụ", "Ủ", "Ũ", "Ư", "Ứ", "Ừ", "Ự", "Ử", "Ữ"];
    $uni[8] = ["í", "ì", "ị", "ỉ", "ĩ"];
    $uni[9] = ["Í", "Ì", "Ị", "Ỉ", "Ĩ"];
    $uni[10] = ["đ"];
    $uni[11] = ["Đ"];
    $uni[12] = ["ý", "ỳ", "ỵ", "ỷ", "ỹ"];
    $uni[13] = ["Ý", "Ỳ", "Ỵ", "Ỷ", "Ỹ"];

    for ($i = 0; $i <= 13; $i++) {
        $text = str_replace($uni[$i], $chars[$i], $text);
    }

    return str_replace([" ", "--", "---"], ["-", "-", "-"], trim($text));
}
