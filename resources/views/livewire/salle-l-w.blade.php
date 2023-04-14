<div x-data="{editSalle: {}, free: false}">
   <div id="backdrop" class="modal-backdrop"></div>
   <div id="showNew" class="prof-form">
        <p class="p close">X</p>
        <h2>Ajouter nouvelle salle</h2>
        <form method="POST" action="{{ route('addSalle') }}">
            @csrf
            <label for="name">Désignation : </label>
            <input type="text" placeholder="Désignation" name="design" required>
            <input type="submit" value="Ajouter">
        </form>
   </div>
   <div class="header-content">
      <div class="input-search">
         <input type="text" placeholder="recherche..." wire:model="search">
      </div>

      <div class="button-new">
         <button id="addNew">Ajouter</button>
      </div>

      <div class="check-free">
         Libre <input type="checkbox" wire:model="free" x-model="free">
         <input class="inp" type="date" x-show="free" wire:model="date">
         <input class="inp" type="time" x-show="free" wire:model="time" value={{date('H:i:s')}}>
      </div>
   </div>
   <hr style="color: #c2c2c2">
   <div class="show-data">
       <div class="data-table">
           <table>
               <thead>
                   <tr>
                       <th>Identifiant</th>
                       <th>Désignation</th>
                       <th>Actions</th>
                   </tr>
               </thead>
               <tbody>
                   @foreach ($salles as $salle)
                       <tr>
                           <td>{{$salle->id}} </td>
                           <td>{{$salle->design}} </td>
                           <td>
                               <button class="edit edit-btn" x-on:click="() => {
                                   editSalle = {{$salle}}
                               }">Editer</button>
                               <button class="delete-btn" wire:click="deleteSalle({{$salle->id}})">Supprimer</button>
                           </td>
                       </tr>
                   @endforeach
               </tbody>
           </table>
       </div>
   </div>
   <div id="modalEdit" class="edit-modal prof-form">
        <p class="p close2">X</p>
        <h2>Editer salle</h2>
        <form method="POST" action="{{ route('editSalle') }}">
            @csrf
            <input type="hidden" x-model="editSalle.id" name="id">
            <label for="name">Désignation : </label>
            <input type="text" placeholder="design" x-model="editSalle.design" name="design" required>
            <input type="submit" value="Editer">
        </form>
   </div>
</div>

<script>
    let addNew = document.querySelector('#addNew')
    let backdrop = document.querySelector('#backdrop')
    let showNew = document.querySelector('#showNew')
    let edit = document.querySelectorAll('.edit')
    let modalEdit = document.querySelector('#modalEdit')
    let close = document.querySelector('.close')
    let close2 = document.querySelector('.close2')

    addNew.onclick = () => {
        backdrop.style.display = "block"
        showNew.style.display = "block"
    }

    backdrop.onclick = () => {
        showNew.style.display = "none"
        backdrop.style.display = "none"
        modalEdit.style.display = "none"
    }

    edit.forEach(item => {
        item.onclick = () => {
            backdrop.style.display = "block"
            modalEdit.style.display = "block"
        }
    });

    close.onclick = () => {
        showNew.style.display = "none"
        backdrop.style.display = "none"
        modalEdit.style.display = "none"
    }

    close2.onclick = () => {
        showNew.style.display = "none"
        backdrop.style.display = "none"
        modalEdit.style.display = "none"
    }
</script>