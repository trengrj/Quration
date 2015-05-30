base:
  '*':
    - bash-aliases
    - timezone
    - ntp
    - saltstack-ppa

  'myclassfit*':
    - expect
    - git-core
    - apache2
    - apache2-mods
    - apache2-vhost
    - mariadb-server
    - php5
    - php5-mods
    - geoip
    - composer
#    - project-source
    - project-db
#    - project-cron

  '*-prod':
    - mysql-secure
    - phpmyadmin

  '*-dev':
    - phpmyadmin
    - phpmyadmin-dev-config
#    - xdebug
