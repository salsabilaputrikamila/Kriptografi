<?php
/**
 * Created by: Atlas_Gondal
 * Date: 19/09/2017
 * Time: 6:17 AM
 */
    if(isset($_POST['submit'])){
        $alphabets = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
        $new_position = NULL;
        $encrypted_cipher = '';
        $decrypted_cipher = '';
        if($_POST['caeser'] == "encryption"){
            $plain_text = $_POST['plain-text'];
            $shifts = $_POST['shifts'];
            if(!empty($plain_text) && !empty($shifts)){
                $lowercase_plain_text = strtolower($plain_text);
                $count = strlen($lowercase_plain_text);
                for($x = 0; $x < $count; $x++){
                    if(ctype_alpha($lowercase_plain_text[$x])){
                        $current_position = array_search($lowercase_plain_text[$x], $alphabets);
                        $new_position = ($current_position + $shifts) % count($alphabets);
                        $new_position = $new_position < 0 ? $new_position + count($alphabets) : $new_position;
                    }
                    if($new_position === NULL){
                        $encrypted_cipher .= $lowercase_plain_text[$x];
                    }else{
                        $encrypted_cipher .= $alphabets[$new_position];
                    }
                    $new_position = NULL;
                }
            }
        } elseif ($_POST['caeser'] == "decryption"){
            $cipher_text = $_POST['cipher-text'];
            $decrypt_shifts = $_POST['decrypt-shifts'];
            if(!empty($cipher_text) && !empty($decrypt_shifts)){
                $lowercase_plain_text = strtolower($cipher_text);
                $count = strlen($lowercase_plain_text);
                for($x = 0; $x < $count; $x++){
                    if(ctype_alpha($lowercase_plain_text[$x])){
                        $current_position = array_search($lowercase_plain_text[$x], $alphabets);
                        $new_position = ($current_position - $decrypt_shifts) % count($alphabets);
                        $new_position = $new_position < 0 ? $new_position + count($alphabets) : $new_position;
                    }
                    if($new_position === NULL){
                        $decrypted_cipher .= $lowercase_plain_text[$x];
                    }else{
                        $decrypted_cipher .= $alphabets[$new_position];
                    }
                    $new_position = NULL;
                }
            }
        } else{
            //TODO - Handle Invalid Request
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">


</head>
<body style="background-color:#B0E0E6">
<br> <br>
    <div class="container" style="background-color:#FFE4E1">
        <div class="row" >
            <div class="col-md-6">
                <h1>Encryption</h1>
                <form method="post">
                    <div class="form-group">
                        <label for="textToEncrypt">Enter Plain Text</label>
                        <textarea class="form-control" id="textToEncrypt" name="plain-text" rows="5"><?php echo !empty($plain_text) ? $plain_text : '' ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="numberOfShifts">Number of Shifts</label>
                        <select class="form-control" id="numberOfShifts" name="shifts">
                            <?php
                            for($i = 1; $i<=10; $i++){
                                ?>
                                <option value="<?php echo $i; ?>" <?php if(!empty($shifts) && $shifts == $i) echo "selected"; ?>><?php echo $i; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <input type="hidden" name="caeser" value="encryption" />
                    </div>
                    <div class="form-group">
                        <label for="encryptedText">Encrypted Text</label>
                        <textarea class="form-control" id="encryptedText" rows="5" disabled><?php echo !empty($encrypted_cipher) ? $encrypted_cipher : '' ?></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">ENCRYPT</button> 
                </form>
            </div>
            <div class="col-md-6" style="background-color:#F5FFFA">
                <h1>Decryption</h1>
                <form method="post">
                    <div class="form-group">
                        <label for="textToDecrypt">Enter Cipher Text</label>
                        <textarea class="form-control" id="textToDecrypt" name="cipher-text" rows="5"><?php echo !empty($cipher_text) ? $cipher_text : '' ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="numberOfShiftsToDecrypt">Number of Shifts</label>
                        <select class="form-control" id="numberOfShiftsToDecrypt" name="decrypt-shifts">
                            <?php
                            for($i = 1; $i<=10; $i++){
                                ?>
                                <option value="<?php echo $i; ?>" <?php if(!empty($decrypt_shifts) && $decrypt_shifts == $i) echo "selected"; ?>><?php echo $i; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <input type="hidden" name="caeser" value="decryption" />
                    </div>
                    <div class="form-group">
                        <label for="decryptedText">Decrypted Text</label>
                        <textarea class="form-control" id="decryptedText" rows="5" disabled><?php echo !empty($decrypted_cipher) ? $decrypted_cipher : '' ?></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success">DECRYPT</button> 
                </form> <br>
            </div>
        </div>
        
    </div>

<!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>
