Welcome on Cripsy server panel :

   <form method="post">
       <input type="submit" name="test" id="test" value="Start server" style="margin-top:30px" /><br/>
      <input type="submit" name="stop" id="Stop" value="Stop Server" style="margin-top:30px"/><br/>
      <input type="submit" name="update" id="Stop and update" value="Update Server" style="margin-top:30px"/><br/>
   </form>

   <?php

   if(array_key_exists('test',$_POST)){
      testfun();
   }

   if(array_key_exists('update',$_POST)){

      update();
   }

   if(array_key_exists('stop',$_POST)){

      stop();
   }

   function execInBackground($cmd) {

    if (substr(php_uname(), 0, 7) == "Windows"){
        $handle = popen("start /B ". $cmd , "r");
      //  echo "'$handle'; " . gettype($handle) . "\n";
      //  $read = fread($handle, 10000);
      //  echo $read;
        pclose($handle);
    }
    else {
        exec($cmd . "&");
    }
}

   function testfun()
   {
       //$cmd= 'c:\conan2\ConanSandboxServer.exe -MaxPlayers=50 -nosteamclient -game -server';
       $cmd ='schtasks /Run /TN "Conan Exiles Ping"';
       execInBackground($cmd);
       echo "Conan is restarting please wait few minutes";
   }

   function update()
   {
      set_time_limit(0);

      exec('taskkill /f /IM ConanSandboxServer-Win64-Test.exe', $output);
      print_r("Conan killed ! ");
      echo "Conan will be updated ! Please wait 5 minutes, and then START server <br/>";
      $cmd= 'c:/steamcmd/steamcmd.exe +login anonymous +force_install_dir "C:\conan2" +app_update 443030 validate +quit exit';
      execInBackground($cmd);
   }

   function stop()
   {
     exec('taskkill /f /IM ConanSandboxServer-Win64-Test.exe', $output);
     print_r("Conan killed ! ");
   }

   ?>
