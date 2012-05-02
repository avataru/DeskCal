@ECHO OFF
CHOICE /C:NXCO /N /T:5 /D:C /M:"Output [N]ested, E[x]panded, [C]ompact or C[o]mpressed?"
SET ZONE=%ERRORLEVEL%
CLS
IF %ZONE% EQU 1 GOTO :Nested
IF %ZONE% EQU 2 GOTO :Expanded
IF %ZONE% EQU 3 GOTO :Compact
IF %ZONE% EQU 4 GOTO :Compressed

:Nested
SET OUTPUT=nested
GOTO :Watch

:Expanded
SET OUTPUT=expanded
GOTO :Watch

:Compact
SET OUTPUT=compact
GOTO :Watch

:Compressed
SET OUTPUT=compressed
GOTO :Watch

:Watch
ECHO The compiled stylesheet will be %OUTPUT%
ECHO.
sass --watch ../stylesheets/sass:../stylesheets --style %OUTPUT%