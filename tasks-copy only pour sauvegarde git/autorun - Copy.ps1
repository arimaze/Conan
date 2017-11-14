function isRunning{

$programName = "ConanSandboxServer-Win64-Test"
$isRunning = (Get-Process | Where-Object { $_.Name -eq $programName }).Count -gt 0

if ($isRunning)
{
echo ok
}
else
{
echo ko;
& 'c:\conan2\conanexiles.bat';
}
}


while($true){
isRunning;
start-sleep 900;
}
