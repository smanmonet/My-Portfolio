<?php
class CipherModel {
    public function caesar_encrypt($plaintext, $shift) {
        $encrypted = '';
        for ($i = 0; $i < strlen($plaintext); $i++) {
            $char = $plaintext[$i];
            if (ctype_alpha($char)) {
                $base = ctype_lower($char) ? 'a' : 'A';
                $encrypted .= chr((ord($char) + $shift - ord($base)) % 26 + ord($base));
            } else {
                $encrypted .= $char;
            }
        }
        return $encrypted;
    }

    public function caesar_decrypt($ciphertext, $shift) {
        return $this->caesar_encrypt($ciphertext, 26 - $shift);
    }
}
?>
