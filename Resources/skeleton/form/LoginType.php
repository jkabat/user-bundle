<?php

declare(strict_types=1);

/*
 * This file is part of the MsgPHP package.
 *
 * (c) Roland Franssen <franssen.roland@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$fieldType = 'email' === $fieldName ? 'EmailType' : 'TextType';
$uses = [
    'use Symfony\\Component\\Form\\AbstractType;',
    'use Symfony\\Component\\Form\\Extension\\Core\\Type\\'.$fieldType.';',
    'use Symfony\\Component\\Form\\Extension\\Core\\Type\\PasswordType;',
    'use Symfony\\Component\\Form\\FormBuilderInterface;',
];

sort($uses);
$uses = implode("\n", $uses);

return <<<PHP
<?php

declare(strict_types=1);

namespace ${ns};

${uses}

final class LoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface \$builder, array \$options)
    {
        \$builder->add('${fieldName}', ${fieldType}::class);
        \$builder->add('password', PasswordType::class);
    }
}

PHP;
