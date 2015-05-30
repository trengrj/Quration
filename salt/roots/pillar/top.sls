base:
  '*':
    - default

  'myclassfit*':
    - myclassfit

  '* and not *dev':
    - match: compound
    - env_prod
    - myclassfit-sensitive

  '*dev':
    - env_dev
