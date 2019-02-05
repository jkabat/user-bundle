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

namespace MsgPhp\UserBundle;

use MsgPhp\Domain\Infra\DependencyInjection\BundleHelper;
use MsgPhp\UserBundle\DependencyInjection\Compiler\CleanupPass;
use MsgPhp\UserBundle\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @author Roland Franssen <franssen.roland@gmail.com>
 */
final class MsgPhpUserBundle extends Bundle
{
    public function boot(): void
    {
        BundleHelper::boot($this->container);
    }

    public function build(ContainerBuilder $container): void
    {
        $container->addCompilerPass(new CleanupPass(), PassConfig::TYPE_BEFORE_OPTIMIZATION, 100);

        BundleHelper::build($container);
    }

    public function getContainerExtension(): ?ExtensionInterface
    {
        return new Extension();
    }
}
