<?php











namespace Composer;

use Composer\Autoload\ClassLoader;
use Composer\Semver\VersionParser;






class InstalledVersions
{
private static $installed = array (
  'root' => 
  array (
    'pretty_version' => 'dev-master',
    'version' => 'dev-master',
    'aliases' => 
    array (
    ),
    'reference' => '705b18aa17ac2fe58e5f18ac5f9ff7d1ce514073',
    'name' => 'laravel/laravel',
  ),
  'versions' => 
  array (
    'awobaz/compoships' => 
    array (
      'pretty_version' => '2.0.0',
      'version' => '2.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e35a71e12069fabf3db72e486ebb8bbcdd39f18b',
    ),
    'cordoval/hamcrest-php' => 
    array (
      'replaced' => 
      array (
        0 => '*',
      ),
    ),
    'davedevelopment/hamcrest-php' => 
    array (
      'replaced' => 
      array (
        0 => '*',
      ),
    ),
    'dnoegel/php-xdg-base-dir' => 
    array (
      'pretty_version' => 'v0.1.1',
      'version' => '0.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '8f8a6e48c5ecb0f991c2fdcf5f154a47d85f9ffd',
    ),
    'doctrine/inflector' => 
    array (
      'pretty_version' => '2.0.3',
      'version' => '2.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '9cf661f4eb38f7c881cac67c75ea9b00bf97b210',
    ),
    'doctrine/instantiator' => 
    array (
      'pretty_version' => '1.3.1',
      'version' => '1.3.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f350df0268e904597e3bd9c4685c53e0e333feea',
    ),
    'doctrine/lexer' => 
    array (
      'pretty_version' => '1.2.1',
      'version' => '1.2.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e864bbf5904cb8f5bb334f99209b48018522f042',
    ),
    'dragonmantank/cron-expression' => 
    array (
      'pretty_version' => 'v2.3.0',
      'version' => '2.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '72b6fbf76adb3cf5bc0db68559b33d41219aba27',
    ),
    'egulias/email-validator' => 
    array (
      'pretty_version' => '2.1.18',
      'version' => '2.1.18.0',
      'aliases' => 
      array (
      ),
      'reference' => 'cfa3d44471c7f5bfb684ac2b0da7114283d78441',
    ),
    'facade/flare-client-php' => 
    array (
      'pretty_version' => '1.3.2',
      'version' => '1.3.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'db1e03426e7f9472c9ecd1092aff00f56aa6c004',
    ),
    'facade/ignition' => 
    array (
      'pretty_version' => '1.16.1',
      'version' => '1.16.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'af05ac5ee8587395d7474ec0681c08776a2cb09d',
    ),
    'facade/ignition-contracts' => 
    array (
      'pretty_version' => '1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f445db0fb86f48e205787b2592840dd9c80ded28',
    ),
    'fideloper/proxy' => 
    array (
      'pretty_version' => '4.4.0',
      'version' => '4.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '9beebf48a1c344ed67c1d36bb1b8709db7c3c1a8',
    ),
    'filp/whoops' => 
    array (
      'pretty_version' => '2.7.3',
      'version' => '2.7.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '5d5fe9bb3d656b514d455645b3addc5f7ba7714d',
    ),
    'fzaninotto/faker' => 
    array (
      'pretty_version' => 'v1.9.1',
      'version' => '1.9.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fc10d778e4b84d5bd315dad194661e091d307c6f',
    ),
    'guzzlehttp/guzzle' => 
    array (
      'pretty_version' => '6.5.5',
      'version' => '6.5.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '9d4290de1cfd701f38099ef7e183b64b4b7b0c5e',
    ),
    'guzzlehttp/promises' => 
    array (
      'pretty_version' => 'v1.3.1',
      'version' => '1.3.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a59da6cf61d80060647ff4d3eb2c03a2bc694646',
    ),
    'guzzlehttp/psr7' => 
    array (
      'pretty_version' => '1.6.1',
      'version' => '1.6.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '239400de7a173fe9901b9ac7c06497751f00727a',
    ),
    'hamcrest/hamcrest-php' => 
    array (
      'pretty_version' => 'v2.0.0',
      'version' => '2.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '776503d3a8e85d4f9a1148614f95b7a608b046ad',
    ),
    'illuminate/auth' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.18.22',
      ),
    ),
    'illuminate/broadcasting' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.18.22',
      ),
    ),
    'illuminate/bus' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.18.22',
      ),
    ),
    'illuminate/cache' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.18.22',
      ),
    ),
    'illuminate/config' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.18.22',
      ),
    ),
    'illuminate/console' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.18.22',
      ),
    ),
    'illuminate/container' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.18.22',
      ),
    ),
    'illuminate/contracts' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.18.22',
      ),
    ),
    'illuminate/cookie' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.18.22',
      ),
    ),
    'illuminate/database' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.18.22',
      ),
    ),
    'illuminate/encryption' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.18.22',
      ),
    ),
    'illuminate/events' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.18.22',
      ),
    ),
    'illuminate/filesystem' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.18.22',
      ),
    ),
    'illuminate/hashing' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.18.22',
      ),
    ),
    'illuminate/http' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.18.22',
      ),
    ),
    'illuminate/log' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.18.22',
      ),
    ),
    'illuminate/mail' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.18.22',
      ),
    ),
    'illuminate/notifications' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.18.22',
      ),
    ),
    'illuminate/pagination' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.18.22',
      ),
    ),
    'illuminate/pipeline' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.18.22',
      ),
    ),
    'illuminate/queue' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.18.22',
      ),
    ),
    'illuminate/redis' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.18.22',
      ),
    ),
    'illuminate/routing' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.18.22',
      ),
    ),
    'illuminate/session' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.18.22',
      ),
    ),
    'illuminate/support' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.18.22',
      ),
    ),
    'illuminate/translation' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.18.22',
      ),
    ),
    'illuminate/validation' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.18.22',
      ),
    ),
    'illuminate/view' => 
    array (
      'replaced' => 
      array (
        0 => 'v6.18.22',
      ),
    ),
    'jakub-onderka/php-console-color' => 
    array (
      'pretty_version' => 'v0.2',
      'version' => '0.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd5deaecff52a0d61ccb613bb3804088da0307191',
    ),
    'jakub-onderka/php-console-highlighter' => 
    array (
      'pretty_version' => 'v0.4',
      'version' => '0.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '9f7a229a69d52506914b4bc61bfdb199d90c5547',
    ),
    'kodova/hamcrest-php' => 
    array (
      'replaced' => 
      array (
        0 => '*',
      ),
    ),
    'laravel/framework' => 
    array (
      'pretty_version' => 'v6.18.22',
      'version' => '6.18.22.0',
      'aliases' => 
      array (
      ),
      'reference' => '95f33151375bb2e4747b871854c8becc23502901',
    ),
    'laravel/laravel' => 
    array (
      'pretty_version' => 'dev-master',
      'version' => 'dev-master',
      'aliases' => 
      array (
      ),
      'reference' => '705b18aa17ac2fe58e5f18ac5f9ff7d1ce514073',
    ),
    'laravel/tinker' => 
    array (
      'pretty_version' => 'v2.4.0',
      'version' => '2.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'cde90a7335a2130a4488beb68f4b2141869241db',
    ),
    'league/commonmark' => 
    array (
      'pretty_version' => '1.5.1',
      'version' => '1.5.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '6d74caf6abeed5fd85d6ec20da23d7269cd0b46f',
    ),
    'league/flysystem' => 
    array (
      'pretty_version' => '1.0.69',
      'version' => '1.0.69.0',
      'aliases' => 
      array (
      ),
      'reference' => '7106f78428a344bc4f643c233a94e48795f10967',
    ),
    'maatwebsite/excel' => 
    array (
      'pretty_version' => '3.1.23',
      'version' => '3.1.23.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b8145257f020635f374d2314ccd556674efcbfcb',
    ),
    'maennchen/zipstream-php' => 
    array (
      'pretty_version' => '2.1.0',
      'version' => '2.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c4c5803cc1f93df3d2448478ef79394a5981cc58',
    ),
    'markbaker/complex' => 
    array (
      'pretty_version' => '2.0.0',
      'version' => '2.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '9999f1432fae467bc93c53f357105b4c31bb994c',
    ),
    'markbaker/matrix' => 
    array (
      'pretty_version' => '2.0.0',
      'version' => '2.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '9567d9c4c519fbe40de01dbd1e4469dbbb66f46a',
    ),
    'mockery/mockery' => 
    array (
      'pretty_version' => '1.3.1',
      'version' => '1.3.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f69bbde7d7a75d6b2862d9ca8fab1cd28014b4be',
    ),
    'monolog/monolog' => 
    array (
      'pretty_version' => '2.1.0',
      'version' => '2.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '38914429aac460e8e4616c8cb486ecb40ec90bb1',
    ),
    'myclabs/deep-copy' => 
    array (
      'pretty_version' => '1.10.0',
      'version' => '1.10.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '5796d127b0c4ff505b77455148ea9d5269d99758',
      'replaced' => 
      array (
        0 => '1.10.0',
      ),
    ),
    'myclabs/php-enum' => 
    array (
      'pretty_version' => '1.7.6',
      'version' => '1.7.6.0',
      'aliases' => 
      array (
      ),
      'reference' => '5f36467c7a87e20fbdc51e524fd8f9d1de80187c',
    ),
    'nesbot/carbon' => 
    array (
      'pretty_version' => '2.35.0',
      'version' => '2.35.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '4b9bd835261ef23d36397a46a76b496a458305e5',
    ),
    'nikic/php-parser' => 
    array (
      'pretty_version' => 'v4.5.0',
      'version' => '4.5.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '53c2753d756f5adb586dca79c2ec0e2654dd9463',
    ),
    'nunomaduro/collision' => 
    array (
      'pretty_version' => 'v3.0.1',
      'version' => '3.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'af42d339fe2742295a54f6fdd42aaa6f8c4aca68',
    ),
    'opis/closure' => 
    array (
      'pretty_version' => '3.5.5',
      'version' => '3.5.5.0',
      'aliases' => 
      array (
      ),
      'reference' => 'dec9fc5ecfca93f45cd6121f8e6f14457dff372c',
    ),
    'paragonie/random_compat' => 
    array (
      'pretty_version' => 'v9.99.99',
      'version' => '9.99.99.0',
      'aliases' => 
      array (
      ),
      'reference' => '84b4dfb120c6f9b4ff7b3685f9b8f1aa365a0c95',
    ),
    'phar-io/manifest' => 
    array (
      'pretty_version' => '1.0.3',
      'version' => '1.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '7761fcacf03b4d4f16e7ccb606d4879ca431fcf4',
    ),
    'phar-io/version' => 
    array (
      'pretty_version' => '2.0.1',
      'version' => '2.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '45a2ec53a73c70ce41d55cedef9063630abaf1b6',
    ),
    'phpdocumentor/reflection-common' => 
    array (
      'pretty_version' => '2.2.0',
      'version' => '2.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '1d01c49d4ed62f25aa84a747ad35d5a16924662b',
    ),
    'phpdocumentor/reflection-docblock' => 
    array (
      'pretty_version' => '5.1.0',
      'version' => '5.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'cd72d394ca794d3466a3b2fc09d5a6c1dc86b47e',
    ),
    'phpdocumentor/type-resolver' => 
    array (
      'pretty_version' => '1.3.0',
      'version' => '1.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e878a14a65245fbe78f8080eba03b47c3b705651',
    ),
    'phpoffice/phpspreadsheet' => 
    array (
      'pretty_version' => '1.15.0',
      'version' => '1.15.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a8e8068b31b8119e1daa5b1eb5715a3a8ea8305f',
    ),
    'phpoption/phpoption' => 
    array (
      'pretty_version' => '1.7.4',
      'version' => '1.7.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b2ada2ad5d8a32b89088b8adc31ecd2e3a13baf3',
    ),
    'phpspec/prophecy' => 
    array (
      'pretty_version' => 'v1.10.3',
      'version' => '1.10.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '451c3cd1418cf640de218914901e51b064abb093',
    ),
    'phpunit/php-code-coverage' => 
    array (
      'pretty_version' => '7.0.10',
      'version' => '7.0.10.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f1884187926fbb755a9aaf0b3836ad3165b478bf',
    ),
    'phpunit/php-file-iterator' => 
    array (
      'pretty_version' => '2.0.2',
      'version' => '2.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '050bedf145a257b1ff02746c31894800e5122946',
    ),
    'phpunit/php-text-template' => 
    array (
      'pretty_version' => '1.2.1',
      'version' => '1.2.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '31f8b717e51d9a2afca6c9f046f5d69fc27c8686',
    ),
    'phpunit/php-timer' => 
    array (
      'pretty_version' => '2.1.2',
      'version' => '2.1.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '1038454804406b0b5f5f520358e78c1c2f71501e',
    ),
    'phpunit/php-token-stream' => 
    array (
      'pretty_version' => '3.1.1',
      'version' => '3.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '995192df77f63a59e47f025390d2d1fdf8f425ff',
    ),
    'phpunit/phpunit' => 
    array (
      'pretty_version' => '8.5.8',
      'version' => '8.5.8.0',
      'aliases' => 
      array (
      ),
      'reference' => '34c18baa6a44f1d1fbf0338907139e9dce95b997',
    ),
    'prettus/l5-repository' => 
    array (
      'pretty_version' => '2.6.46',
      'version' => '2.6.46.0',
      'aliases' => 
      array (
      ),
      'reference' => '5d5379a838d349447f1e09dcdc0426dfde3affb1',
    ),
    'prettus/laravel-validation' => 
    array (
      'pretty_version' => '1.2.2',
      'version' => '1.2.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '3d43037c2f497df3f8fbf3d8c16954a83c72e530',
    ),
    'psr/container' => 
    array (
      'pretty_version' => '1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b7ce3b176482dbbc1245ebf52b181af44c2cf55f',
    ),
    'psr/event-dispatcher-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'psr/http-client' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '2dfb5f6c5eff0e91e20e913f8c5452ed95b86621',
    ),
    'psr/http-factory' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '12ac7fcd07e5b077433f5f2bee95b3a771bf61be',
    ),
    'psr/http-message' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f6561bf28d520154e4b0ec72be95418abe6d9363',
    ),
    'psr/http-message-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'psr/log' => 
    array (
      'pretty_version' => '1.1.3',
      'version' => '1.1.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '0f73288fd15629204f9d42b7055f72dacbe811fc',
    ),
    'psr/log-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0.0',
        1 => '1.0',
      ),
    ),
    'psr/simple-cache' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '408d5eafb83c57f6365a3ca330ff23aa4a5fa39b',
    ),
    'psy/psysh' => 
    array (
      'pretty_version' => 'v0.10.4',
      'version' => '0.10.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a8aec1b2981ab66882a01cce36a49b6317dc3560',
    ),
    'ralouphie/getallheaders' => 
    array (
      'pretty_version' => '3.0.3',
      'version' => '3.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '120b605dfeb996808c31b6477290a714d356e822',
    ),
    'ramsey/uuid' => 
    array (
      'pretty_version' => '3.9.3',
      'version' => '3.9.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '7e1633a6964b48589b142d60542f9ed31bd37a92',
    ),
    'rhumsaa/uuid' => 
    array (
      'replaced' => 
      array (
        0 => '3.9.3',
      ),
    ),
    'scrivo/highlight.php' => 
    array (
      'pretty_version' => 'v9.18.1.1',
      'version' => '9.18.1.1',
      'aliases' => 
      array (
      ),
      'reference' => '52fc21c99fd888e33aed4879e55a3646f8d40558',
    ),
    'sebastian/code-unit-reverse-lookup' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '4419fcdb5eabb9caa61a27c7a1db532a6b55dd18',
    ),
    'sebastian/comparator' => 
    array (
      'pretty_version' => '3.0.2',
      'version' => '3.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '5de4fc177adf9bce8df98d8d141a7559d7ccf6da',
    ),
    'sebastian/diff' => 
    array (
      'pretty_version' => '3.0.2',
      'version' => '3.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '720fcc7e9b5cf384ea68d9d930d480907a0c1a29',
    ),
    'sebastian/environment' => 
    array (
      'pretty_version' => '4.2.3',
      'version' => '4.2.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '464c90d7bdf5ad4e8a6aea15c091fec0603d4368',
    ),
    'sebastian/exporter' => 
    array (
      'pretty_version' => '3.1.2',
      'version' => '3.1.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '68609e1261d215ea5b21b7987539cbfbe156ec3e',
    ),
    'sebastian/global-state' => 
    array (
      'pretty_version' => '3.0.0',
      'version' => '3.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'edf8a461cf1d4005f19fb0b6b8b95a9f7fa0adc4',
    ),
    'sebastian/object-enumerator' => 
    array (
      'pretty_version' => '3.0.3',
      'version' => '3.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '7cfd9e65d11ffb5af41198476395774d4c8a84c5',
    ),
    'sebastian/object-reflector' => 
    array (
      'pretty_version' => '1.1.1',
      'version' => '1.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '773f97c67f28de00d397be301821b06708fca0be',
    ),
    'sebastian/recursion-context' => 
    array (
      'pretty_version' => '3.0.0',
      'version' => '3.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '5b0cd723502bac3b006cbf3dbf7a1e3fcefe4fa8',
    ),
    'sebastian/resource-operations' => 
    array (
      'pretty_version' => '2.0.1',
      'version' => '2.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '4d7a795d35b889bf80a0cc04e08d77cedfa917a9',
    ),
    'sebastian/type' => 
    array (
      'pretty_version' => '1.1.3',
      'version' => '1.1.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '3aaaa15fa71d27650d62a948be022fe3b48541a3',
    ),
    'sebastian/version' => 
    array (
      'pretty_version' => '2.0.1',
      'version' => '2.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '99732be0ddb3361e16ad77b68ba41efc8e979019',
    ),
    'swiftmailer/swiftmailer' => 
    array (
      'pretty_version' => 'v6.2.3',
      'version' => '6.2.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '149cfdf118b169f7840bbe3ef0d4bc795d1780c9',
    ),
    'symfony/console' => 
    array (
      'pretty_version' => 'v4.4.10',
      'version' => '4.4.10.0',
      'aliases' => 
      array (
      ),
      'reference' => '326b064d804043005526f5a0494cfb49edb59bb0',
    ),
    'symfony/css-selector' => 
    array (
      'pretty_version' => 'v4.4.10',
      'version' => '4.4.10.0',
      'aliases' => 
      array (
      ),
      'reference' => 'afc26133a6fbdd4f8842e38893e0ee4685c7c94b',
    ),
    'symfony/debug' => 
    array (
      'pretty_version' => 'v4.4.10',
      'version' => '4.4.10.0',
      'aliases' => 
      array (
      ),
      'reference' => '28f92d08bb6d1fddf8158e02c194ad43870007e6',
    ),
    'symfony/error-handler' => 
    array (
      'pretty_version' => 'v4.4.10',
      'version' => '4.4.10.0',
      'aliases' => 
      array (
      ),
      'reference' => '0df9a23c0f9eddbb6682479fee6fd58b88add75b',
    ),
    'symfony/event-dispatcher' => 
    array (
      'pretty_version' => 'v4.4.10',
      'version' => '4.4.10.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a5370aaa7807c7a439b21386661ffccf3dff2866',
    ),
    'symfony/event-dispatcher-contracts' => 
    array (
      'pretty_version' => 'v1.1.7',
      'version' => '1.1.7.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c43ab685673fb6c8d84220c77897b1d6cdbe1d18',
    ),
    'symfony/event-dispatcher-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.1',
      ),
    ),
    'symfony/finder' => 
    array (
      'pretty_version' => 'v4.4.10',
      'version' => '4.4.10.0',
      'aliases' => 
      array (
      ),
      'reference' => '5729f943f9854c5781984ed4907bbb817735776b',
    ),
    'symfony/http-foundation' => 
    array (
      'pretty_version' => 'v4.4.10',
      'version' => '4.4.10.0',
      'aliases' => 
      array (
      ),
      'reference' => '3adfbd7098c850b02d107330b7b9deacf2581578',
    ),
    'symfony/http-kernel' => 
    array (
      'pretty_version' => 'v4.4.10',
      'version' => '4.4.10.0',
      'aliases' => 
      array (
      ),
      'reference' => '81d42148474e1852a333ed7a732f2a014af75430',
    ),
    'symfony/mime' => 
    array (
      'pretty_version' => 'v4.4.10',
      'version' => '4.4.10.0',
      'aliases' => 
      array (
      ),
      'reference' => 'af8e69e7527f752ab0ef6e1b717bac3f7336b8c6',
    ),
    'symfony/polyfill-ctype' => 
    array (
      'pretty_version' => 'v1.17.1',
      'version' => '1.17.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '2edd75b8b35d62fd3eeabba73b26b8f1f60ce13d',
    ),
    'symfony/polyfill-iconv' => 
    array (
      'pretty_version' => 'v1.17.1',
      'version' => '1.17.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ba6c9c18db36235b859cc29b8372d1c01298c035',
    ),
    'symfony/polyfill-intl-idn' => 
    array (
      'pretty_version' => 'v1.17.1',
      'version' => '1.17.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a57f8161502549a742a63c09f0a604997bf47027',
    ),
    'symfony/polyfill-mbstring' => 
    array (
      'pretty_version' => 'v1.17.1',
      'version' => '1.17.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '7110338d81ce1cbc3e273136e4574663627037a7',
    ),
    'symfony/polyfill-php72' => 
    array (
      'pretty_version' => 'v1.17.0',
      'version' => '1.17.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f048e612a3905f34931127360bdd2def19a5e582',
    ),
    'symfony/polyfill-php73' => 
    array (
      'pretty_version' => 'v1.17.1',
      'version' => '1.17.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fa0837fe02d617d31fbb25f990655861bb27bd1a',
    ),
    'symfony/polyfill-php80' => 
    array (
      'pretty_version' => 'v1.17.1',
      'version' => '1.17.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '4a5b6bba3259902e386eb80dd1956181ee90b5b2',
    ),
    'symfony/process' => 
    array (
      'pretty_version' => 'v4.4.10',
      'version' => '4.4.10.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c714958428a85c86ab97e3a0c96db4c4f381b7f5',
    ),
    'symfony/routing' => 
    array (
      'pretty_version' => 'v4.4.10',
      'version' => '4.4.10.0',
      'aliases' => 
      array (
      ),
      'reference' => '0f557911dde75c2a9652b8097bd7c9f54507f646',
    ),
    'symfony/service-contracts' => 
    array (
      'pretty_version' => 'v1.1.8',
      'version' => '1.1.8.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ffc7f5692092df31515df2a5ecf3b7302b3ddacf',
    ),
    'symfony/translation' => 
    array (
      'pretty_version' => 'v4.4.10',
      'version' => '4.4.10.0',
      'aliases' => 
      array (
      ),
      'reference' => '79d3ef9096a6a6047dbc69218b68c7b7f63193af',
    ),
    'symfony/translation-contracts' => 
    array (
      'pretty_version' => 'v1.1.7',
      'version' => '1.1.7.0',
      'aliases' => 
      array (
      ),
      'reference' => '364518c132c95642e530d9b2d217acbc2ccac3e6',
    ),
    'symfony/translation-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'symfony/var-dumper' => 
    array (
      'pretty_version' => 'v4.4.10',
      'version' => '4.4.10.0',
      'aliases' => 
      array (
      ),
      'reference' => '56b3aa5eab0ac6720dcd559fd1d590ce301594ac',
    ),
    'theseer/tokenizer' => 
    array (
      'pretty_version' => '1.1.3',
      'version' => '1.1.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '11336f6f84e16a720dae9d8e6ed5019efa85a0f9',
    ),
    'tijsverkoyen/css-to-inline-styles' => 
    array (
      'pretty_version' => '2.2.2',
      'version' => '2.2.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'dda2ee426acd6d801d5b7fd1001cde9b5f790e15',
    ),
    'vlucas/phpdotenv' => 
    array (
      'pretty_version' => 'v3.6.6',
      'version' => '3.6.6.0',
      'aliases' => 
      array (
      ),
      'reference' => '4669484ccbc38fe7c4e0c50456778f2010566aad',
    ),
    'webmozart/assert' => 
    array (
      'pretty_version' => '1.9.0',
      'version' => '1.9.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '9dc4f203e36f2b486149058bade43c851dd97451',
    ),
    'webpatser/laravel-uuid' => 
    array (
      'pretty_version' => '2.2.1',
      'version' => '2.2.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c87d5c631938edad7aae96d27881e3ea3de23d80',
    ),
  ),
);
private static $canGetVendors;
private static $installedByVendor = array();







public static function getInstalledPackages()
{
$packages = array();
foreach (self::getInstalled() as $installed) {
$packages[] = array_keys($installed['versions']);
}


if (1 === \count($packages)) {
return $packages[0];
}

return array_keys(array_flip(\call_user_func_array('array_merge', $packages)));
}









public static function isInstalled($packageName)
{
foreach (self::getInstalled() as $installed) {
if (isset($installed['versions'][$packageName])) {
return true;
}
}

return false;
}














public static function satisfies(VersionParser $parser, $packageName, $constraint)
{
$constraint = $parser->parseConstraints($constraint);
$provided = $parser->parseConstraints(self::getVersionRanges($packageName));

return $provided->matches($constraint);
}










public static function getVersionRanges($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

$ranges = array();
if (isset($installed['versions'][$packageName]['pretty_version'])) {
$ranges[] = $installed['versions'][$packageName]['pretty_version'];
}
if (array_key_exists('aliases', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['aliases']);
}
if (array_key_exists('replaced', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['replaced']);
}
if (array_key_exists('provided', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['provided']);
}

return implode(' || ', $ranges);
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getVersion($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['version'])) {
return null;
}

return $installed['versions'][$packageName]['version'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getPrettyVersion($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['pretty_version'])) {
return null;
}

return $installed['versions'][$packageName]['pretty_version'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getReference($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['reference'])) {
return null;
}

return $installed['versions'][$packageName]['reference'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getRootPackage()
{
$installed = self::getInstalled();

return $installed[0]['root'];
}







public static function getRawData()
{
return self::$installed;
}



















public static function reload($data)
{
self::$installed = $data;
self::$installedByVendor = array();
}




private static function getInstalled()
{
if (null === self::$canGetVendors) {
self::$canGetVendors = method_exists('Composer\Autoload\ClassLoader', 'getRegisteredLoaders');
}

$installed = array();

if (self::$canGetVendors) {
foreach (ClassLoader::getRegisteredLoaders() as $vendorDir => $loader) {
if (isset(self::$installedByVendor[$vendorDir])) {
$installed[] = self::$installedByVendor[$vendorDir];
} elseif (is_file($vendorDir.'/composer/installed.php')) {
$installed[] = self::$installedByVendor[$vendorDir] = require $vendorDir.'/composer/installed.php';
}
}
}

$installed[] = self::$installed;

return $installed;
}
}
