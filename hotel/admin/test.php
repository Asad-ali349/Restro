<?php
 $ThatTime ="14:08:10";
if (time() >= strtotime($ThatTime)) {
  echo "ok";
  echo time();
}

echo "\n".date("h:m:s");
?>