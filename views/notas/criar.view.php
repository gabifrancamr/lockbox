<div class="bg-base-300 rounded-l-box w-56">
    <div class="bg-base-200 p-4">+ Nova Nota</div>
</div>

<div class="bg-base-200 rounded-r-box w-full p-10">
    <form action="/notas/criar" method="POST" class="flex flex-col space-y-6">
        <fieldset class="fieldset">
            <legend class="fieldset-legend">Título</legend>
            <input type="text" class="input w-full" placeholder="Type here" />
        </fieldset>

        <fieldset class="fieldset">
            <legend class="fieldset-legend">Sua nota</legend>
            <textarea class="textarea h-24 w-full" placeholder="Bio"></textarea>
        </fieldset>

        <div class="flex justify-end items-center">
            <button class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>