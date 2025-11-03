<?php $validacoes = flash()->get('validacoes'); ?>

<div class="bg-base-300 rounded-l-box w-56 overflow-hidden">
    <div class="bg-base-200 p-4">+ Nova Nota</div>
</div>

<div class="bg-base-200 rounded-r-box w-full p-10">
    <form action="/notas/criar" method="POST" class="flex flex-col space-y-6">
        <fieldset class="fieldset">
            <legend class="fieldset-legend">Título</legend>
            <input name="titulo" type="text" class="input w-full" />

            <?php if (isset($validacoes['titulo'])): ?>
                <div class="mt-1 text-xs text-error"><?= $validacoes['titulo'][0] ?></div>
            <?php endif; ?>
        </fieldset>

        <fieldset class="fieldset">
            <legend class="fieldset-legend">Sua nota</legend>
            <textarea name="nota" class="textarea h-24 w-full textarea-bordered"></textarea>

            <?php if (isset($validacoes['nota'])): ?>
                <div class="mt-1 text-xs text-error"><?= $validacoes['nota'][0] ?></div>
            <?php endif; ?>
        </fieldset>

        <div class="flex justify-end items-center">
            <button class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>