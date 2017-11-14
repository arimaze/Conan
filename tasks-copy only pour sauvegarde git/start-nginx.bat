@echo off
c:
cd c:\nginx
echo Demarrage de Nginx
start /b cmd /k "c:\nginx\nginx.exe"
echo Demarrage de PHP en mode CGI
start /b cmd /k "c:\php\php-cgi.exe -b 127.0.0.1:9101
exit