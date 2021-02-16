set SRC=F:\sam\peh\git\peh\peh\img\en-images\img
set DST=F:\sam\peh\git\peh\peh\img\en-images\th

f:
cd F:\sam\appli\ImageMagick-7.0.5-5-portable-Q16-x86
for /f %x in ('dir /b %SRC%\*.jpg') do convert %SRC%\%x -resize "100x100^" -gravity center -crop 100x100+0+0 +repage %DST%\%x
pause