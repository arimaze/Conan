Welcome

   <form method="post">
       <input type="submit" name="test" id="test" value="Start" /><br/>
          <input type="submit" name="update" id="update" value="Update Server" /><br/>
      Conan will be updated ! Please wait 5 minutes, do not close this window, and then start server

   </form>

   <?php

   function testfun()
   {

        exec("start cmd /c c:/tasks/test.bat");
      echo "Conan is restarting please wait few minutes";
   }

   function update()
   {
        //exec("start cmd /c ‪c:/steamcmd/steamcmd-Conan.bat");

      set_time_limit(0);
      exec('c:/steamcmd/steamcmd.exe +login anonymous +force_install_dir "C:\conan2" +app_update 443030 validate +quit exit', $output);
      print_r($output);
   }

   if(array_key_exists('test',$_POST)){
      testfun();
   }

   if(array_key_exists('update',$_POST)){

      update();
   }

   ?>
