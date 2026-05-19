<?php $__env->startSection('page_title', 'Proveedores'); ?>

<?php $__env->startSection('content'); ?>


<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card card-custom h-100">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon" style="background: #eef2f7; color: #0b224e;">
                    <i class="bi bi-building fs-4"></i>
                </div>
                <div>
                    <div class="stat-value"><?php echo e($totalSuppliers); ?></div>
                    <div class="stat-label">Proveedores Activos</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-custom h-100">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon" style="background: #e8f5e9; color: #2e7d32;">
                    <i class="bi bi-box-seam fs-4"></i>
                </div>
                <div>
                    <div class="stat-value"><?php echo e($totalProducts); ?></div>
                    <div class="stat-label">Productos en Catálogo</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-custom h-100">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon" style="background: #fff3e0; color: #e65100;">
                    <i class="bi bi-cart-check fs-4"></i>
                </div>
                <div>
                    <div class="stat-value"><?php echo e($totalOrders); ?></div>
                    <div class="stat-label">Órdenes Emitidas</div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="card card-custom">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-box">
                    <i class="bi bi-building"></i>
                </div>
                <div>
                    <h5 class="mb-0">Directorio de Proveedores</h5>
                    <small class="text-muted">Todas las entidades comerciales registradas</small>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Empresa</th>
                        <th>Punto de Contacto</th>
                        <th>Correo Electrónico</th>
                        <th>Teléfono</th>
                        <th class="text-center">Productos</th>
                        <th class="text-center">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="text-muted"><?php echo e($supplier->id); ?></td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="supplier-avatar">
                                    <?php echo e(strtoupper(substr($supplier->company_name, 0, 1))); ?>

                                </div>
                                <div>
                                    <div class="fw-semibold"><?php echo e($supplier->company_name); ?></div>
                                    <?php if($supplier->tax_id): ?>
                                        <small class="text-muted">RFC: <?php echo e($supplier->tax_id); ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                        <td><?php echo e($supplier->contact_name ?? '—'); ?></td>
                        <td>
                            <?php if($supplier->email): ?>
                                <a href="mailto:<?php echo e($supplier->email); ?>" class="text-decoration-none text-primary">
                                    <?php echo e($supplier->email); ?>

                                </a>
                            <?php else: ?>
                                —
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($supplier->phone ?? '—'); ?></td>
                        <td class="text-center">
                            <span class="badge rounded-pill" style="background: #eef2f7; color: #0b224e; font-size: 0.85rem; padding: 5px 12px;">
                                <?php echo e($supplier->products_count); ?>

                            </span>
                        </td>
                        <td class="text-center">
                            <?php if($supplier->is_active): ?>
                                <span class="badge bg-success">Activo</span>
                            <?php else: ?>
                                <span class="badge bg-secondary">Inactivo</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="bi bi-building-x fs-2 d-block mb-2"></i>
                            No hay proveedores registrados.
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<style>
    .stat-icon {
        width: 52px;
        height: 52px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .stat-value {
        font-size: 2rem;
        font-weight: 700;
        color: #0b224e;
        line-height: 1;
    }
    .stat-label {
        font-size: 0.82rem;
        color: #6c757d;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-top: 4px;
    }
    .supplier-avatar {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        background: #eef2f7;
        color: #0b224e;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.9rem;
        flex-shrink: 0;
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\fredy\OneDrive\Documentos\project-final\project-compras\resources\views/suppliers/index.blade.php ENDPATH**/ ?>