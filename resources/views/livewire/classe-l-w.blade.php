<div x-data="{editClasse: {}, showModal: false, showNew: false}">
    <div x-show="showNew" x-cloak x-on:click="showNew = false" class="modal-backdrop"></div>
    <div x-show="showNew" x-cloak class="prof-form">
        <p x-on:click="showNew = false" class="p close">X</p>
        <h2>Ajouter nouvelle classe</h2>
        <form method="POST" action="{{ route('addClasse') }}">
            @csrf
            <label for="niveau">Niveau :</label>
            <select name="niveau">
                <option value="L1">L1</option>
                <option value="L2">L2</option>
                <option value="L3">L3</option>
                <option value="M1">M1</option>
                <option value="M2">M2</option>
            </select>
            <label for="design">Désignation : </label>
            <input type="text" placeholder="Désignation" name="design" required>
            <input type="submit" value="Ajouter">
        </form>
    </div>
    <div class="header-content">
        <div class="input-search">
            <input type="text" placeholder="recherche..." wire:model="search">
        </div>

        <div class="button-new">
            <button x-on:click="(e) => {
                e.preventDefault()
                showNew = !showNew  
            }">Ajouter</button>
        </div>

        <div class="button-new">
            <select wire:model="niveau">
                <option value="">Tous</option>
                <option value="L1">L1</option>
                <option value="L2">L2</option>
                <option value="L3">L3</option>
                <option value="M1">M1</option>
                <option value="M2">M2</option>
            </select>
        </div>
    </div>
    <hr style="color: #c2c2c2">
    <div class="show-data">
        <div class="data-table">
            <table>
                <thead>
                    <tr>
                        <th>Identifiant</th>
                        <th>Niveau</th>
                        <th>Désignation</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classes as $classe)
                        <tr>
                            <td>{{$classe->id_classe}} </td>
                            <td>{{$classe->niveau}} </td>
                            <td>{{$classe->design}} </td>
                            <td>
                                <button class="edit-btn" x-on:click="(e) => {
                                    e.preventDefault()
                                    editClasse = {{$classe}}  
                                    showModal = !showModal 
                                }">Editer</button>
                                <button class="delete-btn" wire:click="deleteClasse({{$classe->id}})">Supprimer</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div x-show="showModal" x-cloak x-on:click="showModal = false" class="modal-backdrop"></div>
    <div x-cloak x-show="showModal" class="edit-modal prof-form">
        <p x-on:click="showModal = false" class="p close">X</p>
        <h2>Editer classe</h2>
        <form method="POST" action="{{ route('editClasse') }}">
            @csrf
            <input type="hidden" x-model="editClasse.id" name="id">
            <label for="niveau">Niveau :</label>
            <select name="niveau" x-model="editClasse.niveau">
                <option value="L1">L1</option>
                <option value="L2">L2</option>
                <option value="L3">L3</option>
                <option value="M1">M1</option>
                <option value="M2">M2</option>
            </select>
            <label for="design">Désignation : </label>
            <input type="text" placeholder="design" x-model="editClasse.design" name="design" required>
            <input type="submit" value="Editer">
        </form>
    </div>
</div>