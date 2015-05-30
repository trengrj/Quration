project:
  name: myclassfit
  domain: myclassfit.com
  db:
    name: myclassfit
    prefix: wb_
  git: git@bitbucket.org:andrej_griniuk/myclassfit.com.git
  apache2:
    mods:
      - rewrite
      - ssl
  php5:
    mods:
      - php-pear
      - php5-cli
      - php5-mysql
      - php5-dev
      - php5-curl
      - php5-mcrypt
      - php5-intl
      - php5-geoip
      - php5-sqllite
      - php-apc
