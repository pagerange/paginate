# Paginate

## A simple pagination class.
 
Paginate creates an object (or returns an array) including all the values required to output pagination links.

Paginate does not make any assumptions as to how you want to generate the links.  No HTML is returned.

###  Sample usage

```php

$offset = 2;
$total_results = 45;
$p = new Paginate($offset, $total_results);

```

#### In Twig template

Output using Twig template.  Current offset has css class 'current' applied.

```twig

    <ul class="pagination">
        <li class="first"><a href="/links/{{ p.first }}">|&lt;&lt;</a></li>
        <li class="first"><a href="/links/{{ p.prev }}">prev</a></li>
        {% for l in p.links %}
            {% if l == p.current %}
                {% set pclass = 'current' %}
            {% else %}
                {% set pclass = '' %}
            {% endif %}
            <li class="{{ pclass }}"><a href="/links/{{ l }}">{{ l }}</a></li>
        {% endfor %}
        <li class="last"><a href="/links/{{ p.next }}">next</a></li>
        <li class="last"><a href="/links/{{ p.last }}">&gt;&gt;|</a></li>
    </ul>

```

#### In PHP template

Output using PHP template.  Current offset has css class 'current' applied.

```php

    <ul class="pagination">
        <li class="first"><a href="/links/<?= $p.first ?>">|&lt;&lt;</a></li>
        <li class="first"><a href="/links/<?= $p.prev ?>">prev</a></li>
            <?php foreach $p.links as $l for l : ?>
                <?php if($l == $p.current) : ?>
                    <?php $pclass = 'current'; ?>
                <?php else : ?>
                    <?php $pclass = ''; ?>
                <?php endif ?>
                <li class="<?= $pclass ?>"><a href="/links/<?= $l ?>"><?= $l ?></a></li>
            <?php endforeach; ?>
        <li class="last"><a href="/links/<?= $p.next ?>">next</a></li>
        <li class="last"><a href="/links/<?= $p.last ?>">&gt;&gt;|</a></li>
    </ul>

```

### License

The MIT License (MIT)

Copyright (c) 2015 by Steve George <steve@pagerange.com>

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and 
associated documentation files (the "Software"), to deal in the Software without restriction, including 
without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell 
copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the 
following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial 
portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT 
LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. 
IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, 
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE 
SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

