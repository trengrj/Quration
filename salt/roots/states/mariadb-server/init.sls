software-properties-common:
  pkg.installed

mariadb-key:
  cmd.run:
    - name: 'apt-key adv --recv-keys --keyserver hkp://keyserver.ubuntu.com:80 0xcbcb082a1bb943db'
    - onlyif: test `apt-key list | grep MariaDB | wc -l` -eq 0
    - require:
      - pkg: software-properties-common

mariadb-ppa:
  pkgrepo.managed:
    - humanname: MariaDB
    - name: deb http://download.nus.edu.sg/mirror/mariadb/repo/10.0/ubuntu trusty main
    - dist: trusty
    - file: /etc/apt/sources.list.d/mariadb.list
    - require:
      - cmd: mariadb-key
      - pkg: software-properties-common
    - require_in:
      - pkg: mariadb-server

mariadb-server:
  pkg:
    - installed

mysql:
  service:
    - running
    - enable: True
    - require:
      - pkg: mariadb-server
