<div x-data="{editProf: {}, showModal: false, showNew: false, showDelete: false}">
    <div x-show="showNew" x-cloak x-on:click="showNew = false" class="modal-backdrop"></div>
    <div x-show="showNew" x-cloak class="prof-form">
        <p x-on:click="showNew = false" class="p">X</p>
        <h2>Ajouter nouveau enseignant</h2>
        <form id="addForm" method="POST" action="{{ route('addProf') }}">
            @csrf
            <label for="name">Nom : </label>
            <input type="text" placeholder="Nom" name="name" required>
            <label for="lastName">Prénoms : </label>
            <input type="text" placeholder="Prénoms" name="lastName">
            <label for="grade">Grade :</label>
            <input type="text" placeholder="Grade" name="grade" required>
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
    </div>
    <hr style="color: #c2c2c2">
    <div class="show-data">
        <div class="data-table">
            <table>
                <thead>
                    <tr>
                        <th>Identifiant</th>
                        <th>Nom</th>
                        <th>Prénoms</th>
                        <th>Grade</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profs as $prof)
                        <tr>
                            <td>{{$prof->id_prof}} </td>
                            <td>{{$prof->nom}} </td>
                            <td>{{$prof->prenoms}} </td>
                            <td>{{$prof->grade}} </td>
                            <td>
                                <button class="edit-btn" x-on:click="(e) => {
                                    e.preventDefault()
                                    editProf = {{$prof}}  
                                    showModal = !showModal 
                                }">Editer</button>
                                <button class="delete-btn" wire:click="deleteProf({{$prof->id}})">Supprimer</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div x-show="showModal" x-cloak x-on:click="showModal = false" class="modal-backdrop"></div>
    <div x-cloak x-show="showModal" class="edit-modal prof-form">
        <p x-on:click="showModal = false" class="p">X</p>
        <h2>Editer enseignant</h2>
        <form id="addForm" method="POST" action="{{ route('editProf') }}">
            @csrf
            <input type="hidden" x-model="editProf.id" name="id">
            <label for="name">Nom : </label>
            <input type="text" placeholder="Nom" x-model="editProf.nom" name="name" required>
            <label for="lastName">Prénoms : </label>
            <input type="text" placeholder="Prénoms" x-model="editProf.prenoms" name="lastName">
            <label for="grade">Grade :</label>
            <input type="text" placeholder="Grade" x-model="editProf.grade" name="grade" required>
            <input type="submit" value="Editer">
        </form>
    </div>
</div>