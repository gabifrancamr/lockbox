<div class="bg-base-300 rounded-l-box w-56 flex flex-col divide-y divide-gray-700 overflow-hidden">

    <?php foreach ($notas as $nota): ?>
        <a href="/notas?id=<?= $nota->id ?>"
            class="
                w-full p-2 cursor-pointer hover:bg-base-200
                <?php if ($nota->id == $notaSelecionada->id): ?> bg-base-200 <?php endif; ?>
            ">
            <?= $nota->titulo ?> <br />

            <span class="text-xs">id: <?= $nota->id ?></span>
        </a>
    <?php endforeach; ?>

</div>

<div class="bg-base-200 rounded-r-box w-full p-10 flex flex-col space-y-6">
    <fieldset class="fieldset">
        <legend class="fieldset-legend">Título</legend>
        <input value="<?= $notaSelecionada->titulo ?>" name="titulo" type="text" class="input w-full" placeholder="Type here" />
    </fieldset>

    <fieldset class="fieldset">
        <legend class="fieldset-legend">Sua nota</legend>
        <textarea name="nota" class="textarea h-24 w-full" placeholder="Bio"><?= $notaSelecionada->nota ?></textarea>
    </fieldset>

    <div class="flex justify-between items-center">
        <button class="btn btn-error">Deletar</button>
        <button class="btn btn-primary">Atualizar</button>
    </div>
</div>