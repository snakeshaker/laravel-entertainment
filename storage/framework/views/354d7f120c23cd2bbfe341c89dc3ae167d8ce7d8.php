<?php if (isset($component)) { $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AdminLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\AdminLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Личный кабинет')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12 bk-page">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="<?php echo e(route('admin.reservations.export')); ?>" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white mr-2">
                    Скачать excel таблицу
                </a>
                <a href="<?php echo e(route('admin.reservations.create')); ?>" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                    Забронировать
                </a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 bk-table admin-table">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Имя фамилия
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Электронная почта
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Номер телефона
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Дата бронирования
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Место
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Кол-во гостей
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span>Изменить/удалить</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                <?php echo e($reservation->first_name); ?> <?php echo e($reservation->last_name); ?>

                            </th>
                            <td class="px-6 py-4">
                                <?php echo e($reservation->email); ?>

                            </td>
                            <td class="px-6 py-4">
                                <?php echo e($reservation->tel_number); ?>

                            </td>
                            <td class="px-6 py-4">
                                <?php echo e($reservation->res_date); ?>

                            </td>
                            <td class="px-6 py-4">
                                <?php echo e($reservation->table->name); ?>

                            </td>
                            <td class="px-6 py-4">
                                <?php echo e($reservation->guest_number); ?>

                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                <div class="flex space-x-2">
                                    <a href="<?php echo e(route('admin.reservations.edit', $reservation->id)); ?>" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">
                                        Изменить
                                    </a>
                                    <form class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                          id="destroy_entry"
                                          method="POST"
                                          action="<?php echo e(route('admin.reservations.destroy', $reservation->id)); ?>"
                                          >
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field("DELETE"); ?>
                                        <button type="submit">Удалить</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040)): ?>
<?php $component = $__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040; ?>
<?php unset($__componentOriginalbacdc7ee2ae68d90ee6340a54a5e36f99d0a3040); ?>
<?php endif; ?>
<?php /**PATH C:\Users\OpenServer\domains\entertainment.ru\resources\views/admin/reservations/index.blade.php ENDPATH**/ ?>