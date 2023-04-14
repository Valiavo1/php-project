<div x-data="{editEdt: {}, showModal: false, showNew: false}">
    <div x-show="showNew" x-cloak x-on:click="showNew = false"  class="modal-backdrop"></div>
    <div x-show="showNew" x-cloak class="prof-form">
        <p x-on:click="showNew = false" class="p close">X</p>
        <h2>Ajouter nouveau emploi du temps</h2>
        <form method="POST" action="{{ route('addEdt') }}">
            @csrf
            <label for="salle">Salle : </label>
            <input type="text" placeholder="Désignation de la salle" name="salle" required>
            <label for="prof">Enseignant : </label>
            <div class="flex flex-col relative">
                <input type="text" placeholder="Numéro de l'enseignant" name="prof" wire:model="profPanel" required>
                @if ($profs)
                    @if ($profs->count() > 0)
                        <div class="panel">
                            @foreach ($profs as $prof)
                                <p wire:click="setProfPanel('{{$prof->id_prof}}')">{{$prof->nom . ' ' . $prof->prenoms}}</p>
                            @endforeach
                        </div>
                    @endif
                @endif
            </div>
            <label for="niveau">Niveau : </label>
            <select name="niveau" wire:model="niveauPanel">
                <option value="L1">L1</option>
                <option value="L2">L2</option>
                <option value="L3">L3</option>
                <option value="M1">M1</option>
                <option value="M2">M2</option>
            </select>
            <label for="classe">Classe : </label>
            <div class="flex flex-col relative">
                <input type="text" placeholder="Numéro de la classe" name="classe" wire:model="classePanel" required>
                @if ($niveauP)
                    @if ($niveauP->count() > 0)
                        <div class="panel">
                            @foreach ($niveauP as $niv)
                                <p wire:click="setClassePanel('{{$niv->id_classe}}')">{{$niv->design}}</p>
                            @endforeach
                        </div>
                    @endif
                @endif
            </div>
            <label for="cours">Cours : </label>
            <input type="text" placeholder="Cours" name="cours" required>
            <label for="date">Date : </label>
            <input type="date" name="date" required>
            <label for="time">Horaire du début : </label>
            <input type="time" name="time" required>
            <input type="submit" value="Ajouter">
        </form>
    </div>
    <div class="header-content">
        <div class="input-search">
            <input type="text" placeholder="professeur..." wire:model="search">
        </div>

        <div class="niveau">
            <label for="niveau">Niveau : </label>
            <select name="niveau" wire:model="niveau">
                <option value="">Tous</option>
                <option value="L1">L1</option>
                <option value="L2">L2</option>
                <option value="L3">L3</option>
                <option value="M1">M1</option>
                <option value="M2">M2</option>
            </select>
        </div>

        <div class="classe">
            <label for="classe">Classe : </label>
            <select name="classe" wire:model="classe">
                <option value="">Tous</option>
                @foreach ($classes as $classe)
                    <option value={{$classe->design}}>{{$classe->design}}</option>
                @endforeach
            </select>
        </div>

        <div class="date-edt">
            <input type="date" wire:model="date">
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
                        <th>Date</th>
                        <th>Horaire</th>
                        <th>Cours</th>
                        <th>Classe</th>
                        <th>Salle</th>
                        <th>Professeur</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($edts as $edt)
                        <tr>
                            <td>{{date("d/m/Y", strtotime($edt->date))}} </td>
                            <td>{{date("g:i a", strtotime($edt->start)) . '-' . date("g:i a", strtotime($edt->end))}} </td>
                            <td>{{$edt->cours}} </td>
                            <td>{{$edt->niveau . ' ' . $edt->design}} </td>
                            <td>{{$edt->salle->design}} </td>
                            <td>{{$edt->nom . ' ' .$edt->prenoms}} </td>
                            <td>
                                <button class="edit-btn" x-on:click="(e) => {
                                    e.preventDefault()
                                    editEdt = {{$edt}}  
                                    showModal = !showModal 
                                }">Editer</button>
                                <button class="delete-btn" wire:click="deleteEdt({{$edt->id}})">Supprimer</button>
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
        <h2>Editer nouveau emploi du temps</h2>
        <form method="POST" action="{{ route('editEdt') }}">
            @csrf
            <input type="hidden" x-model="editEdt.id" name="id">
            <label for="salle">Salle : </label>
            <input type="text" placeholder="Salle" name="salle" x-model="editEdt.salle.design" required>
            <label for="prof">Enseignant : </label>
            <div class="flex flex-col relative">
                <input type="text" placeholder="Professeur" name="prof" wire:model="profPanel" x-model="editEdt.id_prof" required>
                @if ($profs)
                    @if ($profs->count() > 0)
                        <div class="panel">
                            @foreach ($profs as $prof)
                                <p x-on:click="editEdt.id_prof = '{{$prof->id_prof}}'" wire:click="setProfPanel('{{$prof->id_prof}}')">{{$prof->nom . ' ' . $prof->prenoms}}</p>
                            @endforeach
                        </div>
                    @endif
                @endif
            </div>
            <label for="niveau">Niveau : </label>
            <select name="niveau" wire:model="niveauPanel">
                <option value="L1">L1</option>
                <option value="L2">L2</option>
                <option value="L3">L3</option>
                <option value="M1">M1</option>
                <option value="M2">M2</option>
            </select>
            <label for="classe">Classe : </label>
            <div class="flex flex-col relative">
                <input type="text" placeholder="Classe" name="classe" wire:model="classePanel" x-model="editEdt.id_classe" required>
                @if ($niveauP)
                    @if ($niveauP->count() > 0)
                        <div class="panel">
                            @foreach ($niveauP as $niv)
                                <p x-on:click="editEdt.id_classe = '{{$niv->id_classe}}'" wire:click="setClassePanel('{{$niv->id_classe}}')">{{$niv->design}}</p>
                            @endforeach
                        </div>
                    @endif
                @endif
            </div>
            <label for="cours">Cours : </label>
            <input type="text" placeholder="Cours" name="cours" x-model="editEdt.cours" required>
            <label for="date">Date : </label>
            <input type="date" name="date" x-model="editEdt.date" required>
            <label for="time">Horaire du début : </label>
            <input type="time" name="time" x-model="editEdt.start" required>
            <input type="submit" value="Editer">
        </form>
    </div>
 </div>