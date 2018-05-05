# yii2-unique-id
Generating unique identificator for any purposes. Typically used by Yii-widgets ("id"-attribute of HTML elements).

Standard Yii2 generator use prefix "w" and simple counter of generated IDs. It's enougth while non-AJAX request used. But if you're want to load some page content via AJAX-request, you're can obtein HTML-elements with same IDs ("w1", for example). So, some scripts, based on element's ID, will workd unexpectedly.
Such behaviour may be bypassed by specifying ID manually in code. Another way is setting up Widget::$autoIdPrefix.

## Using in manual mode

Just call \abolotin\yii2-unique-id\UniqueId::getId(). It's returns unique value, which can be assigned to "id" attribute of HTML-element.

## Using in automatic mode

You're can to setup automatic generation of IDs by any \yii\base\Widget based objects. Just add '\abolotin\yii2-unique-id\UniqueId' string to 'bootstrap' array of applications configuraion:

```php
return [
   ...
   'bootstrap' => [
       '\abolotin\yii2-unique-id\UniqueId',
       ...
   ]
];
```

or using component's mode:

```php
return [
   ...
   'components' => [
       'uniqueId' => [
           'class' => '\abolotin\yii2-unique-id\UniqueId',
           ...
       ],
       ...
   ],
   'bootstrap' => [
       'uniqueId',
       ...
   ]
];
```

In last case it's can be also configured.

## Configuration

Component allows next configuration options:

**prefix** - string. First prefix, used by generator. Default value: 'w'.
**autoIdPrefix** - string. Second prefix, used by generator. If unspecified, will be generated automatically.
**counter** - integer. Inner generated IDs counter. Default value: 0.
**suffix** - string. Suffix of inner generated ID. Default value: 't'.
