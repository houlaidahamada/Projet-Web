<?php
function likes(){
session_start();

//if counter is not set, set to zero
if(!isset($_SESSION['likes'])) {
    $_SESSION['likes'] = 0;
}

//if button is pressed, increment counter
if(isset($_POST['button'])) {
    ++$_SESSION['likes'];
    if ($_SESSION['likes'] == $_SESSION['range'])
    {
        echo "<script>alert(\"vous pouvez faire un don à Vanestarre via ce lien\")</script>";
    }

}

if(!isset($_SESSION['lol'])) {
    $_SESSION['lol'] = 0;
}

//if button is pressed, increment counter
if(isset($_POST['lol'])) {
    ++$_SESSION['lol'];
    if ($_SESSION['lol']%50 == 1)
    {
        echo "<script>alert(\"vous pouvez faire un don à Vanestarre via ce lien\")</script>";
    }
}

if(!isset($_SESSION['cool'])) {
    $_SESSION['cool'] = 0;
}

//if button is pressed, increment counter
if(isset($_POST['cool'])) {
    ++$_SESSION['cool'];
    if ($_SESSION['cool']%50 == 1)
    {
        echo "<script>alert(\"vous pouvez faire un don à Vanestarre via ce lien\")</script>";
    }
}

if(!isset($_SESSION['love'])) {
    $_SESSION['love'] = 0;
}

//if button is pressed, increment counter
if(isset($_POST['love'])) {
    ++$_SESSION['love'];
    if ($_SESSION['love']%50 == 1)
    {
        echo "<script>alert(\"vous pouvez faire un don à Vanestarre via ce lien\")</script>";
    }
}

if(!isset($_SESSION['waw'])) {
    $_SESSION['waw'] = 0;
}

//if button is pressed, increment counter
if(isset($_POST['waw'])) {
    ++$_SESSION['waw'];
    if ($_SESSION['waw']%50 == 1)
    {
        echo "<script>alert(\"vous pouvez faire un don à Vanestarre via ce lien\")</script>";
    }
}

if(!isset($_SESSION['colere'])) {
    $_SESSION['colere'] = 0;
}

//if button is pressed, increment counter
if(isset($_POST['colere'])) {
    ++$_SESSION['colere'];
    if ($_SESSION['colere']%50 == 1)
    {
        echo "<script>alert(\"vous pouvez faire un don à Vanestarre via ce lien\")</script>";
    }
}

//reset counter
if(isset($_POST['reset'])) {
    $_SESSION['likes'] = 0;
    $_SESSION['lol'] = 0;
    $_SESSION['cool'] = 0;
    $_SESSION['love'] = 0;
    $_SESSION['waw'] = 0;
    $_SESSION['colere'] = 0;
    $_SESSION['emoji'] = 1;
    $_SESSION['counter'] = 0;
}
if(isset($_POST['plus'])) {
    if($_SESSION['emoji'] == 0){
        $_SESSION['emoji'] = 1;
    }else{
        $_SESSION['emoji'] = 0;
    }
}

//if button is pressed, increment counter
if($_SESSION['emoji'] == 0){

?>

<form method="POST">
    <div class="lignes">
        <!--<input type="hidden" name="counter" value="<?php echo $_SESSION['counter']; ?>" />-->
        <div class="col">
            <input type="submit" class="like" name="button" value=""/>
            <div>
            <?php  echo ''; ?>
            </div>
        </div>
        <div class="col">
            <input type="submit" class="lol" name="lol" value=""/>
            <div><?php  echo $_SESSION['lol'];?></div>
        </div>
        <div class="col">
            <input type="submit" class="cool" name="cool" value=""/>
            <div><?php  echo $_SESSION['cool'];?></div>
        </div>
        <div class="col">
            <input type="submit" class="love" name="love" value=""/>
            <div><?php  echo $_SESSION['love'];?></div>
        </div>
        <div class="col">
            <input type="submit" class="waw" name="waw" value=""/>
            <div><?php  echo $_SESSION['waw'];?></div>
        </div>
        <div class="col">
            <input type="submit" class="colere" name="colere" value=""/>
            <div><?php  echo $_SESSION['colere'];?></div>
        </div>
        <input type="submit" class="moins" name="plus" value=""/>


        <?php

        }else{

        ?>

        <form method="POST">
            <div class="lignes">
                <!--<input type="hidden" name="counter" value="<?php echo $_SESSION['counter']; ?>" />-->
                <div class="col">
                    <input type="submit" class="like" name="button" value=""/>
                    <div><?php  echo $_SESSION['likes'];?></div>
                </div>
                <input type="submit" class="plus" name="plus" value=""/>

                <?php
                }
                ?>

            </div>
        </form>
<?php } ?>