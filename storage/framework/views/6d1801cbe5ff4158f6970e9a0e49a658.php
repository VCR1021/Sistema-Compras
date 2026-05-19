<?php $__env->startSection('page_title', 'Historial de Solicitudes'); ?>

<?php $__env->startSection('content'); ?>
<div class="card card-custom">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Nº Orden</th>
                        <th>Fecha</th>
                        <th>Proveedor</th>
                        <th>Solicitante</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><strong><?php echo e($order->po_number); ?></strong></td>
                            <td><?php echo e($order->issue_date ? $order->issue_date->format('d/m/Y H:i') : 'N/A'); ?></td>
                            <td>
                                <?php echo e($order->supplier->company_name ?? 'N/A'); ?>

                                <br>
                                <small class="text-muted"><?php echo e($order->supplier->contact_name ?? ''); ?></small>
                            </td>
                            <td><?php echo e($order->requester->first_name ?? ''); ?> <?php echo e($order->requester->last_name ?? ''); ?></td>
                            <td>$ <?php echo e(number_format($order->total_amount, 2)); ?></td>
                            <td>
                                <?php if($order->status == 'APPROVED'): ?>
                                    <span class="badge bg-success">Aprobado</span>
                                <?php elseif($order->status == 'DRAFT'): ?>
                                    <span class="badge bg-secondary">Borrador</span>
                                <?php else: ?>
                                    <span class="badge bg-primary"><?php echo e($order->status); ?></span>
                                <?php endif; ?>
                            </td>
                            <td class="text-end">
                                <form action="<?php echo e(route('orders.destroy', $order)); ?>" method="POST" class="d-inline" onsubmit="return confirm('¿Está seguro de que desea eliminar esta orden de compra? Esta acción no se puede deshacer.');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar orden">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                No hay órdenes de compra registradas.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\fredy\OneDrive\Documentos\project-final\project-compras\resources\views/orders/index.blade.php ENDPATH**/ ?>