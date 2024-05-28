docker build -t php-without-jit -f Dockerfile .

docker run -it --rm php-without-jit