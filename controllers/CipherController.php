<?php
class CipherController {
    
    // Caesar cipher encryption
    public function caesar_encrypt($plaintext, $shift) {
        $result = '';
        $shift = $shift % 26; // Handle shifts greater than 26
        for ($i = 0; $i < strlen($plaintext); $i++) {
            $char = $plaintext[$i];

            // Encrypt uppercase characters
            if (ctype_upper($char)) {
                $result .= chr((ord($char) + $shift - 65) % 26 + 65);
            } 
            // Encrypt lowercase characters
            elseif (ctype_lower($char)) {
                $result .= chr((ord($char) + $shift - 97) % 26 + 97);
            } 
            // Leave non-alphabetic characters unchanged
            else {
                $result .= $char;
            }
        }
        return $result;
    }
    public function handleRequest() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $plaintext = $_POST['plaintext'];
            $cipherType = $_POST['cipherType'];
            $action = $_POST['action'];
            $result = '';
    
            // Switch between different cipher types
            switch ($cipherType) {
                case 'caesar':
                    $shift = intval($_POST['shift']);
                    if ($action == 'encrypt') {
                        $result = $this->caesar_encrypt($plaintext, $shift);
                    } else {
                        $result = $this->caesar_decrypt($plaintext, $shift);
                    }
                    break;
    
                case 'vigenere':
                    $key = $_POST['key'];
                    if ($action == 'encrypt') {
                        $result = $this->vigenere_encrypt($plaintext, $key);
                    } else {
                        $result = $this->vigenere_decrypt($plaintext, $key);
                    }
                    break;
    
                case 'base64':
                    if ($action == 'encrypt') {
                        $result = $this->base64_encrypt($plaintext);
                    } else {
                        $result = $this->base64_decrypt($plaintext);
                    }
                    break;
    
                default:
                    $result = 'Invalid cipher type!';
                    break;
            }
    
            return $result;
        }
        return null;
    }
    

    // Caesar cipher decryption
    public function caesar_decrypt($ciphertext, $shift) {
        return $this->caesar_encrypt($ciphertext, -$shift);
    }

    // Vigenère cipher encryption
    public function vigenere_encrypt($plaintext, $key) {
        $result = '';
        $key = strtoupper($key);
        $keyLength = strlen($key);
        $textLength = strlen($plaintext);
        
        for ($i = 0, $j = 0; $i < $textLength; $i++) {
            $char = $plaintext[$i];
    
            // Encrypt only alphabetic characters
            if (ctype_alpha($char)) {
                $shift = ord($key[$j % $keyLength]) - 65; // Shift based on key
                $j++; // Increment key index only if char is alphabetic
    
                if (ctype_upper($char)) {
                    $result .= chr((ord($char) + $shift - 65) % 26 + 65);
                } else {
                    $result .= chr((ord($char) + $shift - 97) % 26 + 97);
                }
            } else {
                $result .= $char; // Non-alphabetic characters remain unchanged
            }
        }
        return $result;
    }
    

    // Vigenère cipher decryption
    public function vigenere_decrypt($ciphertext, $key) {
        $result = '';
        $key = strtoupper($key);
        $keyLength = strlen($key);
        $textLength = strlen($ciphertext);
        
        for ($i = 0, $j = 0; $i < $textLength; $i++) {
            $char = $ciphertext[$i];
    
            // Decrypt only alphabetic characters
            if (ctype_alpha($char)) {
                $shift = ord($key[$j % $keyLength]) - 65; // Shift based on key
                $j++; // Increment key index only if char is alphabetic
    
                if (ctype_upper($char)) {
                    $result .= chr((ord($char) - $shift - 65 + 26) % 26 + 65);
                } else {
                    $result .= chr((ord($char) - $shift - 97 + 26) % 26 + 97);
                }
            } else {
                $result .= $char; // Non-alphabetic characters remain unchanged
            }
        }
        return $result;
    }
    

    // Base64 encoding
    public function base64_encrypt($plaintext) {
        return base64_encode($plaintext);
    }

    // Base64 decoding
    public function base64_decrypt($ciphertext) {
        return base64_decode($ciphertext);
    }
}
?>
