Basic usage:

```php
$redis = new Predis\Client();

$sidekiq = new SidekiqJobPusher\Client($redis);

$sidekiq->perform('TestWorker');
```

Advanced usage:

```php
$redis = new Predis\Client(array(
	'host' => 'localhost',
	'port' => '6379',
	'database' => 12,
));

$sidekiq = new SidekiqJobPusher\Client($redis, 'my-namespace');

$args = array('arg1', 'arg2');
$retry = true;
$queue = 'my-queue';

$sidekiq->perform('TestWorker', $args, $retry, $queue);
```