<?php

// Method for Visual Studio, to allow user prompts
if (!function_exists("readline")) {
  function readline($prompt = null)
  {
    if ($prompt) {
      echo $prompt;
    }
    $fp = fopen("php://stdin", "r");
    $line = rtrim(fgets($fp, 1024));
    return $line;
  }
}

// Method to clear console (by adding spaces)
function consoleClear()
{
  for ($i = 0; $i < 50; $i++) echo "\r\n";
}

