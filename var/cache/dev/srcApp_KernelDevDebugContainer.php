<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerJvuiiVd\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerJvuiiVd/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerJvuiiVd.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerJvuiiVd\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerJvuiiVd\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'JvuiiVd',
    'container.build_id' => '6edc9cc7',
    'container.build_time' => 1564992526,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerJvuiiVd');
