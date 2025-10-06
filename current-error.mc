```bash
  docker compose -f compose.dev.yaml up -d

[+] Building 350.3s (19/38)                                                                                          docker:default
 => [php-fpm internal] load build definition from Dockerfile                                                                   0.0s
 => => transferring dockerfile: 6.72kB                                                                                         0.0s
 => [workspace internal] load build definition from Dockerfile                                                                 0.0s
 => => transferring dockerfile: 3.13kB                                                                                         0.0s
 => [workspace internal] load metadata for docker.io/library/php:8.4-cli                                                       0.3s
 => [php-fpm internal] load metadata for docker.io/library/php:8.4-fpm                                                         2.4s
 => [workspace internal] load .dockerignore                                                                                    0.0s
 => => transferring context: 2B                                                                                                0.0s
 => [workspace 1/7] FROM docker.io/library/php:8.4-cli@sha256:a627efe3590141fb90893d2db373020b67c0f297a05a92ab1e4fd2f9fb8af  129.4s
 => => resolve docker.io/library/php:8.4-cli@sha256:a627efe3590141fb90893d2db373020b67c0f297a05a92ab1e4fd2f9fb8afd86           0.0s
 => => sha256:a627efe3590141fb90893d2db373020b67c0f297a05a92ab1e4fd2f9fb8afd86 10.30kB / 10.30kB                               0.0s
 => => sha256:955c1c33af038fab1856c5f2bf13048b1aefbb8c5d8fed2be039a171d6dfd3b6 8.50kB / 8.50kB                                 0.0s
 => => sha256:5d4d5daa83cbf8832703ed629db9046de8927468a3ce9c39a81835e3215fa9ed 225B / 225B                                     1.4s
 => => sha256:0b4e5499ac196159fb0fa16f54b387be86b9fa0892abe8a50a26039b1121c9ae 2.87kB / 2.87kB                                 0.0s
 => => sha256:99346f5284054520fef6d30aa41fe2bfb0c6d24b123fa61349f2e30773601ab8 225B / 225B                                     1.2s
 => => sha256:71be4ee71309abf3b5e1ef4b7118c96352a1ff36ba81b0605b528dfc910fc8d5 117.84MB / 117.84MB                           127.3s
 => => extracting sha256:99346f5284054520fef6d30aa41fe2bfb0c6d24b123fa61349f2e30773601ab8                                      0.0s
 => => sha256:d1e6fbb11fc4eed3dcc2e30f5384f956cda34efa37d22dfbf416546df61c0d25 13.79MB / 13.79MB                              23.4s
 => => sha256:4a1bad354142fc57d8d7956f892061f16b34557694251c070d6eed0aafdea304 488B / 488B                                     2.3s
 => => sha256:cd234445d8de4300deb97614f828d6b28281eb5d3b4c62043db1603b9188b85c 23.52MB / 23.52MB                              39.7s
 => => sha256:6cd96089a4f55707e66400d41eb45e4d0c965d7ebf358038292f82ee506337b5 2.45kB / 2.45kB                                24.3s
 => => sha256:7ddbe15ad087a9a647054d9bb10b1cb416f1ae23c36cc11abbc89265ac065b3e 246B / 246B                                    24.7s
 => => sha256:2a748a0ae287f1586ac98174aadc9951757dc3aca87a8ecafd89d11e8381690d 243B / 243B                                    25.2s
 => => extracting sha256:71be4ee71309abf3b5e1ef4b7118c96352a1ff36ba81b0605b528dfc910fc8d5                                      1.6s
 => => extracting sha256:5d4d5daa83cbf8832703ed629db9046de8927468a3ce9c39a81835e3215fa9ed                                      0.0s
 => => extracting sha256:d1e6fbb11fc4eed3dcc2e30f5384f956cda34efa37d22dfbf416546df61c0d25                                      0.0s
 => => extracting sha256:4a1bad354142fc57d8d7956f892061f16b34557694251c070d6eed0aafdea304                                      0.0s
 => => extracting sha256:cd234445d8de4300deb97614f828d6b28281eb5d3b4c62043db1603b9188b85c                                      0.3s
 => => extracting sha256:6cd96089a4f55707e66400d41eb45e4d0c965d7ebf358038292f82ee506337b5                                      0.0s
 => => extracting sha256:7ddbe15ad087a9a647054d9bb10b1cb416f1ae23c36cc11abbc89265ac065b3e                                      0.0s
 => => extracting sha256:2a748a0ae287f1586ac98174aadc9951757dc3aca87a8ecafd89d11e8381690d                                      0.0s
 => [php-fpm internal] load .dockerignore                                                                                      0.0s
 => => transferring context: 2B                                                                                                0.0s
 => [php-fpm internal] load build context                                                                                      1.6s
 => => transferring context: 317.85MB                                                                                          1.6s
 => [php-fpm builder 1/5] FROM docker.io/library/php:8.4-fpm@sha256:4423f97ca3ed1d1297ed0bc70d4d41c96a632403409c26df3de1d0d  152.9s
 => => resolve docker.io/library/php:8.4-fpm@sha256:4423f97ca3ed1d1297ed0bc70d4d41c96a632403409c26df3de1d0d8849ca61f           0.0s
 => => sha256:4423f97ca3ed1d1297ed0bc70d4d41c96a632403409c26df3de1d0d8849ca61f 10.30kB / 10.30kB                               0.0s
 => => sha256:c80dd493ce3944d43ca94b5689461f4325bfbd7ec9751bafbf1ec6872efda228 10.61kB / 10.61kB                               0.0s
 => => sha256:da58ac56bebc7961546021f5b6f62b4d504b020b4af8f98c85bc40ac4301ea4f 3.25kB / 3.25kB                                 0.0s
 => => sha256:24403a1f6855abf71a2a5a1dba8cddf2ea0349dc7034854674eea92699c9d272 224B / 224B                                    23.7s
 => => extracting sha256:24403a1f6855abf71a2a5a1dba8cddf2ea0349dc7034854674eea92699c9d272                                      0.0s
 => => sha256:e1cf44d6017a42f5a269318657b7ccbfa56d2604edb26e2eb83f3e602fae3a46 117.84MB / 117.84MB                           150.8s
 => => sha256:2489d5e860a704a01205fd1d8785abf1ddf0ce491019435d356dcfb46b0e6fbf 223B / 223B                                    38.6s
 => => sha256:321268317b1001fc88150594bf31408ae0bc0203ba43df2b8814a56b56125d6e 13.79MB / 13.79MB                              63.1s
 => => sha256:6900a0b05d51552cca9a89652ff6f850ab08cc13ada91d31c0fab00f275997f8 487B / 487B                                    63.5s
 => => sha256:b6e1c97c9051cb359a8cad229e77c3878342f693e709c70af01128f88a3995ca 13.66MB / 13.66MB                              85.3s
 => => sha256:9516d7111a81bf749f0cd5f7b804eb798da1e2d3614bbce899bd13bdd04f7c8d 2.45kB / 2.45kB                                86.0s
 => => sha256:6d1ff76c15264220bb6305a3e50a3077c29b9bf9c9fed2ae65f1adc4a98b2363 249B / 249B                                    86.6s
 => => sha256:945796cd6373db4d3c85ef44c46a8c62ded4ce5eebe668dc57d641cd361a1dec 243B / 243B                                    87.2s
 => => sha256:4f4fb700ef54461cfa02571ae0db9a0dc1e0cdb5577484a6d75e68dc38e8acc1 32B / 32B                                      87.7s
 => => sha256:8e95d22bebc322419288118f8e8e1013cc69e511d6406c1d4a5c945cd6b20752 9.20kB / 9.20kB                                88.3s
 => => extracting sha256:e1cf44d6017a42f5a269318657b7ccbfa56d2604edb26e2eb83f3e602fae3a46                                      1.6s
 => => extracting sha256:2489d5e860a704a01205fd1d8785abf1ddf0ce491019435d356dcfb46b0e6fbf                                      0.0s
 => => extracting sha256:321268317b1001fc88150594bf31408ae0bc0203ba43df2b8814a56b56125d6e                                      0.0s
 => => extracting sha256:6900a0b05d51552cca9a89652ff6f850ab08cc13ada91d31c0fab00f275997f8                                      0.0s
 => => extracting sha256:b6e1c97c9051cb359a8cad229e77c3878342f693e709c70af01128f88a3995ca                                      0.3s
 => => extracting sha256:9516d7111a81bf749f0cd5f7b804eb798da1e2d3614bbce899bd13bdd04f7c8d                                      0.0s
 => => extracting sha256:6d1ff76c15264220bb6305a3e50a3077c29b9bf9c9fed2ae65f1adc4a98b2363                                      0.0s
 => => extracting sha256:945796cd6373db4d3c85ef44c46a8c62ded4ce5eebe668dc57d641cd361a1dec                                      0.0s
 => => extracting sha256:4f4fb700ef54461cfa02571ae0db9a0dc1e0cdb5577484a6d75e68dc38e8acc1                                      0.0s
 => => extracting sha256:8e95d22bebc322419288118f8e8e1013cc69e511d6406c1d4a5c945cd6b20752                                      0.0s
 => CANCELED [workspace 2/7] RUN apt-get update && apt-get install -y --no-install-recommends     curl     unzip     libpq-  220.6s
 => [php-fpm production  2/14] RUN apt-get update && apt-get install -y --no-install-recommends     libpq-dev     libicu-dev  61.5s
 => [php-fpm builder 2/5] RUN apt-get update && apt-get install -y --no-install-recommends     curl     unzip     libpq-dev  188.2s
 => [php-fpm production  3/14] RUN curl -o /usr/local/bin/php-fpm-healthcheck     https://raw.githubusercontent.com/renatomef  1.3s
 => [php-fpm production  4/14] COPY ./docker/production/php-fpm/entrypoint.sh /usr/local/bin/entrypoint.sh                     0.0s
 => [php-fpm production  5/14] RUN chmod +x /usr/local/bin/entrypoint.sh                                                       0.2s
 => [php-fpm production  6/14] COPY ./storage /var/www/storage-init                                                            0.1s
 => [php-fpm builder 3/5] WORKDIR /var/www                                                                                     0.0s
 => [php-fpm builder 4/5] COPY . /var/www                                                                                      1.7s
 => ERROR [php-fpm builder 5/5] RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filena  5.0s
------
 > [php-fpm builder 5/5] RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer     && composer install --no-dev --optimize-autoloader --no-interaction --no-progress --prefer-dist:
0.957 All settings correct for using Composer
0.961 Downloading...
4.896
4.896 Composer (version 2.8.12) successfully installed to: /usr/local/bin/composer
4.896 Use it: php /usr/local/bin/composer
4.896
4.995 Installing dependencies from lock file
4.996 Verifying lock file contents can be installed on current platform.
5.006 Your lock file does not contain a compatible set of packages. Please run composer update.
5.006
5.006   Problem 1
5.006     - laravel/horizon is locked to version v5.32.0 and an update of this package was not requested.
5.006     - laravel/horizon v5.32.0 requires ext-pcntl * -> it is missing from your system. Install or enable PHP's pcntl extension.
5.006
5.006 To enable extensions, verify that they are enabled in your .ini files:
5.006     - /usr/local/etc/php/conf.d/docker-fpm.ini
5.006     - /usr/local/etc/php/conf.d/docker-php-ext-bcmath.ini
5.006     - /usr/local/etc/php/conf.d/docker-php-ext-intl.ini
5.006     - /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini
5.006     - /usr/local/etc/php/conf.d/docker-php-ext-pdo_mysql.ini
5.006     - /usr/local/etc/php/conf.d/docker-php-ext-pdo_pgsql.ini
5.006     - /usr/local/etc/php/conf.d/docker-php-ext-pgsql.ini
5.006     - /usr/local/etc/php/conf.d/docker-php-ext-redis.ini
5.006     - /usr/local/etc/php/conf.d/docker-php-ext-soap.ini
5.006     - /usr/local/etc/php/conf.d/docker-php-ext-sodium.ini
5.006     - /usr/local/etc/php/conf.d/docker-php-ext-zip.ini
5.006 You can also run `php --ini` in a terminal to see which files are used by PHP in CLI mode.
5.006 Alternatively, you can run Composer with `--ignore-platform-req=ext-pcntl` to temporarily ignore these required extensions.
------
failed to solve: process "/bin/sh -c curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer     && composer install --no-dev --optimize-autoloader --no-interaction --no-progress --prefer-dist" did not complete successfully: exit code: 2
```
